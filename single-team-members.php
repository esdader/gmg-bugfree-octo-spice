<?php

/**
 * Team Member page
 */

get_header();

?>
<div class="l-single-team-container inverse">
	<div class="l-team-holder">
		<ul class="l-team-list team-list">
			<?php 
				$current_post_id = $post->ID;
				$args = array(
							'post_type' => 'team-members',
							'order_by'  => 'menu-order',
							'order'     => 'ASC'
						);
				$team = new WP_Query($args);
			
			 	if ( $team->have_posts() ) : while ( $team->have_posts() ) : $team->the_post(); 

			 		
			 		if ($current_post_id == get_the_id() ) {
			 			$class = ' class="active"';
			 			$current = true;
			 		} else {
			 			$class = '';
			 			$current = false;
			 		}
			 ?>

				<li<?php echo $class; ?>>
					<a href="<?php the_permalink(); ?>">
						<? if ($current) echo '<h1>'; ?>
						<?php the_field('name_line_one'); ?><br>
						<?php the_field('name_line_two'); ?>
						<? if ($current) echo '</h1>'; ?>
					</a>
				</li>
			<?php endwhile; ?>
			<?php else: ?>
			<?php endif; ?>
		</ul>
	</div>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="hentry clearfix bio-article">
		<div class="l-title-col">
			<h3 class="bio-title"><?php the_field('title'); ?></h3>
		</div>
		<div class="l-bio-col entry-content bio-content">
			<?php the_content(); ?>
		</div>
	</article>
	<?php endwhile; ?>
	<?php else: ?>
	<?php endif; ?>
	
</div>

<?php get_footer(); ?>