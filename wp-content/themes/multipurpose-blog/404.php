<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package multipurpose blog
 */
get_header(); ?>

<div id="content-blog">
    <div class="container">
        <div class="page-content">
            <h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'multipurpose-blog' ), esc_html__( 'Not Found', 'multipurpose-blog' ) ) ?></h1>
            <p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn', 'multipurpose-blog' ); ?></p>
            <p class="text-404"><?php esc_html_e( 'Dont worry it happens to the best of us.', 'multipurpose-blog' ); ?></p>
            <div class="read-moresec">
                <a href="<?php echo esc_url( home_url() ); ?>" class="button hvr-sweep-to-right"><?php esc_html_e( 'Back to Home Page', 'multipurpose-blog' ); ?></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php get_footer(); ?>