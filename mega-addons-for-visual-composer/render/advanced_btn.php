<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_mvc_advanced_button extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'btn_animation' =>		'hvr-fade',
			'align' 		=>		'left',
			'icon_position' =>		'left',
			'padding_top' 	=>		'10',
			'padding_left' 	=>		'25',
			'btn_block' 	=>		'',
			'btn_radius' 	=>		'',
			'btn_next' 		=>		'',
			'btn_url' 		=>		'',
			'btn_text' 		=>		'Start a Conversation',
			'btn_text2' 	=>		'Click Me!',
			'btn_icon' 		=>		'',
			'border_style' 	=>		'solid',
			'btn_border' 	=>		'',
			'border_width' 	=>		'0',
			'btn_clr' 		=>		'#000',
			'btn_bg' 		=>		'',
			'btn_hvrclr' 	=>		'#fff',
			'btn_hvrbg' 	=>		'',
			'btn_size' 		=>		'18',
			'icon_size' 	=>		'18',
			'icon_space' 	=>		'5',
			'transform' 	=>		'default',
			'text_style' 	=>		'default',
			'text_decoration' 	=>	'default',
			'btn_shadow' 	=>	'none',
			'use_theme_fonts'		=>		'',
			'google_fonts'	=>		'default',
			'classname' 	=>	'',
		), $atts ) );
		$some_id = VC_MEGA::next_instance_id();
		$btn_url = vc_build_link($btn_url);
		wp_enqueue_style( 'advanced-button-css', plugins_url( '../css/advanced-buttons.css' , __FILE__ ), array(), VC_MEGA::VERSION);
		$content = wpb_js_remove_wpautop($content, true);
		$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
		$googleallfonts = "";
		if ( 'yes' !== $use_theme_fonts && is_string( $google_fonts ) && 'default' !== $google_fonts && '' !== trim( $google_fonts ) ) {
			$fontsData = $this->getFontsData( $atts, 'google_fonts' );
			$googleFontsStyles = $this->googleFontsStyles( $fontsData );
			if (empty($googleFontsStyles) == false){
				$googleallfonts = implode( ';', $googleFontsStyles );
			} else {
				$googleallfonts = $googleFontsStyles;
			}
		}
		ob_start(); ?>
		
		<div class="mega_uae_btn_<?php echo esc_attr($some_id); ?> <?php echo esc_attr($classname); ?>" style="justify-content: <?php echo esc_attr($align); ?>; display: flex;">
			<?php if ($btn_animation == 'hvr-fade' || $btn_animation == 'button--saqui' || $btn_animation == 'button--sacnite') { ?>
				<a href="<?php echo esc_url($btn_url['url']); ?>" target="<?php echo esc_attr($btn_url['target']); ?>" title="<?php echo esc_html($btn_url['title']); ?>" class="maw_advanced_btn <?php echo esc_attr($btn_animation); ?> <?php echo esc_attr($btn_block); ?>" style="color: <?php echo esc_attr($btn_clr); ?>;background: <?php echo esc_attr($btn_bg); ?> ; border: <?php echo esc_attr($border_width); ?>px <?php echo esc_attr($border_style); ?> <?php echo esc_attr($btn_border); ?>; border-radius: <?php echo esc_attr($btn_radius); ?>px; font-size: <?php echo esc_attr($btn_size); ?>px; padding: <?php echo esc_attr($padding_top); ?>px <?php echo esc_attr($padding_left); ?>px; <?php echo esc_attr($googleallfonts); ?>;" data-text="<?php echo esc_attr($btn_text); ?>"> 
					<?php if ($icon_position == 'left') { ?>
						<i class="<?php echo esc_attr($btn_icon); ?> icon__left"></i> 
					<?php } ?>
						<?php echo esc_attr($btn_text); ?>
					<?php if ($icon_position == 'right') { ?>
						<i class="<?php echo esc_attr($btn_icon); ?> icon__right"></i> 
					<?php } ?>
				</a>
				<div style="clear: both;"></div>
			<?php } ?>

			<?php if ($btn_animation == 'button--winona') { ?>
				<a href="<?php echo esc_url($btn_url['url']); ?>" target="<?php echo esc_attr($btn_url['target']); ?>" title="<?php echo esc_html($btn_url['title']); ?>" class="maw_advanced_btn <?php echo esc_attr($btn_animation); ?> <?php echo esc_attr($btn_block); ?>" style="color: <?php echo esc_attr($btn_clr); ?>;background: <?php echo esc_attr($btn_bg); ?> ; border: <?php echo esc_attr($border_width); ?>px <?php echo esc_attr($border_style); ?> <?php echo esc_attr($btn_border); ?>; border-radius: <?php echo esc_attr($btn_radius); ?>px; font-size: <?php echo esc_attr($btn_size); ?>px; padding: <?php echo esc_attr($padding_top); ?>px <?php echo esc_attr($padding_left); ?>px; <?php echo esc_attr($googleallfonts); ?>;" data-text=""> 
					<span>
						<?php if ($icon_position == 'left') { ?>
							<i class="<?php echo esc_attr($btn_icon); ?> icon__left"> </i>
						<?php } ?>
							<?php echo esc_attr($btn_text); ?>
						<?php if ($icon_position == 'right') { ?>
							<i class="<?php echo esc_attr($btn_icon); ?> icon__right"> </i>
						<?php } ?>
					</span>			
					<span style="padding: <?php echo esc_attr($padding_top); ?>px 0;" class="advanced-btn-after"><?php echo esc_attr($btn_text2); ?></span>
				</a>
				<div style="clear: both;"></div>
			<?php } ?>

			<?php if ($btn_animation == 'button--rayen') { ?>
				<a href="<?php echo esc_url($btn_url['url']); ?>" target="<?php echo esc_attr($btn_url['target']); ?>" title="<?php echo esc_html($btn_url['title']); ?>" class="maw_advanced_btn <?php echo esc_attr($btn_animation); ?> <?php echo esc_attr($btn_block); ?>" style="color: <?php echo esc_attr($btn_clr); ?>;background: <?php echo esc_attr($btn_bg); ?> ; border: <?php echo esc_attr($border_width); ?>px <?php echo esc_attr($border_style); ?> <?php echo esc_attr($btn_border); ?>; border-radius: <?php echo esc_attr($btn_radius); ?>px; font-size: <?php echo esc_attr($btn_size); ?>px; padding: <?php echo esc_attr($padding_top); ?>px <?php echo esc_attr($padding_left); ?>px; <?php echo esc_attr($googleallfonts); ?>;" data-text=""> 
					<span style="background: <?php echo esc_attr($btn_hvrbg); ?>; padding: <?php echo esc_attr($padding_top); ?>px 0; color: <?php echo esc_attr($btn_hvrclr); ?>;" class="advanced-btn-before"><?php echo esc_attr($btn_text2); ?></span>
					<span>
						<?php if ($icon_position == 'left') { ?>
							<i class="<?php echo esc_attr($btn_icon); ?> icon__left"> </i>
						<?php } ?>
							<?php echo esc_attr($btn_text); ?>
						<?php if ($icon_position == 'right') { ?>
							<i class="<?php echo esc_attr($btn_icon); ?> icon__right"> </i>
						<?php } ?>
					</span>			
				</a>
				<div style="clear: both;"></div>
			<?php } ?>

			<?php if ($btn_animation == 'button--wapasha' || $btn_animation == 'button--isi' || $btn_animation == 'button--moema' || $btn_animation == 'button--wayra' || $btn_animation == 'button--ujarak' || $btn_animation == 'button--aylen' || $btn_animation == 'button--nuka' || $btn_animation == 'button--shikoba' || $btn_animation == 'button--quidel') { ?>
				<a href="<?php echo esc_url($btn_url['url']); ?>" target="<?php echo esc_attr($btn_url['target']); ?>" title="<?php echo esc_html($btn_url['title']); ?>" class="maw_advanced_btn <?php echo esc_attr($btn_animation); ?> <?php echo esc_attr($btn_block); ?>" style="color: <?php echo esc_attr($btn_clr); ?>; background: <?php echo esc_attr($btn_bg); ?>; border: <?php echo esc_attr($border_width); ?>px <?php echo esc_attr($border_style); ?> <?php echo esc_attr($btn_border); ?>; border-radius: <?php echo esc_attr($btn_radius); ?>px; font-size: <?php echo esc_attr($btn_size); ?>px; padding: <?php echo esc_attr($padding_top); ?>px <?php echo esc_attr($padding_left); ?>px; <?php echo esc_attr($googleallfonts); ?>;" data-text="">
					<?php if ($icon_position == 'left') { ?>
						<i class="<?php echo esc_attr($btn_icon); ?> button__icon icon__left"> </i>
					<?php } ?>
					<span><?php echo esc_attr($btn_text); ?></span>
					<?php if ($icon_position == 'right') { ?>
						<i class="<?php echo esc_attr($btn_icon); ?> button__icon icon__right"> </i>
					<?php } ?>
				</a>
				<div style="clear: both;"></div>
			<?php } ?>

			<?php if ($btn_animation == 'button--antiman' || $btn_animation == 'button--pipaluk') { ?>
				<a href="<?php echo esc_url($btn_url['url']); ?>" target="<?php echo esc_attr($btn_url['target']); ?>" title="<?php echo esc_html($btn_url['title']); ?>" class="maw_advanced_btn <?php echo esc_attr($btn_animation); ?> <?php echo esc_attr($btn_block); ?>" style="color: <?php echo esc_attr($btn_clr); ?>; border-radius: <?php echo esc_attr($btn_radius); ?>px; font-size: <?php echo esc_attr($btn_size); ?>px; padding: <?php echo esc_attr($padding_top); ?>px <?php echo esc_attr($padding_left); ?>px; <?php echo esc_attr($googleallfonts); ?>;" data-text="">
					<?php if ($icon_position == 'left') { ?>
						<i class="<?php echo esc_attr($btn_icon); ?> button__icon icon__left"> </i>
					<?php } ?>
					<span><?php echo esc_attr($btn_text); ?></span>
					<?php if ($icon_position == 'right') { ?>
						<i class="<?php echo esc_attr($btn_icon); ?> button__icon icon__right"> </i>
					<?php } ?>
				</a>
				<div style="clear: both;"></div>
			<?php } ?>

			<?php if ($btn_animation == 'button--float') { ?>
				<a href="<?php echo esc_url($btn_url['url']); ?>" target="<?php echo esc_attr($btn_url['target']); ?>" title="<?php echo esc_html($btn_url['title']); ?>" class="maw_advanced_btn <?php echo esc_attr($btn_animation); ?> <?php echo esc_attr($btn_block); ?>" style="color: <?php echo esc_attr($btn_clr); ?>; background: <?php echo esc_attr($btn_bg); ?>; border: <?php echo esc_attr($border_width); ?>px <?php echo esc_attr($border_style); ?> <?php echo esc_attr($btn_border); ?>; border-radius: <?php echo esc_attr($btn_radius); ?>px; font-size: <?php echo esc_attr($btn_size); ?>px; padding: <?php echo esc_attr($padding_top); ?>px <?php echo esc_attr($padding_left); ?>px; <?php echo esc_attr($googleallfonts); ?>;">
					<?php echo esc_attr($btn_text); ?>
					<i class="<?php echo esc_attr($btn_icon); ?>" style="font-size: <?php echo esc_attr($icon_size) ?>px;"></i>
				</a>
			<?php } ?>
		</div>
		<style>
			.mega_uae_btn_<?php echo esc_attr($some_id); ?> .maw_advanced_btn{
				text-transform: <?php echo esc_attr($transform); ?> !important;
				font-style: <?php echo esc_attr($text_style); ?> !important;
				text-decoration: <?php echo esc_attr($text_decoration); ?> !important;
				box-<?php echo esc_attr($btn_shadow) ?>: 0 10px 20px rgba(0, 0, 0, 0.3) !important;
			}
			<?php if ($icon_position == 'left') { ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .maw_advanced_btn .icon__left {
					font-size: <?php echo esc_attr($icon_size) ?>px !important;
					padding-right: <?php echo esc_attr($icon_space) ?>px !important;
				}
			<?php }
			if ($icon_position == 'right') { ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .maw_advanced_btn .icon__right {
					font-size: <?php echo esc_attr($icon_size) ?>px !important;
					padding-left: <?php echo esc_attr($icon_space) ?>px !important;
				}
			<?php } ?>
			
			.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--antiman:hover,
			.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--nuka:hover,
			.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--aylen:hover,
			.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--pipaluk:hover {
				color: <?php echo esc_attr($btn_hvrclr); ?> !important;
			}

			<?php if ($btn_animation == 'hvr-fade') { ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .hvr-fade:hover{
					background: <?php echo esc_attr($btn_hvrbg); ?> !important;
					color: <?php echo esc_attr($btn_hvrclr); ?> !important;
				}
			<?php } ?>

			<?php if ($btn_animation == 'button--moema') { ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--moema:hover {
					background: <?php echo esc_attr($btn_hvrbg); ?> !important;
					color: <?php echo esc_attr($btn_hvrclr); ?> !important;
				}
			<?php } ?>

			<?php if ($btn_animation == 'button--winona') { ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--winona:hover {
					background: <?php echo esc_attr($btn_hvrbg); ?> !important;
					color: <?php echo esc_attr($btn_hvrclr); ?> !important;
				}
			<?php } ?>
			
			<?php if ($btn_animation == 'button--rayen') { ?>
				/*.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--rayen {
					background: <?php echo esc_attr($btn_bg); ?> ;
					border: <?php echo esc_attr($border_width); ?>px <?php echo esc_attr($border_style); ?> <?php echo esc_attr($btn_border); ?>;
				}*/
			<?php } ?>
			<?php if ($btn_animation == 'button--wayra') { ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--wayra:hover {
					color: <?php echo esc_attr($btn_hvrclr); ?> !important;
				}
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--wayra:hover::before {
					background: <?php echo esc_attr($btn_hvrbg); ?> !important;
				}
			<?php } ?>

			<?php if ($btn_animation == 'button--ujarak') { ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--ujarak:hover {
					color: <?php echo esc_attr($btn_hvrclr); ?> !important;
				}
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--ujarak::before {
					background: <?php echo esc_attr($btn_hvrbg); ?> !important;
				}
			<?php } ?>

			<?php if ($btn_animation == 'button--isi') { ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--isi::before{
					background: <?php echo esc_attr($btn_hvrbg); ?> !important;
				}
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--isi:hover {
					color: <?php echo esc_attr($btn_hvrclr); ?> !important;
				}
			<?php } ?>
		
			<?php if ($btn_animation == 'button--saqui') { ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--saqui::after {
					padding: <?php echo esc_attr($padding_top); ?>px 0;
					color: <?php echo esc_attr($btn_hvrclr); ?> !important;
				}
			<?php } ?>

			<?php if ($btn_animation == 'button--float') { ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--float:hover {
					padding-right: <?php echo esc_attr($icon_space)+45; ?>px !important;
					background: <?php echo esc_attr($btn_hvrbg); ?> !important;
					color: <?php echo esc_attr($btn_hvrclr); ?> !important;
				}
			<?php } ?>

			<?php if ($btn_animation == 'button--sacnite') { ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--sacnite {
					background: none !important;
				}
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--sacnite::before {
					box-shadow: inset 0 0 0 35px <?php echo esc_attr($btn_bg); ?>;
				}
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--sacnite:hover::before {
					box-shadow: inset 0 0 0 2px <?php echo esc_attr($btn_hvrbg); ?>;
				}
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--sacnite:hover {
					background: none !important;
					color: <?php echo esc_attr($btn_hvrclr); ?> !important;
				}
			<?php } ?>

			<?php if ($btn_animation == 'button--quidel') { ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--quidel {
					background: <?php echo esc_attr($btn_border); ?>;
				}
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--quidel::after {
					background: <?php echo esc_attr($btn_bg); ?>;
					top: <?php echo esc_attr($border_width); ?>px; left: <?php echo esc_attr($border_width); ?>px;
				    right: <?php echo esc_attr($border_width); ?>px; bottom: <?php echo esc_attr($border_width); ?>px;
				}
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--quidel::before {
					background: <?php echo esc_attr($btn_hvrbg); ?>;
				}
			<?php } ?>

			<?php if ($btn_animation == 'button--wapasha'): ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--wapasha:hover {
					background: <?php echo esc_attr($btn_hvrbg); ?> !important;
					color: <?php echo esc_attr($btn_hvrclr); ?> !important;
				}
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--wapasha::before{
					border-color: <?php echo esc_attr($btn_border); ?> !important;
				}
			<?php endif ?>

			<?php if ($btn_animation == 'button--pipaluk'): ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--pipaluk::before{
					border-color: <?php echo esc_attr($btn_border); ?> !important;
				}
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--pipaluk::after{
					background: <?php echo esc_attr($btn_bg); ?> !important;
					color: <?php echo esc_attr($btn_clr); ?> !important;
				}
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--pipaluk:hover::after {
					background: <?php echo esc_attr($btn_hvrbg); ?> !important;
				}
			<?php endif ?>

			<?php if ($btn_animation == 'button--aylen'): ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--aylen{
					background: <?php echo esc_attr($btn_bg); ?> !important;
					color: <?php echo esc_attr($btn_clr); ?> !important;
				}
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--aylen::before,
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--aylen::after{
					background: <?php echo esc_attr($btn_hvrbg); ?> !important;
				}
			<?php endif ?>

			<?php if ($btn_animation == 'button--nuka'): ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--nuka::before{
					background: <?php echo esc_attr($btn_border);; ?> !important;
				}
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--nuka::after{
					background: <?php echo esc_attr($btn_bg); ?> !important;
					color: <?php echo esc_attr($btn_clr); ?> !important;
				}
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--nuka:hover::after{
					background: <?php echo esc_attr($btn_hvrbg); ?> !important;
				}
			<?php endif ?>

			<?php if ($btn_animation == 'button--antiman'): ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--antiman::after {
					background: <?php echo esc_attr($btn_bg); ?> !important;
				}
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--antiman::before {
					background: <?php echo esc_attr($btn_hvrbg); ?> !important;
					border: <?php echo esc_attr($border_width) ?>px <?php echo esc_attr($border_style); ?> <?php echo esc_attr($btn_border); ?> !important;
				}
			<?php endif ?>

			<?php if ($btn_animation == 'button--shikoba'): ?>
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--shikoba {
					background: <?php echo esc_attr($btn_bg); ?> !important;
					border: <?php echo esc_attr($border_width) ?>px <?php echo esc_attr($border_style); ?> <?php echo esc_attr($btn_border); ?> !important;
				}
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--shikoba:hover {
					background: <?php echo esc_attr($btn_hvrbg); ?> !important;
				}
				.mega_uae_btn_<?php echo esc_attr($some_id); ?> .button--shikoba i {
					padding-top: <?php echo esc_attr($padding_top); ?>px !important;
				}
			<?php endif ?>
		</style>

		<?php
		return ob_get_clean();
	}

	protected function getFontsData( $atts, $paramName ) {
		if ( ! is_array( $atts ) || ! isset( $atts[ $paramName ] ) || ! is_string( $atts[ $paramName ] ) || '' === trim( $atts[ $paramName ] ) ) {
			return '';
		}

		$googleFontsParam = new Vc_Google_Fonts();
		$field = WPBMap::getParam( $this->shortcode, $paramName );
		$fieldSettings = isset( $field['settings'], $field['settings']['fields'] ) ? $field['settings']['fields'] : array();
		$fontsData = strlen( $atts[ $paramName ] ) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes( $fieldSettings, $atts[ $paramName ] ) : '';

		return $fontsData;
	}

	protected function googleFontsStyles( $fontsData ) {
		$fallback = array( 'font-family: Arial, sans-serif' );
		if ( ! is_array( $fontsData ) || ! isset( $fontsData['values'] ) || ! is_array( $fontsData['values'] ) || ! isset( $fontsData['values']['font_family'] ) || ! is_string( $fontsData['values']['font_family'] ) ) {
			return $fallback;
		}

		$font_family = trim( explode( ':', $fontsData['values']['font_family'], 2 )[0] );
		if ( '' === $font_family || 1 !== preg_match( '/^[\p{L}\p{M}\p{N}_ -]+$/u', $font_family ) ) {
			return $fallback;
		}

		$styles = array( 'font-family: "' . $font_family . '", Arial, sans-serif' );
		if ( isset( $fontsData['values']['font_style'] ) && is_string( $fontsData['values']['font_style'] ) ) {
			$font_style = explode( ':', $fontsData['values']['font_style'], 3 );
			if ( isset( $font_style[1] ) && preg_match( '/^[1-9]00$/', $font_style[1] ) ) {
				$styles[] = 'font-weight: ' . $font_style[1];
			}
			if ( isset( $font_style[2] ) && in_array( strtolower( $font_style[2] ), array( 'normal', 'italic' ), true ) ) {
				$styles[] = 'font-style: ' . strtolower( $font_style[2] );
			}
		}

		return $styles;
	}
}


vc_map( array(
	"name" 			=> __( 'Advanced Button', 'mega-addons-for-visual-composer' ),
	"base" 			=> "mvc_advanced_button",
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('Animated style buttons', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/hoverbutton.png',
	'params' => array(
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Button Align', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"align",
			"group" 		=> 	'General',
			"value"			=>	array(
				"Left"			=>	"left",
				"Center"		=>	"center",
				"Right"			=>	"flex-end",
			)
		),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Button Effects', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"btn_animation",
			"description" 	=> esc_html__( 'Choose button style', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
			"value"			=>	array(
				"Fade"				=>	"hvr-fade",
				"Float"				=>	"button--float",
				"Winona"			=>	"button--winona",
				"Rayen"				=>	"button--rayen",
				"Ujarak"			=>	"button--ujarak",
				"Wayra"				=>	"button--wayra",
				"Pipaluk"			=>	"button--pipaluk",
				"Isi"				=>	"button--isi",
				"Aylen"				=>	"button--aylen",
				"Wapasha"			=>	"button--wapasha",
				"Nuka"				=>	"button--nuka",
				"Antiman"			=>	"button--antiman",
				"Shikoba"			=>	"button--shikoba",
				"Saqui"				=>	"button--saqui",
				"Moema"				=>	"button--moema",
				"Quidel"			=>	"button--quidel",
				"Sacnite"			=>	"button--sacnite",
				"Naira (Pro)"		=>	"pro",
				"Itzel (Pro)"		=>	"pro",
				"Tamaya (Pro)"		=>	"pro",
				"Dual Shade (Pro)"	=>	"pro",
				"Neon (Pro)"		=>	"pro",
				"Neon Shadow (Pro)"	=>	"pro",
				"Inity (Pro)"		=>	"pro",
			)
		),

		array(
			"type" 			=> "iconpicker",
			"heading" 		=> __( 'Select icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_icon",
			"description" 	=> __( 'it will be show within text', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Icon Align', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"icon_position",
			"group" 		=> 	'General',
			"value"			=>	array(
				"Left"			=>	"left",
				"Right"			=>	"right",
			)
		),
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Button text', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_text",
			"value" 		=> "Start a Conversation",
			'admin_label' 	=> 	true,
			"description" 	=> __( 'Write button text', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
		),
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Button text 2', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_text2",
			"description" 	=> 	__( 'it will show on hover', 'mega-addons-for-visual-composer' ),
			"value" 		=> "Click Me!",
			"dependency" 	=> array('element' => "btn_animation", 'value' => array('button--winona', 'button--rayen')),
			"group" 		=> 'General',
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Padding [Top Bottom]', 'mega-addons-for-visual-composer' ),
			"edit_field_class" => "vc_col-sm-6 wdo_items_to_show wdo_margin_bottom",
			"param_name" 	=> "padding_top",
			"description" 	=> __( 'It will increase height of button e.g 10', 'mega-addons-for-visual-composer' ),
			"value"			=>	"10",
			"suffix" 		=> 'px',
			"group" 		=> 'General',
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Padding [Left Right]', 'mega-addons-for-visual-composer' ),
			"edit_field_class" => "vc_col-sm-6 wdo_items_to_show wdo_margin_bottom",
			"param_name" 	=> "padding_left",
			"description" 	=> __( 'It will increase width of button e.g 20', 'mega-addons-for-visual-composer' ),
			"value"			=>	"25",
			"suffix" 		=> 'px',
			"group" 		=> 'General',
		),
		array(
			"type" 			=> 	"checkbox",
			"heading" 		=> 	__( 'Set Full Width Button?', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"btn_block",
			"group" 		=> 	'General',
			"value" 		=> array(
				"Enable"		=> "btn_block",
			)
		),
		array(
			"type" 			=> "vc_link",
			"heading" 		=> __( 'Button URL', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_url",
			"description" 	=> __( 'Write button url as link', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'General',
		),

		array(
            "type" 			=> 	"textfield",
			"heading" 		=> 	__( 'Extra class name', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"classname",
			"description" 	=> 	"Style particular content element differently - add a class name and refer to it in custom CSS.",
			"group" 		=> 	'General',
        ),

		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #0073aa;font-weight:600;">' . '<a href="https://1.envato.market/02aNL" target="_blank" style="text-decoration: none;">' . esc_html__( 'Get the Pro version for more stunning elements and customization options.', 'mega-addons-for-visual-composer' ) . '</a>' . '</span>',
			"group" 		=> 'General',
		),

		/** color **/

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Text color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_clr",
			"description" 	=> __( 'Set color of text e.g #ffff', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Color',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Background color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_bg",
			"description" 	=> __( 'Set color of background e.g #269CE9', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Color',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Hover Text color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_hvrclr",
			"description" 	=> __( 'Set color of text on hover e.g #ffff', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Color',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Background color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_hvrbg",
			"description" 	=> __( 'Set color of background on hover e.g #269CE9', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Color',
		),

		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #302f2f;font-weight:600;">' . esc_html__( 'Border Styling', 'mega-addons-for-visual-composer' ) . '</span>',
			"group" 		=> 'Color',
		),

		/** border **/

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Border Style', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "border_style",
			"group" 		=> 'Color',
			"value"			=>	array(
				"None"		=>		"none",
				"Solid"		=>		"solid",
				"Dotted"	=>		"dotted",
				"Ridge"		=>		"ridge",
				"Dashed"	=>		"dashed",
				"Double"	=>		"double",
				"Groove"	=>		"groove",
				"Inset"		=>		"inset",
			)
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Border width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "border_width",
			"description" 	=> __( 'Set width of border in pixel e.g 1', 'mega-addons-for-visual-composer' ),
			"value"			=>	"0",
			"suffix" 		=> 'px',
			"group" 		=> 'Color',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Border color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_border",
			"description" 	=> __( 'Set color of border e.g #269CE9', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Color',
		),
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Radius', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_radius",
			"description" 	=> __( 'set button radius e.g 5', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 'px',
			"group" 		=> 'Color',
		),

		// =================== Settings ======================= //
		
		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Text Size', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_size",
			"description" 	=> __( 'Set font size in pixel e.g 18', 'mega-addons-for-visual-composer' ),
			"value"			=>	"18",
			"suffix" 		=> 'px',
			"group" 		=> 'Settings',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Icon Size', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "icon_size",
			"description" 	=> __( 'Set font size in pixel e.g 18', 'mega-addons-for-visual-composer' ),
			"value"			=>	"18",
			"suffix" 		=> 'px',
			"group" 		=> 'Settings',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Icon Text Space', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "icon_space",
			"value"			=>	"5",
			"suffix" 		=> 'px',
			"group" 		=> 'Settings',
		),

		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_urls",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #302f2f;font-weight:600;">' . esc_html__( 'Typography', 'mega-addons-for-visual-composer' ) . '</span>',
			"group" 		=> 'Settings',
		),

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Transform', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "transform",
			"group" 		=> 'Settings',
			"value"			=>	array(
				"Default"		=>		"default",
				"Uppercase"		=>		"uppercase",
				"Lowercase"		=>		"lowercase",
				"Capitalize"	=>		"capitalize",
				"Normal"		=>		"normal",
			)
		),

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Style', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "text_style",
			"group" 		=> 'Settings',
			"value"			=>	array(
				"Default"		=>		"default",
				"Normal"		=>		"normal",
				"Italic"		=>		"italic",
				"Oblique"		=>		"oblique",
			)
		),

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Decoration', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "text_decoration",
			"group" 		=> 'Settings',
			"value"			=>	array(
				"Default"		=>		"default",
				"Underline"		=>		"underline",
				"Overline"		=>		"overline",
				"Line Through"	=>		"line-through",
				"None"			=>		"none",
			)
		),

		array(
			"type" 			=> "dropdown",
			"heading" 		=> __( 'Shadow', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "btn_shadow",
			"group" 		=> 'Settings',
			"value"			=>	array(
				"None"			=>		"none",
				"Shadow"		=>		"shadow",
			)
		),

		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_urlss",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #302f2f;font-weight:600;">' . esc_html__( 'Google Fonts Option', 'mega-addons-for-visual-composer' ) . '</span>',
			"group" 		=> 'Settings',
		),

		array(
			"type" 			=> 	"checkbox",
			"heading" 		=> 	__( 'Use theme default font family?', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"use_theme_fonts",
			"description" 	=> 	__( 'Use font family from the theme.', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'Settings',
			"value" 		=> array(
					"Yes"		=> "yes",
			)
		),

		array(
			'type' => 'google_fonts',
			'param_name' => 'google_fonts',
			'value' => 'default',
			'settings' => array(
				'fields' => array(
					'font_family_description' => __( 'Select font family.', 'mega-addons-for-visual-composer' ),
					'font_style_description' => __( 'Select font styling.', 'mega-addons-for-visual-composer' ),
				),
			),
			"group" 		=> 	'Settings',
			'weight' => 0,
			'dependency' => array(
				'element' => 'use_theme_fonts',
				'value_not_equal_to' => 'yes',
			),
		),
	),
) );