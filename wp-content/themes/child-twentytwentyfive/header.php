<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="site-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/images/logo.png'); ?>"
                        alt="<?php bloginfo('name'); ?>" style="height: 40px; width: auto;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
                    aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main-nav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                        <li class="nav-item"><a class="nav-link" href="#">ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">PROJECTS</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">LOREM</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">IPSUM</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">CONTACT</a></li>
                        <li class="nav-item ms-lg-3">
                            <a href="tel:123456789" class="btn btn-light phone-button">
                                <i class="fas fa-phone"></i> 123 456789
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>