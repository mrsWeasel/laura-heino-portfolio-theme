<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Laura Heino
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	
		<?php 
		if ( is_home() || is_archive() ) : ?>
		<div class="row">
			<div class="col-xs-12">
				<article class="post-container">
					<?php
					$count = 0;
					if (has_post_thumbnail()) : ?>
					<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('portfolio_2_1'); ?>
					</a>
					<?php endif; ?>
					<div class="post-container-inner">
							<h2><?php the_title(); ?> <span class="entry-date"><?php sassyscores_posted_on(); ?></span></h2>
						<?php the_content(sprintf(
							esc_html__('Read more %s', 'lauraheino'),
							the_title('<span class="screen-reader-text"> about "', '"</span>', false) )
						); ?>
					</div>
				</article>
			</div>	
		</div><!-- .row -->
		


		<?php elseif ( ! is_front_page() ) : ?>
		<div class="row">
			<div class="col-sm-12">
				<header class="entry-header">
					<?php	
					if (has_post_thumbnail()) :
					the_post_thumbnail('portfolio_2_1');
					endif; ?>
					<h1><?php the_title();?></h1>
				</header>
				<article class="entry-content">
					<?php the_content(); ?>
				</article>
			</div>
		</div><!-- .row -->	
		<?php else : ?>
		<div class="row">
			<article class="entry-content col-xs-12">
			<?php the_content(); ?>
			</article>	
		</div><!-- .row -->	
		<?php endif; ?>

		<?php wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lauraheino' ),
				'after'  => '</div>',
			) );
		?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'lauraheino' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</section><!-- #post-## -->
