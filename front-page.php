<?php
/**
 * The template for displaying the front page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Laura Heino
 */

get_header(); ?>
	<div class="row">
		<div class="col-md-9 col-sm-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					
						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'page' );

						endwhile; // End of the loop.
						?>

						
						<!-- <div class="col-sm-6"> -->
							<!-- <?php if (has_post_thumbnail()) {
								the_post_thumbnail('portfolio_1_1');
							} ?> -->
						<!-- </div> -->
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>	
	</div>	
<?php

get_footer();
