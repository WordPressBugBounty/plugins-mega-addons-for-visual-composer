<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_mvc_flip_box extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'style'			=> 		'horizental',
			'height'		=> 		'200',
			'info_opt'		=> 		'show_image',
			'front_bg'		=>		'',
			'border_st'		=>		'',
			'border_clr'	=>		'',
			'border_width'	=>		'0',
			'border_style'	=>		'solid',
			'link_st'		=>		'',
			'url'			=>		'',
			'url_txt'		=>		'',
			'url_clr'		=>		'',
			'url_bg'		=>		'',
			'image_id'		=> 		'',
			'radius'		=> 		'',
			'image_size'	=> 		'',
			'font_icon'		=> 		'',
			'icon_size'		=> 		'',
			'icon_color'	=> 		'',
			'lineheight'	=> 		'1.5',
			'title'			=> 		'',
			'size'			=> 		'15',
			'color'			=> 		'',
			'desc'			=> 		'',
			'descrsize'		=> 		'13',
			'descrcolor'	=> 		'',
			'bgcolor'		=> 		'',
			'class'			=> 		'',
			'titlesizembl'	=>		'',
			'descsizmbl'	=>		'',
			'heightmbl'		=>		'',
		), $atts ) );
		$url = vc_build_link($url);
		if ($image_id != '') {
			$image_url = wp_get_attachment_url( $image_id );		
		}
		$some_id = VC_MEGA::next_instance_id();
		wp_enqueue_style( 'flip-box-css', plugins_url( '../css/flipbox.css' , __FILE__ ), array(), VC_MEGA::VERSION);
		$content = wpb_js_remove_wpautop($content, true);
		ob_start(); ?>
		
		<?php if ($style == 'vertical') { ?>
	      	<div class="hover vc-ihe-panel <?php echo esc_attr($class); ?>" id="vc-flip-box-<?php echo esc_attr($some_id); ?>" style="height: <?php echo esc_attr($height); ?>px;">
			  <div class="front" style="background: <?php echo esc_attr($front_bg); ?>;">
			  	<div style="display:table;width:100%;height:100%;">
				    <div class="pad" style="display: table-cell !important;vertical-align: middle !important; border: <?php echo esc_attr($border_width); ?>px <?php echo esc_attr($border_style); ?> <?php echo esc_attr($border_clr); ?>;">
				      <?php if ($info_opt == 'show_image') { ?>
						<img class="" src="<?php echo esc_attr($image_url); ?>" alt="<?php echo esc_attr($alt); ?>" style="border-radius: <?php echo esc_attr($radius); ?>; width: <?php echo esc_attr($image_size); ?>px;">			
					  <?php } ?>
					  <?php if ($info_opt == 'show_icon') { ?>
						<i class="<?php echo esc_attr($font_icon); ?>" aria-hidden="true" style="font-size: <?php echo esc_attr($icon_size); ?>px; color: <?php echo esc_attr($icon_color); ?>;"></i>
					  <?php } ?>
				      <h4 class="flip-box-title" style="color: <?php echo esc_attr($color); ?>; font-size: <?php echo esc_attr($size); ?>px; line-height: <?php echo esc_attr($lineheight); ?>;">
				      		<?php echo esc_attr($title); ?>
				      </h4>
				      <p class="flip-box-desc" style="color: <?php echo esc_attr($descrcolor); ?>; font-size: <?php echo esc_attr($descrsize); ?>px;">
				        <?php echo esc_attr($desc); ?>
				      </p>
				    </div>
			    </div>
			  </div>
			  <div class="back" style="background: <?php echo esc_attr($bgcolor); ?>">
				<div style="display:table;width:100%;height:100%;">
			    	<div class="pad" style="display: table-cell !important; vertical-align: middle !important; padding: 10px;">
				      <?php echo wp_kses_post($content); ?>
				      <p style="text-align: center;">
				      	<?php if (!empty($url_txt)) { ?>
					      	<a href="<?php echo esc_url($url['url']); ?>" target="<?php echo esc_attr($url['target']); ?>" title="<?php echo esc_html($url['title']); ?>" class="mega_hvr_btn" style="color: <?php echo esc_attr($url_clr); ?>; background: <?php echo esc_attr($url_bg); ?>;">
					      		<?php echo esc_attr($url_txt); ?>
					      	</a>			      		
				      	<?php } ?>
				      </p>
				    </div>
			    </div>
			  </div>
			</div> 	
	    <?php } ?>

	    <?php if ($style == 'horizental') { ?>
	      	<div class="hover vc-ihe-panel <?php echo esc_attr($class); ?>" id="vc-flip-box-<?php echo esc_attr($some_id); ?>" style="height: <?php echo esc_attr($height); ?>px;">
			  <div class="front1" style="background: <?php echo esc_attr($front_bg); ?>;">
			  	<div style="display:table;width:100%;height:100%;">
				    <div class="pad" style="display: table-cell !important;vertical-align: middle !important; border: <?php echo esc_attr($border_width); ?>px <?php echo esc_attr($border_style); ?> <?php echo esc_attr($border_clr); ?>;">
				      <?php if ($info_opt == 'show_image') { ?>
						<img class="" src="<?php echo esc_attr($image_url); ?>" alt="<?php echo esc_attr($alt); ?>" style="border-radius: <?php echo esc_attr($radius); ?>; width: <?php echo esc_attr($image_size); ?>px;">			
					  <?php } ?>
					  <?php if ($info_opt == 'show_icon') { ?>
						<i class="<?php echo esc_attr($font_icon); ?>" aria-hidden="true" style="font-size: <?php echo esc_attr($icon_size); ?>px; color: <?php echo esc_attr($icon_color); ?>;"></i>
					  <?php } ?>
				      <h4 class="flip-box-title" style="color: <?php echo esc_attr($color); ?>; font-size: <?php echo esc_attr($size); ?>px; line-height: <?php echo esc_attr($lineheight); ?>;">
				      		<?php echo esc_attr($title); ?>
				      </h4>
				      <p class="flip-box-desc" style="color: <?php echo esc_attr($descrcolor); ?>; font-size: <?php echo esc_attr($descrsize); ?>px;">
				        <?php echo esc_attr($desc); ?>
				      </p>
				    </div>
			    </div>

			  </div>
			  <div class="back1" style="background: <?php echo esc_attr($bgcolor); ?>">
				<div style="display:table;width:100%;height:100%;">
			    	<div class="pad" style="display: table-cell !important;vertical-align: middle !important; padding: 10px;">
				      <?php echo wp_kses_post($content); ?>
				      <p style="text-align: center;">
				      	<?php if (!empty($url_txt)) { ?>
					      	<a href="<?php echo esc_url($url['url']); ?>" target="<?php echo esc_attr($url['target']); ?>" title="<?php echo esc_html($url['title']); ?>" class="mega_hvr_btn" style="color: <?php echo esc_attr($url_clr); ?>; background: <?php echo esc_attr($url_bg); ?>;">
					      		<?php echo esc_attr($url_txt); ?>
					      	</a>			      		
				      	<?php } ?>
				      </p>
				    </div>
			    </div>
			  </div>
			</div>
		<?php } ?>

		<?php if ($style == '3d') { ?>
			<div id="vc-flip-box-<?php echo esc_attr($some_id); ?>">
				<div class="flip-box-3d" style="height: <?php echo esc_attr($height); ?>px;">
					<div class="cube <?php echo esc_attr($class); ?>">
					    <div class="active-state" style="background: <?php echo esc_attr($bgcolor); ?>; height: <?php echo esc_attr($height); ?>px;transform-origin: center center -<?php echo esc_attr($height)/2; ?>px;">
					        <div style="display:table;width:100%;height:100%;">
						    	<div style="display: table-cell !important; vertical-align: middle !important; padding: 0 10px;">
							      <?php echo wp_kses_post($content); ?>
							      <p style="text-align: center; padding-top: 4px;">
							      	<?php if (!empty($url_txt)) { ?>
								      	<a href="<?php echo esc_url($url['url']); ?>" target="<?php echo esc_attr($url['target']); ?>" title="<?php echo esc_html($url['title']); ?>" class="mega_hvr_btn" style="color: <?php echo esc_attr($url_clr); ?>; background: <?php echo esc_attr($url_bg); ?>;">
								      		<?php echo esc_attr($url_txt); ?>
								      	</a>			      		
							      	<?php } ?>
							      </p>
							    </div>
						    </div>
					    </div>
					    <div class="default-state <?php echo esc_attr($css_class); ?>" style="height: <?php echo esc_attr($height); ?>px; transform-origin: center center -<?php echo esc_attr($height)/2; ?>px; background: <?php echo esc_attr($front_bg); ?>;">
					        <div style="display:table;width:100%;height:100%;">
					        	<div style="display: table-cell !important;vertical-align: middle !important; border: <?php echo esc_attr($border_width); ?>px <?php echo esc_attr($border_style); ?> <?php echo esc_attr($border_clr); ?>; padding: 0 10px;">
							        <?php if ($info_opt == 'show_image') { ?>
										<img class="" src="<?php echo esc_attr($image_url); ?>" alt="<?php echo esc_attr($alt); ?>" width="<?php echo esc_attr($image_size); ?>px" style="border-radius: <?php echo esc_attr($radius); ?>;">			
									<?php } ?>
									<?php if ($info_opt == 'show_icon') { ?>
										<i class="<?php echo esc_attr($font_icon); ?>" aria-hidden="true" style="font-size: <?php echo esc_attr($icon_size); ?>px; color: <?php echo esc_attr($icon_color); ?>;"></i>
									<?php } ?>
								    <h4 class="flip-box-title" style="color: <?php echo esc_attr($color); ?>; font-size: <?php echo esc_attr($size); ?>px; line-height: <?php echo esc_attr($lineheight); ?>;">
								      	<?php echo esc_attr($title); ?>
								    </h4>
								    <p class="flip-box-desc" style="color: <?php echo esc_attr($descrcolor); ?>; font-size: <?php echo esc_attr($descrsize); ?>px;">
								        <?php echo esc_attr($desc); ?>
								    </p>
					    		</div>
					    	</div>
					    </div>
					</div>
				</div>
			</div>
		<?php } ?>

		<style>
			@media only screen and (max-width: 480px) {
				#vc-flip-box-<?php echo esc_attr($some_id); ?> .flip-box-title {
					font-size: <?php echo esc_attr($titlesizembl); ?>px !important;
				}
				#vc-flip-box-<?php echo esc_attr($some_id); ?> .flip-box-desc {
					font-size: <?php echo esc_attr($descsizmbl); ?>px !important;
				}
				#vc-flip-box-<?php echo esc_attr($some_id); ?>.vc-ihe-panel, #vc-flip-box-<?php echo esc_attr($some_id); ?> .flip-box-3d{
					height: <?php echo esc_attr($heightmbl); ?>px !important;
				}
				#vc-flip-box-<?php echo esc_attr($some_id); ?> .flip-box-3d .active-state, #vc-flip-box-<?php echo esc_attr($some_id); ?> .flip-box-3d .default-state{
					height: <?php echo esc_attr($heightmbl); ?>px !important;
				}
			}
		</style>

		<?php
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Flip Box', 'mega-addons-for-visual-composer' ),
	"base" 			=> "mvc_flip_box",
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('Show flip box for Info', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/flipbox.png',
	'params' => array(
			array(
				"type" 			=> "dropdown",
				"heading" 		=> __( 'Style Flip Box', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "style",
				"description" 	=> __( 'select style', 'mega-addons-for-visual-composer' ),
				"group" 		=> 'General',
				"value" 		=> array(
					'Horizental'	=>	'horizental',
					'Vertical'	=>	'vertical',
					'3D'	=>	'3d',
				)
			),
			array(
				"type" 			=> "vc_number",
				"heading" 		=> __( 'Flip height', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "height",
				"description" 	=> __( 'Required. set flip box height e.g 200', 'mega-addons-for-visual-composer' ),
				'value' 		=> __( "200", 'mega-addons-for-visual-composer' ),
				"suffix" 		=> 'px',
				'max' 			=> '',
				"group" 		=> 'General',
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> __( 'Front Background', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "front_bg",
				"description" 	=> __( 'background color for front display', 'mega-addons-for-visual-composer' ),
				"group" 		=> 'General',
			),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> __( 'Border Styling', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "border_st",
				"group" 		=> 'General',
				"value"			=>	array(
					"Default"			=>		"default",
					"Custom Styling"	=>		"custom_border",
				)
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> __( 'Border Color', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "border_clr",
				"description" 	=> __( 'border color for front display', 'mega-addons-for-visual-composer' ),
				"dependency" => array('element' => "border_st", 'value' => 'custom_border'),
				"group" 		=> 'General',
			),
			array(
				"type" 			=> "vc_number",
				"heading" 		=> __( 'Border Width', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "border_width",
				"description" 	=> __( 'border width for front display', 'mega-addons-for-visual-composer' ),
				"dependency" => array('element' => "border_st", 'value' => 'custom_border'),
				"suffix" 		=> 'px',
				"group" 		=> 'General',
			),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> __( 'Border Style', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "border_style",
				"group" 		=> 'General',
				"dependency" => array('element' => "border_st", 'value' => 'custom_border'),
				"value"			=>	array(
						"Solid"		=>		"solid",
						"Dotted"	=>		"dotted",
						"Rige"		=>		"rige",
						"Dashed"	=>		"dashed",
						"Double"	=>		"double",
						"Groove"	=>		"groove",
						"Inset"		=>		"inset",
					)
			),
			array(
				"type" 			=> "dropdown",
				"heading" 		=> __( 'Link To', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "link_st",
				"group" 		=> 'General',
				"value"			=>	array(
					"None"			=>		"none",
					"Custom Link"	=>		"custom_link",
				)
			),
			array(
				"type" 			=> "vc_link",
				"heading" 		=> __( 'Link URL', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "url",
				"dependency" => array('element' => "link_st", 'value' => 'custom_link'),
				"group" 		=> 'General',
			),
			array(
				"type" 			=> "textfield",
				"heading" 		=> __( 'Link Text', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "url_txt",
				"dependency" => array('element' => "link_st", 'value' => 'custom_link'),
				"description" 	=> __( 'button text', 'mega-addons-for-visual-composer' ),
				"group" 		=> 'General',
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> __( 'Link Color', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "url_clr",
				"dependency" => array('element' => "link_st", 'value' => 'custom_link'),
				"description" 	=> __( 'button text color', 'mega-addons-for-visual-composer' ),
				"group" 		=> 'General',
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> __( 'Link Background', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "url_bg",
				"dependency" => array('element' => "link_st", 'value' => 'custom_link'),
				"description" 	=> __( 'button background color', 'mega-addons-for-visual-composer' ),
				"group" 		=> 'General',
			),
			array(
	            "type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Extra Class', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> 	"class",
				"description" 	=> 	__( 'Add extra class name that will be applied to the icon process, and you can use this class for your customizations.', 'mega-addons-for-visual-composer' ),
				"group" 		=> 	"General",
	        ),

	        array(
				"type" 			=> "vc_links",
				"param_name" 	=> "caption_url",
				"class"			=>	"ult_param_heading",
				"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #0073aa;font-weight:600;">' . '<a href="https://1.envato.market/02aNL" target="_blank" style="text-decoration: none;">' . esc_html__( 'Get the Pro version for more stunning elements and customization options.', 'mega-addons-for-visual-composer' ) . '</a>' . '</span>',
				"group" 		=> 'General',
			),

			// iCON/iMAGE
			
			array(
				"type" 			=> "dropdown",
				"heading" 		=> __( 'Select Image or Font icon', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "info_opt",
				"description" 	=> __( 'Select Image or Font icon', 'mega-addons-for-visual-composer' ),
				"group" 		=> 'Front Display',
				"value" 		=> array(
					'Image'	=>	'show_image',
					'Icon'	=>	'show_icon',
				)
			),
			array(
                "type" 			=> 	"attach_image",
				"heading" 		=> 	__( 'Image', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> 	"image_id",
				"description" 	=> 	__( 'Select the image', 'mega-addons-for-visual-composer' ),
				"group" 		=> 	'Front Display',
				"dependency" => array('element' => "info_opt", 'value' => 'show_image'),
            ),
            array(
	            "type" 			=> 	"textfield",
				"heading" 		=> 	__( 'Alternate Text', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> 	"alt",
				"description" 	=> 	__( 'It will be used as alt attribute of img tag', 'mega-addons-for-visual-composer' ),
				"dependency" => array('element' => "info_opt", 'value' => 'show_image'),
				"group" 		=> 	'Front Display',
	        ),
            array(
				"type" 			=> "textfield",
				"heading" 		=> __( 'Image Radius', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "radius",
				"description" 	=> __( 'Set Image radius in pixel or % e.g 50%', 'mega-addons-for-visual-composer' ),
				"group" 		=> 'Front Display',
				"dependency" => array('element' => "info_opt", 'value' => 'show_image'),
			),
			array(
				"type" 			=> "vc_number",
				"heading" 		=> __( 'Width', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "image_size",
				"description" 	=> __( 'Image width in pixel e.g 80', 'mega-addons-for-visual-composer' ),
				"group" 		=> 'Front Display',
				"suffix" 		=> 'px',
				"dependency" => array('element' => "info_opt", 'value' => 'show_image'),
			),
			array(
				"type" 			=> "iconpicker",
				"heading" 		=> __( 'Font icon', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "font_icon",
				"description" 	=> __( 'Select the font icon', 'mega-addons-for-visual-composer' ),
				"group" 		=> 'Front Display',
				"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
			),
			array(
				"type" 			=> "vc_number",
				"heading" 		=> __( 'Font size', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "icon_size",
				"description" 	=> __( 'Set icon font size in pixel e.g 30', 'mega-addons-for-visual-composer' ),
				"group" 		=> 'Front Display',
				"suffix" 		=> 'px',
				"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> __( 'Font Color', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "icon_color",
				"description" 	=> __( 'Set icon color', 'mega-addons-for-visual-composer' ),
				"group" 		=> 'Front Display',
				"dependency" => array('element' => "info_opt", 'value' => 'show_icon'),
			),

			// Fron Content 
			
			array(
				"type" 			=> "textfield",
				"heading" 		=> __( 'Title', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "title",
				"description" 	=> __( 'set title for front display', 'mega-addons-for-visual-composer' ),
				"group" 		=> 'Front Display',
			),
			array(
				"type" 			=> "textarea",
				"heading" 		=> __( 'Description', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "desc",
				"description" 	=> __( 'set description for front display', 'mega-addons-for-visual-composer' ),
				"group" 		=> 'Front Display',
			),
			array(
				"type" 			=> "vc_number",
				"heading" 		=> __( 'Line height', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "lineheight",
				"description" 	=> __( 'set line height for text e.g 1.5', 'mega-addons-for-visual-composer' ),
				'value' 		=> __( "1.5", 'mega-addons-for-visual-composer' ),
				"group" 		=> 'Front Display',
			),
			array(
				"type" 			=> "vc_number",
				"heading" 		=> __( 'Title (Font Size)', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "size",
				"description" 	=> __( 'set title font size for front display e.g 15', 'mega-addons-for-visual-composer' ),
				'value' 		=> __( "15", 'mega-addons-for-visual-composer' ),
				"suffix" 		=> 'px',
				"group" 		=> 'Front Display',
			),
			array(
				"type" 			=> "vc_number",
				"heading" 		=> __( 'Description (Font Size)', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "descrsize",
				"description" 	=> __( 'set description font size for front display e.g 13', 'mega-addons-for-visual-composer' ),
				'value' 		=> __( "13", 'mega-addons-for-visual-composer' ),
				"suffix" 		=> 'px',
				"group" 		=> 'Front Display',
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> __( 'Title color', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "color",
				"description" 	=> __( 'set title color', 'mega-addons-for-visual-composer' ),
				"group" 		=> 'Front Display',
			),
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> __( 'Description color', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "descrcolor",
				"description" 	=> __( 'set description color', 'mega-addons-for-visual-composer' ),
				"group" 		=> 'Front Display',
			),


			// Back Display 
			
			array(
				"type" 			=> "colorpicker",
				"heading" 		=> __( 'Background color', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> "bgcolor",
				"description" 	=> __( 'set background color', 'mega-addons-for-visual-composer' ),
				"group" 		=> 'Flip Display',
			),
			array(
	            "type" 			=> 	"textarea_html",
				"heading" 		=> 	__( 'Description', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> 	"content",
				"description" 	=> 	__( 'write detail about flip box', 'mega-addons-for-visual-composer' ),
				"group" 		=> 	'Flip Display',
				"value"			=> '<h3>Caption Text Here</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>',
        	),

	        	/* Typography
	        ================================================ */
        
	        array(
	            "type" 			=> 	"vc_number",
				"heading" 		=> 	__( 'Front Title Font Size (For Mobile)', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> 	"titlesizembl",
				"description" 	=> 	__( 'set in pixel e.g 16', 'mega-addons-for-visual-composer' ),
				"suffix" 		=> 'px',
				"group" 		=> 	"Typography",
	        ),
	        array(
	            "type" 			=> 	"vc_number",
				"heading" 		=> 	__( 'Front Description Font Size (For Mobile)', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> 	"descsizmbl",
				"description" 	=> 	__( 'set in pixel e.g 15', 'mega-addons-for-visual-composer' ),
				"suffix" 		=> 'px',
				"group" 		=> 	"Typography",
	        ),
	        array(
	            "type" 			=> 	"vc_number",
				"heading" 		=> 	__( 'Flip height (For Mobile)', 'mega-addons-for-visual-composer' ),
				"param_name" 	=> 	"heightmbl",
				"description" 	=> 	__( 'set in pixel e.g 200', 'mega-addons-for-visual-composer' ),
				"suffix" 		=> 'px',
				"group" 		=> 	"Typography",
	        ),
	),
) );

