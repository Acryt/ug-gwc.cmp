<?php
/*
Template Name: FAQ
*/ 
?>

<?php
get_header();
the_post();
?>

<main class="main">
	<?php
	get_template_part('parts/section-faq');
	get_template_part('parts/section-form');
	?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>