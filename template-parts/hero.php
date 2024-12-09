<div class="position-relative overflow-hidden">
    <div class="container">
    <!-- Section de la vidéo en arrière-plan couvrant 100% de l'écran -->
    <div class="position-absolute top-0 start-0 w-100 h-100 overflow-hidden" style="z-index: 1;">
        <video class="w-100 h-100" autoplay loop muted playsinline style="object-fit: cover;">
            <source src="<?php echo get_template_directory_uri() . '/assets/video/hero.mov'; ?>" type="video/mp4">
        </video>
            <!-- Filtre dégradé -->
            <div class="video-overlay"></div>
    </div>

    <!-- Contenu centré au-dessus de la vidéo -->
    <div class="hero-content d-flex w-100 justify-content-center align-items-center min-vh-100 text-center">
        <div class="col-md-6">
        <div class="hero-container" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <h1 class="display-2 fw-bolder">Le Goût de la Nature à Votre Table</h1>
                <p class="lead mt-3">Explorez nos fruits secs, fruits séchés et chocolats. Un univers de saveurs pour chaque moment de plaisir.</p>
                <a href="#shop" class="btn-1 mt-2">Découvrir nos produits</a>
            </div>
            
            <!-- Icône pour défilement vers le bas -->
            <svg onclick="this.closest('section').nextElementSibling.scrollIntoView({ behavior: 'smooth' });"
                width="4em" height="4em" viewBox="0 0 16 16" lc-helper="svg-icon" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg" class="mt-4">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                <path fill-rule="evenodd"
                    d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z">
                </path>
            </svg>
        </div>
    </div>
            
    </div>
</div>


    