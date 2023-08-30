<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php while (have_posts()) {
                the_post();
                get_template_part('template-parts/content', 'postbuilder');
            }
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/content', 'pagebuilder');
            }
            if (is_singular('blog')) {
                get_template_part('elements/components/cta-banner-blog-card/cta-banner-blog-card');
            } ?>
        </main>
    </div>
<?php
get_footer();
//
