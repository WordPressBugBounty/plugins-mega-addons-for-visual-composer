<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class WPBakeryShortCode_mvc_team_profile extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'member_visibility' => 'grow',
			'pro_size' 			=> '',
			'shadow_visibility' => 'none',
			'member_clr' 		=> '#27BEBE',
			'url' 				=> '',
			'image_id' 			=> '',
			'image_id2' 		=> '',
			'image_alt' 		=> '',
			'classname' 		=> '',
			'memb_name' 		=> '',
			'memb_prof' 		=> '',
			'memb_about' 		=> '',
			'memberproclr'		=> '',
			'about_clr'			=> '',
			'info_size' 		=> '',
			'info_clr' 			=> '',
			'memb_email' 		=> '',
			'memb_url' 			=> '',
			'memb_numb' 		=> '',
			'memb_addr' 		=> '',
			'memb_skill' 		=> '',
			'memb_perl' 		=> '',
			'memb_skill2' 		=> '',
			'memb_per2' 		=> '',
			'memb_skill3' 		=> '',
			'memb_per3' 		=> '',
			'memb_skill4' 		=> '',
			'memb_per4' 		=> '',
			'memb_skill5' 		=> '',
			'memb_per5' 		=> '',
			'social_size' 		=> '19',
			'social_icon' 		=> '',
			'social_url' 		=> '',
			'social_clr' 		=> '',
			'social_icon2' 		=> '',
			'social_url2' 		=> '',
			'social_clr2' 		=> '',
			'social_icon3' 		=> '',
			'social_url3' 		=> '',
			'social_clr3' 		=> '',
			'social_icon4' 		=> '',
			'social_url4' 		=> '',
			'social_clr4' 		=> '',
			'social_icon5' 		=> '',
			'social_url5' 		=> '',
			'social_clr5' 		=> '',
			'member_txt_size' 	=> '',
			'about_txt_size' 	=> '',
			'pro_txt_size' 		=> '',
		), $atts ) );
		$url = vc_build_link($url);
		if ($image_id != '') {
			$image_url = wp_get_attachment_url( $image_id );		
		}
		if ($image_id2 != '') {
			$image_url2 = wp_get_attachment_url( $image_id2 );		
		}
		wp_enqueue_style( 'memberprofile-css', plugins_url( '../css/memberprofile.css' , __FILE__ ), array(), VC_MEGA::VERSION);
		$content = wpb_js_remove_wpautop($content, true);
		ob_start(); ?>
		
		<?php switch ($member_visibility) {
			case 'grow':
				include 'team-profile/style1.php';
				break;
			case 'float':
				include 'team-profile/style2.php';
				break;
			case 'outset':
				include 'team-profile/style3.php';
				break;
			case 'smart':
				include 'team-profile/style4.php';
				break;
			case 'style8':
				include 'team-profile/style8.php';
				break;
			
			default:
				include 'team-profile/style1.php';
				break;
		} ?>

		<?php
		return ob_get_clean();
	}
}


vc_map( array(
	"name" 			=> __( 'Member Profile', 'mega-addons-for-visual-composer' ),
	"base" 			=> "mvc_team_profile",
	"category" 		=> __('Mega Addons', 'mega-addons-for-visual-composer'),
	"description" 	=> __('Show your awesome team', 'mega-addons-for-visual-composer'),
	"icon" => plugin_dir_url( __FILE__ ).'../icons/memberprofile.png',
	'params' => array(
		array(
            "type" 			=> 	"dropdown",
			"heading" 		=> 	__( 'Member Style', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"member_visibility",
			"description" 	=> 	esc_html__( 'Select style of member profile', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
			"value" 		=> array(
				"STYLE 1"		=> 		"grow", 
				"STYLE 2" 		=> 		"float",
				"STYLE 3" 		=> 		"outset",
				"STYLE 4" 		=> 		"smart",
				"STYLE 5" 		=> 		"style8",
				"STYLE 6 [Pro]" 		=> 		"",
				"STYLE 7 [Pro]" 		=> 		"",
				"STYLE 8 [Pro]" 		=> 		"",
				"STYLE 9 [Pro]" 		=> 		"",
				"STYLE 10 [Pro]" 		=> 		"",
				"STYLE 11 [Pro]" 		=> 		"",
			)
        ),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Team Profile Width', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "pro_size",
			"description" 	=> __( 'custom size of profile container or leave blank for default', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 	'px',
			"group" 		=> 'General',
		),

        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Profile color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"member_clr",
			"description" 	=> 	__( 'color effects for the team meber', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
        ),

        array(
			"type" 			=> "vc_link",
			"heading" 		=> __( 'Link To', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "url",
			"dependency" => array('element' => "member_visibility", 'value' => array('grow', 'float', 'outset', 'smart', 'stalic', 'swap', 'minimic')),
			"group" 		=> 'General',
		),

    	array(
            "type" 			=> 	"attach_image",
			"heading" 		=> 	__( 'Image', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"image_id",
			"description" 	=> 	__( 'Select the image', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
        ),

        array(
            "type" 			=> 	"attach_image",
			"heading" 		=> 	__( 'Image 2', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"image_id2",
			"dependency" => array('element' => "member_visibility", 'value' => 'swap'),
			"description" 	=> 	__( 'It will show on hover', 'mega-addons-for-visual-composer' ),
			"group" 		=> 	'General',
        ),

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Alternate Text', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "image_alt",
			"description" 	=> __( 'It will be used as alt attribute of img tag', 'mega-addons-for-visual-composer' ),
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

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Member name', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "memb_name",
			"description" 	=> __( 'Write member name', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'About',
		),
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Profession', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "memb_prof",
			"description" 	=> __( 'Write member profession', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'About',
		),

		array(
			"type" 			=> "textarea",
			"heading" 		=> __( 'About', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "memb_about",
			"description" 	=> __( 'Info about member in detail', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'About',
		),

		// Info Section

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Email', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "memb_email",
			"dependency" => array('element' => "member_visibility", 'value' => array('grow', 'float', 'outset')),
			"description" 	=> __( 'Write member email address or leave blank', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Info',
		),

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Site Url', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "memb_url",
			"dependency" => array('element' => "member_visibility", 'value' => array('grow', 'float', 'outset')),
			"description" 	=> __( 'Write member site url or leave blank', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Info',
		),

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Contact number', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "memb_numb",
			"dependency" => array('element' => "member_visibility", 'value' => array('grow', 'float', 'outset')),
			"description" 	=> __( 'Write member contact number or leave blank', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Info',
		),

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Address', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "memb_addr",
			"dependency" => array('element' => "member_visibility", 'value' => array('grow', 'float', 'outset')),
			"description" 	=> __( 'Write member address or leave blank', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Info',
		),

		// Skills

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Skill 1', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "memb_skill",
			"edit_field_class" => "vc_col-sm-8 edit_field_padding_top",
			"dependency" => array('element' => "member_visibility", 'value' => array('grow', 'float', 'outset')),
			"description" 	=> __( 'write your skill e.g Wordpress or leave blank', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Skill',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'First percentage', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "memb_perl",
			"edit_field_class" => "vc_col-sm-4 edit_field_padding_top",
			"dependency" => array('element' => "member_visibility", 'value' => array('grow', 'float', 'outset')),
			"description" 	=> __( 'first skill percentage e.g 87 or leave blank', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 	'%',
			"group" 		=> 'Skill',
		),

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Skill 2', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "memb_skill2",
			"edit_field_class" => "vc_col-sm-8",
			"dependency" => array('element' => "member_visibility", 'value' => array('grow', 'float', 'outset')),
			"description" 	=> __( 'write your skill e.g Wordpress or leave blank', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Skill',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Second percentage', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "memb_per2",
			"edit_field_class" => "vc_col-sm-4",
			"dependency" => array('element' => "member_visibility", 'value' => array('grow', 'float', 'outset')),
			"description" 	=> __( 'second skill percentage e.g 83 or leave blank', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 	'%',
			"group" 		=> 'Skill',
		),

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Skill 3', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "memb_skill3",
			"edit_field_class" => "vc_col-sm-8",
			"dependency" => array('element' => "member_visibility", 'value' => array('grow', 'float', 'outset')),
			"description" 	=> __( 'write your skill e.g Wordpress or leave blank', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Skill',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Third percentage', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "memb_per3",
			"edit_field_class" => "vc_col-sm-4",
			"dependency" => array('element' => "member_visibility", 'value' => array('grow', 'float', 'outset')),
			"description" 	=> __( 'third skill percentage e.g 83 or leave blank', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 	'%',
			"group" 		=> 'Skill',
		),
		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Skill 4', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "memb_skill4",
			"edit_field_class" => "vc_col-sm-8",
			"dependency" => array('element' => "member_visibility", 'value' => array('grow', 'float', 'outset')),
			"description" 	=> __( 'write your skill e.g Wordpress or leave blank', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Skill',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Fourth percentage', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "memb_per4",
			"edit_field_class" => "vc_col-sm-4",
			"dependency" => array('element' => "member_visibility", 'value' => array('grow', 'float', 'outset')),
			"description" 	=> __( 'fourth skill percentage e.g 83 or leave blank', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 	'%',
			"group" 		=> 'Skill',
		),

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Skill 5', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "memb_skill5",
			"edit_field_class" => "vc_col-sm-8",
			"dependency" => array('element' => "member_visibility", 'value' => array('grow', 'float', 'outset')),
			"description" 	=> __( 'write your skill e.g Wordpress or leave blank', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Skill',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Fifth percentage', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "memb_per5",
			"edit_field_class" => "vc_col-sm-4",
			"dependency" => array('element' => "member_visibility", 'value' => array('grow', 'float', 'outset')),
			"description" 	=> __( 'fifth skill percentage e.g 83 or leave blank', 'mega-addons-for-visual-composer' ),
			"suffix" 		=> 	'%',
			"group" 		=> 'Skill',
		),

		/*** Social Icons ***/

		array(
			"type" 			=> "iconpicker",
			"heading" 		=> __( 'Social icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "social_icon",
			"description" 	=> __( 'choose icon for social upadate', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Social',
		),

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'First Social Url', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "social_url",
			"edit_field_class" => "vc_col-sm-7",
			"description" 	=> __( 'first social url', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Social',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'First Social color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "social_clr",
			"edit_field_class" => "vc_col-sm-5",
			"group" 		=> 'Social',
		),


		array(
			"type" 			=> "iconpicker",
			"heading" 		=> __( 'Second social icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "social_icon2",
			"description" 	=> __( 'choose icon for social', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Social',
		),

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Second Social Url', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "social_url2",
			"edit_field_class" => "vc_col-sm-7",
			"description" 	=> __( 'Second social url', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Social',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Second Social color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "social_clr2",
			"edit_field_class" => "vc_col-sm-5",
			"group" 		=> 'Social',
		),

		array(
			"type" 			=> "iconpicker",
			"heading" 		=> __( 'Third social icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "social_icon3",
			"description" 	=> __( 'choose icon for social', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Social',
		),

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Third Social Url', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "social_url3",
			"edit_field_class" => "vc_col-sm-7",
			"description" 	=> __( 'Third social url', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Social',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Third Social color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "social_clr3",
			"edit_field_class" => "vc_col-sm-5",
			"group" 		=> 'Social',
		),


		array(
			"type" 			=> "iconpicker",
			"heading" 		=> __( 'Fourth social icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "social_icon4",
			"description" 	=> __( 'choose icon for social', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Social',
		),

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Fourth Social Url', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "social_url4",
			"edit_field_class" => "vc_col-sm-7",
			"description" 	=> __( 'Fourth social url', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Social',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Fourth Social color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "social_clr4",
			"edit_field_class" => "vc_col-sm-5",
			"group" 		=> 'Social',
		),

		array(
			"type" 			=> "iconpicker",
			"heading" 		=> __( 'Fifth social icon', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "social_icon5",
			"description" 	=> __( 'choose icon for social', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Social',
		),

		array(
			"type" 			=> "textfield",
			"heading" 		=> __( 'Fifth Social Url', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "social_url5",
			"edit_field_class" => "vc_col-sm-7",
			"description" 	=> __( 'Fifth social url', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Social',
		),

		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Fifth Social color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "social_clr5",
			"edit_field_class" => "vc_col-sm-5",
			"group" 		=> 'Social',
		),

		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #302f2f;font-weight:600;">' . esc_html__( 'About Tab Settings', 'mega-addons-for-visual-composer' ) . '</span>',
			"group" 		=> 'Typography',
		),

		array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'Color [Member - Profession]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"memberproclr",
			"edit_field_class" => "vc_col-sm-6",
			"group" 		=> 	'Typography',
        ),

        array(
            "type" 			=> 	"colorpicker",
			"heading" 		=> 	__( 'About Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> 	"about_clr",
			"edit_field_class" => "vc_col-sm-6",
			"group" 		=> 	'Typography',
        ),

        array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Member Name [Font Size]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "member_txt_size",
			"edit_field_class" => "vc_col-sm-6",
			"suffix" 		=> 	'px',
			"group" 		=> 'Typography',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'About [Font Size]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "about_txt_size",
			"edit_field_class" => "vc_col-sm-6",
			"suffix" 		=> 	'px',
			"group" 		=> 'Typography',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Profession [Font Size]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "pro_txt_size",
			"suffix" 		=> 	'px',
			"group" 		=> 'Typography',
		),

		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #302f2f;font-weight:600;">' . esc_html__( 'Info Tab Settings', 'mega-addons-for-visual-composer' ) . '</span>',
			"group" 		=> 'Typography',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Info [Font Size]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "info_size",
			"suffix" 		=> 	'px',
			"group" 		=> 'Typography',
		),
		array(
			"type" 			=> "colorpicker",
			"heading" 		=> __( 'Text Color', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "info_clr",
			"description" 	=> __( 'Set color of all info text', 'mega-addons-for-visual-composer' ),
			"group" 		=> 'Typography',
		),

		array(
			"type" 			=> "vc_links",
			"param_name" 	=> "caption_url",
			"class"			=>	"ult_param_heading",
			"description" 	=> '<span style="Background: #ddd;padding: 10px; display: block; color: #302f2f;font-weight:600;">' . esc_html__( 'Social Tab Settings', 'mega-addons-for-visual-composer' ) . '</span>',
			"group" 		=> 'Typography',
		),

		array(
			"type" 			=> "vc_number",
			"heading" 		=> __( 'Social [Icon Size]', 'mega-addons-for-visual-composer' ),
			"param_name" 	=> "social_size",
			"value" 		=> "19",
			"suffix" 		=> 	'px',
			"group" 		=> 'Typography',
		),


	),
) );

