<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
								<h1><?php esc_html_e('Something broke!', 'lauraheino'); ?></h1>
							</header>
							<?php get_template_part( 'template-parts/content', 'none' ); ?>
						</section>
					</div>		
				</main><!-- #main -->
			</div><!-- #primary -->

<?php
get_footer();