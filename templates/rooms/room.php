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
		echo '<strong>Bed Display Name:</strong>'.$meta_avail = get_post_meta($post->ID,'bedtitlename', true);
		echo '</br>';
		echo '<strong>Entertainment Display Name:</strong>'.$meta_avail = get_post_meta($post->ID,'entertainmenttitlename', true);
		echo '</br>';
		echo '<strong>Size:</strong>'.$meta_avail = get_post_meta($post->ID,'size', true);
		echo '</br>';
		echo '<strong>Size Unit:</strong>'.$meta_avail = get_post_meta($post->ID,'sizeunit', true);
		echo '</br>';
		echo '<strong>Default Occupancy:</strong>'.$meta_avail = get_post_meta($post->ID,'occupancyadults', true);
		
		
		$meta_avail = get_post_meta($post->ID,'occupancyadults', true);
		
		//$occupancy = get_post_meta($post->ID, "occupancyadults", true);
		//
		//if ($occupancy == 'Checked')
		//{
		//
		//		echo '<strong>Default Occupancy:</strong>Adults';
		//}
		//
		
		
		//$meta = get_post_meta( get_the_ID(), 'occupancyadults', true );
		//if( checked( $meta, 1, false ) )
		//{
		//		echo '<strong>Default Occupancy:</strong>Adults';
		//}
		//$meta = get_post_meta( get_the_ID(), 'occupancykids', true );
		//if( checked( $meta, 1, false ) )
		//{
		//		echo '<strong>Default Occupancy:</strong>Kids';
		//}
		//$meta = get_post_meta( get_the_ID(), 'occupancypets', true );
		//if( checked( $meta, 1, false ) )
		//{
		//		echo '<strong>Default Occupancy:</strong>Pets';
		//}
				
		echo '</br>';
		echo '<strong>Additional Occupancy:</strong>'.$meta_avail = get_post_meta($post->ID,'additionaloccupancyadults', true);
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
		
		?>
	</div>