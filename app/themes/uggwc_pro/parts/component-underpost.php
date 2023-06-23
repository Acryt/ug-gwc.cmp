<div class="under">
	<div class="post-author">
		<div class="post-author__photo">
			<img src="<?php echo carbon_get_user_meta(get_the_author_meta('ID'), 'cf_user_avatar'); ?>" alt="photo author">
		</div>
		<h6><?php the_author(); ?></h6>
	</div>
	<div class="post-date">
		<p><?php the_date(); ?></p>
	</div>
</div>