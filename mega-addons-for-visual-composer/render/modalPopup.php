<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_modal_popup_box extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'animation'		=>		'Default',
			'top'			=>		'60',
			'width'			=>		'600',
			'bodybg'		=>		'#1a94ad',
			'btn_animation'	=>		'hvr-fade',
			'btnalign'		=>		'left',
			'btntext'		=>		'',
			'btntext2'		=>		'',
			'btnsize'		=>		'18',
			'leftpadding'	=>		'20',
			'toppadding'	=>		'5',
			'btn_border'	=>		'#269CE9',
			'border_width'	=>		'0',
			'btnradius'		=>		'3',
			'btnclr'		=>		'',
			'hoverclr'		=>		'',
			'btnbg'			=>		'',
			'btn_icon' 		=> 		'',
			'hoverbg'		=>		'',
			'titlealign'	=>		'left',
			'titletext'		=>		'Image Gallery',
			'titlesize'		=>		'20',
			'titleline'		=>		'2',
			'titleclr'		=>		'',
			'titlebg'		=>		'',
			'titleborder'	=>		'',
			'bgclr'			=>		'#ececec',
			'contentpad'	=>		'15',
			'contentpad2'	=>		'15',
		), $atts ) );
		$some_id = VC_MEGA::next_instance_id();
		$modal_title_id = 'popup-title-' . $some_id;
		wp_enqueue_style( 'animate-css', plugins_url( '../css/animate.css' , __FILE__ ), array(), VC_MEGA::VERSION);
		wp_enqueue_style( 'modal-popup-btn', plugins_url( '../css/modal-popup-btn.css' , __FILE__ ), array(), VC_MEGA::VERSION);
		wp_enqueue_script( 'modal-popup-js', plugins_url( '../js/modal-popup.js' , __FILE__ ), array(), VC_MEGA::VERSION, true );
		$content = wpb_js_remove_wpautop($content, true);
		ob_start(); ?>
		<!-- HTML DESIGN HERE -->
		<div class="maw__modal_popup_box" data-bodybg="<?php echo esc_attr($bodybg); ?>" style="justify-content: <?php echo esc_attr($btnalign); ?>; display: flex;">
			<?php if ($btn_animation == 'button--winona' || $btn_animation == 'hvr-fade') { ?>
				<button class="mega-uae-btn model-popup-btn popup-<?php echo esc_attr($some_id); ?> <?php echo esc_attr($btn_animation); ?>" data-id="popup-<?php echo esc_attr($some_id); ?>" style="color: <?php echo esc_attr($btnclr); ?>;background: <?php echo esc_attr($btnbg); ?> ; border: <?php echo esc_attr($border_width); ?>px solid <?php echo esc_attr($btn_border) ?>; border-radius: <?php echo esc_attr($btnradius); ?>px; font-size: <?php echo esc_attr($btnsize); ?>px; padding: <?php echo esc_attr($toppadding); ?>px <?php echo esc_attr($leftpadding); ?>px;" data-text=""> 
					<span><i style="padding-right: 5px;" class="fa <?php echo esc_attr($btn_icon); ?>"> </i> <?php echo esc_attr($btntext); ?></span>			
					<span style="background: <?php echo esc_attr($hoverbg); ?>; padding: <?php echo esc_attr($toppadding); ?>px 0; color: <?php echo esc_attr($hoverclr); ?>;" class="modal-popup-after"><?php echo esc_attr($btntext2); ?></span>
				</button>
				<div style="clear: both;"></div>
			<?php } ?>

			<?php if ($btn_animation == 'button--rayen' || $btn_animation == 'button--moema' || $btn_animation == 'button--ujarak') { ?>
				<button class="mega-uae-btn model-popup-btn popup-<?php echo esc_attr($some_id); ?> <?php echo esc_attr($btn_animation); ?>" data-id="popup-<?php echo esc_attr($some_id); ?>" style="color: <?php echo esc_attr($btnclr); ?>;background: <?php echo esc_attr($btnbg); ?> ; border: <?php echo esc_attr($border_width); ?>px solid <?php echo esc_attr($btn_border) ?>; border-radius: <?php echo esc_attr($btnradius); ?>px; font-size: <?php echo esc_attr($btnsize); ?>px; padding: <?php echo esc_attr($toppadding); ?>px <?php echo esc_attr($leftpadding); ?>px;" data-text=""> 
					<span style="background: <?php echo esc_attr($hoverbg); ?>; padding: <?php echo esc_attr($toppadding); ?>px 0; color: <?php echo esc_attr($hoverclr); ?>;" class="modal-popup-before"><?php echo esc_attr($btntext2); ?></span>
					<span><i style="padding-right: 5px;" class="fa <?php echo esc_attr($btn_icon); ?>"> </i> <?php echo esc_attr($btntext); ?></span>			
				</button>
				<div style="clear: both;"></div>
			<?php } ?>

			<dialog class="mega-model-popup <?php echo esc_attr($animation); ?> animated" id="popup-<?php echo esc_attr($some_id); ?>" aria-labelledby="<?php echo esc_attr($modal_title_id); ?>" aria-modal="true" data-top="<?php echo esc_attr($top); ?>" style="position:fixed; margin-top: <?php echo esc_attr($top); ?>px; width: 95%; max-width: <?php echo esc_attr($width); ?>px; background: <?php echo esc_attr($bgclr); ?>;">
				<button type="button" class="b-close" aria-label="Close dialog"><span><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../images/cross.png' ); ?>" alt="" aria-hidden="true"></span></button>
			    <div class="model-popup-container">
				<h2 id="<?php echo esc_attr($modal_title_id); ?>" style="border-bottom: 1px solid <?php echo esc_attr($titleborder); ?>; text-align: <?php echo esc_attr($titlealign); ?>; font-size: <?php echo esc_attr($titlesize); ?>px; line-height: <?php echo esc_attr($titleline); ?>; color: <?php echo esc_attr($titleclr); ?>; background: <?php echo esc_attr($titlebg); ?>; margin: 0px; padding: 0px 20px;">
			    		<?php echo esc_attr($titletext); ?>
			    	</h2>
			      <span style="padding: <?php echo esc_attr($contentpad) ?>px <?php echo esc_attr($contentpad2); ?>px; display: block;">
			      	<?php echo wp_kses_post($content); ?>
			      </span>
			    </div>
			</dialog>
		</div>
		<style>
			.maw__modal_popup_box .popup-<?php echo esc_attr($some_id); ?>:hover {
				background: <?php echo esc_attr($hoverbg); ?> !important;
				color: <?php echo esc_attr($hoverclr); ?> !important;
			}

		</style>
        <!-- HTML END DESIGN HERE -->
		<?php
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Modal Popup', 'mega-addons-for-visual-composer' ),
	"base" 			=> "modal_popup_box",
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('Add modal box in your content', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/popup.png',
	'params' => array(
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Animation Effect', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"animation",
			"description" 	=> 	esc_html__( 'animation style on visible', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
			"value"			=>	array(
				"Default"		=>	"Default",
				"bounce"		=>	"bounce",
				"bounceIn"		=>	"bounceIn",
				"rubberBand"	=>	"rubberBand",
				"shake"			=>	"shake",
				"swing"			=>	"swing",
				"bounceInDown"	=>	"bounceInDown",
				"bounceInLeft"	=>	"bounceInLeft",
				"bounceInRight"	=>	"bounceInRight",
				"bounceInUp"	=>	"bounceInUp",
				"fadeInLeft"	=>	"fadeInLeft",
				"fadeInRight"	=>	"fadeInRight",
				"fadeInDown"	=>	"fadeInDown",
				"flash"			=>	"flash",
				"pulse"			=>	"pulse",
				"tada"			=>	"tada",
				"wobble"		=>	"wobble",
				"flip"			=>	"flip",
				"flipInX"		=>	"flipInX",
				"flipInY"		=>	"flipInY",
				"lightSpeedIn"	=>	"lightSpeedIn",
				"rotateIn"		=>	"rotateIn",
				"rotateInDownLeft"	=>	"rotateInDownLeft",
				"rotateInDownRight"	=>	"rotateInDownRight",
				"rotateInUpLeft"	=>	"rotateInUpLeft",
				"rotateInUpRight"	=>	"rotateInUpRight",
				"slideInUp"		=>	"slideInUp",
				"slideInDown"	=>	"slideInDown",
				"slideInRight"	=>	"slideInRight",
				"zoomIn"	=>	"zoomIn",
				"zoomInDown"	=>	"zoomInDown",
				"zoomInLeft"	=>	"zoomInLeft",
				"zoomInRight"	=>	"zoomInRight",
				"zoomInUp"		=>	"zoomInUp",
				"rollIn"		=>	"rollIn",
			)
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Top', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"top",
			"description" 	=> 	__( 'Popup position from top', 'mega-addons-for-visual-composer' ),
			"value" 		=> __( "60", "mega-addons-for-visual-composer" ),
			"suffix" 		=> 'px',
			"group" 		=> 	'General',
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Popup Width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"width",
			"description" 	=> 	__( 'set in pixel', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 'px',
			"value" 		=> __( "600", "mega-addons-for-visual-composer" ),
			"group" 		=> 	'General',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Popup Background', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"bodybg",
			"description" 	=> 	__( 'Popup body background color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
		),

		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #0073aa;font-weight:600;">' . '<a href="https://1.envato.market/02aNL" target="_blank" style="text-decoration: none;">' . esc_html__( 'Get the Pro version for more stunning elements and customization options.', 'mega-addons-for-visual-composer' ) . '</a>' . '</span>',
			"group" 		=> 'General',
		),

		array(
			"type" 			=> "iconpicker",
			"heading" 		=> __( 'Select icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_icon",
			"description" 	=> __( 'it will show within text', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Button Setting',
		),

		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Button Effects', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"btn_animation",
			"edit_field_class" => "vc_col-sm-6",
			"group" 		=> 	'Button Setting',
			"value"			=>	array(
				"Fade"				=>	"hvr-fade",
				"Winona"			=>	"button--winona",
				"Rayen"				=>	"button--rayen",
				"Moema"				=>	"button--moema",
				"Ujarak"			=>	"button--ujarak",
			)
		),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Button Align', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"btnalign",
			"edit_field_class" => "vc_col-sm-6",
			"group" 		=> 	'Button Setting',
			"value"			=>	array(
				"Left"			=>	"left",
				"Center"		=>	"center",
				"Right"			=>	"right",
			)
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Button Text', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"btntext",
			"description" 	=> 	__( 'text for button', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Button Setting',
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Button Text 2', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"btntext2",
			"description" 	=> 	__( 'it will show on hover', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "btn_animation", 'value' => array('button--winona', 'button--rayen')),
			"group" 		=> 	'Button Setting',
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Padding', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"toppadding",
			"edit_field_class" => "vc_col-sm-4",
			"description" 	=> 	__( 'top bottom', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 'px',
			"value" 		=> __( "5", "mega-addons-for-visual-composer" ),
			"group" 		=> 	'Button Setting',
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Padding', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"leftpadding",
			"edit_field_class" => "vc_col-sm-4",
			"description" 	=> 	__( 'left, right', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 'px',
			"value" 		=> __( "20", "mega-addons-for-visual-composer" ),
			"group" 		=> 	'Button Setting',
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Font Size', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"btnsize",
			"edit_field_class" => "vc_col-sm-4",
			"suffix" 		=> 'px',
			"value" 		=> __( "18", "mega-addons-for-visual-composer" ),
			"group" 		=> 	'Button Setting',
		),

		/** border **/

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Border Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_border",
			"edit_field_class" => "vc_col-sm-4",
			"group" 		=> 'Button Setting',
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Border Width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "border_width",
			"edit_field_class" => "vc_col-sm-4",
			"value"			=>	"0",
			"suffix" 		=> 'px',
			"group" 		=> 'Button Setting',
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Border Radius', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"btnradius",
			"edit_field_class" => "vc_col-sm-4",
			"suffix" 		=> 'px',
			"value" 		=> __( "5", "mega-addons-for-visual-composer" ),
			"group" 		=> 	'Button Setting',
		),

		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #302f2f;font-weight:600;">' . esc_html__( 'Color Settings', 'mega-addons-for-visual-composer' ) . '</span>',
			"group" 		=> 'Button Setting',
		),

		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"btnclr",
			"edit_field_class" => "vc_col-sm-6",
			"group" 		=> 	'Button Setting',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Hover Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"hoverclr",
			"edit_field_class" => "vc_col-sm-6",
			"group" 		=> 	'Button Setting',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"btnbg",
			"edit_field_class" => "vc_col-sm-6",
			"group" 		=> 	'Button Setting',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background Hover Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"hoverbg",
			"edit_field_class" => "vc_col-sm-6",
			"group" 		=> 	'Button Setting',
		),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Title Align', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"titlealign",
			"group" 		=> 	'Title',
			"value"			=>	array(
				"Left"		=>	"left",
				"Center"		=>	"center",
				"Right"		=>	"right",
			)
		),
		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Title', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"titletext",
			"description" 	=> 	__( 'title text', 'mega-addons-for-visual-composer' ),
			"value" 		=> __( "Image Gallery", "mega-addons-for-visual-composer" ),
			"group" 		=> 	'Title',
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Font Size', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"titlesize",
			"description" 	=> 	__( 'write in pixel e.g 20', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 'px',
			"value" 		=> __( "20", "mega-addons-for-visual-composer" ),
			"group" 		=> 	'Title',
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Line Height', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"titleline",
			"description" 	=> 	__( 'it increases the title section height, default 2', 'mega-addons-for-visual-composer' ),
			"value" 		=> __( "2", "mega-addons-for-visual-composer" ),
			"group" 		=> 	'Title',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"titleclr",
			"description" 	=> 	__( 'title color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Title',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"titlebg",
			"description" 	=> 	__( 'title background color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Title',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Border Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"titleborder",
			"description" 	=> 	__( 'below title border color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Title',
		),
		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"bgclr",
			"description" 	=> 	__( 'Content background color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Popup Content',
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Padding [Top Bottom]', 'mega-addons-for-visual-composer' ),
			"edit_field_class" => "vc_col-sm-4 wdo_items_to_show wdo_margin_bottom",
			"param_name" 	=> "contentpad",
			"value"			=>	"15",
			"suffix"		=>	"px",
			"group" 		=> 'Popup Content',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Padding [Right Left]', 'mega-addons-for-visual-composer' ),
			"edit_field_class" => "vc_col-sm-4 wdo_items_to_show wdo_margin_bottom",
			"param_name" 	=> "contentpad2",
			"value"			=>	"15",
			"suffix"		=>	"px",
			"group" 		=> 'Popup Content',
		),
		array(
			"type" 			=> 	"textarea_html",
			"heading" 		=> 	__( 'You can also use shortcode', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"content",
			"group" 		=> 	'Popup Content',
		),
	),
) );

