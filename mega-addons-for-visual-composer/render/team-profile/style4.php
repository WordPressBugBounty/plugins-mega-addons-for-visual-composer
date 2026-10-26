<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php $some_id = VC_MEGA::next_instance_id(); ?>
<?php $hex = is_string( $member_clr ) && preg_match( '/^#[0-9a-fA-F]{3}(?:[0-9a-fA-F]{3})?$/D', $member_clr ) ? ( strlen( $member_clr ) === 4 ? '#' . $member_clr[1] . $member_clr[1] . $member_clr[2] . $member_clr[2] . $member_clr[3] . $member_clr[3] : $member_clr ) : '#000000';
$r = hexdec( substr( $hex, 1, 2 ) ); $g = hexdec( substr( $hex, 3, 2 ) ); $b = hexdec( substr( $hex, 5, 2 ) ); ?>

<?php if ($member_visibility == 'smart') { ?>
	<div class="mega_team_case_4 mega_team_case_4<?php echo esc_attr($some_id); ?> <?php echo esc_attr($classname); ?>" style="width: <?php echo esc_attr($pro_size); ?>px;">
		<div class="member-image">
			<?php if (isset($url) && $url != '') { ?>
				<a ref="<?php echo esc_url($url['url']); ?>" target="<?php echo esc_attr($url['target']); ?>" title="<?php echo esc_html($url['title']); ?>"><img src="<?php echo esc_attr($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>"></a>
			<?php } ?>
			<?php if (isset($url) && $url == NULL) { ?>
				<a><img src="<?php echo esc_attr($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>"></a>
			<?php } ?>
		</div>
		<div class="mega_wrap">
			<div class="member-name" style="color: <?php echo esc_attr($memberproclr); ?>; font-size: <?php echo esc_attr($member_txt_size); ?>px;">
				<?php echo esc_attr($memb_name); ?>
				<span style="color: <?php echo esc_attr($memberproclr); ?>; font-size: <?php echo esc_attr($pro_txt_size); ?>px;">
					<?php echo esc_attr($memb_prof); ?>
				</span>
			</div>
			<div class="member-desc" style="color: <?php echo esc_attr($about_clr); ?>; font-size: <?php echo esc_attr($about_txt_size); ?>px;">
				<?php echo esc_attr($memb_about); ?>
			</div>
			<div class="member-social">
				<a href="<?php echo esc_attr($social_url); ?>" target="_blank">
					<i class="<?php echo esc_attr($social_icon); ?>"></i>
				</a>
				<a href="<?php echo esc_attr($social_url2); ?>" target="_blank">
					<i class="<?php echo esc_attr($social_icon2); ?>"></i>
				</a>
				<a href="<?php echo esc_attr($social_url3); ?>" target="_blank">
					<i class="<?php echo esc_attr($social_icon3); ?>"></i>
				</a>
				<a href="<?php echo esc_attr($social_url4); ?>" target="_blank">
					<i class="<?php echo esc_attr($social_icon4); ?>"></i>
				</a>
				<a href="<?php echo esc_attr($social_url5); ?>" target="_blank">
					<i class="<?php echo esc_attr($social_icon5); ?>"></i>
				</a>
				<?php if (!empty($social_icon6)) { ?>
				<a href="<?php echo esc_attr($social_url6); ?>" target="_blank">
					<i class="<?php echo esc_attr($social_icon6); ?>"></i>
				</a>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>

<style>
	.mega_team_case_4<?php echo esc_attr($some_id); ?>:hover .mega_wrap {
	    <?php echo esc_html( "background-color: rgba($r, $g, $b, 0.5) !important;" ); ?>
	}
</style>