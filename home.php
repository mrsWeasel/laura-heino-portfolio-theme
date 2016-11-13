<?php
/**
 * The template for displaying blog posts.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Laura Heino
 */

get_header(); ?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="row">
					<section class="col-md-9 col-sm-12">
						<?php
						while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'template-parts/content', 'page' ); ?>
						
						<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
						<?php sassyscores_paginate_posts(); ?>
					</section>	
				</div>		
			</main><!-- #main -->
		</div><!-- #primary -->

<?php

get_footer();
