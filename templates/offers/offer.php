<?php
global $post;

	$meta_validFrom = get_post_meta($post->ID, 'validFrom', true ); 
			
	echo date('d-m-y h:i', $meta_validFrom).'</br>';
	
	$meta_validThrough = get_post_meta($post->ID, 'validThrough', true ); 
	echo date('d-m-y h:i', $meta_validThrough).'</br>';
	
	$meta_availability_From = get_post_meta($post->ID, 'availability_From', true ); 
	
	echo date('d-m-y h:i', $meta_availability_From).'</br>';
	
	$meta_availability_to = get_post_meta($post->ID, 'availability_to', true ); 
	
	echo date('d-m-y h:i', $meta_availability_to).'</br>';
	$meta_price = get_post_meta($post->ID, 'price', true ); 
	
	echo $meta_price.'</br>';
	
	$meta_ineligibleRegion = get_post_meta($post->ID, 'ineligibleRegion', true ); 
	
	echo $meta_ineligibleRegion.'</br>';
	
	$meta_eligibleRegion = get_post_meta($post->ID, 'eligibleRegion', true ); 
	
	echo $meta_eligibleRegion.'</br>';
	
	$meta_eligibleCustomer = get_post_meta($post->ID, 'eligibleCustomer', true ); 
	
	echo $meta_eligibleCustomer.'</br>';
	
	$meta_eligibleTransaction = get_post_meta($post->ID, 'eligibleTransaction', true ); 
	
	echo $meta_eligibleTransaction.'</br>';
	
	$meta_limitationMust = get_post_meta($post->ID, 'limitationMust', true ); 
	
	echo $meta_limitationMust.'</br>';
	$meta_limitationCan = get_post_meta($post->ID, 'limitationCan', true ); 
	
	echo $meta_limitationCan.'</br>';
	
	$meta_termsCondition = get_post_meta($post->ID, 'termsCondition', true ); 
	
	echo $meta_termsCondition.'</br>';
	
?>

     <!--   <div class="hotel-offers snhotel-half">
            <?php snhotel_print_tax_link( 'hotel_offers' ); ?>
             <span class="time">
                <?php _e( 'book by', 'snhotel' ); ?> <time itemprop="priceValidUntil" datetime="<?php echo date( 'c', $price_valid_to ) ?>"><?php echo date_i18n( 'j F, Y', $price_valid_to ); ?></time>
            </span>
            <span class="snhotel-separator">|</span>
                <span class="price">
                    <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <a href="<?php echo $url; ?>"><?php _e( 'from', 'snhotel' ); ?> <span itemprop="priceDiscount"><?php echo $currency; ?> <?php echo $price; ?></span></a>
                        <span class="snhotel-separator">|</span>
                        <span itemprop="priceCurrency"><?php echo $currency; ?></span> <del><span itemprop="price"><?php echo $discount; ?></span></del>
                    </span>
                </span>
            
        </div>-->
