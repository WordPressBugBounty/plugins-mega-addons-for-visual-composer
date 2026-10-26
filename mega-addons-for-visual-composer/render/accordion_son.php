<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_accordion_son extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'title'				=>		'',
			'title_align'		=>		'left',
			'titleradius'		=>		'',
			'title_padding'		=>		'10',
			'size'				=>		'16',
			'clr'				=>		'',
			'acc_id'			=>		'',
			'borderwidth'		=>		'0px 0px 0px 0px',
			'borderwidth2'		=>		'0px 0px 0px 0px',
			'borderclr'			=>		'',
			'borderclr2'		=>		'',
			'bgclr'				=>		'',
			'gradientbg'		=>		'',
			'bodybg'			=>		'',
		), $atts ) );
		$content = wpb_js_remove_wpautop($content);
		ob_start();
		global $maw_accordion_margin;
		?>
		<h3 class="ac-style" id="<?php echo esc_attr($acc_id); ?>" style="text-align: <?php echo esc_attr($title_align); ?>; margin-top: <?php echo esc_attr($maw_accordion_margin); ?>px; border-width: <?php echo esc_attr($borderwidth); ?>; border-style: solid; border-color: <?php echo esc_attr($borderclr); ?>; border-radius: <?php echo esc_attr($titleradius); ?>px; color: <?php echo esc_attr($clr); ?>; background: <?php echo esc_attr($bgclr); ?> <?php echo esc_attr($gradientbg); ?>; font-size: <?php echo esc_attr($size); ?>px; padding-top: <?php echo esc_attr($title_padding); ?>px; padding-bottom: <?php echo esc_attr($title_padding); ?>px;">
			<?php echo esc_attr($title); ?>
		</h3>
		<div class="mega-panel" style="margin-bottom: <?php echo esc_attr($maw_accordion_margin); ?>px; background: <?php echo esc_attr($bodybg); ?>; border-width: <?php echo esc_attr($borderwidth2); ?>; border-style: solid; border-color: <?php echo esc_attr($borderclr2); ?>;">
		  <?php echo wp_kses_post($content); ?>
		</div>

		<?php return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Accordion Settings', 'mega-addons-for-visual-composer' ),
	"base" 			=> "accordion_son",
	"as_child" 		=> array('only' => 'accordion_father'),
	"content_element" => true,
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer' ),
	"description" 	=> __('vertically stacked list of items', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/accordions.png',
	'params' => array(

		// Title Section

		array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Title', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"title",
			'admin_label' 	=> 	true,
			"description" 	=> 	__( 'display title', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Title',
        ),

		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Title Align', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"title_align",
			"group" 		=> 	'Title',
			"value"			=>	array(
				"Left"			=>	"left",
				"Center"		=>	"center",
				"Right"			=>	"right",
			)
		),

		array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Title Padding', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"title_padding",
			"description" 	=> 	__( 'from top and bottom', 'mega-addons-for-visual-composer' ),
			"value"			=>	"10",
			"suffix" 		=> 	'px',
			"group" 		=> 	"Title",
        ),
		array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Font Size', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"size",
			"description" 	=> 	__( 'set in pixel eg, 16', 'mega-addons-for-visual-composer' ),
			"value"			=>	"16",
			"suffix" 		=> 	'px',
			"group" 		=> 	'Title',
        ),
        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Title Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"clr",
			"group" 		=> 	'Title',
        ),

        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Title Background', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"bgclr",
			"group" 		=> 	'Title',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Title Background Gradient', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"gradientbg",
			"description" 	=> 	__( 'put three different colors inside for gradient effects or leave blank <a href="https://www.w3schools.com/csS/css3_gradients.asp">Further</a>', 'mega-addons-for-visual-composer' ),
			"value"			=>	"linear-gradient(141deg, #0fb8ad 0%, #9C27B0 51%, #FFEB3B 75%)",
			"group" 		=> 	'Title',
        ),

        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Extra ID', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"acc_id",
			"description" 	=> 	__( 'Add extra ID name that will be applied to the accordion tabs, and you can use this ID for your customizations.', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	"Title",
        ),

        // Detail Section

        array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Body Background', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "bodybg",
			"group" 		=> "Detail",
		),

        array(
            "type" 			=> 	"textarea_html",
			"heading" 		=> 	__( 'Detail', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"content",
			"group" 		=> 	'Detail',
        ),

        // Border Style
        
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Title Border Width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"borderwidth",
			"description" 	=> 	__( 'border width for title [top right bottom left]', 'mega-addons-for-visual-composer' ),
			"value"			=>	"0px 0px 0px 0px",
			"group" 		=> 	'Border',
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Title [Border Radius]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"titleradius",
			"suffix" 		=> 	'px',
			"group" 		=> 	'Border',
        ),
        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Title Border Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"borderclr",
			"description" 	=> 	__( 'color for title border', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Border',
        ),

        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Description Border Width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"borderwidth2",
			"description" 	=> 	__( 'border width for description [top right bottom left]', 'mega-addons-for-visual-composer' ),
			"value"			=>	"0px 0px 0px 0px",
			"group" 		=> 	'Border',
        ),
        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Description Border Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"borderclr2",
			"description" 	=> 	__( 'color for description border', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Border',
        ),

	),
) );
