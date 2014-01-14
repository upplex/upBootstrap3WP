<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 1.1
 */

get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
			
						<?php while ( have_posts() ) : the_post(); ?>
			
							<?php get_template_part( 'content', 'page' ); ?>
			
							<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || '0' != get_comments_number() )
									comments_template();
							?>
			
						<?php endwhile; // end of the loop. ?>
			
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .col-md-8 -->
			
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div><!-- .col-md-4 -->
		</div><!-- .row -->
	</div><!-- .container -->
<?php get_footer(); ?>
