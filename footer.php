    </div><!-- #content -->

    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="site-info">
            <?php
            printf(
                esc_html__('© %1$s %2$s. All rights reserved.', 'textdomain'),
                date('Y'),
                get_bloginfo('name')
            );
            ?>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->

    <?php wp_footer(); ?>
</body>
</html>
