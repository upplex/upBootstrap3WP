<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 1.1
 */

get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
			
						<section class="error-404 not-found">
							<header class="page-header">
								<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'upbootwp' ); ?></h1>
							</header><!-- .page-header -->
			
							<div class="page-content">
								<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'upbootwp' ); ?></p>
			
								<?php get_search_form(); ?>
			
								<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
			
								<?php if ( upbootwp_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
								<div class="widget widget_categories">
									<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'upbootwp' ); ?></h2>
									<ul>
									<?php
										wp_list_categories( array(
											'orderby'    => 'count',
											'order'      => 'DESC',
											'show_count' => 1,
											'title_li'   => '',
											'number'     => 10,
										) );
									?>
									</ul>
								</div><!-- .widget -->
								<?php endif; ?>
			
								<?php
								/* translators: %1$s: smiley */
								$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'upbootwp' ), convert_smilies( ':)' ) ) . '</p>';
								the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
								?>
			
								<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
			
							</div><!-- .page-content -->
						</section><!-- .error-404 -->
			
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .col-md-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
<?php get_footer(); ?>