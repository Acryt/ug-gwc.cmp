<?php
$userMeta = get_user_meta(get_the_author_meta('ID'));
?>

<div class="under">
	<div class="post-author">
		<div class="post-author__photo">
			<img src="<?php echo carbon_get_user_meta(get_the_author_meta('ID'), 'cf_user_avatar'); ?>" alt="photo author">
		</div>
		<div class="under__title">
			<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><strong><?php the_author(); ?></strong></a>
			<p><em><?php echo carbon_get_user_meta(get_the_author_meta('ID'), 'cf_user_title') ?></em></p>
		</div>
	</div>
	<div class="post-date">
		<p><?php the_date(); ?></p>
	</div>
</div>