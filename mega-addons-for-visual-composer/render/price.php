<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_mvc_price_listing extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'style' 				=> 'price_style_1',
			'offer_visibility' 		=> 'none',
			'offer_text' 			=> '',
			'offer_bg' 				=> '',
			'price_title' 			=> '',
			'subtitle' 				=> '',
			'price_visibility' 		=> 'block',
			'price_currency' 		=> '',
			'price_amount' 			=> '',
			'price_plan' 			=> '',
			'btn_text' 				=> '',
			'btn_url' 				=> '',
			'price_bg' 				=> '',
			'top_bg' 				=> '',
			'title_clr' 			=> '',
			'amount_clr' 			=> '',
			'featured' 				=> 'disable',
			'zoom' 					=> '0',
			'titlesize'				=>	'',
			'amountsize'			=>	'',
			'planesize'				=>	'',
			'btnsize'				=>	'',
		), $atts ) );	
		$btn_url = vc_build_link($btn_url);
		wp_enqueue_style( 'price-listing-css', plugins_url( '../css/price_listing.css' , __FILE__ ), array(), VC_MEGA::VERSION);
		$content = wpb_js_remove_wpautop($content, true);
		ob_start(); ?>


		<?php switch ($style) {
			case 'design1':
				include 'price-table/price1.php';
				break;
			case 'mega-price-table-2':
				include 'price-table/price2.php';
				break;
			case 'mega-price-table-3':
				include 'price-table/price2.php';
				break;
			case 'mega-price-table-4':
				include 'price-table/price4.php';
				break;
			case 'mega-price-table-5':
				include 'price-table/price5.php';
				break;
			
			default:
				include 'price-table/price1.php';
				break;
		} ?>

		<?php
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Price Table', 'mega-addons-for-visual-composer' ),
	"base" 			=> "mvc_price_listing",
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('Create nice looking price tables', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/price.png',
	'params' => array(
		array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Select Layout', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"style",
			"group" 		=> 	'Price Header',
			"description" 	=> 	esc_html__( '3 More Designs in', 'mega-addons-for-visual-composer' ) . ' ' . '<a href="https://1.envato.market/02aNL" target="_blank">' . esc_html__( 'Pro Version', 'mega-addons-for-visual-composer' ) . '</a>',
			"value" 		=>  array(
				'Design 1'		=>  'design1',
				'Design 2'		=>  'mega-price-table-2',
				'Design 3'		=>  'mega-price-table-3',
				'Design 4'		=>  'mega-price-table-4',
				'Design 5'		=>  'mega-price-table-5',
			)
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Price Title', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"price_title",
			"description" 	=> 	__( 'It will be used as price package name', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Price Header',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Price Subtitle', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"subtitle",
			"description" 	=> 	__( 'It will show with title', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "style", 'value' => array('design7', 'design8')),
			"group" 		=> 	'Price Header',
        ),
        array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Show/Hide price amount', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"price_visibility",
			"description" 	=> 	__( 'Select Show or Hide amount and currency ', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Price Header',
			"value" 		=>  array(
				'Show' =>  'block',
				'Hide' =>  'none',
			)
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Currency sign', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"price_currency",
			"description" 	=> 	__( 'Write currency sign e.g "$"', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "price_visibility", 'value' => 'block'),
			"group" 		=> 	'Price Header',
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Amount', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"price_amount",
			"description" 	=> 	__( 'Write amount in number e.g 299', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "price_visibility", 'value' => 'block'),
			"group" 		=> 	'Price Header',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Price plan', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"price_plan",
			"description" 	=> 	__( 'Price plan e.g "per month"', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "price_visibility", 'value' => 'block'),
			"group" 		=> 	'Price Header',
        ),
        array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Set Featured', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"featured",
			"dependency" => array('element' => "style", 'value' => array('mega-price-table-2', 'mega-price-table-3', 'mega-price-table-4', 'mega-price-table-5', 'design6', 'design7', 'design8')),
			"group" 		=> 	'Price Header',
			"value"			=>	array(
				"Disable"		=>		"disable",
				"Enable"		=>		"transform",
			)
        ),
        array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Scale Zoom', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"zoom",
			"description" 	=> 	__( 'It will prominent than others price table', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "featured", 'value' => "transform"),
			"group" 		=> 	'Price Header',
			"value" 		=>  array(
				'3' 	=>  '3',
				'4' 	=>  '4',
				'5' 	=>  '5',
				'6' 	=>  '6',
				'7' 	=>  '7',
				'8' 	=>  '8',
				'9' 	=>  '9',
			)
        ),

        array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #0073aa;font-weight:600;">' . '<a href="https://1.envato.market/02aNL" target="_blank" style="text-decoration: none;">' . esc_html__( 'Get the Pro version for more stunning elements and customization options.', 'mega-addons-for-visual-composer' ) . '</a>' . '</span>',
			"group" 		=> 'Price Header',
		),

		array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Show/Hide Offer', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"offer_visibility",
			"description" 	=> 	__( 'Select Show or Hide offer ', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "style", 'value' => 'design1'),
			"group" 		=> 	'Offer',
			"value" 		=>  array(
				'Hide' =>  'none',
				'Show' =>  'block',
			)
        ),
		array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Offer text', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"offer_text",
			"description" 	=> 	__( 'Write text for showing best offer in Ribbon e.g BEST', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "offer_visibility", 'value' => 'block'),
			"group" 		=> 	'Offer',
        ),
        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Offer Background color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"offer_bg",
			"description" 	=> 	__( 'background color of offer', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "offer_visibility", 'value' => 'block'),
			"group" 		=> 	'Offer',
        ),
        /* Features */

        array(
			"type" 			=> "textarea_html",
			"heading" 		=> __( 'Caption Text', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "content",
			"description" 	=> __( 'Enter your pricing content. You can use a UL list as shown by default but anything would really work!', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Features',
			"value"			=> '<li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li>'
		),

        /* Button */

        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Button Text', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"btn_text",
			"description" 	=> 	__( 'Button text name', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Button',
        ),

        array(
            "type" 			=> 	"vc_link",
			"heading" 		=> 	__( 'Button Url', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"btn_url",
			"description" 	=> 	__( 'Write Button URL for link', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Button',
        ),

        /* colors */

        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Title color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"title_clr",
			"description" 	=> 	__( 'set price title color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Color',
        ),
        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Price Amount Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"amount_clr",
			"description" 	=> 	__( 'set price amount color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Color',
        ),

        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Header Background color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"top_bg",
			"description" 	=> 	__( 'Top Header and button background color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Color',
        ),

        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Body Background', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"price_bg",
			"description" 	=> 	__( 'Set complete background color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Color',
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Title (Font Size)', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"titlesize",
			"description" 	=> 	__( 'Set in pixel eg, 30 or leave blank for default', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 'px',
			"group" 		=> 	'Typography',
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Price Amount (Font Size)', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"amountsize",
			"description" 	=> 	__( 'Set in pixel eg, 40 or leave blank for default', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 'px',
			"group" 		=> 	'Typography',
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Price Plan (Font Size)', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"planesize",
			"description" 	=> 	__( 'Set in pixel eg, 12 or leave blank for default', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 'px',
			"group" 		=> 	'Typography',
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Button Text (Font Size)', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"btnsize",
			"description" 	=> 	__( 'Set in pixel eg, 17 or leave blank for default', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 'px',
			"group" 		=> 	'Typography',
        ),
	),
) );

