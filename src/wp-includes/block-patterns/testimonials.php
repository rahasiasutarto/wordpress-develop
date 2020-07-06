<?php
/**
 * Testimonials block pattern.
 *
 * @package WordPress
 */

return array(
	'title'         => __( 'Testimonials' ),
	'content'       => "<!-- wp:group {\"align\":\"wide\"} -->\n<div class=\"wp-block-group alignwide\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"full\"} -->\n<div class=\"wp-block-columns alignfull\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:group {\"style\":{\"color\":{\"background\":\"#8ed1fd\"}}} -->\n<div class=\"wp-block-group has-background\" style=\"background-color:#8ed1fd\"><div class=\"wp-block-group__inner-container\"><!-- wp:paragraph -->\n<p>" . __( '"Sir Knight, if your worship be disposed to alight, you will fail of nothing here but of a bed as for all other accommodations, you may be supplied to your mind."' ) . "</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":20} -->\n<div class=\"wp-block-column\" style=\"flex-basis:20%\"><!-- wp:image {\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<figure class=\"wp-block-image size-large is-style-rounded\"><img src=\"http://www.gravatar.com/avatar/?d=mm\" alt=\"\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"width\":66.66} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:66.66%\"><!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":22}}} -->\n<p style=\"font-size:22px\"><strong>" . __( 'Doris Som' ) . "</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:group {\"style\":{\"color\":{\"background\":\"#8ed1fd\"}}} -->\n<div class=\"wp-block-group has-background\" style=\"background-color:#8ed1fd\"><div class=\"wp-block-group__inner-container\"><!-- wp:paragraph -->\n<p>" . __( '"Signor Castellano, the least thing in the world suffices me; for arms are the only things I value, and combat is my bed of repose."' ) . "</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":20} -->\n<div class=\"wp-block-column\" style=\"flex-basis:20%\"><!-- wp:image {\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<figure class=\"wp-block-image size-large is-style-rounded\"><img src=\"http://www.gravatar.com/avatar/?d=mm\" alt=\"\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"width\":66.66} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:66.66%\"><!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":22}}} -->\n<p style=\"font-size:22px\"><strong>" . __( 'Walt Art' ) . "</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
	'viewportWidth' => 1000,
	'categories'    => array( 'text' ),
);
