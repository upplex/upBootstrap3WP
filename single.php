<?php
/**
 * The Template for displaying all single posts.
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
			
						<?php get_template_part( 'content', 'single' ); ?>
			
						<?php upbootwp_content_nav( 'nav-below' ); ?>
			
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