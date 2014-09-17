<?php

/**
 * Team page
 */

get_header();

?>
<div class="l-team-container">
	<div class="l-team-holder">
		<ul class="l-team-list team-list">
			<?php 
				$args = array(
							'post_type' => 'team-members',
							'order_by'  => 'menu-order',
							'order'     => 'ASC'
						);
				$team = new WP_Query($args);
			
			 if ( $team->have_posts() ) : while ( $team->have_posts() ) : $team->the_post(); ?>
				<li>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</li>
			<?php endwhile; ?>
			<?php else: ?>
			<?php endif; ?>
		</ul>
	</div>
</div>
<?php get_footer(); ?>