<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package minimalisticky
 */

get_header(); ?>

	<div id="primary" class="content-area archive archive-portfolio large-12 columns">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php   
                                    echo '<h1 class="page-title">';
                                    the_archive_title();
                                    echo '</h1>';
                                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>
			<?php
			/* Start the Loop */
                        echo '<section id="post-archives" class="group">';
                        
			while ( have_posts() ) : the_post();
                            echo '<div class="archive-item index-post small-12 medium-6 large-3 columns end">';
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'components/features/portfolio/content', 'portfolio' );
                            echo '</div>';
			endwhile;
                        
                        echo '</section>';

                        minimalisticky_paging_nav();

		else :

			get_template_part( 'components/post/content', 'none' );

		endif; ?>

		</main>
	</div>
<?php
get_sidebar();
get_footer();