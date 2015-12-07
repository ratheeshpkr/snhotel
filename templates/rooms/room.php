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
		echo '<strong>Bed Display Name:</strong>';
		$meta_beddisplayname = get_post_meta($post->ID,'beddisplayname', false);
		if($meta_beddisplayname!=''){
				echo implode(", ", $meta_beddisplayname);
		}
		echo '</br>';
		echo '<strong>Entertainment Display Name:</strong>';
		$meta_entertainmentdisplayname = get_post_meta($post->ID,'entertainmentdisplayname', false);
		if($meta_entertainmentdisplayname!=''){
				echo implode(", ", $meta_entertainmentdisplayname);
		}

		echo '</br>';
		echo '<strong>Size:</strong>'.$meta_avail = get_post_meta($post->ID,'size', true);
		echo '</br>';
		echo '<strong>Size Unit:</strong>'.$meta_avail = get_post_meta($post->ID,'sizeunit', true);
		echo '</br>';
		//echo '<strong>Default Occupancy:</strong>';
		//$meta_avail = get_post_meta($post->ID,'occupancyadults', true);
		//if($meta_avail == 1)
		//{
		//		
		//		echo 'Adults';
		//}
		
		echo '<strong>Default Occupancy:</strong>';
		$meta_adults = get_post_meta($post->ID,'occupancyadults', true);
		$meta_kids = get_post_meta( $post->ID, 'occupancykids', true );
		$meta_pets = get_post_meta( $post->ID, 'occupancykids', true );
		$default_valu = '';
		if ($meta_adults == 1)
		{
				$default_valu .= 'Adults  ,';
		}
		if($meta_kids  == 1 ) 
		{
				$default_valu .= ' Kids ,';
		}  
		if($meta_pets  == 1 ) 
		{
				$default_valu .= ' Pets ,';
		}
		echo rtrim($default_valu,",");
		
		echo '</br>';
		//echo '<strong>Additional Occupancy:</strong>'.$meta_avail = get_post_meta($post->ID,'additionaloccupancyadults', true);
		
		echo '<strong>Additional Occupancy:</strong>';
		$meta_additionaloccupancyadults = get_post_meta($post->ID,'additionaloccupancyadults', true);
		$meta_additionaloccupancykids = get_post_meta( $post->ID, 'additionaloccupancykids', true );
		$meta_additionaloccupancypets = get_post_meta( $post->ID, 'additionaloccupancypets', true );
		$additional_valu = '';
		if ($meta_additionaloccupancyadults == 1)
		{
				$additional_valu .= 'Adults , ';
		}
		if($meta_additionaloccupancykids  == 1 ) 
		{
				$additional_valu .= 'Kids , ';
		}
		if($meta_additionaloccupancypets  == 1 ) 
		{
				$additional_valu .= ' Pets ,';
		}
		echo rtrim($additional_valu,",");
		
		echo '</br>';
		echo '<strong>View:</strong>'.$meta_avail = get_post_meta($post->ID,'view', true);
		echo '</br>';
		echo '<strong>Location:</strong>'.$meta_avail = get_post_meta($post->ID,'location', true);
		echo '</br>';
		
		echo '<strong>Bedroom Image:</strong>'.$meta_avail = get_post_meta($post->ID,'bedroomimage', true);
		echo '</br>';
		echo '<strong>Bathroom Image:</strong>'.$meta_avail = get_post_meta($post->ID,'bathroomimage', true);
		echo '</br>';
		echo '<strong>View From Accommodation Image:</strong>'.$meta_avail = get_post_meta($post->ID,'viewfromaccommodationimages', true);
		echo '</br>';
		echo '<strong>Additional Images:</strong>'.$meta_avail = get_post_meta($post->ID,'additionalimage', true);
		echo '</br>';
		echo '<strong>Floor Plan:</strong>'.$meta_avail = get_post_meta($post->ID,'floorplan', true);
		
		echo '</br>';
		echo '<strong>Booking Link:</strong>'.$meta_avail = get_post_meta($post->ID,'bookinglink', true);
		echo '</br>';
		echo '<strong>Book From:</strong>'.$meta_avail = get_post_meta($post->ID,'bookfrom', true);
		echo '</br>';
		echo '<strong>Currency:</strong>'.$meta_avail = get_post_meta($post->ID,'currency', true);
		echo '</br>';
		
		echo '<strong>Connected Offers:</strong>';
		$p2p_meta_data_off = get_post_custom($post->ID,'taxonomy_acc_off', true);
		$meta_taxoff = $p2p_meta_data_off['taxonomy_acc_off'];
		if($meta_taxoff!=''){
		foreach ($meta_taxoff as $string) {
		$val_off .= get_the_title( $string ).',';
		}
		echo rtrim($val_off,",");
		}
		
		
		?>
	</div>