<?php
		global $post;
?>
	<div class="container">		
		<?php
		$post_meta_data_url = get_post_custom($post->ID,'url', true); 
		$meta_url = $post_meta_data_url['url'];
		echo '</br>';
		echo '<strong>Features Display Name:</strong>'.$meta_avail = get_post_meta($post->ID,'featurestitlename', true);
		echo '</br>';
		echo '<strong>Amenities Display Name:</strong>'.$meta_avail = get_post_meta($post->ID,'amenitiestitlename', true);
		echo '</br>';
		echo '<strong>Security Display Name:</strong>'.$meta_avail = get_post_meta($post->ID,'securitytitlename', true);
		echo '</br>';
		echo '<strong>Communication Display Name:</strong>'.$meta_avail = get_post_meta($post->ID,'communicationtitlename', true);
		echo '</br>';
		echo '<strong>Entertainment Display Name:</strong>'.$meta_avail = get_post_meta($post->ID,'entertainmenttitlename', true);
		echo '</br>';
		echo '<strong>Opening Hour Name:</strong>'.$meta_avail = get_post_meta($post->ID,'openinghourtitlename', true);
		echo '</br>';
		echo '<strong>Opening Hour From:</strong>'.$meta_avail = get_post_meta($post->ID,'openinghourfrom', true);
		echo '</br>';
		echo '<strong>Opening Hour To:</strong>'.$meta_avail = get_post_meta($post->ID,'openinghourto', true);
		echo '</br>';
		echo '<strong>Setting:</strong>'.$meta_avail = get_post_meta($post->ID,'setting', true);
		echo '</br>';
		echo '<strong>Type:</strong>'.$meta_avail = get_post_meta($post->ID,'type', true);
		echo '</br>';
		echo '<strong>Location:</strong>'.$meta_avail = get_post_meta($post->ID,'location', true);
		echo '</br>';
		echo '<strong>Connected Offers:</strong>'.$meta_avail = get_post_meta($post->ID,'connectedoffers', true);
		echo '</br>';
		echo '<strong>Contact Link:</strong>'.$meta_avail = get_post_meta($post->ID,'contactlink', true);
		echo '</br>';
		echo '<strong>Contact Phone:</strong>'.$meta_avail = get_post_meta($post->ID,'contactphone', true);
		echo '</br>';
		
		echo '<strong>Additional Image:</strong>'.$meta_avail = get_post_meta($post->ID,'additionalimage', true);
		echo '</br>';
		echo '<strong>Floor Plan:</strong>'.$meta_avail = get_post_meta($post->ID,'floorplan', true);
		echo '</br>';
		echo '<strong>Downloads:</strong>'.$meta_avail = get_post_meta($post->ID,'download', true);

		
		?>
	</div>