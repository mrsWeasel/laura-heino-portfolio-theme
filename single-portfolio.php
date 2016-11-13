<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Laura Heino
 */

get_header(); ?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();
					?>
					<div class="row">
					<section class="col-md-9 col-sm-12">
					<?php		
					get_template_part( 'template-parts/content' );
					?>
					</section>
					<?php
					if (get_field('portfolio_item_details')) : ?>
					<section class ="portfolio-item-details col-md-3 col-sm-12">
						<h1><?php the_title() ?></h1>
						<?php
						$portfolio_item_details = wp_kses(get_field('portfolio_item_details'), array('a' => array('href' => array()), 'p' => array(), 'strong' => array(), 'br' => array(), 'b' => array(), 'em' => array()));
						echo $portfolio_item_details;
						if ( function_exists( 'sharing_display' ) ) {
						    sharing_display( '', true );
						}

						?>
					</section>
					</div>			
					<?php endif;

				endwhile; // End of the loop.
				?>
			</main><!-- #main -->
		</div><!-- #primary -->
<?php
get_footer();