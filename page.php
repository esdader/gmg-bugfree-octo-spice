<?php
// Page
?>

<?php get_header(); ?>
<div class="hentry">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="entry-content copy-panel">
			<?php the_content(); ?>
		</article>
	<?php endwhile; ?>

	<?php else: ?>

	<?php endif; ?>
</div>
<?php get_footer(); ?>