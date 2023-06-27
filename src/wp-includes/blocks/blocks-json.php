<?php return array(
  'archives' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/archives',
    'title' => 'Archives',
    'category' => 'widgets',
    'description' => 'Display a date archive of your posts.',
    'textdomain' => 'default',
    'attributes' => array(
      'displayAsDropdown' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'showLabel' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'showPostCounts' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'type' => array(
        'type' => 'string',
        'default' => 'monthly'
      )
    ),
    'supports' => array(
      'align' => true,
      'html' => false,
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-archives-editor'
  ),
  'audio' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/audio',
    'title' => 'Audio',
    'category' => 'media',
    'description' => 'Embed a simple audio player.',
    'keywords' => array(
      'music',
      'sound',
      'podcast',
      'recording'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'src' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'audio',
        'attribute' => 'src',
        '__experimentalRole' => 'content'
      ),
      'caption' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'figcaption',
        '__experimentalRole' => 'content'
      ),
      'id' => array(
        'type' => 'number',
        '__experimentalRole' => 'content'
      ),
      'autoplay' => array(
        'type' => 'boolean',
        'source' => 'attribute',
        'selector' => 'audio',
        'attribute' => 'autoplay'
      ),
      'loop' => array(
        'type' => 'boolean',
        'source' => 'attribute',
        'selector' => 'audio',
        'attribute' => 'loop'
      ),
      'preload' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'audio',
        'attribute' => 'preload'
      )
    ),
    'supports' => array(
      'anchor' => true,
      'align' => true,
      'spacing' => array(
        'margin' => true,
        'padding' => true
      )
    ),
    'editorStyle' => 'wp-block-audio-editor',
    'style' => 'wp-block-audio'
  ),
  'avatar' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/avatar',
    'title' => 'Avatar',
    'category' => 'theme',
    'description' => 'Add a user’s avatar.',
    'textdomain' => 'default',
    'attributes' => array(
      'userId' => array(
        'type' => 'number'
      ),
      'size' => array(
        'type' => 'number',
        'default' => 96
      ),
      'isLink' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'linkTarget' => array(
        'type' => 'string',
        'default' => '_self'
      )
    ),
    'usesContext' => array(
      'postType',
      'postId',
      'commentId'
    ),
    'supports' => array(
      'html' => false,
      'align' => true,
      'alignWide' => false,
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      '__experimentalBorder' => array(
        '__experimentalSkipSerialization' => true,
        'radius' => true,
        'width' => true,
        'color' => true,
        'style' => true,
        '__experimentalDefaultControls' => array(
          'radius' => true
        )
      ),
      'color' => array(
        'text' => false,
        'background' => false,
        '__experimentalDuotone' => 'img'
      )
    ),
    'editorStyle' => 'wp-block-avatar-editor',
    'style' => 'wp-block-avatar'
  ),
  'block' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/block',
    'title' => 'Pattern',
    'category' => 'reusable',
    'description' => 'Create and save content to reuse across your site. Update the block, and the changes apply everywhere it’s used.',
    'textdomain' => 'default',
    'attributes' => array(
      'ref' => array(
        'type' => 'number'
      )
    ),
    'supports' => array(
      'customClassName' => false,
      'html' => false,
      'inserter' => false
    )
  ),
  'button' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/button',
    'title' => 'Button',
    'category' => 'design',
    'parent' => array(
      'core/buttons'
    ),
    'description' => 'Prompt visitors to take action with a button-style link.',
    'keywords' => array(
      'link'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'textAlign' => array(
        'type' => 'string'
      ),
      'url' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'a',
        'attribute' => 'href',
        '__experimentalRole' => 'content'
      ),
      'title' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'a',
        'attribute' => 'title',
        '__experimentalRole' => 'content'
      ),
      'text' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'a',
        '__experimentalRole' => 'content'
      ),
      'linkTarget' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'a',
        'attribute' => 'target',
        '__experimentalRole' => 'content'
      ),
      'rel' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'a',
        'attribute' => 'rel',
        '__experimentalRole' => 'content'
      ),
      'placeholder' => array(
        'type' => 'string'
      ),
      'backgroundColor' => array(
        'type' => 'string'
      ),
      'textColor' => array(
        'type' => 'string'
      ),
      'gradient' => array(
        'type' => 'string'
      ),
      'width' => array(
        'type' => 'number'
      )
    ),
    'supports' => array(
      'anchor' => true,
      'align' => false,
      'alignWide' => false,
      'color' => array(
        '__experimentalSkipSerialization' => true,
        'gradients' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      ),
      'reusable' => false,
      'shadow' => true,
      'spacing' => array(
        '__experimentalSkipSerialization' => true,
        'padding' => array(
          'horizontal',
          'vertical'
        ),
        '__experimentalDefaultControls' => array(
          'padding' => true
        )
      ),
      '__experimentalBorder' => array(
        'color' => true,
        'radius' => true,
        'style' => true,
        'width' => true,
        '__experimentalSkipSerialization' => true,
        '__experimentalDefaultControls' => array(
          'color' => true,
          'radius' => true,
          'style' => true,
          'width' => true
        )
      ),
      '__experimentalSelector' => '.wp-block-button .wp-block-button__link'
    ),
    'styles' => array(
      array(
        'name' => 'fill',
        'label' => 'Fill',
        'isDefault' => true
      ),
      array(
        'name' => 'outline',
        'label' => 'Outline'
      )
    ),
    'editorStyle' => 'wp-block-button-editor',
    'style' => 'wp-block-button'
  ),
  'buttons' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/buttons',
    'title' => 'Buttons',
    'category' => 'design',
    'description' => 'Prompt visitors to take action with a group of button-style links.',
    'keywords' => array(
      'link'
    ),
    'textdomain' => 'default',
    'supports' => array(
      'anchor' => true,
      'align' => array(
        'wide',
        'full'
      ),
      'html' => false,
      '__experimentalExposeControlsToChildren' => true,
      'spacing' => array(
        'blockGap' => true,
        'margin' => array(
          'top',
          'bottom'
        ),
        '__experimentalDefaultControls' => array(
          'blockGap' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      ),
      'layout' => array(
        'allowSwitching' => false,
        'allowInheriting' => false,
        'default' => array(
          'type' => 'flex'
        )
      )
    ),
    'editorStyle' => 'wp-block-buttons-editor',
    'style' => 'wp-block-buttons'
  ),
  'calendar' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/calendar',
    'title' => 'Calendar',
    'category' => 'widgets',
    'description' => 'A calendar of your site’s posts.',
    'keywords' => array(
      'posts',
      'archive'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'month' => array(
        'type' => 'integer'
      ),
      'year' => array(
        'type' => 'integer'
      )
    ),
    'supports' => array(
      'align' => true,
      'color' => array(
        'link' => true,
        '__experimentalSkipSerialization' => array(
          'text',
          'background'
        ),
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        ),
        '__experimentalSelector' => 'table, th'
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'style' => 'wp-block-calendar'
  ),
  'categories' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/categories',
    'title' => 'Categories List',
    'category' => 'widgets',
    'description' => 'Display a list of all categories.',
    'textdomain' => 'default',
    'attributes' => array(
      'displayAsDropdown' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'showHierarchy' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'showPostCounts' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'showOnlyTopLevel' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'showEmpty' => array(
        'type' => 'boolean',
        'default' => false
      )
    ),
    'supports' => array(
      'align' => true,
      'html' => false,
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-categories-editor',
    'style' => 'wp-block-categories'
  ),
  'code' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/code',
    'title' => 'Code',
    'category' => 'text',
    'description' => 'Display code snippets that respect your spacing and tabs.',
    'textdomain' => 'default',
    'attributes' => array(
      'content' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'code'
      )
    ),
    'supports' => array(
      'align' => array(
        'wide'
      ),
      'anchor' => true,
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      ),
      'spacing' => array(
        'margin' => array(
          'top',
          'bottom'
        ),
        'padding' => true
      ),
      '__experimentalBorder' => array(
        'radius' => true,
        'color' => true,
        'width' => true,
        'style' => true,
        '__experimentalDefaultControls' => array(
          'width' => true,
          'color' => true
        )
      ),
      'color' => array(
        'text' => true,
        'background' => true,
        'gradients' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      )
    ),
    'style' => 'wp-block-code'
  ),
  'column' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/column',
    'title' => 'Column',
    'category' => 'design',
    'parent' => array(
      'core/columns'
    ),
    'description' => 'A single column within a columns block.',
    'textdomain' => 'default',
    'attributes' => array(
      'verticalAlignment' => array(
        'type' => 'string'
      ),
      'width' => array(
        'type' => 'string'
      ),
      'allowedBlocks' => array(
        'type' => 'array'
      ),
      'templateLock' => array(
        'type' => array(
          'string',
          'boolean'
        ),
        'enum' => array(
          'all',
          'insert',
          'contentOnly',
          false
        )
      )
    ),
    'supports' => array(
      'anchor' => true,
      'reusable' => false,
      'html' => false,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'spacing' => array(
        'blockGap' => true,
        'padding' => true,
        '__experimentalDefaultControls' => array(
          'padding' => true,
          'blockGap' => true
        )
      ),
      '__experimentalBorder' => array(
        'color' => true,
        'style' => true,
        'width' => true,
        '__experimentalDefaultControls' => array(
          'color' => true,
          'style' => true,
          'width' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      ),
      'layout' => true
    )
  ),
  'columns' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/columns',
    'title' => 'Columns',
    'category' => 'design',
    'description' => 'Display content in multiple columns, with blocks added to each column.',
    'textdomain' => 'default',
    'attributes' => array(
      'verticalAlignment' => array(
        'type' => 'string'
      ),
      'isStackedOnMobile' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'templateLock' => array(
        'type' => array(
          'string',
          'boolean'
        ),
        'enum' => array(
          'all',
          'insert',
          'contentOnly',
          false
        )
      )
    ),
    'supports' => array(
      'anchor' => true,
      'align' => array(
        'wide',
        'full'
      ),
      'html' => false,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'spacing' => array(
        'blockGap' => array(
          '__experimentalDefault' => '2em',
          'sides' => array(
            'horizontal',
            'vertical'
          )
        ),
        'margin' => array(
          'top',
          'bottom'
        ),
        'padding' => true,
        '__experimentalDefaultControls' => array(
          'padding' => true,
          'blockGap' => true
        )
      ),
      'layout' => array(
        'allowSwitching' => false,
        'allowInheriting' => false,
        'allowEditing' => false,
        'default' => array(
          'type' => 'flex',
          'flexWrap' => 'nowrap'
        )
      ),
      '__experimentalBorder' => array(
        'color' => true,
        'radius' => true,
        'style' => true,
        'width' => true,
        '__experimentalDefaultControls' => array(
          'color' => true,
          'radius' => true,
          'style' => true,
          'width' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-columns-editor',
    'style' => 'wp-block-columns'
  ),
  'comment-author-name' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/comment-author-name',
    'title' => 'Comment Author Name',
    'category' => 'theme',
    'ancestor' => array(
      'core/comment-template'
    ),
    'description' => 'Displays the name of the author of the comment.',
    'textdomain' => 'default',
    'attributes' => array(
      'isLink' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'linkTarget' => array(
        'type' => 'string',
        'default' => '_self'
      ),
      'textAlign' => array(
        'type' => 'string'
      )
    ),
    'usesContext' => array(
      'commentId'
    ),
    'supports' => array(
      'html' => false,
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true,
          'link' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    )
  ),
  'comment-content' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/comment-content',
    'title' => 'Comment Content',
    'category' => 'theme',
    'ancestor' => array(
      'core/comment-template'
    ),
    'description' => 'Displays the contents of a comment.',
    'textdomain' => 'default',
    'usesContext' => array(
      'commentId'
    ),
    'attributes' => array(
      'textAlign' => array(
        'type' => 'string'
      )
    ),
    'supports' => array(
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      ),
      'spacing' => array(
        'padding' => array(
          'horizontal',
          'vertical'
        ),
        '__experimentalDefaultControls' => array(
          'padding' => true
        )
      ),
      'html' => false
    )
  ),
  'comment-date' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/comment-date',
    'title' => 'Comment Date',
    'category' => 'theme',
    'ancestor' => array(
      'core/comment-template'
    ),
    'description' => 'Displays the date on which the comment was posted.',
    'textdomain' => 'default',
    'attributes' => array(
      'format' => array(
        'type' => 'string'
      ),
      'isLink' => array(
        'type' => 'boolean',
        'default' => true
      )
    ),
    'usesContext' => array(
      'commentId'
    ),
    'supports' => array(
      'html' => false,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true,
          'link' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    )
  ),
  'comment-edit-link' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/comment-edit-link',
    'title' => 'Comment Edit Link',
    'category' => 'theme',
    'ancestor' => array(
      'core/comment-template'
    ),
    'description' => 'Displays a link to edit the comment in the WordPress Dashboard. This link is only visible to users with the edit comment capability.',
    'textdomain' => 'default',
    'usesContext' => array(
      'commentId'
    ),
    'attributes' => array(
      'linkTarget' => array(
        'type' => 'string',
        'default' => '_self'
      ),
      'textAlign' => array(
        'type' => 'string'
      )
    ),
    'supports' => array(
      'html' => false,
      'color' => array(
        'link' => true,
        'gradients' => true,
        'text' => false,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'link' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    )
  ),
  'comment-reply-link' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/comment-reply-link',
    'title' => 'Comment Reply Link',
    'category' => 'theme',
    'ancestor' => array(
      'core/comment-template'
    ),
    'description' => 'Displays a link to reply to a comment.',
    'textdomain' => 'default',
    'usesContext' => array(
      'commentId'
    ),
    'attributes' => array(
      'textAlign' => array(
        'type' => 'string'
      )
    ),
    'supports' => array(
      'color' => array(
        'gradients' => true,
        'link' => true,
        'text' => false,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'link' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      ),
      'html' => false
    )
  ),
  'comment-template' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/comment-template',
    'title' => 'Comment Template',
    'category' => 'design',
    'parent' => array(
      'core/comments'
    ),
    'description' => 'Contains the block elements used to display a comment, like the title, date, author, avatar and more.',
    'textdomain' => 'default',
    'usesContext' => array(
      'postId'
    ),
    'supports' => array(
      'align' => true,
      'html' => false,
      'reusable' => false,
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'style' => 'wp-block-comment-template'
  ),
  'comments' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/comments',
    'title' => 'Comments',
    'category' => 'theme',
    'description' => 'An advanced block that allows displaying post comments using different visual configurations.',
    'textdomain' => 'default',
    'attributes' => array(
      'tagName' => array(
        'type' => 'string',
        'default' => 'div'
      ),
      'legacy' => array(
        'type' => 'boolean',
        'default' => false
      )
    ),
    'supports' => array(
      'align' => array(
        'wide',
        'full'
      ),
      'html' => false,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true,
          'link' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-comments-editor',
    'usesContext' => array(
      'postId',
      'postType'
    )
  ),
  'comments-pagination' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/comments-pagination',
    'title' => 'Comments Pagination',
    'category' => 'theme',
    'parent' => array(
      'core/comments'
    ),
    'description' => 'Displays a paginated navigation to next/previous set of comments, when applicable.',
    'textdomain' => 'default',
    'attributes' => array(
      'paginationArrow' => array(
        'type' => 'string',
        'default' => 'none'
      )
    ),
    'providesContext' => array(
      'comments/paginationArrow' => 'paginationArrow'
    ),
    'supports' => array(
      'align' => true,
      'reusable' => false,
      'html' => false,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true,
          'link' => true
        )
      ),
      'layout' => array(
        'allowSwitching' => false,
        'allowInheriting' => false,
        'default' => array(
          'type' => 'flex'
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-comments-pagination-editor',
    'style' => 'wp-block-comments-pagination'
  ),
  'comments-pagination-next' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/comments-pagination-next',
    'title' => 'Comments Next Page',
    'category' => 'theme',
    'parent' => array(
      'core/comments-pagination'
    ),
    'description' => 'Displays the next comment\'s page link.',
    'textdomain' => 'default',
    'attributes' => array(
      'label' => array(
        'type' => 'string'
      )
    ),
    'usesContext' => array(
      'postId',
      'comments/paginationArrow'
    ),
    'supports' => array(
      'reusable' => false,
      'html' => false,
      'color' => array(
        'gradients' => true,
        'text' => false,
        '__experimentalDefaultControls' => array(
          'background' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    )
  ),
  'comments-pagination-numbers' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/comments-pagination-numbers',
    'title' => 'Comments Page Numbers',
    'category' => 'theme',
    'parent' => array(
      'core/comments-pagination'
    ),
    'description' => 'Displays a list of page numbers for comments pagination.',
    'textdomain' => 'default',
    'usesContext' => array(
      'postId'
    ),
    'supports' => array(
      'reusable' => false,
      'html' => false,
      'color' => array(
        'gradients' => true,
        'text' => false,
        '__experimentalDefaultControls' => array(
          'background' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    )
  ),
  'comments-pagination-previous' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/comments-pagination-previous',
    'title' => 'Comments Previous Page',
    'category' => 'theme',
    'parent' => array(
      'core/comments-pagination'
    ),
    'description' => 'Displays the previous comment\'s page link.',
    'textdomain' => 'default',
    'attributes' => array(
      'label' => array(
        'type' => 'string'
      )
    ),
    'usesContext' => array(
      'postId',
      'comments/paginationArrow'
    ),
    'supports' => array(
      'reusable' => false,
      'html' => false,
      'color' => array(
        'gradients' => true,
        'text' => false,
        '__experimentalDefaultControls' => array(
          'background' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    )
  ),
  'comments-title' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/comments-title',
    'title' => 'Comments Title',
    'category' => 'theme',
    'ancestor' => array(
      'core/comments'
    ),
    'description' => 'Displays a title with the number of comments',
    'textdomain' => 'default',
    'usesContext' => array(
      'postId',
      'postType'
    ),
    'attributes' => array(
      'textAlign' => array(
        'type' => 'string'
      ),
      'showPostTitle' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'showCommentsCount' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'level' => array(
        'type' => 'number',
        'default' => 2
      )
    ),
    'supports' => array(
      'anchor' => false,
      'align' => true,
      'html' => false,
      '__experimentalBorder' => array(
        'radius' => true,
        'color' => true,
        'width' => true,
        'style' => true
      ),
      'color' => array(
        'gradients' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true,
          '__experimentalFontFamily' => true,
          '__experimentalFontStyle' => true,
          '__experimentalFontWeight' => true
        )
      )
    )
  ),
  'cover' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/cover',
    'title' => 'Cover',
    'category' => 'media',
    'description' => 'Add an image or video with a text overlay.',
    'textdomain' => 'default',
    'attributes' => array(
      'url' => array(
        'type' => 'string'
      ),
      'useFeaturedImage' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'id' => array(
        'type' => 'number'
      ),
      'alt' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'img',
        'attribute' => 'alt',
        'default' => ''
      ),
      'hasParallax' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'isRepeated' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'dimRatio' => array(
        'type' => 'number',
        'default' => 100
      ),
      'overlayColor' => array(
        'type' => 'string'
      ),
      'customOverlayColor' => array(
        'type' => 'string'
      ),
      'backgroundType' => array(
        'type' => 'string',
        'default' => 'image'
      ),
      'focalPoint' => array(
        'type' => 'object'
      ),
      'minHeight' => array(
        'type' => 'number'
      ),
      'minHeightUnit' => array(
        'type' => 'string'
      ),
      'gradient' => array(
        'type' => 'string'
      ),
      'customGradient' => array(
        'type' => 'string'
      ),
      'contentPosition' => array(
        'type' => 'string'
      ),
      'isDark' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'allowedBlocks' => array(
        'type' => 'array'
      ),
      'templateLock' => array(
        'type' => array(
          'string',
          'boolean'
        ),
        'enum' => array(
          'all',
          'insert',
          'contentOnly',
          false
        )
      ),
      'tagName' => array(
        'type' => 'string',
        'default' => 'div'
      )
    ),
    'usesContext' => array(
      'postId',
      'postType'
    ),
    'supports' => array(
      'anchor' => true,
      'align' => true,
      'html' => false,
      'spacing' => array(
        'padding' => true,
        'margin' => array(
          'top',
          'bottom'
        ),
        'blockGap' => true,
        '__experimentalDefaultControls' => array(
          'padding' => true,
          'blockGap' => true
        )
      ),
      '__experimentalBorder' => array(
        'color' => true,
        'radius' => true,
        'style' => true,
        'width' => true,
        '__experimentalDefaultControls' => array(
          'color' => true,
          'radius' => true,
          'style' => true,
          'width' => true
        )
      ),
      'color' => array(
        '__experimentalDuotone' => '> .wp-block-cover__image-background, > .wp-block-cover__video-background',
        'text' => true,
        'background' => false,
        '__experimentalSkipSerialization' => array(
          'gradients'
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      ),
      'layout' => array(
        'allowJustification' => false
      )
    ),
    'editorStyle' => 'wp-block-cover-editor',
    'style' => 'wp-block-cover'
  ),
  'details' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/details',
    'title' => 'Details',
    'category' => 'text',
    'description' => 'Hide and show additional content.',
    'keywords' => array(
      'disclosure',
      'summary',
      'hide'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'showContent' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'summary' => array(
        'type' => 'string'
      )
    ),
    'supports' => array(
      'align' => array(
        'wide',
        'full'
      ),
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      '__experimentalBorder' => array(
        'color' => true,
        'width' => true,
        'style' => true
      ),
      'html' => false,
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-details-editor',
    'style' => 'wp-block-details'
  ),
  'embed' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/embed',
    'title' => 'Embed',
    'category' => 'embed',
    'description' => 'Add a block that displays content pulled from other sites, like Twitter or YouTube.',
    'textdomain' => 'default',
    'attributes' => array(
      'url' => array(
        'type' => 'string',
        '__experimentalRole' => 'content'
      ),
      'caption' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'figcaption',
        '__experimentalRole' => 'content'
      ),
      'type' => array(
        'type' => 'string',
        '__experimentalRole' => 'content'
      ),
      'providerNameSlug' => array(
        'type' => 'string',
        '__experimentalRole' => 'content'
      ),
      'allowResponsive' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'responsive' => array(
        'type' => 'boolean',
        'default' => false,
        '__experimentalRole' => 'content'
      ),
      'previewable' => array(
        'type' => 'boolean',
        'default' => true,
        '__experimentalRole' => 'content'
      )
    ),
    'supports' => array(
      'align' => true,
      'spacing' => array(
        'margin' => true
      )
    ),
    'editorStyle' => 'wp-block-embed-editor',
    'style' => 'wp-block-embed'
  ),
  'file' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/file',
    'title' => 'File',
    'category' => 'media',
    'description' => 'Add a link to a downloadable file.',
    'keywords' => array(
      'document',
      'pdf',
      'download'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'id' => array(
        'type' => 'number'
      ),
      'href' => array(
        'type' => 'string'
      ),
      'fileId' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'a:not([download])',
        'attribute' => 'id'
      ),
      'fileName' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'a:not([download])'
      ),
      'textLinkHref' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'a:not([download])',
        'attribute' => 'href'
      ),
      'textLinkTarget' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'a:not([download])',
        'attribute' => 'target'
      ),
      'showDownloadButton' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'downloadButtonText' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'a[download]'
      ),
      'displayPreview' => array(
        'type' => 'boolean'
      ),
      'previewHeight' => array(
        'type' => 'number',
        'default' => 600
      )
    ),
    'supports' => array(
      'anchor' => true,
      'align' => true,
      'color' => array(
        'gradients' => true,
        'link' => true,
        'text' => false,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'link' => true
        )
      )
    ),
    'viewScript' => 'file:./view.min.js',
    'editorStyle' => 'wp-block-file-editor',
    'style' => 'wp-block-file'
  ),
  'footnotes' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/footnotes',
    'title' => 'Footnotes',
    'category' => 'text',
    'description' => '',
    'keywords' => array(
      'references'
    ),
    'textdomain' => 'default',
    'usesContext' => array(
      'postId',
      'postType'
    ),
    'supports' => array(
      'html' => false,
      'multiple' => false,
      'inserter' => false,
      'reusable' => false
    ),
    'style' => 'wp-block-footnotes'
  ),
  'freeform' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/freeform',
    'title' => 'Classic',
    'category' => 'text',
    'description' => 'Use the classic WordPress editor.',
    'textdomain' => 'default',
    'attributes' => array(
      'content' => array(
        'type' => 'string',
        'source' => 'raw'
      )
    ),
    'supports' => array(
      'className' => false,
      'customClassName' => false,
      'reusable' => false
    ),
    'editorStyle' => 'wp-block-freeform-editor'
  ),
  'gallery' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/gallery',
    'title' => 'Gallery',
    'category' => 'media',
    'description' => 'Display multiple images in a rich gallery.',
    'keywords' => array(
      'images',
      'photos'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'images' => array(
        'type' => 'array',
        'default' => array(
          
        ),
        'source' => 'query',
        'selector' => '.blocks-gallery-item',
        'query' => array(
          'url' => array(
            'type' => 'string',
            'source' => 'attribute',
            'selector' => 'img',
            'attribute' => 'src'
          ),
          'fullUrl' => array(
            'type' => 'string',
            'source' => 'attribute',
            'selector' => 'img',
            'attribute' => 'data-full-url'
          ),
          'link' => array(
            'type' => 'string',
            'source' => 'attribute',
            'selector' => 'img',
            'attribute' => 'data-link'
          ),
          'alt' => array(
            'type' => 'string',
            'source' => 'attribute',
            'selector' => 'img',
            'attribute' => 'alt',
            'default' => ''
          ),
          'id' => array(
            'type' => 'string',
            'source' => 'attribute',
            'selector' => 'img',
            'attribute' => 'data-id'
          ),
          'caption' => array(
            'type' => 'string',
            'source' => 'html',
            'selector' => '.blocks-gallery-item__caption'
          )
        )
      ),
      'ids' => array(
        'type' => 'array',
        'items' => array(
          'type' => 'number'
        ),
        'default' => array(
          
        )
      ),
      'shortCodeTransforms' => array(
        'type' => 'array',
        'default' => array(
          
        ),
        'items' => array(
          'type' => 'object'
        )
      ),
      'columns' => array(
        'type' => 'number',
        'minimum' => 1,
        'maximum' => 8
      ),
      'caption' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => '.blocks-gallery-caption'
      ),
      'imageCrop' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'fixedHeight' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'linkTarget' => array(
        'type' => 'string'
      ),
      'linkTo' => array(
        'type' => 'string'
      ),
      'sizeSlug' => array(
        'type' => 'string',
        'default' => 'large'
      ),
      'allowResize' => array(
        'type' => 'boolean',
        'default' => false
      )
    ),
    'providesContext' => array(
      'allowResize' => 'allowResize',
      'imageCrop' => 'imageCrop',
      'fixedHeight' => 'fixedHeight'
    ),
    'supports' => array(
      'anchor' => true,
      'align' => true,
      'html' => false,
      'units' => array(
        'px',
        'em',
        'rem',
        'vh',
        'vw'
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true,
        'blockGap' => array(
          'horizontal',
          'vertical'
        ),
        '__experimentalSkipSerialization' => array(
          'blockGap'
        ),
        '__experimentalDefaultControls' => array(
          'blockGap' => true
        )
      ),
      'color' => array(
        'text' => false,
        'background' => true,
        'gradients' => true
      ),
      'layout' => array(
        'allowSwitching' => false,
        'allowInheriting' => false,
        'allowEditing' => false,
        'default' => array(
          'type' => 'flex'
        )
      )
    ),
    'editorStyle' => 'wp-block-gallery-editor',
    'style' => 'wp-block-gallery'
  ),
  'group' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/group',
    'title' => 'Group',
    'category' => 'design',
    'description' => 'Gather blocks in a layout container.',
    'keywords' => array(
      'container',
      'wrapper',
      'row',
      'section'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'tagName' => array(
        'type' => 'string',
        'default' => 'div'
      ),
      'templateLock' => array(
        'type' => array(
          'string',
          'boolean'
        ),
        'enum' => array(
          'all',
          'insert',
          'contentOnly',
          false
        )
      ),
      'allowedBlocks' => array(
        'type' => 'array'
      )
    ),
    'supports' => array(
      '__experimentalOnEnter' => true,
      '__experimentalSettings' => true,
      'align' => array(
        'wide',
        'full'
      ),
      'anchor' => true,
      'ariaLabel' => true,
      'html' => false,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'spacing' => array(
        'margin' => array(
          'top',
          'bottom'
        ),
        'padding' => true,
        'blockGap' => true,
        '__experimentalDefaultControls' => array(
          'padding' => true,
          'blockGap' => true
        )
      ),
      'dimensions' => array(
        'minHeight' => true
      ),
      '__experimentalBorder' => array(
        'color' => true,
        'radius' => true,
        'style' => true,
        'width' => true,
        '__experimentalDefaultControls' => array(
          'color' => true,
          'radius' => true,
          'style' => true,
          'width' => true
        )
      ),
      'position' => array(
        'sticky' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      ),
      'layout' => array(
        'allowSizingOnChildren' => true
      )
    ),
    'editorStyle' => 'wp-block-group-editor',
    'style' => 'wp-block-group'
  ),
  'heading' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/heading',
    'title' => 'Heading',
    'category' => 'text',
    'description' => 'Introduce new sections and organize content to help visitors (and search engines) understand the structure of your content.',
    'keywords' => array(
      'title',
      'subtitle'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'textAlign' => array(
        'type' => 'string'
      ),
      'content' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'h1,h2,h3,h4,h5,h6',
        'default' => '',
        '__experimentalRole' => 'content'
      ),
      'level' => array(
        'type' => 'number',
        'default' => 2
      ),
      'placeholder' => array(
        'type' => 'string'
      )
    ),
    'supports' => array(
      'align' => array(
        'wide',
        'full'
      ),
      'anchor' => true,
      'className' => true,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontStyle' => true,
        '__experimentalFontWeight' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true,
          'fontAppearance' => true,
          'textTransform' => true
        )
      ),
      '__unstablePasteTextInline' => true,
      '__experimentalSlashInserter' => true
    ),
    'editorStyle' => 'wp-block-heading-editor',
    'style' => 'wp-block-heading'
  ),
  'home-link' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/home-link',
    'category' => 'design',
    'parent' => array(
      'core/navigation'
    ),
    'title' => 'Home Link',
    'description' => 'Create a link that always points to the homepage of the site. Usually not necessary if there is already a site title link present in the header.',
    'textdomain' => 'default',
    'attributes' => array(
      'label' => array(
        'type' => 'string'
      )
    ),
    'usesContext' => array(
      'textColor',
      'customTextColor',
      'backgroundColor',
      'customBackgroundColor',
      'fontSize',
      'customFontSize',
      'style'
    ),
    'supports' => array(
      'reusable' => false,
      'html' => false,
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-home-link-editor',
    'style' => 'wp-block-home-link'
  ),
  'html' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/html',
    'title' => 'Custom HTML',
    'category' => 'widgets',
    'description' => 'Add custom HTML code and preview it as you edit.',
    'keywords' => array(
      'embed'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'content' => array(
        'type' => 'string',
        'source' => 'raw'
      )
    ),
    'supports' => array(
      'customClassName' => false,
      'className' => false,
      'html' => false
    ),
    'editorStyle' => 'wp-block-html-editor'
  ),
  'image' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/image',
    'title' => 'Image',
    'category' => 'media',
    'usesContext' => array(
      'allowResize',
      'imageCrop',
      'fixedHeight'
    ),
    'description' => 'Insert an image to make a visual statement.',
    'keywords' => array(
      'img',
      'photo',
      'picture'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'align' => array(
        'type' => 'string'
      ),
      'url' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'img',
        'attribute' => 'src',
        '__experimentalRole' => 'content'
      ),
      'alt' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'img',
        'attribute' => 'alt',
        'default' => '',
        '__experimentalRole' => 'content'
      ),
      'caption' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'figcaption',
        '__experimentalRole' => 'content'
      ),
      'title' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'img',
        'attribute' => 'title',
        '__experimentalRole' => 'content'
      ),
      'href' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'figure > a',
        'attribute' => 'href',
        '__experimentalRole' => 'content'
      ),
      'rel' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'figure > a',
        'attribute' => 'rel'
      ),
      'linkClass' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'figure > a',
        'attribute' => 'class'
      ),
      'id' => array(
        'type' => 'number',
        '__experimentalRole' => 'content'
      ),
      'width' => array(
        'type' => 'number'
      ),
      'height' => array(
        'type' => 'number'
      ),
      'aspectRatio' => array(
        'type' => 'string'
      ),
      'scale' => array(
        'type' => 'string'
      ),
      'sizeSlug' => array(
        'type' => 'string'
      ),
      'linkDestination' => array(
        'type' => 'string'
      ),
      'linkTarget' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'figure > a',
        'attribute' => 'target'
      )
    ),
    'supports' => array(
      'anchor' => true,
      'behaviors' => array(
        'lightbox' => true
      ),
      'color' => array(
        'text' => false,
        'background' => false
      ),
      'filter' => array(
        'duotone' => true
      ),
      '__experimentalBorder' => array(
        'color' => true,
        'radius' => true,
        'width' => true,
        '__experimentalSkipSerialization' => true,
        '__experimentalDefaultControls' => array(
          'color' => true,
          'radius' => true,
          'width' => true
        )
      )
    ),
    'selectors' => array(
      'border' => '.wp-block-image img, .wp-block-image .wp-block-image__crop-area, .wp-block-image .components-placeholder',
      'filter' => array(
        'duotone' => '.wp-block-image img, .wp-block-image .components-placeholder'
      )
    ),
    'styles' => array(
      array(
        'name' => 'default',
        'label' => 'Default',
        'isDefault' => true
      ),
      array(
        'name' => 'rounded',
        'label' => 'Rounded'
      )
    ),
    'editorStyle' => 'wp-block-image-editor',
    'style' => 'wp-block-image'
  ),
  'latest-comments' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/latest-comments',
    'title' => 'Latest Comments',
    'category' => 'widgets',
    'description' => 'Display a list of your most recent comments.',
    'keywords' => array(
      'recent comments'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'commentsToShow' => array(
        'type' => 'number',
        'default' => 5,
        'minimum' => 1,
        'maximum' => 100
      ),
      'displayAvatar' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'displayDate' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'displayExcerpt' => array(
        'type' => 'boolean',
        'default' => true
      )
    ),
    'supports' => array(
      'align' => true,
      'html' => false,
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-latest-comments-editor',
    'style' => 'wp-block-latest-comments'
  ),
  'latest-posts' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/latest-posts',
    'title' => 'Latest Posts',
    'category' => 'widgets',
    'description' => 'Display a list of your most recent posts.',
    'keywords' => array(
      'recent posts'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'categories' => array(
        'type' => 'array',
        'items' => array(
          'type' => 'object'
        )
      ),
      'selectedAuthor' => array(
        'type' => 'number'
      ),
      'postsToShow' => array(
        'type' => 'number',
        'default' => 5
      ),
      'displayPostContent' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'displayPostContentRadio' => array(
        'type' => 'string',
        'default' => 'excerpt'
      ),
      'excerptLength' => array(
        'type' => 'number',
        'default' => 55
      ),
      'displayAuthor' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'displayPostDate' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'postLayout' => array(
        'type' => 'string',
        'default' => 'list'
      ),
      'columns' => array(
        'type' => 'number',
        'default' => 3
      ),
      'order' => array(
        'type' => 'string',
        'default' => 'desc'
      ),
      'orderBy' => array(
        'type' => 'string',
        'default' => 'date'
      ),
      'displayFeaturedImage' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'featuredImageAlign' => array(
        'type' => 'string',
        'enum' => array(
          'left',
          'center',
          'right'
        )
      ),
      'featuredImageSizeSlug' => array(
        'type' => 'string',
        'default' => 'thumbnail'
      ),
      'featuredImageSizeWidth' => array(
        'type' => 'number',
        'default' => null
      ),
      'featuredImageSizeHeight' => array(
        'type' => 'number',
        'default' => null
      ),
      'addLinkToFeaturedImage' => array(
        'type' => 'boolean',
        'default' => false
      )
    ),
    'supports' => array(
      'align' => true,
      'html' => false,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true,
          'link' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-latest-posts-editor',
    'style' => 'wp-block-latest-posts'
  ),
  'legacy-widget' => array(
    'apiVersion' => 3,
    'name' => 'core/legacy-widget',
    'title' => 'Legacy Widget',
    'category' => 'widgets',
    'description' => 'Display a legacy widget.',
    'textdomain' => 'default',
    'attributes' => array(
      'id' => array(
        'type' => 'string',
        'default' => null
      ),
      'idBase' => array(
        'type' => 'string',
        'default' => null
      ),
      'instance' => array(
        'type' => 'object',
        'default' => null
      )
    ),
    'supports' => array(
      'html' => false,
      'customClassName' => false,
      'reusable' => false
    ),
    'editorStyle' => 'wp-block-legacy-widget-editor'
  ),
  'list' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/list',
    'title' => 'List',
    'category' => 'text',
    'description' => 'Create a bulleted or numbered list.',
    'keywords' => array(
      'bullet list',
      'ordered list',
      'numbered list'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'ordered' => array(
        'type' => 'boolean',
        'default' => false,
        '__experimentalRole' => 'content'
      ),
      'values' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'ol,ul',
        'multiline' => 'li',
        '__unstableMultilineWrapperTags' => array(
          'ol',
          'ul'
        ),
        'default' => '',
        '__experimentalRole' => 'content'
      ),
      'type' => array(
        'type' => 'string'
      ),
      'start' => array(
        'type' => 'number'
      ),
      'reversed' => array(
        'type' => 'boolean'
      ),
      'placeholder' => array(
        'type' => 'string'
      )
    ),
    'supports' => array(
      'anchor' => true,
      'className' => false,
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      ),
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      '__unstablePasteTextInline' => true,
      '__experimentalSelector' => 'ol,ul',
      '__experimentalSlashInserter' => true
    ),
    'editorStyle' => 'wp-block-list-editor',
    'style' => 'wp-block-list'
  ),
  'list-item' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/list-item',
    'title' => 'List item',
    'category' => 'text',
    'parent' => array(
      'core/list'
    ),
    'description' => 'Create a list item.',
    'textdomain' => 'default',
    'attributes' => array(
      'placeholder' => array(
        'type' => 'string'
      ),
      'content' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'li',
        'default' => '',
        '__experimentalRole' => 'content'
      )
    ),
    'supports' => array(
      'className' => false,
      '__experimentalSelector' => 'li',
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    )
  ),
  'loginout' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/loginout',
    'title' => 'Login/out',
    'category' => 'theme',
    'description' => 'Show login & logout links.',
    'keywords' => array(
      'login',
      'logout',
      'form'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'displayLoginAsForm' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'redirectToCurrent' => array(
        'type' => 'boolean',
        'default' => true
      )
    ),
    'supports' => array(
      'className' => true,
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    )
  ),
  'media-text' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/media-text',
    'title' => 'Media & Text',
    'category' => 'media',
    'description' => 'Set media and words side-by-side for a richer layout.',
    'keywords' => array(
      'image',
      'video'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'align' => array(
        'type' => 'string',
        'default' => 'none'
      ),
      'mediaAlt' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'figure img',
        'attribute' => 'alt',
        'default' => '',
        '__experimentalRole' => 'content'
      ),
      'mediaPosition' => array(
        'type' => 'string',
        'default' => 'left'
      ),
      'mediaId' => array(
        'type' => 'number',
        '__experimentalRole' => 'content'
      ),
      'mediaUrl' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'figure video,figure img',
        'attribute' => 'src',
        '__experimentalRole' => 'content'
      ),
      'mediaLink' => array(
        'type' => 'string'
      ),
      'linkDestination' => array(
        'type' => 'string'
      ),
      'linkTarget' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'figure a',
        'attribute' => 'target'
      ),
      'href' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'figure a',
        'attribute' => 'href',
        '__experimentalRole' => 'content'
      ),
      'rel' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'figure a',
        'attribute' => 'rel'
      ),
      'linkClass' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'figure a',
        'attribute' => 'class'
      ),
      'mediaType' => array(
        'type' => 'string',
        '__experimentalRole' => 'content'
      ),
      'mediaWidth' => array(
        'type' => 'number',
        'default' => 50
      ),
      'mediaSizeSlug' => array(
        'type' => 'string'
      ),
      'isStackedOnMobile' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'verticalAlignment' => array(
        'type' => 'string'
      ),
      'imageFill' => array(
        'type' => 'boolean'
      ),
      'focalPoint' => array(
        'type' => 'object'
      ),
      'allowedBlocks' => array(
        'type' => 'array'
      )
    ),
    'supports' => array(
      'anchor' => true,
      'align' => array(
        'wide',
        'full'
      ),
      'html' => false,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-media-text-editor',
    'style' => 'wp-block-media-text'
  ),
  'missing' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/missing',
    'title' => 'Unsupported',
    'category' => 'text',
    'description' => 'Your site doesn’t include support for this block.',
    'textdomain' => 'default',
    'attributes' => array(
      'originalName' => array(
        'type' => 'string'
      ),
      'originalUndelimitedContent' => array(
        'type' => 'string'
      ),
      'originalContent' => array(
        'type' => 'string',
        'source' => 'html'
      )
    ),
    'supports' => array(
      'className' => false,
      'customClassName' => false,
      'inserter' => false,
      'html' => false,
      'reusable' => false
    )
  ),
  'more' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/more',
    'title' => 'More',
    'category' => 'design',
    'description' => 'Content before this block will be shown in the excerpt on your archives page.',
    'keywords' => array(
      'read more'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'customText' => array(
        'type' => 'string'
      ),
      'noTeaser' => array(
        'type' => 'boolean',
        'default' => false
      )
    ),
    'supports' => array(
      'customClassName' => false,
      'className' => false,
      'html' => false,
      'multiple' => false
    ),
    'editorStyle' => 'wp-block-more-editor'
  ),
  'navigation' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/navigation',
    'title' => 'Navigation',
    'category' => 'theme',
    'description' => 'A collection of blocks that allow visitors to get around your site.',
    'keywords' => array(
      'menu',
      'navigation',
      'links'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'ref' => array(
        'type' => 'number'
      ),
      'textColor' => array(
        'type' => 'string'
      ),
      'customTextColor' => array(
        'type' => 'string'
      ),
      'rgbTextColor' => array(
        'type' => 'string'
      ),
      'backgroundColor' => array(
        'type' => 'string'
      ),
      'customBackgroundColor' => array(
        'type' => 'string'
      ),
      'rgbBackgroundColor' => array(
        'type' => 'string'
      ),
      'showSubmenuIcon' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'openSubmenusOnClick' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'overlayMenu' => array(
        'type' => 'string',
        'default' => 'mobile'
      ),
      'icon' => array(
        'type' => 'string',
        'default' => 'handle'
      ),
      'hasIcon' => array(
        'type' => 'boolean',
        'default' => true
      ),
      '__unstableLocation' => array(
        'type' => 'string'
      ),
      'overlayBackgroundColor' => array(
        'type' => 'string'
      ),
      'customOverlayBackgroundColor' => array(
        'type' => 'string'
      ),
      'overlayTextColor' => array(
        'type' => 'string'
      ),
      'customOverlayTextColor' => array(
        'type' => 'string'
      ),
      'maxNestingLevel' => array(
        'type' => 'number',
        'default' => 5
      ),
      'templateLock' => array(
        'type' => array(
          'string',
          'boolean'
        ),
        'enum' => array(
          'all',
          'insert',
          'contentOnly',
          false
        )
      )
    ),
    'providesContext' => array(
      'textColor' => 'textColor',
      'customTextColor' => 'customTextColor',
      'backgroundColor' => 'backgroundColor',
      'customBackgroundColor' => 'customBackgroundColor',
      'overlayTextColor' => 'overlayTextColor',
      'customOverlayTextColor' => 'customOverlayTextColor',
      'overlayBackgroundColor' => 'overlayBackgroundColor',
      'customOverlayBackgroundColor' => 'customOverlayBackgroundColor',
      'fontSize' => 'fontSize',
      'customFontSize' => 'customFontSize',
      'showSubmenuIcon' => 'showSubmenuIcon',
      'openSubmenusOnClick' => 'openSubmenusOnClick',
      'style' => 'style',
      'maxNestingLevel' => 'maxNestingLevel'
    ),
    'supports' => array(
      'align' => array(
        'wide',
        'full'
      ),
      'html' => false,
      'inserter' => true,
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalFontWeight' => true,
        '__experimentalTextTransform' => true,
        '__experimentalFontFamily' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalSkipSerialization' => array(
          'textDecoration'
        ),
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      ),
      'spacing' => array(
        'blockGap' => true,
        'units' => array(
          'px',
          'em',
          'rem',
          'vh',
          'vw'
        ),
        '__experimentalDefaultControls' => array(
          'blockGap' => true
        )
      ),
      'layout' => array(
        'allowSwitching' => false,
        'allowInheriting' => false,
        'allowVerticalAlignment' => false,
        'allowSizingOnChildren' => true,
        'default' => array(
          'type' => 'flex'
        )
      ),
      '__experimentalStyle' => array(
        'elements' => array(
          'link' => array(
            'color' => array(
              'text' => 'inherit'
            )
          )
        )
      )
    ),
    'viewScript' => array(
      'file:./view.min.js',
      'file:./view-modal.min.js'
    ),
    'editorStyle' => 'wp-block-navigation-editor',
    'style' => 'wp-block-navigation'
  ),
  'navigation-link' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/navigation-link',
    'title' => 'Custom Link',
    'category' => 'design',
    'parent' => array(
      'core/navigation'
    ),
    'description' => 'Add a page, link, or another item to your navigation.',
    'textdomain' => 'default',
    'attributes' => array(
      'label' => array(
        'type' => 'string'
      ),
      'type' => array(
        'type' => 'string'
      ),
      'description' => array(
        'type' => 'string'
      ),
      'rel' => array(
        'type' => 'string'
      ),
      'id' => array(
        'type' => 'number'
      ),
      'opensInNewTab' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'url' => array(
        'type' => 'string'
      ),
      'title' => array(
        'type' => 'string'
      ),
      'kind' => array(
        'type' => 'string'
      ),
      'isTopLevelLink' => array(
        'type' => 'boolean'
      )
    ),
    'usesContext' => array(
      'textColor',
      'customTextColor',
      'backgroundColor',
      'customBackgroundColor',
      'overlayTextColor',
      'customOverlayTextColor',
      'overlayBackgroundColor',
      'customOverlayBackgroundColor',
      'fontSize',
      'customFontSize',
      'showSubmenuIcon',
      'maxNestingLevel',
      'style'
    ),
    'supports' => array(
      'reusable' => false,
      'html' => false,
      '__experimentalSlashInserter' => true,
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-navigation-link-editor',
    'style' => 'wp-block-navigation-link'
  ),
  'navigation-submenu' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/navigation-submenu',
    'title' => 'Submenu',
    'category' => 'design',
    'parent' => array(
      'core/navigation'
    ),
    'description' => 'Add a submenu to your navigation.',
    'textdomain' => 'default',
    'attributes' => array(
      'label' => array(
        'type' => 'string'
      ),
      'type' => array(
        'type' => 'string'
      ),
      'description' => array(
        'type' => 'string'
      ),
      'rel' => array(
        'type' => 'string'
      ),
      'id' => array(
        'type' => 'number'
      ),
      'opensInNewTab' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'url' => array(
        'type' => 'string'
      ),
      'title' => array(
        'type' => 'string'
      ),
      'kind' => array(
        'type' => 'string'
      ),
      'isTopLevelItem' => array(
        'type' => 'boolean'
      )
    ),
    'usesContext' => array(
      'textColor',
      'customTextColor',
      'backgroundColor',
      'customBackgroundColor',
      'overlayTextColor',
      'customOverlayTextColor',
      'overlayBackgroundColor',
      'customOverlayBackgroundColor',
      'fontSize',
      'customFontSize',
      'showSubmenuIcon',
      'maxNestingLevel',
      'openSubmenusOnClick',
      'style'
    ),
    'supports' => array(
      'reusable' => false,
      'html' => false
    ),
    'editorStyle' => 'wp-block-navigation-submenu-editor',
    'style' => 'wp-block-navigation-submenu'
  ),
  'nextpage' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/nextpage',
    'title' => 'Page Break',
    'category' => 'design',
    'description' => 'Separate your content into a multi-page experience.',
    'keywords' => array(
      'next page',
      'pagination'
    ),
    'parent' => array(
      'core/post-content'
    ),
    'textdomain' => 'default',
    'supports' => array(
      'customClassName' => false,
      'className' => false,
      'html' => false
    ),
    'editorStyle' => 'wp-block-nextpage-editor'
  ),
  'page-list' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/page-list',
    'title' => 'Page List',
    'category' => 'widgets',
    'description' => 'Display a list of all pages.',
    'keywords' => array(
      'menu',
      'navigation'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'parentPageID' => array(
        'type' => 'integer',
        'default' => 0
      ),
      'isNested' => array(
        'type' => 'boolean',
        'default' => false
      )
    ),
    'usesContext' => array(
      'textColor',
      'customTextColor',
      'backgroundColor',
      'customBackgroundColor',
      'overlayTextColor',
      'customOverlayTextColor',
      'overlayBackgroundColor',
      'customOverlayBackgroundColor',
      'fontSize',
      'customFontSize',
      'showSubmenuIcon',
      'style',
      'openSubmenusOnClick'
    ),
    'supports' => array(
      'reusable' => false,
      'html' => false,
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-page-list-editor',
    'style' => 'wp-block-page-list'
  ),
  'page-list-item' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/page-list-item',
    'title' => 'Page List Item',
    'category' => 'widgets',
    'parent' => array(
      'core/page-list'
    ),
    'description' => 'Displays a page inside a list of all pages.',
    'keywords' => array(
      'page',
      'menu',
      'navigation'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'id' => array(
        'type' => 'number'
      ),
      'label' => array(
        'type' => 'string'
      ),
      'title' => array(
        'type' => 'string'
      ),
      'link' => array(
        'type' => 'string'
      ),
      'hasChildren' => array(
        'type' => 'boolean'
      )
    ),
    'usesContext' => array(
      'textColor',
      'customTextColor',
      'backgroundColor',
      'customBackgroundColor',
      'overlayTextColor',
      'customOverlayTextColor',
      'overlayBackgroundColor',
      'customOverlayBackgroundColor',
      'fontSize',
      'customFontSize',
      'showSubmenuIcon',
      'style',
      'openSubmenusOnClick'
    ),
    'supports' => array(
      'reusable' => false,
      'html' => false,
      'lock' => false,
      'inserter' => false,
      '__experimentalToolbar' => false
    ),
    'editorStyle' => 'wp-block-page-list-editor',
    'style' => 'wp-block-page-list'
  ),
  'paragraph' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/paragraph',
    'title' => 'Paragraph',
    'category' => 'text',
    'description' => 'Start with the basic building block of all narrative.',
    'keywords' => array(
      'text'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'align' => array(
        'type' => 'string'
      ),
      'content' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'p',
        'default' => '',
        '__experimentalRole' => 'content'
      ),
      'dropCap' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'placeholder' => array(
        'type' => 'string'
      ),
      'direction' => array(
        'type' => 'string',
        'enum' => array(
          'ltr',
          'rtl'
        )
      )
    ),
    'supports' => array(
      'anchor' => true,
      'className' => false,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true,
        '__experimentalDefaultControls' => array(
          'margin' => false,
          'padding' => false
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalFontStyle' => true,
        '__experimentalFontWeight' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalTextTransform' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      ),
      '__experimentalSelector' => 'p',
      '__unstablePasteTextInline' => true
    ),
    'editorStyle' => 'wp-block-paragraph-editor',
    'style' => 'wp-block-paragraph'
  ),
  'pattern' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/pattern',
    'title' => 'Pattern placeholder',
    'category' => 'theme',
    'description' => 'Show a block pattern.',
    'supports' => array(
      'html' => false,
      'inserter' => false
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'slug' => array(
        'type' => 'string'
      )
    )
  ),
  'post-author' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/post-author',
    'title' => 'Post Author',
    'category' => 'theme',
    'description' => 'Display post author details such as name, avatar, and bio.',
    'textdomain' => 'default',
    'attributes' => array(
      'textAlign' => array(
        'type' => 'string'
      ),
      'avatarSize' => array(
        'type' => 'number',
        'default' => 48
      ),
      'showAvatar' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'showBio' => array(
        'type' => 'boolean'
      ),
      'byline' => array(
        'type' => 'string'
      ),
      'isLink' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'linkTarget' => array(
        'type' => 'string',
        'default' => '_self'
      )
    ),
    'usesContext' => array(
      'postType',
      'postId',
      'queryId'
    ),
    'supports' => array(
      'html' => false,
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      ),
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDuotone' => '.wp-block-post-author__avatar img',
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      )
    ),
    'style' => 'wp-block-post-author'
  ),
  'post-author-biography' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/post-author-biography',
    'title' => 'Post Author Biography',
    'category' => 'theme',
    'description' => 'The author biography.',
    'textdomain' => 'default',
    'attributes' => array(
      'textAlign' => array(
        'type' => 'string'
      )
    ),
    'usesContext' => array(
      'postType',
      'postId'
    ),
    'supports' => array(
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    )
  ),
  'post-author-name' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/post-author-name',
    'title' => 'Post Author Name',
    'category' => 'theme',
    'description' => 'The author name.',
    'textdomain' => 'default',
    'attributes' => array(
      'textAlign' => array(
        'type' => 'string'
      ),
      'isLink' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'linkTarget' => array(
        'type' => 'string',
        'default' => '_self'
      )
    ),
    'usesContext' => array(
      'postType',
      'postId'
    ),
    'supports' => array(
      'html' => false,
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true,
          'link' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    )
  ),
  'post-comments-form' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/post-comments-form',
    'title' => 'Post Comments Form',
    'category' => 'theme',
    'description' => 'Display a post\'s comments form.',
    'textdomain' => 'default',
    'attributes' => array(
      'textAlign' => array(
        'type' => 'string'
      )
    ),
    'usesContext' => array(
      'postId',
      'postType'
    ),
    'supports' => array(
      'html' => false,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalFontWeight' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalTextTransform' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-post-comments-form-editor',
    'style' => array(
      'wp-block-post-comments-form',
      'wp-block-buttons',
      'wp-block-button'
    )
  ),
  'post-content' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/post-content',
    'title' => 'Post Content',
    'category' => 'theme',
    'description' => 'Displays the contents of a post or page.',
    'textdomain' => 'default',
    'usesContext' => array(
      'postId',
      'postType',
      'queryId'
    ),
    'supports' => array(
      'align' => array(
        'wide',
        'full'
      ),
      'html' => false,
      'layout' => true,
      'dimensions' => array(
        'minHeight' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-post-content-editor'
  ),
  'post-date' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/post-date',
    'title' => 'Post Date',
    'category' => 'theme',
    'description' => 'Add the date of this post.',
    'textdomain' => 'default',
    'attributes' => array(
      'textAlign' => array(
        'type' => 'string'
      ),
      'format' => array(
        'type' => 'string'
      ),
      'isLink' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'displayType' => array(
        'type' => 'string',
        'default' => 'date'
      )
    ),
    'usesContext' => array(
      'postId',
      'postType',
      'queryId'
    ),
    'supports' => array(
      'html' => false,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true,
          'link' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    )
  ),
  'post-excerpt' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/post-excerpt',
    'title' => 'Excerpt',
    'category' => 'theme',
    'description' => 'Display the excerpt.',
    'textdomain' => 'default',
    'attributes' => array(
      'textAlign' => array(
        'type' => 'string'
      ),
      'moreText' => array(
        'type' => 'string'
      ),
      'showMoreOnNewLine' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'excerptLength' => array(
        'type' => 'number',
        'default' => 55
      )
    ),
    'usesContext' => array(
      'postId',
      'postType',
      'queryId'
    ),
    'supports' => array(
      'html' => false,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true,
          'link' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-post-excerpt-editor',
    'style' => 'wp-block-post-excerpt'
  ),
  'post-featured-image' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/post-featured-image',
    'title' => 'Post Featured Image',
    'category' => 'theme',
    'description' => 'Display a post\'s featured image.',
    'textdomain' => 'default',
    'attributes' => array(
      'isLink' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'aspectRatio' => array(
        'type' => 'string'
      ),
      'width' => array(
        'type' => 'string'
      ),
      'height' => array(
        'type' => 'string'
      ),
      'scale' => array(
        'type' => 'string',
        'default' => 'cover'
      ),
      'sizeSlug' => array(
        'type' => 'string'
      ),
      'rel' => array(
        'type' => 'string',
        'attribute' => 'rel',
        'default' => ''
      ),
      'linkTarget' => array(
        'type' => 'string',
        'default' => '_self'
      ),
      'overlayColor' => array(
        'type' => 'string'
      ),
      'customOverlayColor' => array(
        'type' => 'string'
      ),
      'dimRatio' => array(
        'type' => 'number',
        'default' => 0
      ),
      'gradient' => array(
        'type' => 'string'
      ),
      'customGradient' => array(
        'type' => 'string'
      )
    ),
    'usesContext' => array(
      'postId',
      'postType',
      'queryId'
    ),
    'supports' => array(
      'align' => array(
        'left',
        'right',
        'center',
        'wide',
        'full'
      ),
      'color' => array(
        '__experimentalDuotone' => 'img, .wp-block-post-featured-image__placeholder, .components-placeholder__illustration, .components-placeholder::before',
        'text' => false,
        'background' => false
      ),
      '__experimentalBorder' => array(
        'color' => true,
        'radius' => true,
        'width' => true,
        '__experimentalSelector' => 'img, .block-editor-media-placeholder, .wp-block-post-featured-image__overlay',
        '__experimentalSkipSerialization' => true,
        '__experimentalDefaultControls' => array(
          'color' => true,
          'radius' => true,
          'width' => true
        )
      ),
      'html' => false,
      'spacing' => array(
        'margin' => true,
        'padding' => true
      )
    ),
    'editorStyle' => 'wp-block-post-featured-image-editor',
    'style' => 'wp-block-post-featured-image'
  ),
  'post-navigation-link' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/post-navigation-link',
    'title' => 'Post Navigation Link',
    'category' => 'theme',
    'description' => 'Displays the next or previous post link that is adjacent to the current post.',
    'textdomain' => 'default',
    'attributes' => array(
      'textAlign' => array(
        'type' => 'string'
      ),
      'type' => array(
        'type' => 'string',
        'default' => 'next'
      ),
      'label' => array(
        'type' => 'string'
      ),
      'showTitle' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'linkLabel' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'arrow' => array(
        'type' => 'string',
        'default' => 'none'
      )
    ),
    'supports' => array(
      'reusable' => false,
      'html' => false,
      'color' => array(
        'link' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'style' => 'wp-block-post-navigation-link'
  ),
  'post-template' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/post-template',
    'title' => 'Post Template',
    'category' => 'theme',
    'parent' => array(
      'core/query'
    ),
    'description' => 'Contains the block elements used to render a post, like the title, date, featured image, content or excerpt, and more.',
    'textdomain' => 'default',
    'usesContext' => array(
      'queryId',
      'query',
      'queryContext',
      'displayLayout',
      'templateSlug',
      'previewPostType'
    ),
    'supports' => array(
      'reusable' => false,
      'html' => false,
      'align' => array(
        'wide',
        'full'
      ),
      'layout' => true,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      ),
      'spacing' => array(
        'blockGap' => array(
          '__experimentalDefault' => '1.25em'
        ),
        '__experimentalDefaultControls' => array(
          'blockGap' => true
        )
      )
    ),
    'style' => 'wp-block-post-template',
    'editorStyle' => 'wp-block-post-template-editor'
  ),
  'post-terms' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/post-terms',
    'title' => 'Post Terms',
    'category' => 'theme',
    'description' => 'Post terms.',
    'textdomain' => 'default',
    'attributes' => array(
      'term' => array(
        'type' => 'string'
      ),
      'textAlign' => array(
        'type' => 'string'
      ),
      'separator' => array(
        'type' => 'string',
        'default' => ', '
      ),
      'prefix' => array(
        'type' => 'string',
        'default' => ''
      ),
      'suffix' => array(
        'type' => 'string',
        'default' => ''
      )
    ),
    'usesContext' => array(
      'postId',
      'postType'
    ),
    'supports' => array(
      'html' => false,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true,
          'link' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'style' => 'wp-block-post-terms'
  ),
  'post-title' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/post-title',
    'title' => 'Title',
    'category' => 'theme',
    'description' => 'Displays the title of a post, page, or any other content-type.',
    'textdomain' => 'default',
    'usesContext' => array(
      'postId',
      'postType',
      'queryId'
    ),
    'attributes' => array(
      'textAlign' => array(
        'type' => 'string'
      ),
      'level' => array(
        'type' => 'number',
        'default' => 2
      ),
      'isLink' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'rel' => array(
        'type' => 'string',
        'attribute' => 'rel',
        'default' => ''
      ),
      'linkTarget' => array(
        'type' => 'string',
        'default' => '_self'
      )
    ),
    'supports' => array(
      'align' => array(
        'wide',
        'full'
      ),
      'html' => false,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true,
          'link' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true,
          'fontAppearance' => true,
          'textTransform' => true
        )
      )
    ),
    'style' => 'wp-block-post-title'
  ),
  'preformatted' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/preformatted',
    'title' => 'Preformatted',
    'category' => 'text',
    'description' => 'Add text that respects your spacing and tabs, and also allows styling.',
    'textdomain' => 'default',
    'attributes' => array(
      'content' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'pre',
        'default' => '',
        '__unstablePreserveWhiteSpace' => true,
        '__experimentalRole' => 'content'
      )
    ),
    'supports' => array(
      'anchor' => true,
      'color' => array(
        'gradients' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'style' => 'wp-block-preformatted'
  ),
  'pullquote' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/pullquote',
    'title' => 'Pullquote',
    'category' => 'text',
    'description' => 'Give special visual emphasis to a quote from your text.',
    'textdomain' => 'default',
    'attributes' => array(
      'value' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'p',
        '__experimentalRole' => 'content'
      ),
      'citation' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'cite',
        'default' => '',
        '__experimentalRole' => 'content'
      ),
      'textAlign' => array(
        'type' => 'string'
      )
    ),
    'supports' => array(
      'anchor' => true,
      'align' => array(
        'left',
        'right',
        'wide',
        'full'
      ),
      'color' => array(
        'gradients' => true,
        'background' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true,
          'fontAppearance' => true
        )
      ),
      '__experimentalBorder' => array(
        'color' => true,
        'radius' => true,
        'style' => true,
        'width' => true,
        '__experimentalDefaultControls' => array(
          'color' => true,
          'radius' => true,
          'style' => true,
          'width' => true
        )
      ),
      '__experimentalStyle' => array(
        'typography' => array(
          'fontSize' => '1.5em',
          'lineHeight' => '1.6'
        )
      )
    ),
    'editorStyle' => 'wp-block-pullquote-editor',
    'style' => 'wp-block-pullquote'
  ),
  'query' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/query',
    'title' => 'Query Loop',
    'category' => 'theme',
    'description' => 'An advanced block that allows displaying post types based on different query parameters and visual configurations.',
    'textdomain' => 'default',
    'attributes' => array(
      'queryId' => array(
        'type' => 'number'
      ),
      'query' => array(
        'type' => 'object',
        'default' => array(
          'perPage' => null,
          'pages' => 0,
          'offset' => 0,
          'postType' => 'post',
          'order' => 'desc',
          'orderBy' => 'date',
          'author' => '',
          'search' => '',
          'exclude' => array(
            
          ),
          'sticky' => '',
          'inherit' => true,
          'taxQuery' => null,
          'parents' => array(
            
          )
        )
      ),
      'tagName' => array(
        'type' => 'string',
        'default' => 'div'
      ),
      'namespace' => array(
        'type' => 'string'
      )
    ),
    'providesContext' => array(
      'queryId' => 'queryId',
      'query' => 'query',
      'displayLayout' => 'displayLayout'
    ),
    'supports' => array(
      'align' => array(
        'wide',
        'full'
      ),
      'html' => false,
      'layout' => true
    ),
    'editorStyle' => 'wp-block-query-editor'
  ),
  'query-no-results' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/query-no-results',
    'title' => 'No results',
    'category' => 'theme',
    'description' => 'Contains the block elements used to render content when no query results are found.',
    'parent' => array(
      'core/query'
    ),
    'textdomain' => 'default',
    'usesContext' => array(
      'queryId',
      'query'
    ),
    'supports' => array(
      'align' => true,
      'reusable' => false,
      'html' => false,
      'color' => array(
        'gradients' => true,
        'link' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    )
  ),
  'query-pagination' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/query-pagination',
    'title' => 'Pagination',
    'category' => 'theme',
    'parent' => array(
      'core/query'
    ),
    'description' => 'Displays a paginated navigation to next/previous set of posts, when applicable.',
    'textdomain' => 'default',
    'attributes' => array(
      'paginationArrow' => array(
        'type' => 'string',
        'default' => 'none'
      ),
      'showLabel' => array(
        'type' => 'boolean',
        'default' => true
      )
    ),
    'usesContext' => array(
      'queryId',
      'query'
    ),
    'providesContext' => array(
      'paginationArrow' => 'paginationArrow',
      'showLabel' => 'showLabel'
    ),
    'supports' => array(
      'align' => true,
      'reusable' => false,
      'html' => false,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true,
          'link' => true
        )
      ),
      'layout' => array(
        'allowSwitching' => false,
        'allowInheriting' => false,
        'default' => array(
          'type' => 'flex'
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-query-pagination-editor',
    'style' => 'wp-block-query-pagination'
  ),
  'query-pagination-next' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/query-pagination-next',
    'title' => 'Next Page',
    'category' => 'theme',
    'parent' => array(
      'core/query-pagination'
    ),
    'description' => 'Displays the next posts page link.',
    'textdomain' => 'default',
    'attributes' => array(
      'label' => array(
        'type' => 'string'
      )
    ),
    'usesContext' => array(
      'queryId',
      'query',
      'paginationArrow',
      'showLabel'
    ),
    'supports' => array(
      'reusable' => false,
      'html' => false,
      'color' => array(
        'gradients' => true,
        'text' => false,
        '__experimentalDefaultControls' => array(
          'background' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    )
  ),
  'query-pagination-numbers' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/query-pagination-numbers',
    'title' => 'Page Numbers',
    'category' => 'theme',
    'parent' => array(
      'core/query-pagination'
    ),
    'description' => 'Displays a list of page numbers for pagination',
    'textdomain' => 'default',
    'usesContext' => array(
      'queryId',
      'query'
    ),
    'supports' => array(
      'reusable' => false,
      'html' => false,
      'color' => array(
        'gradients' => true,
        'text' => false,
        '__experimentalDefaultControls' => array(
          'background' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-query-pagination-numbers-editor'
  ),
  'query-pagination-previous' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/query-pagination-previous',
    'title' => 'Previous Page',
    'category' => 'theme',
    'parent' => array(
      'core/query-pagination'
    ),
    'description' => 'Displays the previous posts page link.',
    'textdomain' => 'default',
    'attributes' => array(
      'label' => array(
        'type' => 'string'
      )
    ),
    'usesContext' => array(
      'queryId',
      'query',
      'paginationArrow',
      'showLabel'
    ),
    'supports' => array(
      'reusable' => false,
      'html' => false,
      'color' => array(
        'gradients' => true,
        'text' => false,
        '__experimentalDefaultControls' => array(
          'background' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    )
  ),
  'query-title' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/query-title',
    'title' => 'Query Title',
    'category' => 'theme',
    'description' => 'Display the query title.',
    'textdomain' => 'default',
    'attributes' => array(
      'type' => array(
        'type' => 'string'
      ),
      'textAlign' => array(
        'type' => 'string'
      ),
      'level' => array(
        'type' => 'number',
        'default' => 1
      ),
      'showPrefix' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'showSearchTerm' => array(
        'type' => 'boolean',
        'default' => true
      )
    ),
    'supports' => array(
      'align' => array(
        'wide',
        'full'
      ),
      'html' => false,
      'color' => array(
        'gradients' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontStyle' => true,
        '__experimentalFontWeight' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true,
          'fontAppearance' => true,
          'textTransform' => true
        )
      )
    ),
    'style' => 'wp-block-query-title'
  ),
  'quote' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/quote',
    'title' => 'Quote',
    'category' => 'text',
    'description' => 'Give quoted text visual emphasis. "In quoting others, we cite ourselves." — Julio Cortázar',
    'keywords' => array(
      'blockquote',
      'cite'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'value' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'blockquote',
        'multiline' => 'p',
        'default' => '',
        '__experimentalRole' => 'content'
      ),
      'citation' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'cite',
        'default' => '',
        '__experimentalRole' => 'content'
      ),
      'align' => array(
        'type' => 'string'
      )
    ),
    'supports' => array(
      'anchor' => true,
      'html' => false,
      '__experimentalOnEnter' => true,
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true,
          'fontAppearance' => true
        )
      ),
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      )
    ),
    'styles' => array(
      array(
        'name' => 'default',
        'label' => 'Default',
        'isDefault' => true
      ),
      array(
        'name' => 'plain',
        'label' => 'Plain'
      )
    ),
    'editorStyle' => 'wp-block-quote-editor',
    'style' => 'wp-block-quote'
  ),
  'read-more' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/read-more',
    'title' => 'Read More',
    'category' => 'theme',
    'description' => 'Displays the link of a post, page, or any other content-type.',
    'textdomain' => 'default',
    'attributes' => array(
      'content' => array(
        'type' => 'string'
      ),
      'linkTarget' => array(
        'type' => 'string',
        'default' => '_self'
      )
    ),
    'usesContext' => array(
      'postId'
    ),
    'supports' => array(
      'html' => false,
      'color' => array(
        'gradients' => true,
        'text' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true,
          'textDecoration' => true
        )
      ),
      'spacing' => array(
        'margin' => array(
          'top',
          'bottom'
        ),
        'padding' => true,
        '__experimentalDefaultControls' => array(
          'padding' => true
        )
      ),
      '__experimentalBorder' => array(
        'color' => true,
        'radius' => true,
        'width' => true,
        '__experimentalDefaultControls' => array(
          'width' => true
        )
      )
    ),
    'style' => 'wp-block-read-more'
  ),
  'rss' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/rss',
    'title' => 'RSS',
    'category' => 'widgets',
    'description' => 'Display entries from any RSS or Atom feed.',
    'keywords' => array(
      'atom',
      'feed'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'columns' => array(
        'type' => 'number',
        'default' => 2
      ),
      'blockLayout' => array(
        'type' => 'string',
        'default' => 'list'
      ),
      'feedURL' => array(
        'type' => 'string',
        'default' => ''
      ),
      'itemsToShow' => array(
        'type' => 'number',
        'default' => 5
      ),
      'displayExcerpt' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'displayAuthor' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'displayDate' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'excerptLength' => array(
        'type' => 'number',
        'default' => 55
      )
    ),
    'supports' => array(
      'align' => true,
      'html' => false
    ),
    'editorStyle' => 'wp-block-rss-editor',
    'style' => 'wp-block-rss'
  ),
  'search' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/search',
    'title' => 'Search',
    'category' => 'widgets',
    'description' => 'Help visitors find your content.',
    'keywords' => array(
      'find'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'label' => array(
        'type' => 'string',
        '__experimentalRole' => 'content'
      ),
      'showLabel' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'placeholder' => array(
        'type' => 'string',
        'default' => '',
        '__experimentalRole' => 'content'
      ),
      'width' => array(
        'type' => 'number'
      ),
      'widthUnit' => array(
        'type' => 'string'
      ),
      'buttonText' => array(
        'type' => 'string',
        '__experimentalRole' => 'content'
      ),
      'buttonPosition' => array(
        'type' => 'string',
        'default' => 'button-outside'
      ),
      'buttonUseIcon' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'query' => array(
        'type' => 'object',
        'default' => array(
          
        )
      ),
      'buttonBehavior' => array(
        'type' => 'string',
        'default' => 'expand-searchfield'
      ),
      'isSearchFieldHidden' => array(
        'type' => 'boolean',
        'default' => false
      )
    ),
    'supports' => array(
      'align' => array(
        'left',
        'center',
        'right'
      ),
      'color' => array(
        'gradients' => true,
        '__experimentalSkipSerialization' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'typography' => array(
        '__experimentalSkipSerialization' => true,
        '__experimentalSelector' => '.wp-block-search__label, .wp-block-search__input, .wp-block-search__button',
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      ),
      '__experimentalBorder' => array(
        'color' => true,
        'radius' => true,
        'width' => true,
        '__experimentalSkipSerialization' => true,
        '__experimentalDefaultControls' => array(
          'color' => true,
          'radius' => true,
          'width' => true
        )
      ),
      'html' => false
    ),
    'editorStyle' => 'wp-block-search-editor',
    'style' => 'wp-block-search'
  ),
  'separator' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/separator',
    'title' => 'Separator',
    'category' => 'design',
    'description' => 'Create a break between ideas or sections with a horizontal separator.',
    'keywords' => array(
      'horizontal-line',
      'hr',
      'divider'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'opacity' => array(
        'type' => 'string',
        'default' => 'alpha-channel'
      )
    ),
    'supports' => array(
      'anchor' => true,
      'align' => array(
        'center',
        'wide',
        'full'
      ),
      'color' => array(
        'enableContrastChecker' => false,
        '__experimentalSkipSerialization' => true,
        'gradients' => true,
        'background' => true,
        'text' => false,
        '__experimentalDefaultControls' => array(
          'background' => true
        )
      ),
      'spacing' => array(
        'margin' => array(
          'top',
          'bottom'
        )
      )
    ),
    'styles' => array(
      array(
        'name' => 'default',
        'label' => 'Default',
        'isDefault' => true
      ),
      array(
        'name' => 'wide',
        'label' => 'Wide Line'
      ),
      array(
        'name' => 'dots',
        'label' => 'Dots'
      )
    ),
    'editorStyle' => 'wp-block-separator-editor',
    'style' => 'wp-block-separator'
  ),
  'shortcode' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/shortcode',
    'title' => 'Shortcode',
    'category' => 'widgets',
    'description' => 'Insert additional custom elements with a WordPress shortcode.',
    'textdomain' => 'default',
    'attributes' => array(
      'text' => array(
        'type' => 'string',
        'source' => 'raw'
      )
    ),
    'supports' => array(
      'className' => false,
      'customClassName' => false,
      'html' => false
    ),
    'editorStyle' => 'wp-block-shortcode-editor'
  ),
  'site-logo' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/site-logo',
    'title' => 'Site Logo',
    'category' => 'theme',
    'description' => 'Display an image to represent this site. Update this block and the changes apply everywhere.',
    'textdomain' => 'default',
    'attributes' => array(
      'width' => array(
        'type' => 'number'
      ),
      'isLink' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'linkTarget' => array(
        'type' => 'string',
        'default' => '_self'
      ),
      'shouldSyncIcon' => array(
        'type' => 'boolean'
      )
    ),
    'example' => array(
      'viewportWidth' => 500,
      'attributes' => array(
        'width' => 350,
        'className' => 'block-editor-block-types-list__site-logo-example'
      )
    ),
    'supports' => array(
      'html' => false,
      'align' => true,
      'alignWide' => false,
      'color' => array(
        '__experimentalDuotone' => 'img, .components-placeholder__illustration, .components-placeholder::before',
        'text' => false,
        'background' => false
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      )
    ),
    'styles' => array(
      array(
        'name' => 'default',
        'label' => 'Default',
        'isDefault' => true
      ),
      array(
        'name' => 'rounded',
        'label' => 'Rounded'
      )
    ),
    'editorStyle' => 'wp-block-site-logo-editor',
    'style' => 'wp-block-site-logo'
  ),
  'site-tagline' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/site-tagline',
    'title' => 'Site Tagline',
    'category' => 'theme',
    'description' => 'Describe in a few words what the site is about. The tagline can be used in search results or when sharing on social networks even if it’s not displayed in the theme design.',
    'keywords' => array(
      'description'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'textAlign' => array(
        'type' => 'string'
      )
    ),
    'example' => array(
      
    ),
    'supports' => array(
      'align' => array(
        'wide',
        'full'
      ),
      'html' => false,
      'color' => array(
        'gradients' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalFontStyle' => true,
        '__experimentalFontWeight' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-site-tagline-editor'
  ),
  'site-title' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/site-title',
    'title' => 'Site Title',
    'category' => 'theme',
    'description' => 'Displays the name of this site. Update the block, and the changes apply everywhere it’s used. This will also appear in the browser title bar and in search results.',
    'textdomain' => 'default',
    'attributes' => array(
      'level' => array(
        'type' => 'number',
        'default' => 1
      ),
      'textAlign' => array(
        'type' => 'string'
      ),
      'isLink' => array(
        'type' => 'boolean',
        'default' => true
      ),
      'linkTarget' => array(
        'type' => 'string',
        'default' => '_self'
      )
    ),
    'example' => array(
      'viewportWidth' => 500
    ),
    'supports' => array(
      'align' => array(
        'wide',
        'full'
      ),
      'html' => false,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true,
          'link' => true
        )
      ),
      'spacing' => array(
        'padding' => true,
        'margin' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalFontStyle' => true,
        '__experimentalFontWeight' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true,
          'lineHeight' => true,
          'fontAppearance' => true,
          'letterSpacing' => true,
          'textTransform' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-site-title-editor',
    'style' => 'wp-block-site-title'
  ),
  'social-link' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/social-link',
    'title' => 'Social Icon',
    'category' => 'widgets',
    'parent' => array(
      'core/social-links'
    ),
    'description' => 'Display an icon linking to a social media profile or site.',
    'textdomain' => 'default',
    'attributes' => array(
      'url' => array(
        'type' => 'string'
      ),
      'service' => array(
        'type' => 'string'
      ),
      'label' => array(
        'type' => 'string'
      ),
      'rel' => array(
        'type' => 'string'
      )
    ),
    'usesContext' => array(
      'openInNewTab',
      'showLabels',
      'iconColor',
      'iconColorValue',
      'iconBackgroundColor',
      'iconBackgroundColorValue'
    ),
    'supports' => array(
      'reusable' => false,
      'html' => false
    ),
    'editorStyle' => 'wp-block-social-link-editor'
  ),
  'social-links' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/social-links',
    'title' => 'Social Icons',
    'category' => 'widgets',
    'description' => 'Display icons linking to your social media profiles or sites.',
    'keywords' => array(
      'links'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'iconColor' => array(
        'type' => 'string'
      ),
      'customIconColor' => array(
        'type' => 'string'
      ),
      'iconColorValue' => array(
        'type' => 'string'
      ),
      'iconBackgroundColor' => array(
        'type' => 'string'
      ),
      'customIconBackgroundColor' => array(
        'type' => 'string'
      ),
      'iconBackgroundColorValue' => array(
        'type' => 'string'
      ),
      'openInNewTab' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'showLabels' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'size' => array(
        'type' => 'string'
      )
    ),
    'providesContext' => array(
      'openInNewTab' => 'openInNewTab',
      'showLabels' => 'showLabels',
      'iconColor' => 'iconColor',
      'iconColorValue' => 'iconColorValue',
      'iconBackgroundColor' => 'iconBackgroundColor',
      'iconBackgroundColorValue' => 'iconBackgroundColorValue'
    ),
    'supports' => array(
      'align' => array(
        'left',
        'center',
        'right'
      ),
      'anchor' => true,
      '__experimentalExposeControlsToChildren' => true,
      'layout' => array(
        'allowSwitching' => false,
        'allowInheriting' => false,
        'allowVerticalAlignment' => false,
        'default' => array(
          'type' => 'flex'
        )
      ),
      'color' => array(
        'enableContrastChecker' => false,
        'background' => true,
        'gradients' => true,
        'text' => false,
        '__experimentalDefaultControls' => array(
          'background' => false
        )
      ),
      'spacing' => array(
        'blockGap' => array(
          'horizontal',
          'vertical'
        ),
        'margin' => true,
        'padding' => true,
        'units' => array(
          'px',
          'em',
          'rem',
          'vh',
          'vw'
        ),
        '__experimentalDefaultControls' => array(
          'blockGap' => true
        )
      )
    ),
    'styles' => array(
      array(
        'name' => 'default',
        'label' => 'Default',
        'isDefault' => true
      ),
      array(
        'name' => 'logos-only',
        'label' => 'Logos Only'
      ),
      array(
        'name' => 'pill-shape',
        'label' => 'Pill Shape'
      )
    ),
    'editorStyle' => 'wp-block-social-links-editor',
    'style' => 'wp-block-social-links'
  ),
  'spacer' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/spacer',
    'title' => 'Spacer',
    'category' => 'design',
    'description' => 'Add white space between blocks and customize its height.',
    'textdomain' => 'default',
    'attributes' => array(
      'height' => array(
        'type' => 'string',
        'default' => '100px'
      ),
      'width' => array(
        'type' => 'string'
      )
    ),
    'usesContext' => array(
      'orientation'
    ),
    'supports' => array(
      'anchor' => true,
      'spacing' => array(
        'margin' => array(
          'top',
          'bottom'
        ),
        '__experimentalDefaultControls' => array(
          'margin' => true
        )
      )
    ),
    'editorStyle' => 'wp-block-spacer-editor',
    'style' => 'wp-block-spacer'
  ),
  'table' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/table',
    'title' => 'Table',
    'category' => 'text',
    'description' => 'Create structured content in rows and columns to display information.',
    'textdomain' => 'default',
    'attributes' => array(
      'hasFixedLayout' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'caption' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'figcaption',
        'default' => ''
      ),
      'head' => array(
        'type' => 'array',
        'default' => array(
          
        ),
        'source' => 'query',
        'selector' => 'thead tr',
        'query' => array(
          'cells' => array(
            'type' => 'array',
            'default' => array(
              
            ),
            'source' => 'query',
            'selector' => 'td,th',
            'query' => array(
              'content' => array(
                'type' => 'string',
                'source' => 'html'
              ),
              'tag' => array(
                'type' => 'string',
                'default' => 'td',
                'source' => 'tag'
              ),
              'scope' => array(
                'type' => 'string',
                'source' => 'attribute',
                'attribute' => 'scope'
              ),
              'align' => array(
                'type' => 'string',
                'source' => 'attribute',
                'attribute' => 'data-align'
              ),
              'colspan' => array(
                'type' => 'string',
                'source' => 'attribute',
                'attribute' => 'colspan'
              ),
              'rowspan' => array(
                'type' => 'string',
                'source' => 'attribute',
                'attribute' => 'rowspan'
              )
            )
          )
        )
      ),
      'body' => array(
        'type' => 'array',
        'default' => array(
          
        ),
        'source' => 'query',
        'selector' => 'tbody tr',
        'query' => array(
          'cells' => array(
            'type' => 'array',
            'default' => array(
              
            ),
            'source' => 'query',
            'selector' => 'td,th',
            'query' => array(
              'content' => array(
                'type' => 'string',
                'source' => 'html'
              ),
              'tag' => array(
                'type' => 'string',
                'default' => 'td',
                'source' => 'tag'
              ),
              'scope' => array(
                'type' => 'string',
                'source' => 'attribute',
                'attribute' => 'scope'
              ),
              'align' => array(
                'type' => 'string',
                'source' => 'attribute',
                'attribute' => 'data-align'
              ),
              'colspan' => array(
                'type' => 'string',
                'source' => 'attribute',
                'attribute' => 'colspan'
              ),
              'rowspan' => array(
                'type' => 'string',
                'source' => 'attribute',
                'attribute' => 'rowspan'
              )
            )
          )
        )
      ),
      'foot' => array(
        'type' => 'array',
        'default' => array(
          
        ),
        'source' => 'query',
        'selector' => 'tfoot tr',
        'query' => array(
          'cells' => array(
            'type' => 'array',
            'default' => array(
              
            ),
            'source' => 'query',
            'selector' => 'td,th',
            'query' => array(
              'content' => array(
                'type' => 'string',
                'source' => 'html'
              ),
              'tag' => array(
                'type' => 'string',
                'default' => 'td',
                'source' => 'tag'
              ),
              'scope' => array(
                'type' => 'string',
                'source' => 'attribute',
                'attribute' => 'scope'
              ),
              'align' => array(
                'type' => 'string',
                'source' => 'attribute',
                'attribute' => 'data-align'
              ),
              'colspan' => array(
                'type' => 'string',
                'source' => 'attribute',
                'attribute' => 'colspan'
              ),
              'rowspan' => array(
                'type' => 'string',
                'source' => 'attribute',
                'attribute' => 'rowspan'
              )
            )
          )
        )
      )
    ),
    'supports' => array(
      'anchor' => true,
      'align' => true,
      'color' => array(
        '__experimentalSkipSerialization' => true,
        'gradients' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontStyle' => true,
        '__experimentalFontWeight' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      ),
      '__experimentalBorder' => array(
        '__experimentalSkipSerialization' => true,
        'color' => true,
        'style' => true,
        'width' => true,
        '__experimentalDefaultControls' => array(
          'color' => true,
          'style' => true,
          'width' => true
        )
      ),
      '__experimentalSelector' => '.wp-block-table > table'
    ),
    'styles' => array(
      array(
        'name' => 'regular',
        'label' => 'Default',
        'isDefault' => true
      ),
      array(
        'name' => 'stripes',
        'label' => 'Stripes'
      )
    ),
    'editorStyle' => 'wp-block-table-editor',
    'style' => 'wp-block-table'
  ),
  'tag-cloud' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/tag-cloud',
    'title' => 'Tag Cloud',
    'category' => 'widgets',
    'description' => 'A cloud of your most used tags.',
    'textdomain' => 'default',
    'attributes' => array(
      'numberOfTags' => array(
        'type' => 'number',
        'default' => 45,
        'minimum' => 1,
        'maximum' => 100
      ),
      'taxonomy' => array(
        'type' => 'string',
        'default' => 'post_tag'
      ),
      'showTagCounts' => array(
        'type' => 'boolean',
        'default' => false
      ),
      'smallestFontSize' => array(
        'type' => 'string',
        'default' => '8pt'
      ),
      'largestFontSize' => array(
        'type' => 'string',
        'default' => '22pt'
      )
    ),
    'styles' => array(
      array(
        'name' => 'default',
        'label' => 'Default',
        'isDefault' => true
      ),
      array(
        'name' => 'outline',
        'label' => 'Outline'
      )
    ),
    'supports' => array(
      'html' => false,
      'align' => true,
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      'typography' => array(
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalLetterSpacing' => true
      )
    ),
    'editorStyle' => 'wp-block-tag-cloud-editor'
  ),
  'template-part' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/template-part',
    'title' => 'Template Part',
    'category' => 'theme',
    'description' => 'Edit the different global regions of your site, like the header, footer, sidebar, or create your own.',
    'textdomain' => 'default',
    'attributes' => array(
      'slug' => array(
        'type' => 'string'
      ),
      'theme' => array(
        'type' => 'string'
      ),
      'tagName' => array(
        'type' => 'string'
      ),
      'area' => array(
        'type' => 'string'
      )
    ),
    'supports' => array(
      'align' => true,
      'html' => false,
      'reusable' => false
    ),
    'editorStyle' => 'wp-block-template-part-editor'
  ),
  'term-description' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/term-description',
    'title' => 'Term Description',
    'category' => 'theme',
    'description' => 'Display the description of categories, tags and custom taxonomies when viewing an archive.',
    'textdomain' => 'default',
    'attributes' => array(
      'textAlign' => array(
        'type' => 'string'
      )
    ),
    'supports' => array(
      'align' => array(
        'wide',
        'full'
      ),
      'html' => false,
      'color' => array(
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'spacing' => array(
        'padding' => true,
        'margin' => true
      ),
      'typography' => array(
        'fontSize' => true,
        'lineHeight' => true,
        '__experimentalFontFamily' => true,
        '__experimentalFontWeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true
        )
      )
    )
  ),
  'text-columns' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/text-columns',
    'title' => 'Text Columns (deprecated)',
    'icon' => 'columns',
    'category' => 'design',
    'description' => 'This block is deprecated. Please use the Columns block instead.',
    'textdomain' => 'default',
    'attributes' => array(
      'content' => array(
        'type' => 'array',
        'source' => 'query',
        'selector' => 'p',
        'query' => array(
          'children' => array(
            'type' => 'string',
            'source' => 'html'
          )
        ),
        'default' => array(
          array(
            
          ),
          array(
            
          )
        )
      ),
      'columns' => array(
        'type' => 'number',
        'default' => 2
      ),
      'width' => array(
        'type' => 'string'
      )
    ),
    'supports' => array(
      'inserter' => false
    ),
    'editorStyle' => 'wp-block-text-columns-editor',
    'style' => 'wp-block-text-columns'
  ),
  'verse' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/verse',
    'title' => 'Verse',
    'category' => 'text',
    'description' => 'Insert poetry. Use special spacing formats. Or quote song lyrics.',
    'keywords' => array(
      'poetry',
      'poem'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'content' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'pre',
        'default' => '',
        '__unstablePreserveWhiteSpace' => true,
        '__experimentalRole' => 'content'
      ),
      'textAlign' => array(
        'type' => 'string'
      )
    ),
    'supports' => array(
      'anchor' => true,
      'color' => array(
        'gradients' => true,
        'link' => true,
        '__experimentalDefaultControls' => array(
          'background' => true,
          'text' => true
        )
      ),
      'typography' => array(
        'fontSize' => true,
        '__experimentalFontFamily' => true,
        'lineHeight' => true,
        '__experimentalFontStyle' => true,
        '__experimentalFontWeight' => true,
        '__experimentalLetterSpacing' => true,
        '__experimentalTextTransform' => true,
        '__experimentalTextDecoration' => true,
        '__experimentalDefaultControls' => array(
          'fontSize' => true,
          'fontAppearance' => true
        )
      ),
      'spacing' => array(
        'margin' => true,
        'padding' => true
      ),
      '__experimentalBorder' => array(
        'radius' => true,
        'width' => true,
        'color' => true,
        'style' => true
      )
    ),
    'style' => 'wp-block-verse',
    'editorStyle' => 'wp-block-verse-editor'
  ),
  'video' => array(
    '$schema' => 'https://schemas.wp.org/trunk/block.json',
    'apiVersion' => 3,
    'name' => 'core/video',
    'title' => 'Video',
    'category' => 'media',
    'description' => 'Embed a video from your media library or upload a new one.',
    'keywords' => array(
      'movie'
    ),
    'textdomain' => 'default',
    'attributes' => array(
      'autoplay' => array(
        'type' => 'boolean',
        'source' => 'attribute',
        'selector' => 'video',
        'attribute' => 'autoplay'
      ),
      'caption' => array(
        'type' => 'string',
        'source' => 'html',
        'selector' => 'figcaption',
        '__experimentalRole' => 'content'
      ),
      'controls' => array(
        'type' => 'boolean',
        'source' => 'attribute',
        'selector' => 'video',
        'attribute' => 'controls',
        'default' => true
      ),
      'id' => array(
        'type' => 'number',
        '__experimentalRole' => 'content'
      ),
      'loop' => array(
        'type' => 'boolean',
        'source' => 'attribute',
        'selector' => 'video',
        'attribute' => 'loop'
      ),
      'muted' => array(
        'type' => 'boolean',
        'source' => 'attribute',
        'selector' => 'video',
        'attribute' => 'muted'
      ),
      'poster' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'video',
        'attribute' => 'poster'
      ),
      'preload' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'video',
        'attribute' => 'preload',
        'default' => 'metadata'
      ),
      'src' => array(
        'type' => 'string',
        'source' => 'attribute',
        'selector' => 'video',
        'attribute' => 'src',
        '__experimentalRole' => 'content'
      ),
      'playsInline' => array(
        'type' => 'boolean',
        'source' => 'attribute',
        'selector' => 'video',
        'attribute' => 'playsinline'
      ),
      'tracks' => array(
        '__experimentalRole' => 'content',
        'type' => 'array',
        'items' => array(
          'type' => 'object'
        ),
        'default' => array(
          
        )
      )
    ),
    'supports' => array(
      'anchor' => true,
      'align' => true,
      'spacing' => array(
        'margin' => true,
        'padding' => true
      )
    ),
    'editorStyle' => 'wp-block-video-editor',
    'style' => 'wp-block-video'
  ),
  'widget-group' => array(
    'apiVersion' => 3,
    'name' => 'core/widget-group',
    'category' => 'widgets',
    'attributes' => array(
      'title' => array(
        'type' => 'string'
      )
    ),
    'supports' => array(
      'html' => false,
      'inserter' => true,
      'customClassName' => true,
      'reusable' => false
    ),
    'editorStyle' => 'wp-block-widget-group-editor',
    'style' => 'wp-block-widget-group'
  )
);