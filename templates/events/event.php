<?php
		global $post;
?>
	<div class="container">		
		<?php
		$post_meta_data_url = get_post_custom($post->ID,'url', true); 
		$meta_url = $post_meta_data_url['url'];
		
		echo '</br>';
		echo the_content();
		echo '<strong>Location:</strong>';
		$meta_location = get_post_meta($post->ID,'url', false);
		if($meta_location!=''){
				echo implode(", ", $meta_location);
		}
		
		echo '</br>';
		$meta_startDate = get_post_meta($post->ID,'startDate', true); 
		echo '<strong>Start Date Time:</strong>'.gmdate("d-m-y\ H:i", $meta_startDate);
		echo '</br>';
		$meta_endDate = get_post_meta($post->ID,'endDate', true); 
		echo '<strong>End Date Time:</strong>'.gmdate("d-m-y\ H:i", $meta_endDate);
		echo '</br>';
		echo '<strong>Duration:</strong>'.$meta_avail = get_post_meta($post->ID,'duration', true);
		echo '</br>';
		$meta_doorTime = get_post_meta($post->ID,'doorTime', true); 
		echo '<strong>Door Time:</strong>'.gmdate("d-m-y\ H:i", $meta_doorTime);
		echo '</br>';
		echo '<strong>Occurance:</strong>'.$meta_avail = get_post_meta($post->ID,'occurance', true);
		echo '</br>';
		
		
		echo '</br>';
		echo '<strong>Product Offered:</strong>';
		$meta_product = get_post_meta($post->ID,'product', false);
		if($meta_product!=''){
				echo implode(", ", $meta_product);
		}
		echo '</br>';
		echo '<strong>Availability:</strong>'.$meta_avail = get_post_meta($post->ID,'availability', true);
		echo '</br>';
		echo '<strong>Offer Price:</strong>'.$meta_avail = get_post_meta($post->ID,'offerPrice', true);
		echo '</br>';
		echo '<strong>Currency:</strong>'.$meta_avail = get_post_meta($post->ID,'currency', true);
		echo '</br>';
		$meta_availabilityStarts = get_post_meta($post->ID,'availabilityStarts', true); 
		echo '<strong>Availability Starts:</strong>'.gmdate("d-m-y\ H:i", $meta_availabilityStarts);
		echo '</br>';
		$meta_availability_End = get_post_meta($post->ID,'availability_End', true); 
		echo '<strong>Availability Ends:</strong>'.gmdate("d-m-y\ H:i", $meta_availability_End);
		echo '</br>';
		$meta_offerEnds = get_post_meta($post->ID,'offerEnds', true); 
		echo '<strong>Does the offer expire:</strong>'.gmdate("d-m-y\ H:i", $meta_offerEnds);
		echo '</br>';
		
		echo '</br>';
		$meta_validFrom = get_post_meta($post->ID,'validFrom', true); 
		echo '<strong>Valid From:</strong>'.gmdate("d-m-y\ H:i", $meta_validFrom);
		echo '</br>';
		$meta_validThrough = get_post_meta($post->ID,'validThrough', true); 
		echo '<strong>Valid Through:</strong>'.gmdate("d-m-y\ H:i", $meta_validThrough);
		echo '</br>';
		$meta_availability_From = get_post_meta($post->ID,'availability_From', true);
		echo '<strong>Offer availability from(eligibility duration):</strong>'.gmdate("d-m-y\ H:i", $meta_availability_From);
		echo '</br>';
		$meta_availability_to = get_post_meta($post->ID,'availability_to', true); 
		echo '<strong>Offer availability to(eligibility duration):</strong>'.gmdate("d-m-y\ H:i", $meta_availability_to);
		echo '</br>';
		
		
		echo '</br>';
		echo '<strong>Eligible Region:</strong>';
		$meta_eligibleRegion = get_post_meta($post->ID,'eligibleRegion', false);
		if($meta_eligibleRegion!=''){
				echo implode(", ", $meta_eligibleRegion);
		}
		echo '</br>';
		echo '<strong>Ineligible Region:</strong>';
		$meta_ineligibleRegion = get_post_meta($post->ID,'ineligibleRegion', false);
		if($meta_ineligibleRegion!=''){
				echo implode(", ", $meta_ineligibleRegion);
		}
		
		echo '</br>';
		echo '<strong>Eligible Customer Type:</strong>';
		$meta_eligibleCustomer = get_post_meta($post->ID,'eligibleCustomer', false);
		if($meta_eligibleCustomer!=''){
				echo implode(", ", $meta_eligibleCustomer);
		}
		
		echo '</br>';
		echo '<strong>Eligible Transaction Volume:</strong>'.$meta_eligibleTransaction = get_post_meta($post->ID,'eligibleTransaction', true); 
		echo '</br>';
		echo '<strong>Is there a limitation how many items must be bought:</strong>'.$meta_limitationMust = get_post_meta($post->ID,'limitationMust', true); 
		echo '</br>';
		echo '<strong>Is there a limitation how many items can be bought::</strong>'.$meta_limitationCan = get_post_meta($post->ID,'limitationCan', true); 
		echo '</br>';
		echo '<strong>Terms and Conditions:</strong>';
		$meta_termsCondition = get_post_meta($post->ID,'termsCondition', false);
		if($meta_termsCondition!=''){
				echo implode(", ", $meta_termsCondition);
		}
		echo '</br>';
		
		echo '<strong>Connected Offers:</strong>';
		$p2p_meta_data_off = get_post_custom($post->ID,'taxonomy_event_off', true);
		$meta_taxoff = $p2p_meta_data_off['taxonomy_event_off'];
		if($meta_taxoff!=''){
		foreach ($meta_taxoff as $string) {
		$val_off .= get_the_title( $string ).',';
		}
		echo rtrim($val_off,",");
		}
		
		?>
	</div>