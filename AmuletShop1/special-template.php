<?php

// Template Name: Special Layout

get_header();

	if(have_posts()) :
		while(have_posts()) : the_post(); ?>
			
			<article class="post page">
				<h2><?php the_title(); ?></h2>

				<!-- info-box -->
				<div class="info-box">
					<h4>Disclaimer title</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus et veritatis sit repudiandae architecto voluptates repellendus rem iste.</p>
				</div><!-- /info-box -->

				<?php the_content(); ?>
			</article>

		<?php endwhile;
	else :
		echo '<p>Записей не найдено</p>';
	endif;

get_footer();
?>