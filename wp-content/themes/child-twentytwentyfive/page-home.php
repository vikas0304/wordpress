<?php
/**
 * Template Name: Homepage Layout
 *
 *
 * @package Twenty Twenty-Five Child
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- HERO SECTION -->
    <section class="hero-section text-white text-center">
        <div class="container">
            <h1><span class="hero-section_title__highlight">LOREM</span> IPSUM DOLOR</h1>
            <p class="lead">LOREM IPSUM DOLOR SIT AMET LOREM IPSUM DOLOR SIT AMET</p>
            <a href="#contact" class="btn btn-primary btn-lg">CONTACT US</a>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="about-section_title"><span class="about-section_title__highlight">LOREM </span>IPSUM
                        DOLOR SIT AMET</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam rem aperiam. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                <div class="icon-box--container d-flex col-lg-4 align-items-center text-center">
                    <div class="icon-box">
                        <img width="80" class="mb-2"
                            src="<?php echo esc_url(get_stylesheet_directory_uri() . '/images/team1.png'); ?>"
                            alt="Teams" />
                        <h3>MEET OUR TEAM</h3>
                    </div>
                    <div class="icon-box">
                        <img width="80" class="mb-2"
                            src="<?php echo esc_url(get_stylesheet_directory_uri() . '/images/building.png'); ?>"
                            alt="Buildings" />
                        <h3>SEE OUR PROJECTS</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- TESTIMONIALS SECTION -->
<section class="testimonials-section">
    <div class="testimonial-header">
        <div class="container">
            <h2 class="section-title">TESTIMONIALS</h2>
        </div>
    </div>
    <div class="testimonial-body">
        <div class="container">
            <?php
            $testimonial_query = new WP_Query([
                'post_type' => 'testimonial',
                'posts_per_page' => -1,
            ]);

            if ($testimonial_query->have_posts()) :
            ?>
                <div class="testimonial-content text-center">
                    <img class="testimonial-arrow prev" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/images/Arrow 1 copy.png'); ?>" alt="Previous Testimonial">

                    <div class="testimonial-slider-container">
                        <?php
                        $count = 0;
                        while ($testimonial_query->have_posts()) : $testimonial_query->the_post();
                            $active_class = ($count == 0) ? 'active' : '';
                        ?>
                            <div class="testimonial-slide <?php echo $active_class; ?>">
                                <div class="testimonial-text">
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                    <div class="testimonial-author">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail([40, 40], ['alt' => esc_attr(get_the_title())]); ?>
                                        <?php endif; ?>
                                        <?php
                                        $author_name = get_post_meta(get_the_ID(), '_testimonial_author_name', true);
                                        if (!empty($author_name)) :
                                        ?>
                                            <span>by <?php echo esc_html($author_name); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $count++;
                        endwhile;
                        ?>
                    </div>

                    <img class="testimonial-arrow next" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/images/Arrow 1.png'); ?>" alt="Next Testimonial">
                </div>
            <?php
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

</main>

<?php
get_footer();