<?php
$user = get_user_by('id', get_the_author_meta('ID'));
$userMeta = get_user_meta(get_the_author_meta('ID'));
?>

<section class="section ainfo">
	<div class="wrapper">
		<div class="section__content">
			<div class="ainfo__cont card shadow">
				<div class="ainfo__img">
					<img src="<?php echo carbon_get_user_meta(2, 'cf_user_avatar') ?>" alt="">
				</div>
				<div class="ainfo__title">
					<h3>
						<?php print_r($user->display_name) ?>
					</h3>
					<p><em>
							<?php echo carbon_get_user_meta(2, 'cf_user_title') ?>
						</em></p>
					<p>
						<?php echo $userMeta['description'][0] ?>
					</p>
				</div>
				<div class="ainfo__desc card inv-shadow content">
					<?php echo carbon_get_user_meta(2, 'cf_user_short') ?>
				</div>
			</div>
		</div>
	</div>
</section>