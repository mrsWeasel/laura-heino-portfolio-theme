<?php
/**
 * The template for displaying archive pages.
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
						<?php if ( have_posts() ) :
						while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'template-parts/content', 'page' ); ?>
						
						<?php endwhile; // End of the loop.

						sassyscores_paginate_posts();

						else:
							get_template_part( 'template-parts/content', 'none' );
						
						endif; ?>
						
					</section>	
					<?php if (is_active_sidebar('sidebar-1')) : ?>
					<aside class="col-md-3 col-sm-12">
					<?php dynamic_sidebar('sidebar-1'); ?>
					</aside>
					<?php endif ?>
				</div>		
			</main><!-- #main -->
		</div><!-- #primary -->

<?php

get_footer();