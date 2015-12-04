<?php
		global $post;
?>
	<div class="container">		
		<?php
		$post_meta_data_url = get_post_custom($post->ID,'url', true); 
		$meta_url = $post_meta_data_url['url'];
		echo '</br>';
		echo the_content();
		echo '<strong>Features Display Name:</strong>';
		$meta_featuresdisplayname = get_post_meta($post->ID,'featuresdisplayname', false);
		if($meta_featuresdisplayname!=''){
				echo implode(", ", $meta_featuresdisplayname);
		}
		echo '</br>';
		echo '<strong>Amenities Display Name:</strong>';
		$meta_amenitiesdisplayname = get_post_meta($post->ID,'amenitiesdisplayname', false);
		if($meta_amenitiesdisplayname!=''){
				echo implode(", ", $meta_amenitiesdisplayname);
		}
		echo '</br>';
		echo '<strong>Security Display Name:</strong>';
		$meta_securitydisplayname = get_post_meta($post->ID,'securitydisplayname', false);
		if($meta_securitydisplayname!=''){
				echo implode(", ", $meta_securitydisplayname);
		}
		echo '</br>';
		echo '<strong>Communication Display Name:</strong>';
		$meta_communicationdisplayname = get_post_meta($post->ID,'communicationdisplayname', false);
		if($meta_communicationdisplayname!=''){
				echo implode(", ", $meta_communicationdisplayname);
		}
		echo '</br>';
		echo '<strong>Entertainment Display Name:</strong>';
		$meta_entertainmentdisplayname = get_post_meta($post->ID,'entertainmentdisplayname', false);
		if($meta_entertainmentdisplayname!=''){
				echo implode(", ", $meta_entertainmentdisplayname);
		}
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

		echo '</br>';
		
		echo '<strong>Connected Offers:</strong>';
		$p2p_meta_data_faci = get_post_custom($post->ID,'taxonomy_facility_off', true);
		$meta_taxfaci = $p2p_meta_data_faci['taxonomy_facility_off'];
		if($meta_taxfaci!=''){
		foreach ($meta_taxfaci as $string) {
		echo ''.get_the_title( $string ).','.'';
		}
		}
		?>
	</div>