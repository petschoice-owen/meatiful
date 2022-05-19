<?php
/**
 * The template for displaying archive pages
 *
 */

get_header();

$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>

	<header class="page-header alignwide">
		<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		<?php if ( $description ) : ?>
			<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
	</header><!-- .page-header -->

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
	<?php endwhile; ?>

<?php else : ?>
	<section class="section-no-post">
		<h2 class="404">Nothing has been posted like that yet - News</h2>
	</section>
<?php endif; ?>

<?php get_footer(); ?>
