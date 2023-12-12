<?php


get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        $args = array(
            'post_type'      => 'project',
            'posts_per_page' => 6,
            'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) :
                $query->the_post();
        ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer">
                        <?php
                        // Display additional information or meta data if needed
                        ?>
                    </footer><!-- .entry-footer -->
                </article><!-- #post-<?php the_ID(); ?> -->

        <?php
            endwhile;

            // Add simple next and previous pagination
            ?>
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'prev_text' => '&laquo; Previous',
                    'next_text' => 'Next &raquo;',
                ));
                ?>
            </div>
            <?php

            wp_reset_postdata();
        else :
            echo esc_html__('No projects found.', 'Ikonicsolution');
        endif;
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>
