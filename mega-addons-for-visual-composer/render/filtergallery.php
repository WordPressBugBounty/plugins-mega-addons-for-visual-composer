<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_filter_gallery_son extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'controlname'	=>	'',
			'image_id'		=>	'',
			'caption_url'	=>	'',
			'popup'			=>	'disable',
			'video_url'		=>	'https://www.youtube.com/watch?v=WV9x1lyR6BQ',
			// 'caption_in_popup'	=>	'caption',
			'icon_width'	=>	'',
			'icon_border'	=>	'30',
			'icon_size'		=>	'20',
			'iconclr'		=>	'#fff',
			'iconbg'		=>	'transparent',
			'icon_margin'	=>	'7',
			'css'			=>	'',
		), $atts ) );
		$caption_url = vc_build_link($caption_url);
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
		if ($image_id != '') {
			$image_url = wp_get_attachment_url( $image_id );		
		}
		$content = wpb_js_remove_wpautop($content, true);
		ob_start();
		global $maw_filtergal_effect; global $maw_filtergal_linkicon; global $maw_filtergal_popupicon; 
		global $maw_filtergal_imgheight; global $maw_filtergal_Gid;
		?>

		<?php
			$controlCategories = array_values(array_filter(array_map('trim', explode(',', $controlname)), 'strlen'));
			$controlremovespace = implode(',', array_map(function ($category, $index) {
				return ($index > 0 ? 'maw-fg-' : '') . str_replace(' ', '', $category);
			}, $controlCategories, array_keys($controlCategories)));
		?>
    	<div class="filtr-item mix-<?php echo esc_attr($maw_filtergal_Gid) ?>" data-category="maw-fg-<?php echo esc_attr($controlremovespace); ?>">
    		<div class="maw_portfolioGallery_ihe">
	        	<?php if ($maw_filtergal_effect != 'ih_item_card_effect') { ?>
		        	<div class="<?php echo esc_attr($maw_filtergal_effect) ?> <?php echo esc_attr($css_class); ?>" style="height: <?php echo esc_attr($maw_filtergal_imgheight); ?>px;">
					    <div class="a-tag">
					      <div class="img" style="display: flex;">
					      	<img src="<?php echo esc_attr($image_url); ?>" alt="<?php echo esc_attr($image_url); ?>" style="height: <?php echo esc_attr($maw_filtergal_imgheight); ?>px; max-width: 100%;">
					      </div>
					      <div class="info">
						    <div style="display:table;width:100%;height:100%;">
					    		<div style="display: table-cell !important; vertical-align: middle !important;">
					      			<?php echo wp_kses_post($content); ?>
									<?php if ($popup == 'image') { ?>
										<a href="<?php echo esc_url($image_url); ?>" class="ihe-fancybox" aria-label="<?php echo esc_attr__( 'Open image', 'mega-addons-for-visual-composer' ); ?>" data-fslightbox="images-<?php echo esc_attr($maw_filtergal_Gid) ?>" style="margin-right: <?php echo esc_attr($icon_margin); ?>px;">
					      					<i class="<?php echo esc_attr($maw_filtergal_popupicon); ?> portfolio_icon" style="width: <?php echo esc_attr($icon_width); ?>px; height: <?php echo esc_attr($icon_width); ?>px; line-height: <?php echo esc_attr($icon_width); ?>px; border-radius: <?php echo esc_attr($icon_border) ?>px;  color: <?php echo esc_attr($iconclr) ?>; background: <?php echo esc_attr($iconbg); ?>; font-size: <?php echo esc_attr($icon_size); ?>px;"></i>
										</a>
									<?php } ?>
					      			
					      			<?php if (isset($caption_url['url']) && $caption_url['url'] != '') { ?>
										<a href="<?php echo esc_url($caption_url['url']); ?>" target="<?php echo esc_attr( $caption_url['target'] ); ?>" title="<?php echo esc_html($caption_url['title']); ?>">
					      					<i class="<?php echo esc_attr($maw_filtergal_linkicon); ?> portfolio_icon" style="width: <?php echo esc_attr($icon_width); ?>px; height: <?php echo esc_attr($icon_width); ?>px; line-height: <?php echo esc_attr($icon_width); ?>px; border-radius: <?php echo esc_attr($icon_border) ?>px;  color: <?php echo esc_attr($iconclr) ?>; background: <?php echo esc_attr($iconbg); ?>; font-size: <?php echo esc_attr($icon_size); ?>px;"></i>
					      				</a>
					      			<?php } ?>
					      		</div>
					      	</div>
					      </div>
					    </div>
					</div>
				<?php } ?>

				<?php if ($maw_filtergal_effect == 'ih_item_card_effect') { ?>
		            <div class="<?php echo esc_attr($css_class); ?>" style="display: inline-block;">
		                <div class="<?php echo esc_attr($maw_filtergal_effect) ?>" style="height: <?php echo esc_attr($maw_filtergal_imgheight); ?>px;">
						    <div class="a-tag">
						      <div class="img" style="display: flex;">
						      	<img src="<?php echo esc_attr($image_url); ?>" alt="<?php echo esc_attr($image_url); ?>" style="height: <?php echo esc_attr($maw_filtergal_imgheight); ?>px; max-width: 100%;">
						      </div>
						      <div class="info">
							    <div style="display:table; width:100%; height:100%;">
						    		<div style="display: table-cell !important;vertical-align: middle !important;">	
						      			<?php if ($popup == 'image') { ?>
											<a href="<?php echo esc_url($image_url); ?>" class="ihe-fancybox" aria-label="<?php echo esc_attr__( 'Open image', 'mega-addons-for-visual-composer' ); ?>" data-fslightbox="images-<?php echo esc_attr($maw_filtergal_Gid) ?>">
						      					<i class="<?php echo esc_attr($maw_filtergal_popupicon); ?> portfolio_icon" style="width: <?php echo esc_attr($icon_width); ?>px; height: <?php echo esc_attr($icon_width); ?>px; line-height: <?php echo esc_attr($icon_width); ?>px; border-radius: <?php echo esc_attr($icon_border) ?>px;  color: <?php echo esc_attr($iconclr) ?>; background: <?php echo esc_attr($iconbg); ?>; font-size: <?php echo esc_attr($icon_size); ?>px; margin-right: <?php echo esc_attr($icon_margin); ?>px;"></i>
											</a>
										<?php } ?>									
						      			<?php if ($popup == 'video' && $video_url != '') { ?>
											<a href="<?php echo esc_url($video_url); ?>" class="ihe-fancybox" data-fslightbox="images-<?php echo esc_attr($maw_filtergal_Gid) ?>">
						      					<i class="<?php echo esc_attr($maw_filtergal_popupicon); ?> portfolio_icon" style="width: <?php echo esc_attr($icon_width); ?>px; height: <?php echo esc_attr($icon_width); ?>px; line-height: <?php echo esc_attr($icon_width); ?>px; border-radius: <?php echo esc_attr($icon_border) ?>px;  color: <?php echo esc_attr($iconclr) ?>; background: <?php echo esc_attr($iconbg); ?>; font-size: <?php echo esc_attr($icon_size); ?>px; margin-right: <?php echo esc_attr($icon_margin); ?>px;"></i>
											</a>
										<?php } ?>
						      			
						      			<?php if (isset($caption_url['url']) && $caption_url['url'] != '') { ?>
										<a href="<?php echo esc_url($caption_url['url']); ?>" target="<?php echo esc_attr( $caption_url['target'] ); ?>" title="<?php echo esc_html($caption_url['title']); ?>">
						      					<i class="<?php echo esc_attr($maw_filtergal_linkicon); ?> portfolio_icon" style="width: <?php echo esc_attr($icon_width); ?>px; height: <?php echo esc_attr($icon_width); ?>px; line-height: <?php echo esc_attr($icon_width); ?>px; border-radius: <?php echo esc_attr($icon_border) ?>px;  color: <?php echo esc_attr($iconclr) ?>; background: <?php echo esc_attr($iconbg); ?>; font-size: <?php echo esc_attr($icon_size); ?>px;"></i>
						      				</a>
						      			<?php } ?>
						      		</div>
						      	</div>
						      </div>
						    </div>
						</div>
		                <div class="card_details">
		                    <?php echo wp_kses_post( $content ); ?>
		                </div>
		            </div>
	            <?php } ?>
        	</div>
        </div>
			

		<?php return ob_get_clean();
	}
}


vc_map( array(
	"base" 			=> "filter_gallery_son",
	"name" 			=> __( 'Gallery List', 'mega-addons-for-visual-composer' ),
	"as_child" 		=> array('only' => 'filter_gallery_wrap'),
	"content_element" => true,
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('List Items', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/filtergallery.png',
	'params' => array(
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Control Name', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "controlname",
			'admin_label' 	=> 	true,
			"description" 	=> __( 'Use the gallery control name from Filterable Settings. Separate multiple items with comma (e.g. tech, innovation, web design)', 'mega-addons-for-visual-composer' ),
			"value"			=>	"Gallery",
			"group" 		=> 'Gallery Items',
		),
		array(
            "type" 			=> 	"attach_image",
			"heading" 		=> 	__( 'Image', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"image_id",
			"description" 	=> 	__( 'Select the image', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Gallery Items',
        ),

        array(
			"type" 			=> "textarea_html",
			"heading" 		=> __( 'Caption Text', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "content",
			"description" 	=> __( 'Provide Caption Here', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Gallery Items',
			"value"			=> '<h2>Caption Text Here</h2>'
		),

		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_urls",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #302f2f;font-weight:600;">' . esc_html__( 'Link Settings', 'mega-addons-for-visual-composer' ) . '</span>',
			"group" 		=> 'Gallery Items',
		),

		array(
			"type" 			=> "vc_link",
			"heading" 		=> __( 'Link To', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "caption_url",
			"description" 	=> __( 'Enter URL to link caption', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Gallery Items',
		),

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Lightbox Button', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "popup",
			"group" 		=> 'Gallery Items',
			"value" 		=> array(
				'Disable'							=>	'disable',
				'LightBox'							=>	'image',
				'Video Gallery (Pro Version)'		=>	'',
			)
		),

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Video Link', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "video_url",
			"dependency" 	=> array('element' => "popup", 'value' => 'video'),
			"value"			=>	"https://www.youtube.com/watch?v=WV9x1lyR6BQ",
			"group" 		=> 'Gallery Items',
		),

		// array(
		// 	"type" 			=> "dropdown",
		// 	"heading" 		=> __( 'Caption Text In Popup', 'megaaddons' ),
		// 	"param_name" 	=> "caption_in_popup",
		// 	"dependency" 	=> array('element' => "popup", 'value' => 'image'),
		// 	"group" 		=> 'Gallery Items',
		// 	"value" 		=> array(
		// 		'Show'			=>	'caption',
		// 		'Hide'			=>	'hide',
		// 	)
		// ),

		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_urls",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #302f2f;font-weight:600;">' . esc_html__( 'Icon Settings', 'mega-addons-for-visual-composer' ) . '</span>',
			"group" 		=> 'Gallery Items',
		),


		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Width/Height', 'mega-addons-for-visual-composer' ),
			"edit_field_class" => "vc_col-sm-4 wdo_items_to_show wdo_margin_bottom",
			"param_name" 	=> "icon_width",
			"value"			=>	"50",
			"suffix"			=>	"px",
			"group" 		=> 'Gallery Items',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Border Radius', 'mega-addons-for-visual-composer' ),
			"edit_field_class" => "vc_col-sm-4 wdo_items_to_show wdo_margin_bottom",
			"param_name" 	=> "icon_border",
			"value"			=>	"30",
			"suffix"			=>	"px",
			"group" 		=> 'Gallery Items',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Icon [Font Size]', 'mega-addons-for-visual-composer' ),
			"edit_field_class" => "vc_col-sm-4 wdo_items_to_show wdo_margin_bottom",
			"param_name" 	=> "icon_size",
			"value"			=>	"20",
			"suffix"			=>	"px",
			"group" 		=> 'Gallery Items',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Icon Color', 'mega-addons-for-visual-composer' ),
			"edit_field_class" => "vc_col-sm-4 wdo_items_to_show wdo_margin_bottom",
			"param_name" 	=> "iconclr",
			"value"			=>	"#fff",
			"group" 		=> 'Gallery Items',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Icon Background', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "iconbg",
			"edit_field_class" => "vc_col-sm-4 wdo_items_to_show wdo_margin_bottom",
			"value"			=>	"#ff622a",
			"group" 		=> 'Gallery Items',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Icon Margin', 'mega-addons-for-visual-composer' ),
			"edit_field_class" => "vc_col-sm-4 wdo_items_to_show wdo_margin_bottom",
			"param_name" 	=> "icon_margin",
			"value"			=>	"7",
			"suffix"			=>	"px",
			"group" 		=> 'Gallery Items',
		),

		array(
			"type" 			=> 	"css_editor",
			"heading" 		=> 	__( 'Border Settings', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"css",
			"group" 		=>  'Border Settings',
		),
	),
) );
