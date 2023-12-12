<?php
/*
Ikonic Solution Tech
*/

get_header();



// Get the coffee image and heading
$coffee_image = hs_give_me_coffee();
$heading = 'Random Coffee Image'; // You can customize the heading

// Output the heading
echo '<h1 style="text-align: center;">' . esc_html($heading) . '</h1>';

// Output the coffee image in a smaller size and center-aligned
if (!empty($coffee_image)) {
    echo '<div style="text-align: center;">';
    echo '<img src="' . esc_url($coffee_image) . '" alt="Coffee Image" style="max-width: 300px; width: 100%; height: auto; display: block; margin: 0 auto;">';
    echo '</div>';
}

// The rest of your template content goes here




$args = array(
    'post_type'      => 'project',
    'posts_per_page' => -1, // Display all projects
    'orderby'        => 'date',
    'order'          => 'DESC',
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

    wp_reset_postdata();
else :
    echo esc_html__('No projects found.', 'textdomain');
endif;

get_footer();
?>
