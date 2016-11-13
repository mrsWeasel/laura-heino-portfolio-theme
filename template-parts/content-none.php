<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Laura Heino
 */


		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'lauraheino' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php else : ?>
				<?php if ( is_search() ) :
					$helper_text = esc_html('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'lauraheino');
				else :
					$helper_text = esc_html( 'Could be that you followed an outdated link or the url was just wrong. Maybe try searching?', 'lauraheino' );
				endif; ?>

						<p><?php echo $helper_text; ?></p>
							<div class="form-container">	
								<?php get_search_form(); ?>
							</div>
		
		<?php endif; ?>
