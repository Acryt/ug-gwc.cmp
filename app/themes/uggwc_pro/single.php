<?php
the_post();
get_header();
?>

<main class="main">
	<?php
	get_template_part('parts/section-first');
	get_template_part('parts/section-crumbs');
	get_template_part('parts/content-blog');
	get_template_part('parts/section-faq');
	get_template_part('parts/section-same-posts');
	?>
</main>

<?php
get_template_part('parts/meta-ar');
get_template_part('parts/popups');
get_footer();
?>