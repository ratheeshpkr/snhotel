<?php
		global $post;
?>
	<div class="container">		
		<?php
		$post_meta_data_url = get_post_custom($post->ID,'url', true); 
		$meta_url = $post_meta_data_url['url'];
		if($meta_url!=''){
			foreach ($meta_url as $string) {
				echo '<strong>Location:</strong>'.$string.'</br>';
			}
		}
		echo '</br>';
		$meta_startDate = get_post_meta($post->ID,'startDate', true); 
		echo '<strong>Start Date/Time:</strong>'.gmdate("d-m-y\ H:i", $meta_startDate);
		echo '</br>';
		$meta_endDate = get_post_meta($post->ID,'endDate', true); 
		echo '<strong>End Date/Time:</strong>'.gmdate("d-m-y\ H:i", $meta_endDate);
		echo '</br>';
		$meta_doorTime = get_post_meta($post->ID,'doorTime', true); 
		echo '<strong>Door Time:</strong>'.gmdate("d-m-y\ H:i", $meta_doorTime);
		echo '</br>';
		echo '<strong>Occurance:</strong>'.$meta_occurance = get_post_meta($post->ID,'occurance', true); 
		echo '</br>';
		
		?>
	</div>