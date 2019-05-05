<?php

get_header();

	if(have_posts()) : ?>


	<!-- Настройка внешнего вида Архива записей -->
	<!-- Кастомизация по Категории, Автору, Тегу, Дате -->
	<h2><?php

	if ( is_category() ) {
		// вывод категории
		single_cat_title();
	} elseif ( is_tag() ) {
		// вывод тега
		single_tag_title();
	} elseif ( is_author() ) {
		the_post();  //Без post может и не сработать, лучше оставить
		echo 'Author Archives: ' . get_the_author(); //получаем автора
		rewind_posts();
	} elseif ( is_day() ) {
		echo 'Daily Archives: ' . get_the_date(); //полная дата
	} elseif ( is_month() ) {
		echo 'Monthly Archives: ' . get_the_date('F Y');  //месяц года
	} elseif ( is_year() ) {
		echo 'Yearly Archives: ' . get_the_date('Y');  //год
	} else {
		echo 'Archives:';
	}

	?></h2>

	<?php
		while(have_posts()) : the_post();
			
			get_template_part('content', get_post_format());

		endwhile;
	else :
		echo '<p>Записей не найдено</p>';
	endif;

get_footer();
?>
