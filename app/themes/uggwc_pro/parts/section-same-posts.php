<?php
	$current_post_id = get_the_ID();
	$current_post_tags = wp_get_post_terms($current_post_id, 'post_tag');
	$related_posts = array();
	
	foreach ($current_post_tags as $tag) {
		 $args = array(
			  'post_type' => 'post',
			  'tag' => $tag->slug,
			  'posts_per_page' => 3,
		 );
	
		 $query = new WP_Query($args);
	
		 if ($query->have_posts()) {
			  while ($query->have_posts()) {
					$query->the_post();
					if (get_the_ID() !== $current_post_id) {
						 $related_posts[] = get_the_ID();
					}
			  }
			  wp_reset_postdata();
			  if (count($related_posts) >= 3) {
					break;
			  }
		 }
	}
	
	if (!empty($related_posts)) {
		 foreach ($related_posts as $post_id) {
			  echo '<h2>' . get_the_title($post_id) . '</h2>';
		 }
	} else {
		 // Ничего не найдено
	}