<?php
		global $post;
?>
	<div class="container">		
		<?php
		$post_meta_data_url = get_post_custom($post->ID,'url', true); 
		$meta_url = $post_meta_data_url['url'];
		echo '</br>';
		echo '<strong>Location:</strong>'.$meta_avail = get_post_meta($post->ID,'url', true);
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
		echo '<strong>Product Offered:</strong>'.$meta_avail = get_post_meta($post->ID,'url', true);
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
		
		$post_meta_data_inr = get_post_custom($post->ID,'ineligibleRegion', true); 
		$meta_ineligibleRegion = $post_meta_data_inr['ineligibleRegion'];
		if($meta_ineligibleRegion!=''){
			foreach ($meta_ineligibleRegion as $string) {
				echo '<strong>Ineligible Region:</strong>'.$string.'</br>';
			}
		}
		$post_meta_data_reg = get_post_custom($post->ID,'eligibleRegion', true); 
		$meta_eligibleRegion = $post_meta_data_reg['eligibleRegion'];
		if($meta_eligibleRegion!=''){
			foreach ($meta_eligibleRegion as $string) {
				echo '<strong>Eligible Region:</strong>'.$string.'</br>';
			}
		}
		
		$post_meta_data_cust = get_post_custom($post->ID,'eligibleCustomer', true); 
		$meta_eligibleCustomer = $post_meta_data_cust['eligibleCustomer'];
		if($meta_eligibleCustomer!=''){
			foreach ($meta_eligibleCustomer as $string) {
				echo '<strong>Eligible Customer Type:</strong>'.$string.'</br>';
			}
		}
		echo '<strong>Eligible Transaction Volume:</strong>'.$meta_eligibleTransaction = get_post_meta($post->ID,'eligibleTransaction', true); 
		echo '</br>';
		echo '<strong>Is there a limitation how many items must be bought:</strong>'.$meta_limitationMust = get_post_meta($post->ID,'limitationMust', true); 
		echo '</br>';
		echo '<strong>Is there a limitation how many items can be bought::</strong>'.$meta_limitationCan = get_post_meta($post->ID,'limitationCan', true); 
		echo '</br>';
		$post_meta_data = get_post_custom($post->ID,'termsCondition', true);
		$meta_termsCondition = $post_meta_data['termsCondition'];
		if($meta_termsCondition!=''){
			foreach ($meta_termsCondition as $string) {
				echo '<strong>Terms and Conditions:</strong>'.$string.'</br>';
			}
		}
		
		?>
	</div>