<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nandan-global
 */

?>
<?php if(is_front_page()): ?>
	<?php the_content(); ?>
<?php else : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<section class="py-16">
			<div class="container mx-auto">
				<?php the_title( '<h1 class="entry-title text-3xl text-gray-900 font-bold entry-title mb-4">', '</h1>' ); ?>
		
					<?php nandan_global_post_thumbnail(); ?>

					<div class="entry-content description">
						<?php
							the_content();
						?>
					</div><!-- .entry-content -->

			</div>
		</section>
	
	</article><!-- #post-<?php the_ID(); ?> -->

<?php endif; ?>