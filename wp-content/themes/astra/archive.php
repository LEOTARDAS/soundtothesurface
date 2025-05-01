<?php
/**
 * Template for displaying fragmentų archyvą
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<?php if ( astra_page_layout() === 'left-sidebar' ) : ?>
	<?php get_sidebar(); ?>
<?php endif; ?>

<div id="primary" <?php astra_primary_class(); ?>>

	<?php astra_primary_content_top(); ?>

	<header class="page-header">
		<h1 class="page-title">Fragmentai</h1>
	</header>

	<?php if ( have_posts() ) : ?>
		<div class="sample-archive-grid">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="sample-card1">
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'medium' ); ?>
						</a>
					<?php endif; ?>

					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php the_excerpt(); ?></p>

					<?php
					$audio_url = get_post_meta( get_the_ID(), '_sample_audio_file', true );
					if ( $audio_url ) :
					?>
						<audio controls controlsList="nodownload">
							<source src="<?php echo esc_url( $audio_url ); ?>" type="audio/mpeg">
							Jūsų naršyklė nepalaiko audio grotuvo.
						</audio>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		</div>

		<?php astra_pagination(); ?>
	<?php else : ?>
		<p>Šiuo metu nėra jokių fragmentų.</p>
	<?php endif; ?>

	<?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->

<?php if ( astra_page_layout() === 'right-sidebar' ) : ?>
	<?php get_sidebar(); ?>
<?php endif; ?>

<?php get_footer(); ?>
