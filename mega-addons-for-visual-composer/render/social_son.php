<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_social_vc_son extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'style' 	=> 		'default',
			'margin'	=>		'10',
			'icon'		=>		'',
			'text'		=>		'icontext',
			'width'		=>		'40',
			'height'	=>		'40',
			'size'		=>		'20',
			'radius'	=>		'',
			'url'		=>		'#0',
			'target'	=>		'',
			'clr'		=>		'',
			'bgclr'		=>		'',
			'hoverclr'	=>		'',
			'hoverbg'	=>		'',
		), $atts ) );
		$url = vc_build_link($url);
		$content = wpb_js_remove_wpautop($content, true);
		wp_enqueue_style( 'social-icons-css', plugins_url( '../css/socialicons.css' , __FILE__ ), array(), VC_MEGA::VERSION);
		ob_start(); ?>
		<?php if ($style == 'default') { ?>
			<div id="mega-social-btn" style="margin: 0 <?php echo esc_attr($margin); ?>px;">
				<a href="<?php echo esc_url($url['url']); ?>" target="<?php echo esc_attr($url['target']); ?>" title="<?php echo esc_html($url['title']); ?>" style="font-size: <?php echo esc_attr($size); ?>px; border-radius: <?php echo esc_attr($radius); ?>; color: <?php echo esc_attr($clr); ?>; background: <?php echo esc_attr($bgclr); ?>; width: <?php echo esc_attr($width); ?>px; height: <?php echo esc_attr($height); ?>px; line-height: <?php echo esc_attr($height); ?>px;" data-onhovercolor="<?php echo esc_attr($hoverclr); ?>" data-onhoverbg="<?php echo esc_attr($hoverbg); ?>" data-onleavebg="<?php echo esc_attr($bgclr); ?>" data-onleavecolor="<?php echo esc_attr($clr); ?>">
					<i class="<?php echo esc_attr($icon); ?>" aria-hidden="true"></i>
				</a>
			</div>
		<?php }

		if ($style == 'effect1') { ?>
			<!-- Mega Social Icons Style 1 -->
		    <div class="mega-social-icons" style="margin: 0 <?php echo esc_attr($margin); ?>px;">
				<a href="<?php echo esc_url($url['url']); ?>" target="<?php echo esc_attr($url['target']); ?>" title="<?php echo esc_html($url['title']); ?>" class="icon-button" style="font-size: <?php echo esc_attr($size); ?>px; width: <?php echo esc_attr($width) ?>px; height: <?php echo esc_attr($width); ?>px; line-height: <?php echo esc_attr($width); ?>px; border-radius: <?php echo esc_attr($radius); ?>; background-color: <?php echo esc_attr($bgclr); ?>;">
					<i class="<?php echo esc_attr($icon); ?>" aria-hidden="true" style="color: <?php echo esc_attr($clr) ?>; width: <?php echo esc_attr($width) ?>px; height: <?php echo esc_attr($height); ?>px; line-height: <?php echo esc_attr($height); ?>px;" data-onhovercolor="<?php echo esc_attr($hoverclr); ?>" data-onleavecolor="<?php echo esc_attr($clr); ?>"></i>
					<span style="border-radius: <?php echo esc_attr($radius); ?>; background-color: <?php echo esc_attr($hoverbg); ?>; width: <?php echo esc_attr($width) ?>px; height: <?php echo esc_attr($height); ?>px;"></span>
				</a>
			</div>
		<?php }

		if ($style == 'effect2') { ?>
			<div class="mega-social-icons2" style="margin: 0 <?php echo esc_attr($margin); ?>px;">
				<a href="<?php echo esc_url($url['url']); ?>" target="<?php echo esc_attr($url['target']); ?>" title="<?php echo esc_html($url['title']); ?>" class="icoRss" style="font-size: <?php echo esc_attr($size); ?>px; border-radius: <?php echo esc_attr($radius); ?>; color: <?php echo esc_attr($clr); ?>; background: <?php echo esc_attr($bgclr); ?>; width: <?php echo esc_attr($width); ?>px; height: <?php echo esc_attr($height); ?>px; line-height: <?php echo esc_attr($height); ?>px;" data-onhovercolor="<?php echo esc_attr($hoverclr); ?>" data-onhoverbg="<?php echo esc_attr($hoverbg); ?>" data-onleavebg="<?php echo esc_attr($bgclr); ?>" data-onleavecolor="<?php echo esc_attr($clr); ?>">
					<i class="<?php echo esc_attr($icon); ?>" aria-hidden="true"></i>
				</a>
			</div>
		<?php }

		if ($style == 'effect3') { ?>
			<div id="mega-social-icons3" style="margin: 0 <?php echo esc_attr($margin); ?>px;">
				<div class="social-buttons">
					<a class="social-button" href="<?php echo esc_url($url['url']); ?>" target="<?php echo esc_attr($url['target']); ?>" title="<?php echo esc_html($url['title']); ?>" style="font-size: <?php echo esc_attr($size); ?>px; color: <?php echo esc_attr($clr); ?>; background: <?php echo esc_attr($bgclr); ?>; width: <?php echo esc_attr($width) ?>px; height: <?php echo esc_attr($height); ?>px; line-height: <?php echo esc_attr($height)-4; ?>px;" data-onhovercolor="<?php echo esc_attr($hoverclr); ?>" data-onleavecolor="<?php echo esc_attr($clr); ?>">
						<span style="background: <?php echo esc_attr($hoverbg); ?>"></span>
						<i class="<?php echo esc_attr($icon); ?>"></i>
					</a>
				</div>
			</div>
		<?php }

		if ($style == 'effect4') { ?>
			<a class="social-button" href="<?php echo esc_url($url['url']); ?>" target="<?php echo esc_attr($url['target']); ?>" title="<?php echo esc_html($url['title']); ?>">			
				<div id="dualbtn" style="border-radius: <?php echo esc_attr($radius); ?>; width: <?php echo esc_attr($width) ?>px; font-size: <?php echo esc_attr($size) ?>px; background: <?php echo esc_attr($bgclr); ?>; margin: 0 <?php echo esc_attr($margin); ?>px;">
			    	<div class="btnicon" style="height: <?php echo esc_attr($height)-12; ?>px; line-height: <?php echo esc_attr($height)-12; ?>px;">
			    		<i class="<?php echo esc_attr($icon); ?>" style="color: <?php echo esc_attr($clr); ?>;"></i>
			    	</div>
			    	<div class="btntext" style="height: <?php echo esc_attr($height)-12; ?>px; line-height: <?php echo esc_attr($height)-12; ?>px;">
			    		<span style="color: <?php echo esc_attr($clr); ?>;"><?php echo esc_attr($text); ?></span>
			    	</div>
			    	<div class="clearfix"></div>
			    </div>
			</a>	
		<?php }

		if ($style == 'effect5') { ?>
			<div id="mega-social-btn" class="text-shadow" style="margin: 0 <?php echo esc_attr($margin); ?>px;">
				<a href="<?php echo esc_url($url['url']); ?>" target="<?php echo esc_attr($url['target']); ?>" title="<?php echo esc_html($url['title']); ?>" style="font-size: <?php echo esc_attr($size); ?>px; border-radius: <?php echo esc_attr($radius); ?>; color: <?php echo esc_attr($clr); ?>; background: <?php echo esc_attr($bgclr); ?>; width: <?php echo esc_attr($width); ?>px; height: <?php echo esc_attr($height); ?>px; line-height: <?php echo esc_attr($height); ?>px;" data-onhovercolor="<?php echo esc_attr($hoverclr); ?>" data-onhoverbg="<?php echo esc_attr($hoverbg); ?>" data-onleavebg="<?php echo esc_attr($bgclr); ?>" data-onleavecolor="<?php echo esc_attr($clr); ?>">
					<i class="<?php echo esc_attr($icon); ?>" aria-hidden="true"></i>
				</a>
			</div>
		<?php }

		return ob_get_clean();
	}
}


vc_map( array(
	"base" 			=> "social_vc_son",
	"name" 			=> __( 'Icon Setting', 'mega-addons-for-visual-composer' ),
	"as_child" 		=> array('only' => 'social_vc_father'),
	"content_element" => true,
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer' ),
	"description" 	=> __('choose style', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/social.png',
	'params' => array(
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Social Effects', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"style",
			"description" 	=> 	__( 'choose style', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"value" 		=> 	array(
				"Defaul" 			=> 	"default",
				"Glow" 				=> 	"effect1",
				"Rotate X" 			=> 	"effect2",
				"Slide" 			=> 	"effect3",
				"Icon & Text" 		=> 	"effect4",
				"Shadow" 			=> 	"effect5",
			)
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Margin', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"margin",
			"description" 	=> 	__( 'space between two social icons eg 10', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"suffix" 		=> 'px',
			'value' 		=> __( "10", 'mega-addons-for-visual-composer' ),
		),
		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"width",
			"description" 	=> 	__( 'social icon width in pixel', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"suffix" 		=> 'px',
			'value' 		=> __( "40", 'mega-addons-for-visual-composer' ),
		),

		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Height', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"height",
			"description" 	=> 	__( 'social icon height in pixel', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			"suffix" 		=> 'px',
			'value' 		=> __( "40", 'mega-addons-for-visual-composer' ),
		),

		array(
			"type" 			=> 	"vc_link",
			"heading" 		=> 	__( 'Social URL', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"url",
			"description" 	=> 	__( 'write social url', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
			'value' 		=> __( "#0", 'mega-addons-for-visual-composer' ),
		),

		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #0073aa;font-weight:600;">' . '<a href="https://1.envato.market/02aNL" target="_blank" style="text-decoration: none;">' . esc_html__( 'Get the Pro version for more stunning elements and customization options.', 'mega-addons-for-visual-composer' ) . '</a>' . '</span>',
			"group" 		=> 'General',
		),

		array(
			"type" 			=> 	"iconpicker",
			"heading" 		=> 	__( 'Social Icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"icon",
			"description" 	=> 	__( 'choose social icon', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Font Icon',
		),

		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Icon Name', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"text",
			"description" 	=> 	__( 'It will show with icon', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "style", 'value' => 'effect4'),
			"group" 		=> 'Font Icon',
		),

		array(
			"type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Font size', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"size",
			"description" 	=> 	__( 'icon font size in pixel', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Font Icon',
			"suffix" 		=> 'px',
			'value' 		=> __( "20", 'mega-addons-for-visual-composer' ),
		),

		array(
			"type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Border Radius', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"radius",
			"description" 	=> 	__( 'border radius from edges eg, 5px or 50%', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Font Icon',
			'value' 		=> __( "0px", 'mega-addons-for-visual-composer' ),
		),

		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Icon Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"clr",
			"group" 		=> 'Color',
		),

		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"bgclr",
			"group" 		=> 'Color',
		),

		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Hover Icon Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"hoverclr",
			"group" 		=> 'Color',
		),

		array(
			"type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Hover Background Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"hoverbg",
			"group" 		=> 'Color',
		),
	),
) );
