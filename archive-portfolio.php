<?php
/**
 * The template for displaying portfolio archive pages.
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
					<?php if ( have_posts() ) : ?>
						<div class="row">
						<?php
						$count = 0;
						while ( have_posts() ) : the_post();
							++ $count;
							if (has_post_thumbnail()) : ?>
								<div class="col-xs-6">
									<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('portfolio_1_1'); ?>
									</a>
								</div>
								<?php if ($count % 2 == 0 && more_posts()) : ?>
									</div><div class="row">
								<?php endif;
							endif; ?>

						<?php							
						endwhile; // End of the loop.
						?></div>
						<?php
						sassyscores_paginate_posts();

						else:
							get_template_part( 'template-parts/content', 'none' );
						
						?>

					<?php endif; ?>
					</section>	
				</div>		
			</main><!-- #main -->
		</div><!-- #primary -->
<?php
get_footer();
