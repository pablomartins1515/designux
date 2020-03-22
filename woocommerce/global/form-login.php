<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

if ( is_user_logged_in() ) {
	return;
}

?>
<form method="post" class="woocomerce-form woocommerce-form-login login check-login" <?php if ( $hidden ) echo 'style="display:none;"'; ?>>

	<?php do_action( 'woocommerce_login_form_start' ); ?>

	<div class="login-entrance-text">
		<?php if ( $message ) echo wpautop( wptexturize( $message ) ); ?>
	</div>
		
	<p class="form-row form-row-first">
		<input type="text" placeholder="<?php esc_html_e( 'Username or email', 'burst' ); ?>" class="input-text placeholder" name="username" id="username" />
	</p>
	<p class="form-row form-row-last">
		<input class="input-text placeholder" placeholder="<?php esc_html_e( 'Password', 'burst' ); ?>" type="password" name="password" id="password" />
	</p>
	<div class="clear"></div>

	<?php do_action( 'woocommerce_login_form' ); ?>

	<p class="form-row">
		<?php wp_nonce_field( 'woocommerce-login' ); ?>
		<input type="submit" class="button" name="login" value="<?php esc_html_e( 'Login', 'burst' ); ?>" />
		<a class="lost_password" href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'burst' ); ?></a>
		<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
		<label class="inline woocommerce-form__label woocommerce-form__label-for-checkbox woo-my-account-rememberme">
			<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e( 'Remember me', 'burst' ); ?>
		</label>
	</p>

	<div class="clear"></div>

	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>