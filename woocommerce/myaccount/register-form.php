<?php
/**
 * Register Form
 *
 * @package WooCommerce\Templates
 * @version 9.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4"><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

            <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?>>

                <?php do_action( 'woocommerce_register_form_start' ); ?>

                <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
                    <div class="mb-3">
                        <label for="reg_username" class="form-label"><?php esc_html_e( 'Username', 'woocommerce' ); ?> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required>
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="reg_email" class="form-label"><?php esc_html_e( 'Email address', 'woocommerce' ); ?> <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" required>
                </div>

                <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
                    <div class="mb-3">
                        <label for="reg_password" class="form-label"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" id="reg_password" autocomplete="new-password" required>
                    </div>
                <?php else : ?>
                    <p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'woocommerce' ); ?></p>
                <?php endif; ?>

                <?php do_action( 'woocommerce_register_form' ); ?>

                <div class="d-grid mb-3">
                    <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                    <button type="submit" class="btn btn-primary" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
                </div>

                <?php do_action( 'woocommerce_register_form_end' ); ?>

            </form>
        </div>
    </div>
</div>

<?php endif; ?>
