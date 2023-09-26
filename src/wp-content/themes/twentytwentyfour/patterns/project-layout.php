<?php
/**
 * Title: Project Layout
 * Slug: twentytwentyfour/project-layout
 * Categories: gallery, featured
 * Viewport width: 1600
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}},"elements":{"link":{"color":{"text":"var:preset|color|base-2"}}}},"backgroundColor":"contrast","textColor":"base-2","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-2-color has-contrast-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"stretch","width":"60%","style":{"spacing":{"padding":{"right":"0"}}}} -->
<div class="wp-block-column is-vertically-aligned-stretch" style="padding-right:0;flex-basis:60%"><!-- wp:group {"style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"stretch"}} -->
<div class="wp-block-group" style="min-height:100%"><!-- wp:image {"aspectRatio":"9/16","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image size-large is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/project-1.webp" alt="<?php esc_attr_e( 'A building seen from perspective', 'twentytwentyfour' ); ?>" style="aspect-ratio:9/16;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size"><?php echo esc_html_x( '1. Through Études, we aspire to redefine architectural boundaries and usher in a new era of design excellence that leaves an indelible mark on the built environment.', 'give the user a clear understanding of what the photo talks about', 'twentytwentyfour' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.2","fontStyle":"normal","fontWeight":"500"}},"fontSize":"large"} -->
<p class="has-large-font-size" style="font-style:normal;font-weight:500;line-height:1.2"><?php echo esc_html_x( 'Our comprehensive suite of professional services caters to a diverse clientele, ranging from homeowners to commercial developers. With a commitment to innovation and sustainability, Études is the bridge that transforms architectural dreams into remarkable built realities.', 'an explanation of the objective of the project', 'twentytwentyfour' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"var:preset|spacing|40","style":{"layout":{}}} -->
<div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size"><?php echo esc_html_x( '2. Case studies that celebrate the artistry can fuel curiosity and ignite inspiration.', 'An Overview of the project', 'twentytwentyfour' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:image {"aspectRatio":"9/16","scale":"cover","sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
<figure class="wp-block-image size-large is-style-rounded"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/project-overview.webp" alt="<?php esc_attr_e( 'A woman walking up the stairs', 'twentytwentyfour' ); ?>" style="aspect-ratio:9/16;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
