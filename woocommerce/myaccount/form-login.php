<?php
/**
 * Login Form
 *
 * @package WooCommerce\Templates
 * @version 9.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="row" id="customer_login">

    <div class="col-md-6">

        <?php endif; ?>

        <h2 class="text-center m-4"><?php esc_html_e( 'Se connecter', 'woocommerce' ); ?></h2>

        <form class="woocommerce-form woocommerce-form-login login" method="post">

            <?php do_action( 'woocommerce_login_form_start' ); ?>

            <div class="mb-3">
                <label for="username"
                    class="form-label"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?></label>
                <input type="text" class="form-control" name="username" id="username" autocomplete="username"
                    value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>"
                    required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><?php esc_html_e( 'Password', 'woocommerce' ); ?></label>
                <input type="password" class="form-control" name="password" id="password"
                    autocomplete="current-password" required />
            </div>

            <?php do_action( 'woocommerce_login_form' ); ?>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <input type="checkbox" id="rememberme" name="rememberme" value="forever" />
                    <label for="rememberme"><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></label>
                </div>
                <a
                    href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
            </div>

            <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
            <button type="submit" class="btn btn-primary w-100" name="login"
                value="<?php esc_attr_e( 'Connecter', 'woocommerce' ); ?>"><?php esc_html_e( 'Connexion', 'woocommerce' ); ?></button>

            <?php do_action( 'woocommerce_login_form_end' ); ?>

        </form>

        <div class="text-center mt-4">
            <p><?php esc_html_e( "Vous n'avez pas de compte ?", 'woocommerce' ); ?>
                <a href="<?php echo esc_url( wc_get_account_endpoint_url( 'register-form' ) ); ?>"
                    class="btn btn-link">
                    <?php esc_html_e( 'Créer un compte', 'woocommerce' ); ?>
                </a>
            </p>
        </div>
		
		</p>
    </div>
</div>