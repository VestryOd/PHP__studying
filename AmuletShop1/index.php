<?php

get_header(); ?>

	<!-- Parent div of main and sidebar to make clearfix -->
	<div class="site-content clearfix">
		<!-- Central section of content -->
		<div class="main-column">
			<?php if(have_posts()) :
			while(have_posts()) : the_post();

			get_template_part('content', get_post_format());

			endwhile;
			else :
				echo '<p>Записей не найдено</p>';
			endif; ?>
		</div>

		<?php get_sidebar(); ?>
	</div>


<?php get_footer();
?>
