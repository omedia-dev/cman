<?php

/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/user-registration/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion UserRegistration will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.wpeverest.com/user-registration/template-structure/
 * @author  WPEverest
 * @package UserRegistration/Templates
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

$current_user = wp_get_current_user();

?>

<div class="lk-user-wrap">
	<div class="row justify-content-between">
		<div class="col-12 col-md-3 user-photo user-box">
			<?php
			$gravatar_image = get_avatar_url(get_current_user_id(), $args = null);
			$profile_picture_url = get_user_meta(get_current_user_id(), 'user_registration_profile_pic_url', true);
			$image = (!empty($profile_picture_url)) ? $profile_picture_url : $gravatar_image;
			?>
			<img src="<?php echo $image; ?>" alt="" class="img-rounded">
			<div class="mt-2 text-center">@<?php echo $current_user->display_name; ?></div>
			<!-- <div class="custom-file">
				<input type="file" class="custom-file-input" id="customFile">
				<label class="custom-file-label" for="customFile">Изменить фотографию</label>
			</div> -->
		</div> <!-- //.col -->
		<div class="col-md-9">
			<div class="row">
				<div class="col-12 col-md-6 user-info user-box">
					<dl>
						<dt>ФИО:</dt>
						<dd>
						<?php
							$full_name = ucfirst(get_user_meta(get_current_user_id(), 'first_name', true));
							if (empty($full_name)) {
								$full_name = $current_user->display_name;
							}
							echo $full_name;
						?>
						</dd>
					</dl>
					<dl>
						<dt>Дата регистрации: </dt>
						<dd><?php echo get_the_author_meta('registered', $current_user->ID); ?></dd>
					</dl>
					<dl>
						<dt>Являюсь: </dt>
						<dd><?php echo get_the_author_meta('user_registration_who', $current_user->ID); ?></dd>
					</dl>
					<dl>
						<dt>Телефон для связи: </dt>
						<dd><?php echo get_the_author_meta('last_name', $current_user->ID); ?></dd>
					</dl>
				</div> <!-- //.col -->
				<div class="col-12 col-md-6 user-info user-box">
					<dl>
						<dt>Email уведомлений: </dt>
						<dd><?php echo get_the_author_meta('user_email', $current_user->ID); ?></dd>
					</dl>
					<dl>
						<dt>Объекты аренды:</dt>
						<dd><a href="/lk/rent-list/" class="link-default">
								<?php echo count_user_posts($current_user->ID, 'nedv_arenda'); ?>
							</a></dd>
					</dl>
					<?php if(is_super_admin()) : ?>
					<dl>
						<dt>Объекты продажи: </dt>
						<dd><?php echo count_user_posts($current_user->ID, 'nedv_sale'); ?></dd>
					</dl>
					<?php endif; ?>
					<!-- ur_logout_url(ur_get_page_permalink('myaccount') - ссылка выйти -->
					<a href="<?php echo ur_get_endpoint_url('edit-profile'); ?>" class="link-underline d-block"><span>Редактировать информацию</span></a>
					<a href="<?php echo ur_get_endpoint_url('edit-password'); ?>" class="link-underline d-block"><span>Изменить пароль</span></a>
				</div> <!-- //.col -->
			</div> <!-- //.row -->
		</div> <!-- //.col-md-9 -->
	</div> <!-- //.row -->
</div> <!-- //.lk-user-wrap -->



<?php
/**
 * My Account dashboard.
 *
 * @since 2.6.0
 */
do_action('user_registration_account_dashboard');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
