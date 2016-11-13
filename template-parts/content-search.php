<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Laura Heino
 */

?>
	<div class="row">
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-sm-8' ); ?>>
			<header>
				<?php the_title( sprintf( '<h2 class="entry-title search-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php sassyscores_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- header -->

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

			
		</article><!-- #post-## -->
	</div>	
