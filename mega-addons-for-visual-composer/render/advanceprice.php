<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_mvc_advance_listing extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'offer_visibility' 		=> 'none',
			'offer_text' 			=> '',
			'offer_bg' 				=> '',
			'price_margin' 			=> '',
			'price_title' 			=> '',
			'price_visibility' 		=> 'block',
			'price_amount' 			=> '',
			'price_fontsize' 		=> '35',
			'price_plan' 			=> 'month',
			'feature_align' 		=> '',
			'feature_size' 			=> '13px',
			'btn_visibility' 		=> '',
			'btn_text' 				=> '',
			'btn_url' 				=> '',
			'amount_clr' 			=> '',
			'price_bg' 				=> '',
			'top_bg' 				=> '',
			'text_clr' 				=> '',
		), $atts ) );
		$btn_url = vc_build_link($btn_url);
		wp_enqueue_style( 'advanced-listing-css', plugins_url( '../css/ad_listing.css' , __FILE__ ), array(), VC_MEGA::VERSION);
		$content = wpb_js_remove_wpautop($content, true);
		ob_start(); ?>
		
		<div class="price_table_2" style="background-color: <?php echo esc_attr($price_bg); ?>; margin-top: <?php echo esc_attr($price_margin); ?>px;">
			<div class="type" style="background-color: <?php echo esc_attr($top_bg); ?>;">
				<div class="ribbon-right-side" style="display: <?php echo esc_attr($offer_visibility); ?>;">
					<span style="background: <?php echo esc_attr($offer_bg); ?>;"><?php echo esc_attr($offer_text); ?></span>
				</div>
				<p><?php echo esc_attr($price_title); ?></p>
			</div>

			<div class="plan">
				<div class="header" style="display: <?php echo esc_attr($price_visibility); ?>;">
						<span class="amount" style="color: <?php echo esc_attr($amount_clr); ?>; font-size: <?php echo esc_attr($price_fontsize); ?>px">
							<?php echo esc_attr($price_amount); ?> <span class="month">/<?php echo esc_attr($price_plan); ?></span>
						</span>
				</div>
				<div class="content">
					<?php echo wp_kses_post($content); ?>
				</div>			
				<div class="price" style="">
		      		<a href="<?php echo esc_url($btn_url['url']); ?>" target="<?php echo esc_attr($btn_url['target']); ?>" title="<?php echo esc_html($btn_url['title']); ?>" class="price-btn" style="display: <?php echo esc_attr($btn_visibility); ?>; background-color: <?php echo esc_attr($top_bg); ?>; box-shadow: inset 0 -2px <?php echo esc_attr($top_bg); ?>;-webkit-box-shadow: inset 0 -2px <?php echo esc_attr($top_bg); ?>;">
		      			<?php echo esc_attr($btn_text); ?>
		      		</a>
				</div>
			</div>
		</div>

		<?php
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Advanced Pricing List', 'mega-addons-for-visual-composer' ),
	"base" 			=> "mvc_advance_listing",
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('Compare Listing', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/advanceprice.png',
	'params' => array(
		array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Price margin (from top)', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"price_margin",
			"description" 	=> 	__( 'Set complete margin of price table from top to bottom in pixel e.g 30. It is recomend for first price listing from left side.', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 	'px',
			"group" 		=> 	'Price Header',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Price Title', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"price_title",
			"description" 	=> 	__( 'It will be used as price package name', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Price Header',
        ),
        array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Show/Hide price amount', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"price_visibility",
			"description" 	=> 	__( 'Select Show or Hide amount and currency ', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Price Header',
			"value" 		=> array(
				'Show' =>  'block',
				'Hide' =>  'none',
			)
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Currency and Amount', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"price_amount",
			"description" 	=> 	__( 'Write currency and amount e.g $299', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "price_visibility", 'value' => 'block'),
			"group" 		=> 	'Price Header',
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Amount font size', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"price_fontsize",
			"description" 	=> 	__( 'Set font size of price amount e.g 35', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "price_visibility", 'value' => 'block'),
			"suffix" 		=> 	'px',
			"value"			=>	'35',
			"group" 		=> 	'Price Header',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Price plan', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"price_plan",
			"description" 	=> 	__( 'Price plan e.g "month"', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "price_visibility", 'value' => 'block'),
			"group" 		=> 	'Price Header',
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
			"group" 		=> 	'Offer',
			"value" 		=> array(
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
			"value"			=> '<li>30GB Storage</li><li>512MB Ram</li><li>[font_awesome link="" icon="check" color="#000"]</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li>'
		),

        /* Button */

        array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Show/Hide button', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"btn_visibility",
			"description" 	=> 	__( 'Select Show or Hide Button ', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Button',
			"value" 		=> array(
				'Show' =>  'block',
				'Hide' =>  'none',
			)
        ),

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
			"description" 	=> 	__( 'Set Button URL for link', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Button',
        ),

        /* colors */

        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Header Background color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"top_bg",
			"description" 	=> 	__( 'Top Header and button background color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Color',
        ),
        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Amount color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"amount_clr",
			"description" 	=> 	__( 'Set color of price amount', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Color',
        ),

        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Body background color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"price_bg",
			"description" 	=> 	__( 'Set complete background color', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Color',
        ),

	),
) );

