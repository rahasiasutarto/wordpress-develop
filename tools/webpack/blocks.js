/**
 * External dependencies
 */
const CopyWebpackPlugin = require( 'copy-webpack-plugin' );

/**
 * Internal dependencies
 */
const {
	baseDir,
	getBaseConfig,
	normalizeJoin,
	stylesTransform,
} = require( './shared' );
const {
	isDynamic,
	toDirectoryName,
	getStableBlocksMetadata,
} = require( '../release/sync-stable-blocks' );

module.exports = function (
	env = { environment: 'production', watch: false, buildTarget: false }
) {
	const mode = env.environment;
	const suffix = mode === 'production' ? '.min' : '';
	let buildTarget = env.buildTarget
		? env.buildTarget
		: mode === 'production'
		? 'build'
		: 'src';
	buildTarget = buildTarget + '/wp-includes';

	const blocks = getStableBlocksMetadata();
	const dynamicBlockFolders = blocks
		.filter( isDynamic )
		.map( toDirectoryName );
	const blockFolders = blocks.map( toDirectoryName );
	const blockPHPFiles = {
		'widgets/src/blocks/legacy-widget/index.php':
			'wp-includes/blocks/legacy-widget.php',
		'widgets/src/blocks/widget-group/index.php':
			'wp-includes/blocks/widget-group.php',
		...dynamicBlockFolders.reduce( ( files, blockName ) => {
			files[
				`block-library/src/${ blockName }/index.php`
			] = `wp-includes/blocks/${ blockName }.php`;
			return files;
		}, {} ),
	};
	const blockMetadataFiles = {
		'widgets/src/blocks/legacy-widget/block.json':
			'wp-includes/blocks/legacy-widget/block.json',
		'widgets/src/blocks/widget-group/block.json':
			'wp-includes/blocks/widget-group/block.json',
		...blockFolders.reduce( ( files, blockName ) => {
			files[
				`block-library/src/${ blockName }/block.json`
			] = `wp-includes/blocks/${ blockName }/block.json`;
			return files;
		}, {} ),
	};

	const blockPHPCopies = Object.keys( blockPHPFiles ).map( ( filename ) => ( {
		from: normalizeJoin( baseDir, `node_modules/@wordpress/${ filename }` ),
		to: normalizeJoin( baseDir, `src/${ blockPHPFiles[ filename ] }` ),
	} ) );

	const blockMetadataCopies = Object.keys( blockMetadataFiles ).map(
		( filename ) => ( {
			from: normalizeJoin(
				baseDir,
				`node_modules/@wordpress/${ filename }`
			),
			to: normalizeJoin(
				baseDir,
				`src/${ blockMetadataFiles[ filename ] }`
			),
		} )
	);

	const blockStylesheetCopies = blockFolders.map( ( blockName ) => ( {
		from: normalizeJoin(
			baseDir,
			`node_modules/@wordpress/block-library/build-style/${ blockName }/*.css`
		),
		to: normalizeJoin(
			baseDir,
			`${ buildTarget }/blocks/${ blockName }/[name]${ suffix }.css`
		),
		transform: stylesTransform( mode ),
		noErrorOnMissing: true,
	} ) );

	const baseConfig = getBaseConfig( env );
	const config = {
		...baseConfig,
		// Todo: This list need of entry points need to be automatically fetched from the package
		// We shouldn't have to maintain it manually.
		entry: {
			navigation: normalizeJoin(
				baseDir,
				'node_modules/@wordpress/block-library/build-module/navigation/view'
			),
			image: normalizeJoin(
				baseDir,
				'node_modules/@wordpress/block-library/build-module/image/view'
			),
			query: normalizeJoin(
				baseDir,
				'node_modules/@wordpress/block-library/build-module/query/view'
			),
			file: normalizeJoin(
				baseDir,
				'node_modules/@wordpress/block-library/build-module/file/view'
			),
			search: normalizeJoin(
				baseDir,
				'node_modules/@wordpress/block-library/build-module/search/view'
			),
		},
		experiments: {
			outputModule: true,
		},
		output: {
			devtoolNamespace: 'wp',
			filename: `./blocks/[name]${ suffix }.js`,
			path: normalizeJoin( baseDir, buildTarget ),
			library: {
				type: 'module',
			},
			environment: { module: true },
		},
		externalsType: 'module',
		externals: {
			'@wordpress/interactivity': '@wordpress/interactivity',
		},
		module: {
			rules: [
				{
					test: /\.(j|t)sx?$/,
					use: [
						{
							loader: require.resolve( 'babel-loader' ),
							options: {
								cacheDirectory:
									process.env.BABEL_CACHE_DIRECTORY || true,
								babelrc: false,
								configFile: false,
								presets: [
									[
										'@babel/preset-react',
										{
											runtime: 'automatic',
											importSource: 'preact',
										},
									],
								],
							},
						},
					],
				},
			],
		},
		plugins: [
			...baseConfig.plugins,
			new CopyWebpackPlugin( {
				patterns: [
					...blockPHPCopies,
					...blockMetadataCopies,
					...blockStylesheetCopies,
				],
			} ),
		],
	};

	return config;
};
