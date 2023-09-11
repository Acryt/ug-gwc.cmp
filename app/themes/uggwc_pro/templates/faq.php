<?php
/*
Template Name: FAQ
*/ 
?>

<?php
the_post();
get_header();
?>

<main class="main">
	<?php
	get_template_part('parts/section-faq-accrd');
	get_template_part('parts/section-form');
	?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>