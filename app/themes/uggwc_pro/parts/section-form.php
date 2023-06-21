<section id="sform" class="section sform">
	<div class="wrapper container">
		<img class="sform__img" src="<?php bloginfo('template_url'); ?>/assets/images/forms/form.svg" alt="">
		<div class="section__header">
			<h2>Anfrage hinterlassen</h2>
			<p>Hier können Sie Ihr unverbindliches Angebot erhalten</p>
		</div>
		<div class="section__content">
			<div class="sform__cont card shadow">
				<img class="wow animate__jello first__hat animate__repeat-2 animate__delay-2s" src="<?php echo get_bloginfo('template_url') . '/assets/images/first/hat.svg' ?>" alt="">
				<?php get_template_part('parts/form-big') ?>
			</div>
		</div>
	</div>
</section>