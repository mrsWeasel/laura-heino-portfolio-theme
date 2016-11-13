<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Laura Heino
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="row">
					<section class="col-md-9 col-sm-12">
						<header class="entry-header">
							<img src="<?php echo get_template_directory_uri() . '/assets/images/search-bg.jpg';?>" alt="" />
							<?php $page_heading = sprintf(esc_html('Search results for "%s"', 'lauraheino'), get_search_query() ); ?>
							<h1><?php echo $page_heading; ?></h1>	
						</header>		
						<?php
						if ( have_posts() ) : ?>

							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
					</section>	
				</div>		
			</main><!-- #main -->
		</div><!-- #primary -->

<?php

get_footer();
