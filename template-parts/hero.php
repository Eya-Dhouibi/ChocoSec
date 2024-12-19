<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <!-- Slides -->
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active" id="slide-1">
            <div class="carousel-overlay slide-1"></div>
            <div class="container d-block d-md-flex justify-content-center align-items-center text-white">
                <div class="col-sm-12 col-md-4 slide-content">
                    <div class="title-1">
                        <span>Énergie et Saveurs Naturelles</span>
                        <h1>Fruits Secs</h1>
                    </div>
                    <a href="<?php echo home_url('/product-category/fruits-secs'); ?>" class="btn-1"
                        aria-label="Voir nos fruits secs">Nos fruits secs</a>
                </div>
                <div class="col-sm-12 col-md-4">
                    <img width="343" height="408"
                        src="<?php echo get_template_directory_uri() . '/assets/img/hero-01.png'; ?>"
                        alt="Fruits secs riches en saveurs et énergie" loading="lazy">
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="text-heart">
                        <p>Découvrez notre gamme de <strong>fruits secs</strong>, parfaits pour une alimentation saine
                            et équilibrée.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" id="slide-2">
            <div class="carousel-overlay slide-2"></div>
            <div class="container d-block d-md-flex justify-content-center align-items-center text-white">
                <div class="col-sm-12 col-md-4 slide-content">
                    <div class="title-1">
                        <span>Naturels et Nutritifs</span>
                        <h1>Fruits Séchés</h1>
                    </div>
                    <a href="<?php echo home_url('/product-category/fruits-seches'); ?>" class="btn-1"
                        aria-label="Voir nos fruits séchés">Nos fruits séchés</a>
                </div>
                <div class="col-sm-12 col-md-4">
                    <img width="403" height="408"
                        src="<?php echo get_template_directory_uri() . '/assets/img/hero-02.png'; ?>"
                        alt="Fruits séchés naturels et nutritifs" loading="lazy">
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="text-heart">
                        <p>Appréciez la qualité de nos <strong>fruits séchés</strong>, parfaits pour vos envies de
                            douceur naturelle.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" id="slide-3">
            <div class="carousel-overlay slide-3"></div>
            <div class="container d-block d-md-flex justify-content-center align-items-center text-white">
                <div class="col-sm-12 col-md-4 slide-content">
                    <div class="title-1">
                        <span>Plaisir Gourmand</span>
                        <h1>Chocolat</h1>
                    </div>
                    <a href="<?php echo home_url('/product-category/chocolats'); ?>" class="btn-1"
                        aria-label="Voir nos chocolats">Nos chocolatés</a>
                </div>
                <div class="col-sm-12 col-md-4">
                    <img width="355" height="408"
                        src="<?php echo get_template_directory_uri() . '/assets/img/hero-03.png'; ?>"
                        alt="Chocolat gourmand et irrésistible" loading="lazy">
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="text-heart">
                        <p>Laissez-vous séduire par nos créations chocolatées, un véritable plaisir pour les papilles.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Flèches de navigation -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev"
        aria-label="Slide précédent">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Précédent</span>
    </button>
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next"
        aria-label="Slide suivant">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Suivant</span>
    </button>
</div>