<?php

/**
 * Contact page
 */


get_header();
?>
<div class="l-contact-page">
	<h1 class="contact-page-title">For Inquiries, <br>Please Contact</h1>
	<hr>

	<p class="contact-details">
		T: (203) 629 1800<br>
		E: <a href="mailto:info@greenwichmarketing.com">info@greenwichmarketing.com</a>
	</p>
	<hr>
	<div class="l-client-quote">
		<div class="the-quote">
			<?php the_field('quote', 16); ?>
		</div>
		<div class="attributor-details">
			<?php the_field('author'); ?>
		</div>
	</div>
</div>	

<?php get_footer(); ?>