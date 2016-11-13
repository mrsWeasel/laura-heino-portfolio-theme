<?php
/**
 * Template part for displaying single post content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Laura Heino
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php

		if ( 'post' === get_post_type() ) : ?>
		<header class="entry-header">
			<div class="row">
				<div class="col-xs-12">
					<?php	
					if (has_post_thumbnail()) {
						the_post_thumbnail('portfolio_2_1');
					}
					?>
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</header>		
		<?php endif; ?>

		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php

			the_content(sprintf(
				esc_html__('Read more %s', 'lauraheino'),
				the_title('<span class="screen-reader-text"> about "', '"</span>', false) )
			); 

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lauraheino' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
