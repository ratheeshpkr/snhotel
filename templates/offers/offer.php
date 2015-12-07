<?php
		global $post;
?>
	<div class="container">		
		<?php
		$post_meta_data_url = get_post_custom($post->ID,'url', true); 
		$meta_url = $post_meta_data_url['url'];
		//if($meta_url!=''){
		//	foreach ($meta_url as $string) {
		//		echo '<strong>Product Offered:</strong>'.$string.'</br>';
		//	}
		//}
		echo '</br>';
		echo the_content();
		echo '<strong>Availability:</strong>'.$meta_avail = get_post_meta($post->ID,'availability', true); 
		echo '</br>';
		echo '<strong>Lead Time:</strong>'.$meta_leadTime = get_post_meta($post->ID,'leadTime', true); 
		echo '</br>';
		echo '<strong>Offer Price(Price):</strong>'.$meta_offerPrice = get_post_meta($post->ID,'offerPrice', true); 
		echo '</br>';
		echo '<strong>Currency:</strong>'.$meta_currency = get_post_meta($post->ID,'currency', true); 
		echo '</br>';
		echo '<strong>Price Details:</strong>'.$meta_pricedetails = get_post_meta($post->ID,'pricedetails', true); 
		echo '</br>';
		echo '<strong>Original Price:</strong>'.$meta_originalprice = get_post_meta($post->ID,'originalprice', true); 
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
		$meta_validFrom = get_post_meta($post->ID,'validFrom', true); 
		echo '<strong>Valid From:</strong>'.gmdate("d-m-y\ H:i", $meta_validFrom);
		echo '</br>';
		$meta_validThrough = get_post_meta($post->ID,'validThrough', true); 
		echo '<strong>Valid Through:</strong>'.gmdate("d-m-y\ H:i", $meta_validThrough);
		echo '</br>';
		$meta_availability_From = get_post_meta($post->ID,'availability_From', true);
		echo '<strong>Offer availabilty from(eligibility duration):</strong>'.gmdate("d-m-y\ H:i", $meta_availability_From);
		echo '</br>';
		$meta_availability_to = get_post_meta($post->ID,'availability_to', true); 
		echo '<strong>Offer availabilty to(eligibility duration):</strong>'.gmdate("d-m-y\ H:i", $meta_availability_to);
		echo '</br>';
		
		echo '<strong>Ineligible Region:</strong>';
		$meta_ineligibleRegion = get_post_meta($post->ID,'ineligibleRegion', false);
		if($meta_ineligibleRegion!=''){
				echo implode(", ", $meta_ineligibleRegion);
		}
		echo '</br>';
		
		echo '<strong>Eligible Region:</strong>';
		$meta_eligibleRegion = get_post_meta($post->ID,'eligibleRegion', false);
		if($meta_eligibleRegion!=''){
				echo implode(", ", $meta_eligibleRegion);
		}
		

		echo '</br>';
		echo '<strong>Eligible Customer Type:</strong>';
		$meta_cust = get_post_meta($post->ID,'eligibleCustomer', false);
		if($meta_cust!=''){
				echo implode(", ", $meta_cust);
		}
		echo '</br>';
		echo '<strong>Eligible Transaction Volume:</strong>'.$meta_eligibleTransaction = get_post_meta($post->ID,'eligibleTransaction', true); 
		echo '</br>';
		echo '<strong>Is there a limitation how many items must be bought:</strong>'.$meta_limitationMust = get_post_meta($post->ID,'limitationMust', true); 
		echo '</br>';
		echo '<strong>Is there a limitation how many items can be bought:</strong>'.$meta_limitationCan = get_post_meta($post->ID,'limitationCan', true); 
		
		echo '</br>';
		echo '<strong>Terms and Conditions:</strong>';
		$meta_terms = get_post_meta($post->ID,'termsCondition', false);
		if($meta_cust!=''){
				echo implode(", ", $meta_terms);
		}
		echo '</br>';
		echo '</br>';
		echo '<strong>Connected Accommodation:</strong>';
		$p2p_meta_data_acc = get_post_custom($post->ID,'taxonomy_acc', true);
		$meta_tax_acc = $p2p_meta_data_acc['taxonomy_acc'];
		if($meta_tax_acc!=''){
		foreach ($meta_tax_acc as $string) {
		$val_acc .=  get_the_title( $string ).',';
		}
		echo rtrim($val_acc,",");
		}
		echo '</br>';
		
		echo '<strong>Connected Events:</strong>';
		$p2p_meta_data_eve = get_post_custom($post->ID,'taxonomy_eve', true);
		$meta_taxeve = $p2p_meta_data_eve['taxonomy_eve'];
		if($meta_taxeve!=''){
		foreach ($meta_taxeve as $string) {
		$val_eve .= get_the_title( $string ).',';
		}
		echo rtrim($val_eve,",");
		}
		
		echo '</br>';
		
		echo '<strong>Connected Facilities:</strong>';
		$p2p_meta_data_faci = get_post_custom($post->ID,'taxonomy_faci', true);
		//print_r($p2p_meta_data_faci);exit;
		$val ='';
		$meta_taxfaci = $p2p_meta_data_faci['taxonomy_faci'];
		if($meta_taxfaci!=''){
		foreach ($meta_taxfaci as $string) {
				$val_faci .= get_the_title( $string ).",";
		}
		echo rtrim($val_faci,",");
		}
		
		?>
	</div>