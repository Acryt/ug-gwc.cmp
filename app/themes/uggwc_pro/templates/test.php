<?php
/*
Template Name: ForDEV
*/ 
?>


<?php get_header(); ?>
<main class="main">
	<?php
	phpinfo()
	?>
</main>

<?php 
get_template_part('parts/popups');
get_footer();
?>