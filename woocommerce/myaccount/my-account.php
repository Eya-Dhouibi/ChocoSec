<?php
/**
 * My Account page customized with Bootstrap 5
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined('ABSPATH') || exit;

?>

<section class="section">
    <div class="container">
        <!-- Breadcrumb -->
        <div><?php woocommerce_breadcrumb(); ?></div>

        <div class="row mt-4">
            <!-- User Profile Card -->
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="<?php echo esc_url(get_avatar_url(get_current_user_id(), ['size' => 150])); ?>"
                            alt="avatar" class="rounded-circle img-fluid" style="width: 100px;">
                        <h5 class="my-3"><?php echo esc_html(wp_get_current_user()->display_name); ?></h5>
                        <p class="text-muted mb-1">User description (modifiable)</p>
                        <p class="text-muted mb-4">
                            <?php do_action('woocommerce_account_my-address'); ?>
                        </p>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="<?php echo esc_url(wc_get_endpoint_url('edit-account')); ?>"
                                class="btn btn-primary">Modifier le profil</a>
                            <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>"
                                class="btn btn-secondary ms-2">Se déconnecter</a>
                        </div>
                    </div>
                </div>

                <!-- Downloads Widget -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="mb-4">Vos téléchargements</h6>
                        <p>Consultez et téléchargez vos produits numériques en toute simplicité.</p>
                        <?php do_action('woocommerce_account_downloads'); ?>
                        <a href="<?php echo esc_url(wc_get_endpoint_url('downloads')); ?>"
                            class="btn btn-secondary mt-3">Voir tous les téléchargements</a>
                    </div>
                </div>

                <!-- Commande Widget -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="mb-4">Vos commandes</h6>
                        <p>Accédez à vos commandes passées et suivez leur statut en un clic.</p>
                        <a href="<?php echo esc_url(wc_get_endpoint_url('orders')); ?>"
                            class="btn btn-secondary mt-3">Voir toutes les commandes</a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <?php if (is_account_page() && !is_wc_endpoint_url()) : ?>
                        <h5 class="mb-4">Informations</h5>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <p class="mb-0">Nom</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo esc_html(wp_get_current_user()->display_name); ?>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo esc_html(wp_get_current_user()->user_email); ?>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <p class="mb-0">Téléphone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">Dynamic Phone Info</p>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <?php wc_get_template('myaccount/my-address.php'); ?>
                        </div>
                        <?php else : ?>
                        <?php do_action('woocommerce_account_content'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>