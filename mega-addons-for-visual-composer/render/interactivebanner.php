<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_interective_banner extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'effects'		=>		'effect-lily',
			'image_id'		=>		'',
			'alt'			=>		'',
			'img_width'		=>		'',
			'height'		=>		'',
			'url'			=>		'',
			'title'			=>		'',
			'titlesize'		=>		'18',
			'desc'			=>		'',
			'descsize'		=>		'15',
			'clr'			=>		'#fff',
			'bgclr'			=>		'',
			'icon_bg'		=>		'#fff',
			'icon'			=>		'',
			'icon_url'		=>		'',
			'icon2'			=>		'',
			'icon_url2'		=>		'',
			'icon3'			=>		'',
			'icon_url3'		=>		'',
			'titlesizembl'	=>		'',
			'descsizmbl'	=>		'',
			'imgsizmbl'		=>		'',
			'class'			=>		'',
		), $atts ) );
		$url = vc_build_link($url);
		if ($image_id != '') {
			$image_url = wp_get_attachment_url( $image_id );		
		}
		$some_id = VC_MEGA::next_instance_id();
		wp_enqueue_style( 'int-banner-css', plugins_url( '../css/int_banner.css' , __FILE__ ), array(), VC_MEGA::VERSION);
		$content = wpb_js_remove_wpautop($content, true);
		ob_start(); ?>
		<!-- HTML DESIGN HERE -->
		<div class="grid vc-interactive-banner <?php echo esc_attr($class); ?>" id="vc-interactive-banner-<?php echo esc_attr($some_id); ?>">
			<figure class="<?php echo esc_attr($effects); ?>" style="background: <?php echo esc_attr($bgclr); ?>; width: 100%; max-width: <?php echo esc_attr($img_width); ?>px; width: 100%;">
				<img src="<?php echo esc_attr($image_url); ?>" alt="<?php echo esc_attr($alt); ?>" style="height: <?php echo esc_attr($height); ?>px; max-width: <?php echo esc_attr($img_width); ?>px; width: 100%;" />
				<figcaption>
					<div>
						<h2 style="font-size: <?php echo esc_attr($titlesize); ?>px; color: <?php echo esc_attr($clr); ?>; font-weight: 500;">
							<?php echo esc_attr($title); ?>
						</h2>
						<p style="font-size: <?php echo esc_attr($descsize); ?>px; color: <?php echo esc_attr($clr); ?>;">
							<?php echo esc_attr($desc); ?>

							<?php if (!empty($icon)) { ?>
								<a href="<?php echo esc_url($icon_url); ?>" style="font-size: <?php echo esc_attr($descsize); ?>px; color: <?php echo esc_attr($clr); ?>;"><i class="fa <?php echo esc_attr($icon); ?>"></i></a>
							<?php } ?>
							<?php if (!empty($icon2)) { ?>
								<a href="<?php echo esc_url($icon_url2); ?>" style="font-size: <?php echo esc_attr($descsize); ?>px; color: <?php echo esc_attr($clr); ?>;"><i class="fa <?php echo esc_attr($icon2); ?>"></i></a>
							<?php } ?>
							<?php if (!empty($icon3)) { ?>
								<a href="<?php echo esc_url($icon_url3); ?>" style="font-size: <?php echo esc_attr($descsize); ?>px; color: <?php echo esc_attr($clr); ?>;"><i class="fa <?php echo esc_attr($icon3); ?>"></i></a>
							<?php } ?>
							
						</p>
					</div>
					<?php if (isset($url) && $url['url'] != '') { ?>
						<a href="<?php echo esc_url($url['url']); ?>" target="<?php echo esc_attr($url['target']); ?>" title="<?php echo esc_html($url['title']); ?>"></a>
					<?php } ?>
				</figcaption>			
			</figure>
		</div>
		<style>
			@media only screen and (max-width: 480px) {
				#vc-interactive-banner-<?php echo esc_attr($some_id); ?> h2 {
					font-size: <?php echo esc_attr($titlesizembl); ?>px !important;
				}
				#vc-interactive-banner-<?php echo esc_attr($some_id); ?> p {
					font-size: <?php echo esc_attr($descsizmbl); ?>px !important;
				}
				#vc-interactive-banner-<?php echo esc_attr($some_id); ?> img {
					height: <?php echo esc_attr($imgsizmbl); ?>px !important;
				}
			}
		</style>
        <!-- HTML END DESIGN HERE -->
		<?php
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Interactive Banner', 'mega-addons-for-visual-composer' ),
	"base" 			=> "interective_banner",
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('great hover effects', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/int-banner.png',
	'params' => array(
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Effects', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"effects",
			"description" 	=> 	esc_html__( '10 More Effects in', 'mega-addons-for-visual-composer' ) . ' ' . '<a href="https://1.envato.market/02aNL" target="_blank">' . esc_html__( 'Pro Version', 'mega-addons-for-visual-composer' ) . '</a>',
			"group" 		=> 	'Image',
			"value"			=>	array(
				'LILY'			=>		'effect-lily',
				'SADIE'			=>		'effect-sadie',
				'HONEY'			=>		'effect-honey',
				'LAYLA'			=>		'effect-layla',
				'MARLEY'		=>		'effect-marley',
				'RUBY'			=>		'effect-ruby',
				'ROXY'			=>		'effect-roxy',
				'BUBBA'			=>		'effect-bubba',
				'ROMEO'			=>		'effect-romeo',
				'DEXTER'		=>		'effect-dexter',
				'SARAH'			=>		'effect-sarah',
				'CHICO'			=>		'effect-chico',
				'MILO'			=>		'effect-milo',
				'GOLIATH'		=>		'effect-goliath',
				'APOLLO'		=>		'effect-apollo',
				'MOSES'			=>		'effect-moses',
				'JAZZ'			=>		'effect-jazz',
				'MING'			=>		'effect-ming',
				'LEXI'			=>		'effect-lexi',
			)
		),
		array(
            "type" 			=> 	"attach_image",
			"heading" 		=> 	__( 'Image', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"image_id",
			"description" 	=> 	__( 'Select the image', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Image',
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Alternate Text', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"alt",
			"description" 	=> 	__( 'It will be used as alt attribute of img tag', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Image',
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Image Width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"img_width",
			"description" 	=> 	__( 'set custom width in pixel or leave blank', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 'px',
			"group" 		=> 	"Image",
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Image Height', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"height",
			"description" 	=> 	__( 'set custom height in pixel eg, 230 or leave blank', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 'px',
			"group" 		=> 	"Image",
        ),
		array(
            "type" 			=> 	"vc_link",
			"heading" 		=> 	__( 'Url', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"url",
			"description" 	=> 	__( 'write url for moving to specific link', 'mega-addons-for-visual-composer' ),
			"value"			=>	"#0",
			"group" 		=> 	"Image",
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Extra Class', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"class",
			"description" 	=> 	__( 'Add extra class name that will be applied to the icon process, and you can use this class for your customizations.', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	"Image",
        ),
        array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #0073aa;font-weight:600;">' . '<a href="https://1.envato.market/02aNL" target="_blank" style="text-decoration: none;">' . esc_html__( 'Get the Pro version for more stunning elements and customization options.', 'mega-addons-for-visual-composer' ) . '</a>' . '</span>',
			"group" 		=> 'Image',
		),
		array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Heading', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"title",
			"description" 	=> 	__( 'write title', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	"Title",
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Heading Font Size', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"titlesize",
			"description" 	=> 	__( 'set in pixel e.g 18', 'mega-addons-for-visual-composer' ),
			"value"			=>	"18",
			"suffix" 		=> 'px',
			"group" 		=> 	"Title",
        ),
        array(
            "type" 			=> 	"textarea",
			"heading" 		=> 	__( 'Description', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"desc",
			"description" 	=> 	__( 'write description', 'mega-addons-for-visual-composer' ),
			"dependency" => array('element' => "effects", 'value' => array('effect-steve', 'effect-selena', 'effect-lily', 'effect-sadie', 'effect-honey', 'effect-layla', 'effect-zoe', 'effect-oscar', 'effect-marley', 'effect-ruby', 'effect-roxy', 'effect-bubba', 'effect-romeo', 'effect-dexter', 'effect-sarah', 'effect-chico', 'effect-milo', 'effect-goliath', 'effect-apollo', 'effect-moses', 'effect-jazz', 'effect-ming', 'effect-lexi', 'effect-duke', 'effect-julia',)),
			"group" 		=> 	"Title",
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Description/Icon Font Size', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"descsize",
			"description" 	=> 	__( 'set in pixel e.g 15', 'mega-addons-for-visual-composer' ),
			"value"			=>	"15",
			"suffix" 		=> 'px',
			"group" 		=> 	"Title",
        ),
        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Content Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"clr",
			"description" 	=> 	__( 'text color', 'mega-addons-for-visual-composer' ),
			"value"			=>	"#fff",
			"group" 		=> 	"Title",
        ),
        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Background Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"bgclr",
			"group" 		=> 	"Title",
        ),

        /* Icon Category
        ============================= */

        array(
            "type" 			=> 	"iconpicker",
			"heading" 		=> 	__( 'First Icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"icon",
			"dependency" => array('element' => "effects", 'value' => array('effect-hera', 'effect-winston', 'effect-terry', 'effect-phoebe', 'effect-kira',)),
			"description" 	=> 	__( 'choose Icon or leave blank', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	"Icons",
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'First Icon URL', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"icon_url",
			"dependency" => array('element' => "effects", 'value' => array('effect-hera', 'effect-winston', 'effect-terry', 'effect-phoebe', 'effect-kira',)),
			"description" 	=> 	__( 'write first Icon URL eg, www.google.com', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	"Icons",
        ),

        array(
            "type" 			=> 	"iconpicker",
			"heading" 		=> 	__( 'Second Icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"icon2",
			"dependency" => array('element' => "effects", 'value' => array('effect-hera', 'effect-winston', 'effect-terry', 'effect-phoebe', 'effect-kira',)),
			"description" 	=> 	__( 'choose Icon or leave blank', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	"Icons",
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Second Icon URL', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"icon_url2",
			"dependency" => array('element' => "effects", 'value' => array('effect-hera', 'effect-winston', 'effect-terry', 'effect-phoebe', 'effect-kira',)),
			"description" 	=> 	__( 'write second Icon URL eg, www.google.com', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	"Icons",
        ),

        array(
            "type" 			=> 	"iconpicker",
			"heading" 		=> 	__( 'Third Icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"icon3",
			"dependency" => array('element' => "effects", 'value' => array('effect-hera', 'effect-winston', 'effect-terry', 'effect-phoebe', 'effect-kira',)),
			"description" 	=> 	__( 'choose Icon or leave blank', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	"Icons",
        ),
        array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Third Icon URL', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"icon_url3",
			"dependency" => array('element' => "effects", 'value' => array('effect-hera', 'effect-winston', 'effect-terry', 'effect-phoebe', 'effect-kira',)),
			"description" 	=> 	__( 'write third Icon URL eg, www.google.com', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	"Icons",
        ),

        /* Typography
        ================================================ */
        
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Heading Font Size (For Mobile)', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"titlesizembl",
			"description" 	=> 	__( 'set in pixel e.g 16', 'mega-addons-for-visual-composer' ),
			"value"			=>	"16",
			"suffix" 		=> 'px',
			"group" 		=> 	"Typography",
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Description/Icon Font Size (For Mobile)', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"descsizmbl",
			"description" 	=> 	__( 'set in pixel e.g 15', 'mega-addons-for-visual-composer' ),
			"value"			=>	"15",
			"suffix" 		=> 'px',
			"group" 		=> 	"Typography",
        ),
        array(
            "type" 			=> 	"vc_number",
			"heading" 		=> 	__( 'Image Height (For Mobile)', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"imgsizmbl",
			"description" 	=> 	__( 'set custom height in pixel eg, 200 or leave blank', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 'px',
			"group" 		=> 	"Typography",
        ),
	),
) );

