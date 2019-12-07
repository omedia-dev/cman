<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/user-registration/myaccount/form-login.php.
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
 * @version 1.4.7
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>



<div class="login-form-page">
	<?php apply_filters( 'user_registration_login_form_before_notice', ur_print_notices() ); ?>
	<?php do_action( 'user_registration_before_customer_login_form' ); ?>
	<form class="front-form" method="post">
		<div class="loginform-head">
            Если Вы уже зарегистрированы на<br>нашем портале, <br>просто авторизуйтесь:
        </div>
		<div class="ur-form-row">
			<div class="ur-form-grid">
					<?php do_action( 'user_registration_login_form_start' ); ?>

					<p class="user-registration-form-row user-registration-form-row--wide form-row form-row-wide">
						<label for="username">Логин: <span class="required">*</span></label>
						<input type="text" placeholder="латинскими буквами" class="user-registration-Input user-registration-Input--text input-text" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
					</p>
					<div class="user-registration-form-row user-registration-form-row--wide form-row form-row-wide<?php echo ( 'yes' === get_option( 'user_registration_login_option_hide_show_password', 'no' ) ) ? ' hide_show_password' : ''; ?>">
						<label for="password">Пароль: <span class="required">*</span></label>
						<div class="password-input-group">
						<input placeholder="введите пароль" class="user-registration-Input user-registration-Input--text input-text" type="password" name="password" id="password" />
						<?php
						if ( 'yes' === get_option( 'user_registration_login_option_hide_show_password', 'no' ) ) {
							?>
						<a href="javaScript:void(0)" class="password_preview dashicons dashicons-hidden" title="<?php echo __( 'Show password', 'user-registration' ); ?>"></a>
							<?php
						}
						?>
						</div>
					</div>

					<?php
					if ( ! empty( $recaptcha_node ) ) {
						echo '<div id="ur-recaptcha-node" style="width:100px;max-width: 100px;"> ' . $recaptcha_node . '</div>';
					}
					?>

					<?php do_action( 'user_registration_login_form' ); ?>

					<?php
						$remember_me_enabled = get_option( 'user_registration_login_options_remember_me', 'yes' );
					if ( 'yes' === $remember_me_enabled ) {
						?>
							<div class="form-row login-remember">
								<label>
									<input name="rememberme" type="checkbox" id="rememberme" value="forever" />
									<span>Запомнить меня</span>
								</label>
							</div>
						<?php
					}
					?>


					<p class="form-row">
						<?php wp_nonce_field( 'user-registration-login', 'user-registration-login-nonce' ); ?>
						<input type="submit" class="user-registration-Button button" name="login" value="Войти" />
						<input type="hidden" name="redirect" value="<?php echo isset( $redirect ) ? $redirect : the_permalink(); ?>" />
					</p>

					<div class="loginform-bottom pt-3 py-2">
                    	<span>
                        	<span class="lnr lnr-user align-top"></span> <a href="<?php echo get_option( 'user_registration_general_setting_registration_url_options' ); ?>" class="link-default align-top ml-1">Регистрация</a>
						</span>
						<span class="ml-3">
                        	<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="link-default align-top ml-1">Восстановить пароль</a>
                    	</span>
                	</div>
					<?php do_action( 'user_registration_login_form_end' ); ?>
			</div>
		</div>
	</form>

</div>

<?php do_action( 'user_registration_after_login_form' ); ?>
