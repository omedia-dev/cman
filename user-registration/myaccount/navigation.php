<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/user-registration/myaccount/navigation.php.
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

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
global $wp;

do_action( 'user_registration_before_account_navigation' ); 

function endpoint_active_css( $num ) {
	global $wp;
	$current_link = array_keys(ur_get_account_menu_items())[$num];
	$current = isset( $wp->query_vars[$current_link] );
	$current_is_dashboard = false;
	if( $current_link === 'dashboard' && ( isset($wp->query_vars['page']) ) ){
		$current_is_dashboard = true;
	}
	if ( $current || $current_is_dashboard ) {
		return 'btn-default';
	} else {
		return 'btn-secondary';
	}
}
?>

<?php if(is_super_admin()): ?>
<div class="btn-group btn-group-lg mb-4 lk-button-group" role="group">
	<a class="btn btn-light btn-group-lg <?php echo endpoint_active_css( 0 ); ?>" href="<?php echo ur_get_page_permalink( 'myaccount' ); ?>">Профиль</a>
	<a class="btn btn-light btn-group-lg" href="<?php echo get_edit_user_link(); ?>">Редактировать информацию</a>
	<a class="btn btn-light btn-group-lg <?php echo endpoint_active_css( 1 ); ?>" href="<?php echo ur_get_endpoint_url('edit-password'); ?>">Сменить пароль</a>
	<a class="btn btn-light btn-group-lg <?php echo endpoint_active_css( 2 ); ?>" href="<?php echo ur_logout_url(ur_get_page_permalink('myaccount')); ?>">Выйти</a>
</div>



<?php else : ?>
<div class="btn-group btn-group-lg mb-4 lk-button-group" role="group">
	<a class="btn btn-light btn-group-lg <?php echo endpoint_active_css( 0 ); ?>" href="<?php echo ur_get_page_permalink( 'myaccount' ); ?>">Профиль</a>
	<a class="btn btn-light btn-group-lg <?php echo endpoint_active_css( 1 ); ?>" href="<?php echo ur_get_endpoint_url('edit-profile'); ?>">Редактировать информацию</a>
	<a class="btn btn-light btn-group-lg <?php echo endpoint_active_css( 2 ); ?>" href="<?php echo ur_get_endpoint_url('edit-password'); ?>">Сменить пароль</a>
	<a class="btn btn-light btn-group-lg <?php echo endpoint_active_css( 3 ); ?>" href="<?php echo ur_logout_url(ur_get_page_permalink('myaccount')); ?>">Выйти</a>
</div>
<?php endif; ?>


<?php do_action( 'user_registration_after_account_navigation' ); ?>