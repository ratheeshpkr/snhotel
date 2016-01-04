<?php

function snhotel_get_currencies() {
    $currency = array(
        'AED' => 'United Arab Emirates Dirham',
        'AFN' => 'Afghanistan Afghani',
        'ALL' => 'Albania Lek',
        'AMD' => 'Armenia Dram',
        'ANG' => 'Netherlands Antilles Guilder',
        'AOA' => 'Angola Kwanza',
        'ARS' => 'Argentina Peso',
        'AUD' => 'Australia Dollar',
        'AWG' => 'Aruba Guilder',
        'AZN' => 'Azerbaijan New Manat',
        'BAM' => 'Bosnia and Herzegovina Convertible Marka',
        'BBD' => 'Barbados Dollar',
        'BDT' => 'Bangladesh Taka',
        'BGN' => 'Bulgaria Lev',
        'BHD' => 'Bahrain Dinar',
        'BIF' => 'Burundi Franc',
        'BMD' => 'Bermuda Dollar',
        'BND' => 'Brunei Darussalam Dollar',
        'BOB' => 'Bolivia Boliviano',
        'BRL' => 'Brazil Real',
        'BSD' => 'Bahamas Dollar',
        'BTN' => 'Bhutan Ngultrum',
        'BWP' => 'Botswana Pula',
        'BYR' => 'Belarus Ruble',
        'BZD' => 'Belize Dollar',
        'CAD' => 'Canada Dollar',
        'CDF' => 'Congo/Kinshasa Franc',
        'CHF' => 'Switzerland Franc',
        'CLP' => 'Chile Peso',
        'CNY' => 'China Yuan Renminbi',
        'COP' => 'Colombia Peso',
        'CRC' => 'Costa Rica Colon',
        'CUC' => 'Cuba Convertible Peso',
        'CUP' => 'Cuba Peso',
        'CVE' => 'Cape Verde Escudo',
        'CZK' => 'Czech Republic Koruna',
        'DJF' => 'Djibouti Franc',
        'DKK' => 'Denmark Krone',
        'DOP' => 'Dominican Republic Peso',
        'DZD' => 'Algeria Dinar',
        'EGP' => 'Egypt Pound',
        'ERN' => 'Eritrea Nakfa',
        'ETB' => 'Ethiopia Birr',
        'EUR' => 'Euro Member Countries',
        'FJD' => 'Fiji Dollar',
        'FKP' => 'Falkland Islands (Malvinas) Pound',
        'GBP' => 'United Kingdom Pound',
        'GEL' => 'Georgia Lari',
        'GGP' => 'Guernsey Pound',
        'GHS' => 'Ghana Cedi',
        'GIP' => 'Gibraltar Pound',
        'GMD' => 'Gambia Dalasi',
        'GNF' => 'Guinea Franc',
        'GTQ' => 'Guatemala Quetzal',
        'GYD' => 'Guyana Dollar',
        'HKD' => 'Hong Kong Dollar',
        'HNL' => 'Honduras Lempira',
        'HRK' => 'Croatia Kuna',
        'HTG' => 'Haiti Gourde',
        'HUF' => 'Hungary Forint',
        'IDR' => 'Indonesia Rupiah',
        'ILS' => 'Israel Shekel',
        'IMP' => 'Isle of Man Pound',
        'INR' => 'India Rupee',
        'IQD' => 'Iraq Dinar',
        'IRR' => 'Iran Rial',
        'ISK' => 'Iceland Krona',
        'JEP' => 'Jersey Pound',
        'JMD' => 'Jamaica Dollar',
        'JOD' => 'Jordan Dinar',
        'JPY' => 'Japan Yen',
        'KES' => 'Kenya Shilling',
        'KGS' => 'Kyrgyzstan Som',
        'KHR' => 'Cambodia Riel',
        'KMF' => 'Comoros Franc',
        'KPW' => 'Korea (North) Won',
        'KRW' => 'Korea (South) Won',
        'KWD' => 'Kuwait Dinar',
        'KYD' => 'Cayman Islands Dollar',
        'KZT' => 'Kazakhstan Tenge',
        'LAK' => 'Laos Kip',
        'LBP' => 'Lebanon Pound',
        'LKR' => 'Sri Lanka Rupee',
        'LRD' => 'Liberia Dollar',
        'LSL' => 'Lesotho Loti',
        'LTL' => 'Lithuania Litas',
        'LVL' => 'Latvia Lat',
        'LYD' => 'Libya Dinar',
        'MAD' => 'Morocco Dirham',
        'MDL' => 'Moldova Leu',
        'MGA' => 'Madagascar Ariary',
        'MKD' => 'Macedonia Denar',
        'MMK' => 'Myanmar (Burma) Kyat',
        'MNT' => 'Mongolia Tughrik',
        'MOP' => 'Macau Pataca',
        'MRO' => 'Mauritania Ouguiya',
        'MUR' => 'Mauritius Rupee',
        'MVR' => 'Maldives (Maldive Islands) Rufiyaa',
        'MWK' => 'Malawi Kwacha',
        'MXN' => 'Mexico Peso',
        'MYR' => 'Malaysia Ringgit',
        'MZN' => 'Mozambique Metical',
        'NAD' => 'Namibia Dollar',
        'NGN' => 'Nigeria Naira',
        'NIO' => 'Nicaragua Cordoba',
        'NOK' => 'Norway Krone',
        'NPR' => 'Nepal Rupee',
        'NZD' => 'New Zealand Dollar',
        'OMR' => 'Oman Rial',
        'PAB' => 'Panama Balboa',
        'PEN' => 'Peru Nuevo Sol',
        'PGK' => 'Papua New Guinea Kina',
        'PHP' => 'Philippines Peso',
        'PKR' => 'Pakistan Rupee',
        'PLN' => 'Poland Zloty',
        'PYG' => 'Paraguay Guarani',
        'QAR' => 'Qatar Riyal',
        'RON' => 'Romania New Leu',
        'RSD' => 'Serbia Dinar',
        'RUB' => 'Russia Ruble',
        'RWF' => 'Rwanda Franc',
        'SAR' => 'Saudi Arabia Riyal',
        'SBD' => 'Solomon Islands Dollar',
        'SCR' => 'Seychelles Rupee',
        'SDG' => 'Sudan Pound',
        'SEK' => 'Sweden Krona',
        'SGD' => 'Singapore Dollar',
        'SHP' => 'Saint Helena Pound',
        'SLL' => 'Sierra Leone Leone',
        'SOS' => 'Somalia Shilling',
        'SPL*' => 'Seborga Luigino',
        'SRD' => 'Suriname Dollar',
        'STD' => 'São Tomé and Príncipe Dobra',
        'SVC' => 'El Salvador Colon',
        'SYP' => 'Syria Pound',
        'SZL' => 'Swaziland Lilangeni',
        'THB' => 'Thailand Baht',
        'TJS' => 'Tajikistan Somoni',
        'TMT' => 'Turkmenistan Manat',
        'TND' => 'Tunisia Dinar',
        'TOP' => 'Tonga Pa\'anga',
        'TRY' => 'Turkey Lira',
        'TTD' => 'Trinidad and Tobago Dollar',
        'TVD' => 'Tuvalu Dollar',
        'TWD' => 'Taiwan New Dollar',
        'TZS' => 'Tanzania Shilling',
        'UAH' => 'Ukraine Hryvna',
        'UGX' => 'Uganda Shilling',
        'USD' => 'United States Dollar',
        'UYU' => 'Uruguay Peso',
        'UZS' => 'Uzbekistan Som',
        'VEF' => 'Venezuela Bolivar Fuerte',
        'VND' => 'Viet Nam Dong',
        'VUV' => 'Vanuatu Vatu',
        'WST' => 'Samoa Tala',
        'XAF' => 'Communauté Financière Africaine (BEAC) CFA Franc BEAC',
        'XCD' => 'East Caribbean Dollar',
        'XDR' => 'International Monetary Fund (IMF) Special Drawing Rights',
        'XOF' => 'Communauté Financière Africaine (BCEAO) Franc',
        'XPF' => 'Comptoirs Français du Pacifique (CFP) Franc',
        'YER' => 'Yemen Rial',
        'ZAR' => 'South Africa Rand',
        'ZMK' => 'Zambia Kwacha',
        'ZWD' => 'Zimbabwe Dollar'
    );

    return $currency;
}
function snhotel_get_occurances() {
    $occurance = array(
        'D' => 'Daily',
        'W' => 'Weekly',
        'M' => 'Monthly',
        'Y' => 'Yearly',
        'C' => 'Custom'
    );

    return $occurance;
}

function snhotel_metada_init() {
    if ( function_exists( 'x_add_metadata_group' ) && function_exists( 'x_add_metadata_field' ) ) {

        $currency = array(
            'AED' => 'United Arab Emirates Dirham',
            'AFN' => 'Afghanistan Afghani',
            'ALL' => 'Albania Lek',
            'AMD' => 'Armenia Dram',
            'ANG' => 'Netherlands Antilles Guilder',
            'AOA' => 'Angola Kwanza',
            'ARS' => 'Argentina Peso',
            'AUD' => 'Australia Dollar',
            'AWG' => 'Aruba Guilder',
            'AZN' => 'Azerbaijan New Manat',
            'BAM' => 'Bosnia and Herzegovina Convertible Marka',
            'BBD' => 'Barbados Dollar',
            'BDT' => 'Bangladesh Taka',
            'BGN' => 'Bulgaria Lev',
            'BHD' => 'Bahrain Dinar',
            'BIF' => 'Burundi Franc',
            'BMD' => 'Bermuda Dollar',
            'BND' => 'Brunei Darussalam Dollar',
            'BOB' => 'Bolivia Boliviano',
            'BRL' => 'Brazil Real',
            'BSD' => 'Bahamas Dollar',
            'BTN' => 'Bhutan Ngultrum',
            'BWP' => 'Botswana Pula',
            'BYR' => 'Belarus Ruble',
            'BZD' => 'Belize Dollar',
            'CAD' => 'Canada Dollar',
            'CDF' => 'Congo/Kinshasa Franc',
            'CHF' => 'Switzerland Franc',
            'CLP' => 'Chile Peso',
            'CNY' => 'China Yuan Renminbi',
            'COP' => 'Colombia Peso',
            'CRC' => 'Costa Rica Colon',
            'CUC' => 'Cuba Convertible Peso',
            'CUP' => 'Cuba Peso',
            'CVE' => 'Cape Verde Escudo',
            'CZK' => 'Czech Republic Koruna',
            'DJF' => 'Djibouti Franc',
            'DKK' => 'Denmark Krone',
            'DOP' => 'Dominican Republic Peso',
            'DZD' => 'Algeria Dinar',
            'EGP' => 'Egypt Pound',
            'ERN' => 'Eritrea Nakfa',
            'ETB' => 'Ethiopia Birr',
            'EUR' => 'Euro Member Countries',
            'FJD' => 'Fiji Dollar',
            'FKP' => 'Falkland Islands (Malvinas) Pound',
            'GBP' => 'United Kingdom Pound',
            'GEL' => 'Georgia Lari',
            'GGP' => 'Guernsey Pound',
            'GHS' => 'Ghana Cedi',
            'GIP' => 'Gibraltar Pound',
            'GMD' => 'Gambia Dalasi',
            'GNF' => 'Guinea Franc',
            'GTQ' => 'Guatemala Quetzal',
            'GYD' => 'Guyana Dollar',
            'HKD' => 'Hong Kong Dollar',
            'HNL' => 'Honduras Lempira',
            'HRK' => 'Croatia Kuna',
            'HTG' => 'Haiti Gourde',
            'HUF' => 'Hungary Forint',
            'IDR' => 'Indonesia Rupiah',
            'ILS' => 'Israel Shekel',
            'IMP' => 'Isle of Man Pound',
            'INR' => 'India Rupee',
            'IQD' => 'Iraq Dinar',
            'IRR' => 'Iran Rial',
            'ISK' => 'Iceland Krona',
            'JEP' => 'Jersey Pound',
            'JMD' => 'Jamaica Dollar',
            'JOD' => 'Jordan Dinar',
            'JPY' => 'Japan Yen',
            'KES' => 'Kenya Shilling',
            'KGS' => 'Kyrgyzstan Som',
            'KHR' => 'Cambodia Riel',
            'KMF' => 'Comoros Franc',
            'KPW' => 'Korea (North) Won',
            'KRW' => 'Korea (South) Won',
            'KWD' => 'Kuwait Dinar',
            'KYD' => 'Cayman Islands Dollar',
            'KZT' => 'Kazakhstan Tenge',
            'LAK' => 'Laos Kip',
            'LBP' => 'Lebanon Pound',
            'LKR' => 'Sri Lanka Rupee',
            'LRD' => 'Liberia Dollar',
            'LSL' => 'Lesotho Loti',
            'LTL' => 'Lithuania Litas',
            'LVL' => 'Latvia Lat',
            'LYD' => 'Libya Dinar',
            'MAD' => 'Morocco Dirham',
            'MDL' => 'Moldova Leu',
            'MGA' => 'Madagascar Ariary',
            'MKD' => 'Macedonia Denar',
            'MMK' => 'Myanmar (Burma) Kyat',
            'MNT' => 'Mongolia Tughrik',
            'MOP' => 'Macau Pataca',
            'MRO' => 'Mauritania Ouguiya',
            'MUR' => 'Mauritius Rupee',
            'MVR' => 'Maldives (Maldive Islands) Rufiyaa',
            'MWK' => 'Malawi Kwacha',
            'MXN' => 'Mexico Peso',
            'MYR' => 'Malaysia Ringgit',
            'MZN' => 'Mozambique Metical',
            'NAD' => 'Namibia Dollar',
            'NGN' => 'Nigeria Naira',
            'NIO' => 'Nicaragua Cordoba',
            'NOK' => 'Norway Krone',
            'NPR' => 'Nepal Rupee',
            'NZD' => 'New Zealand Dollar',
            'OMR' => 'Oman Rial',
            'PAB' => 'Panama Balboa',
            'PEN' => 'Peru Nuevo Sol',
            'PGK' => 'Papua New Guinea Kina',
            'PHP' => 'Philippines Peso',
            'PKR' => 'Pakistan Rupee',
            'PLN' => 'Poland Zloty',
            'PYG' => 'Paraguay Guarani',
            'QAR' => 'Qatar Riyal',
            'RON' => 'Romania New Leu',
            'RSD' => 'Serbia Dinar',
            'RUB' => 'Russia Ruble',
            'RWF' => 'Rwanda Franc',
            'SAR' => 'Saudi Arabia Riyal',
            'SBD' => 'Solomon Islands Dollar',
            'SCR' => 'Seychelles Rupee',
            'SDG' => 'Sudan Pound',
            'SEK' => 'Sweden Krona',
            'SGD' => 'Singapore Dollar',
            'SHP' => 'Saint Helena Pound',
            'SLL' => 'Sierra Leone Leone',
            'SOS' => 'Somalia Shilling',
            'SPL*' => 'Seborga Luigino',
            'SRD' => 'Suriname Dollar',
            'STD' => 'São Tomé and Príncipe Dobra',
            'SVC' => 'El Salvador Colon',
            'SYP' => 'Syria Pound',
            'SZL' => 'Swaziland Lilangeni',
            'THB' => 'Thailand Baht',
            'TJS' => 'Tajikistan Somoni',
            'TMT' => 'Turkmenistan Manat',
            'TND' => 'Tunisia Dinar',
            'TOP' => 'Tonga Pa\'anga',
            'TRY' => 'Turkey Lira',
            'TTD' => 'Trinidad and Tobago Dollar',
            'TVD' => 'Tuvalu Dollar',
            'TWD' => 'Taiwan New Dollar',
            'TZS' => 'Tanzania Shilling',
            'UAH' => 'Ukraine Hryvna',
            'UGX' => 'Uganda Shilling',
            'USD' => 'United States Dollar',
            'UYU' => 'Uruguay Peso',
            'UZS' => 'Uzbekistan Som',
            'VEF' => 'Venezuela Bolivar Fuerte',
            'VND' => 'Viet Nam Dong',
            'VUV' => 'Vanuatu Vatu',
            'WST' => 'Samoa Tala',
            'XAF' => 'Communauté Financière Africaine (BEAC) CFA Franc BEAC',
            'XCD' => 'East Caribbean Dollar',
            'XDR' => 'International Monetary Fund (IMF) Special Drawing Rights',
            'XOF' => 'Communauté Financière Africaine (BCEAO) Franc',
            'XPF' => 'Comptoirs Français du Pacifique (CFP) Franc',
            'YER' => 'Yemen Rial',
            'ZAR' => 'South Africa Rand',
            'ZMK' => 'Zambia Kwacha',
            'ZWD' => 'Zimbabwe Dollar'
        );

        //services
        // x_add_metadata_group( 'services', array('post'), array(
        //     'label' => 'Services'
        // ) );

        // x_add_metadata_field( 'address', 'post', array(
        //     'group' => 'services',
        //     'label' => 'Address',
        //     'description' => ''
        // ) );

        // x_add_metadata_field( 'place', 'post', array(
        //     'group' => 'services',
        //     'label' => 'Place',
        //     'description' => ''
        // ) );

        //TODO: events

        // x_add_metadata_field( 'phone', 'post', array(
        //     'group' => 'services',
        //     'label' => 'Phone',
        //     'description' => ''
        // ) );

        // x_add_metadata_field( 'fax', 'post', array(
        //     'group' => 'services',
        //     'label' => 'Fax',
        //     'description' => ''
        // ) );

        // x_add_metadata_field( 'branchof', 'post', array(
        //     'group' => 'services',
        //     'label' => 'Branch Of',
        //     'description' => ''
        // ) );

        // x_add_metadata_field( 'currencies', 'post', array(
        //     'group' => 'services',
        //     'label' => 'Currencies Accepted',
        //     'description' => ''
        // ) );

        // x_add_metadata_field( 'payment_accepted', 'post', array(
        //     'group' => 'services',
        //     'label' => 'Payment Accepted',
        //     'description' => ''
        // ) );

        // x_add_metadata_field( 'price_range', 'post', array(
        //     'group' => 'services',
        //     'label' => 'Price Range',
        //     'description' => ''
        // ) );
    }
}

add_action( 'admin_init', 'snhotel_metada_init' );

function snhotel_post_dropdown( $post_type = 'post' ) {
    $items = array(0 => '--Select--');
    $posts = get_posts( array('post_type' => $post_type, 'numberposts' => -1) );

    foreach ($posts as $post) {
        $items[$post->ID] = $post->post_title;
    }

    return $items;
}

/**
 * User dropdown depending on a user role
 *
 * @param string $role user capability
 * @return array
 */
function snhotel_users_dropdown( $role = false ) {
    $items = array();
    $users = get_users();

    foreach ($users as $user) {
        //check role
        if ( $role && user_can( $user->ID, $role ) ) {
            $items[$user->ID] = $user->display_name;
        } else if ( !$role ) {
            $items[$user->ID] = $user->display_name;
        }
    }

    return $items;
}

function snhotel_x_meta_repeat( $slug, $field, $object_type, $object_id, $value ) {
    var_dump( $slug, $field, $object_type, $object_id, $value );
    ?>
    <div class="custom-metadata-field <?php echo $field->field_type ?>">

    </div>
    <?php
}

function snhotel_cmb_fields( $meta_boxes = array() ) {
    $user_dropdown = snhotel_users_dropdown( 'delete_others_pages' );

	  $offer_termsCondition = array(
      array(
            'id' => 'termsCondition',
            'name' => __( '', 'snhotel' ),
            'type' => 'text',
            'desc' => __( 'Add all additonal limitations that are not covered through the above offer restrictions', 'snhotel' ),
			'repeatable' => true,
      ),
    );
	$offer_tax = array(
      array(
            'id' => 'taxonomy_acc',
            'name' => __( '' ),
            'type' => 'post_select',
            'use_ajax' => true,
            'query' => array( 'posts_per_page' => 8, 'post_type' => 'snhotel_room' ),
            'repeatable' => true,
            'desc' => sprintf( __( 'You have to <a href="%s" target="_blank">create some Accomodation</a> first!', 'snhotel' ), admin_url( 'post-new.php?post_type=snhotel_room' ) ),
		),
	);
	$offer_tax_eve = array(
	  array(
            'id' => 'taxonomy_eve',
            'name' => __( '' ),
            'type' => 'post_select',
            'use_ajax' => true,
            'query' => array( 'posts_per_page' => 8, 'post_type' => 'snhotel_event' ),
            'repeatable' => true,
            'desc' => sprintf( __( 'You have to <a href="%s" target="_blank">create some Events</a> first!', 'snhotel' ), admin_url( 'post-new.php?post_type=snhotel_event' ) ),
		),
	);
	$offer_tax_faci = array(
	  array(
            'id' => 'taxonomy_faci',
            'name' => __( '' ),
            'type' => 'post_select',
            'use_ajax' => true,
            'query' => array( 'posts_per_page' => 8, 'post_type' => 'snhotel_facility' ),
            'repeatable' => true,
            'desc' => sprintf( __( 'You have to <a href="%s" target="_blank">create some Facilities</a> first!', 'snhotel' ), admin_url( 'post-new.php?post_type=snhotel_facility' ) ),
		),

    );

    $accommodation_tax_off = array(
	  array(
            'id' => 'taxonomy_acc_off',
            'name' => __( '' ),
            'type' => 'post_select',
            'use_ajax' => true,
            'query' => array( 'posts_per_page' => 8, 'post_type' => 'snhotel_offer' ),
            'repeatable' => true,
            'desc' => sprintf( __( 'You have to <a href="%s" target="_blank">create some Offers</a> first!', 'snhotel' ), admin_url( 'post-new.php?post_type=snhotel_offer' ) ),
		),

    );
    $facility_tax_off = array(
	  array(
            'id' => 'taxonomy_facility_off',
            'name' => __( '' ),
            'type' => 'post_select',
            'use_ajax' => true,
            'query' => array( 'posts_per_page' => 8, 'post_type' => 'snhotel_offer' ),
            'repeatable' => true,
            'desc' => sprintf( __( 'You have to <a href="%s" target="_blank">create some Offers</a> first!', 'snhotel' ), admin_url( 'post-new.php?post_type=snhotel_facility' ) ),
		),

    );
	$event_tax_off = array(
	  array(
            'id' => 'taxonomy_event_off',
            'name' => __( '' ),
            'type' => 'post_select',
            'use_ajax' => true,
            'query' => array( 'posts_per_page' => 8, 'post_type' => 'snhotel_offer' ),
            'repeatable' => true,
            'desc' => sprintf( __( 'You have to <a href="%s" target="_blank">create some Offers</a> first!', 'snhotel' ), admin_url( 'post-new.php?post_type=snhotel_offer' ) ),
		),

    );

    $offer_validity = array(
      array(
            'id' => 'validFrom',
            'name' => __( 'Valid From', 'snhotel' ),
            'type' => 'datetime_unix',
      ),
      array(
        'id' => 'validThrough',
        'name' => __( 'Valid Through', 'snhotel' ),
        'type' => 'datetime_unix',

      ),
      array(
        'id' => 'availability_From',
        'name' => __( 'Offer availabilty from', 'snhotel' ),
        'type' => 'datetime_unix',

      ),
      array(
        'id' => 'availability_to',
        'name' => __( 'Offer availabilty to', 'snhotel' ),
        'type' => 'datetime_unix',

      ),
      array(
        'id' => 'price',
        'name' => __( 'How many days/hours in advance do you need to buy/book?(DD:HH)', 'snhotel' ),
        'type' => 'text',

      ),
      array(
            'id' => 'ineligibleRegion',
            'name' => __( 'Ineligible Region', 'snhotel' ),
            'type' => 'text',
            'repeatable' => true,
      ),
      array(
            'id' => 'eligibleRegion',
            'name' => __( 'Eligible Region', 'snhotel' ),
            'type' => 'text',
            'repeatable' => true,
      ),
      array(
            'id' => 'eligibleCustomer',
            'name' => __( 'Eligible Customer Type', 'snhotel' ),
            'type' => 'text',
            'repeatable' => true,
      ),
      array(
            'id' => 'eligibleTransaction',
            'name' => __( 'Eligible Transaction Volume', 'snhotel' ),
            'type' => 'text',

      ),
      array(
            'id' => 'limitationMust',
            'name' => __( 'Is there a limitation how many items must be bought?', 'snhotel' ),
            'type' => 'text',

      ),
      array(
            'id' => 'limitationCan',
            'name' => __( 'Is there a limitation how many items can be bought?', 'snhotel' ),
            'type' => 'text',

      ),
    );

    $offer_fields = array(
       /*  array(
              'id' => 'url',
              'name' => __( 'URL', 'snhotel' ),
              'type' => 'url',
              'desc' => __( 'Please enter the URL of where the Offer will be bookable (e.g. link to booking engine)', 'snhotel' ),
        ), */
		
		array(
              'id' => 'product',
              'name' => __( 'Product Offered(itemOffered)', 'snhotel' ),
              'type' => 'text',
              'desc' => __( 'Select the item for which this offer is valid(e.g. room and/or restaurant)', 'snhotel' ),
              'repeatable' => true,
        ),

        array(
              'id' => 'availability',
              'name' => __( 'Availability', 'snhotel' ),
              'type' => 'text',
              'desc' => __( 'Enter the availability of the offer, eg 10 items or until sold out', 'snhotel' ),
        ),
        array(
              'id' => 'leadTime',
              'name' => __( 'Lead Time', 'snhotel' ),
              'type' => 'text',
              'desc' => __( 'Enter the time required prior to the offer being able to be delivered', 'snhotel' ),

        ),
		array(
              'id' => 'offerPrice',
              'name' => __( 'Offer Price(Price)', 'snhotel' ),
              'type' => 'text',
              'desc' => __( 'Enter the value of the offer price', 'snhotel' ),

        ),
		array(
              'id' => 'currency',
              'name' => __( 'Currency', 'snhotel' ),
              'type' => 'select',
              'desc' => __( 'Please select the currency', 'snhotel' ),
              'options' => snhotel_get_currencies()
        ),
        array(
              'id' => 'pricedetails',
              'name' => __( 'Price Details', 'snhotel' ),
              'type' => 'text',
			  'desc' => __( 'Provide any clarification on price', 'snhotel' ),

        ),
		array(
              'id' => 'originalprice',
              'name' => __( 'Original Price', 'snhotel' ),
              'type' => 'text',
			  'desc' => __( 'Enter the value of the regular/original price', 'snhotel' ),

        ),
		array(
              'id' => 'availabilityStarts',
              'name' => __( 'Availability Starts', 'snhotel' ),
              'type' => 'datetime_unix',

        ),
        array(
              'id' => 'availability_End',
              'name' => __( 'Availability Ends', 'snhotel' ),
              'type' => 'datetime_unix',

        ),
		array(
              'id' => 'offerEnds',
              'name' => __( 'Does the offer expire?', 'snhotel' ),
              'type' => 'datetime_unix',

        ),
		array(
              'id' => 'bookingLink',
              'name' => __( 'Booking Link', 'snhotel' ),
              'type' => 'text',
              'desc' => __( 'Enter the Link to Book Hotel' ),
        ),
    );

    $event_fields = array(
		array(
              'id' => 'url',
              'name' => __( 'Location', 'snhotel' ),
              'type' => 'text',
              'desc' => __( 'Select custom post type that provides location information for this event', 'snhotel' ),
              'repeatable' => true,
        ),

		array(
              'id' => 'startDate',
              'name' => __( 'Start Date/Time', 'snhotel' ),
              'type' => 'datetime_unix',

        ),
        array(
              'id' => 'endDate',
              'name' => __( 'End Date/Time', 'snhotel' ),
              'type' => 'datetime_unix',

        ),

        array(
              'id' => 'duration',
              'name' => __( 'Duration', 'snhotel' ),
              'type' => 'text_small',
        ),

        array(
              'id' => 'doorTime',
              'name' => __( 'Door Time', 'snhotel' ),
              'type' => 'datetime_unix',
              'desc' => __( 'Enter the time when participants should show up', 'snhotel' ),

        ),
        array(
              'id' => 'occurance',
              'name' => __( 'Occurance', 'snhotel' ),
              'type' => 'select',
              'desc' => __( 'select daily, weekly, monthly, yearly or custom', 'snhotel' ),
              'options' => snhotel_get_occurances()
        ),
        array(
              'id' => 'custom',
              'name' => __( 'Enter value for Custom', 'snhotel' ),
              'type' => 'text',
              'desc' => __( 'e.g. every other Monday', 'snhotel' ),
              'repeatable' => true,
        ),
    );
    $offer_details = array(
		array(
              'id' => 'product',
              'name' => __( 'Product Offered(itemOffered)', 'snhotel' ),
              'type' => 'text',
              'desc' => __( 'Select the item for which this offer is valid(e.g. room and/or restaurant)', 'snhotel' ),
              'repeatable' => true,
        ),

        array(
              'id' => 'availability',
              'name' => __( 'Availability (availability)', 'snhotel' ),
              'type' => 'text',
              'desc' => __( 'Enter the availability of the offer, eg 10 items or until sold out', 'snhotel' ),
        ),
		array(
              'id' => 'offerPrice',
              'name' => __( 'Offer Price(Price)', 'snhotel' ),
              'type' => 'text',
              'desc' => __( 'Enter the value of the offer price', 'snhotel' ),

        ),
		array(
              'id' => 'currency',
              'name' => __( 'Currency', 'snhotel' ),
              'type' => 'select',
              'desc' => __( 'Please select the currency', 'snhotel' ),
              'options' => snhotel_get_currencies()
        ),

		array(
              'id' => 'availabilityStarts',
              'name' => __( 'Availability Starts', 'snhotel' ),
              'type' => 'datetime_unix',

        ),
        array(
              'id' => 'availability_End',
              'name' => __( 'Availability Ends', 'snhotel' ),
              'type' => 'datetime_unix',

        ),
		array(
              'id' => 'offerEnds',
              'name' => __( 'Does the offer expire?', 'snhotel' ),
              'desc' => __( 'Price ValidUntil', 'snhotel' ),
              'type' => 'datetime_unix',

        ),
		
    );

    $accommodation_features = array(
      array(
            'id' => 'featurestitlename',
            'name' => __( 'Display Name', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Enter Text that overwrites "Room Features"', 'snhotel'),
      ),
      array(
            'id' => 'featuresdisplayname',
            'name' => __( 'Features', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Eg: Alarm clock, minibar...', 'snhotel'),
            'repeatable' => true,
      ),
    );

    $accommodation_bathroom = array(
      array(
            'id' => 'bathroomtitlename',
            'name' => __( 'Display Name', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Enter Text that overwrites "Bathroom"', 'snhotel'),
      ),
      array(
            'id' => 'bathroomdisplayname',
            'name' => __( 'Bathroom', 'snhotel' ),
            'type' => 'text',
            'desc' => __('E.g. Rain Shower, Jacuzzi...', 'snhotel'),
            'repeatable' => true,
      ),
    );

    $accommodation_size = array(
      array(
            'id' => 'size',
            'name' => __( '', 'snhotel' ),
            'type' => 'text',
      ),
      array(
            'id' => 'sizeunit',
            'name' => __( '', 'snhotel' ),
            'type' => 'select',
            'options' => array(
                'sqm' => 'Square Meter',
                'sqf' => 'Square Feet'
            )
      ),
    );


    $accommodation_defaultoccupancy = array(
      array(
          'id'   => 'occupancyadults',
          'name' => 'Adults',
          'type' => 'text',

      ),
      array(
          'id'   => 'occupancykids',
          'name' => 'Kid(s)',
          'type' => 'text',
      ),
      array(
          'id'   => 'occupancypets',
          'name' => 'Pet(s)',
          'type' => 'text',
      ),
    );

    $accommodation_bedding = array(
      array(
          'id'   => 'bedding',
          'name' => '',
          'type' => 'text',

      ),
    );


    $accommodation_additionaloccupancy = array(
      array(
          'id'   => 'additionaloccupancyadults',
          'name' => 'Adults',
          'type' => 'text',
      ),
      array(
          'id'   => 'additionaloccupancykids',
          'name' => 'Kid(s)',
          'type' => 'text',
      ),
      array(
          'id'   => 'additionaloccupancypets',
          'name' => 'Pet(s)',
          'type' => 'text',
      ),
    );

    $accommodation_view = array(
      array(
            'id' => 'view',
            'name' => __( '', 'snhotel' ),
            'type' => 'text',
      ),
    );

    $accommodation_location = array(
      array(
            'id' => 'location',
            'name' => __( '', 'snhotel' ),
            'type' => 'text',
      ),
    );
    $accommodation_bookinglink = array(
      array(
            'id' => 'bookinglink',
            'name' => __( '', 'snhotel' ),
            'type' => 'text',
      ),
    );
    $accommodation_bookfrom = array(
      array(
            'id' => 'bookfrom',
            'name' => __( '', 'snhotel' ),
            'type' => 'text',
      ),
      array(
              'id' => 'currency',
              'name' => __( 'Currency', 'snhotel' ),
              'type' => 'select',
              'desc' => __( 'Please select the currency', 'snhotel' ),
              'options' => snhotel_get_currencies()
        ),

    );

    $accommodation_bedroomimage = array(
      array(
          'id'   => 'bedroomimage',
          'name' => '',
          'type' => 'image',
      ),
    );

    $accommodation_bathroomimages = array(
      array(
          'id'   => 'bathroomimage',
          'name' => '',
          'type' => 'image',
      ),
    );

    $accommodation_viewfromaccommodationimages = array(
      array(
          'id'   => 'viewfromaccommodationimages',
          'name' => '',
          'type' => 'image',
      ),
    );
    $accommodation_additionalimage = array(
      array(
          'id'   => 'additionalimage',
          'name' => '',
          'type' => 'image',
      ),
    );
    $accommodation_floorplan = array(
      array(
          'id'   => 'floorplan',
          'name' => '',
          'type' => 'image',
      ),
    );

    $accommodation_connectedoffers = array(
      array(
            'id' => 'connectedoffers',
            'name' => __( '', 'snhotel' ),
            'type' => 'taxonomy_select',
      ),

    );

    $accommodation_amenities = array(
      array(
            'id' => 'amenitiestitlename',
            'name' => __( 'Display Name', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Enter Text that overwrites "Amenities"', 'snhotel'),
      ),
      array(
            'id' => 'amenitiesdisplayname',
            'name' => __( 'Amenities', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Eg: Turn-Down Service, Club Lounge Access...', 'snhotel'),
            'repeatable' => true,
      ),
    );

    $accommodation_security = array(
      array(
            'id' => 'securitytitlename',
            'name' => __( 'Display Name', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Enter Text that overwrites "Security"', 'snhotel'),
      ),
      array(
            'id' => 'securitydisplayname',
            'name' => __( 'Security', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Eg: Figer-Print Access, Sprinkler System, ...', 'snhotel'),
            'repeatable' => true,
      ),
    );

    $accommodation_communication = array(
      array(
            'id' => 'communicationtitlename',
            'name' => __( 'Display Name', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Enter Text that overwrites "Room Communication"', 'snhotel'),
      ),
      array(
            'id' => 'communicationdisplayname',
            'name' => __( 'Communication', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Eg: Wired Internet, Wireless Internet, ...', 'snhotel'),
            'repeatable' => true,
      ),
    );

    $accommodation_bed = array(
      array(
            'id' => 'bedtitlename',
            'name' => __( 'Display Name', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Enter Text that overwrites "Bed"', 'snhotel'),
      ),
      array(
            'id' => 'beddisplayname',
            'name' => __( 'Bed', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Eg: King Size Bed,400 thread count bed sheets, ...', 'snhotel'),
            'repeatable' => true,
      ),
    );

    $accommodation_entertainment = array(
      array(
            'id' => 'entertainmenttitlename',
            'name' => __( 'Display Name', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Enter Text that overwrites "Room Entertainment"', 'snhotel'),
      ),
      array(
            'id' => 'entertainmentdisplayname',
            'name' => __( 'Entertainment', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Eg: iPhone Dock, 40" OLED TV...', 'snhotel'),
            'repeatable' => true,
      ),
    );
	
	
    $facility_features = array(
      array(
            'id' => 'featurestitlename',
            'name' => __( 'Display Name', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Enter Text that overwrites "Features"', 'snhotel'),
      ),
      array(
            'id' => 'featuresdisplayname',
            'name' => __( 'Features', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Eg: Alarm clock, minibar...', 'snhotel'),
            'repeatable' => true,
      ),
    );
    $facility_amenities = array(
      array(
            'id' => 'amenitiestitlename',
            'name' => __( 'Display Name', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Enter Text that overwrites "Amenities"', 'snhotel'),
      ),
      array(
            'id' => 'amenitiesdisplayname',
            'name' => __( 'Amenities', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Eg: Turn-Down Service, Club Lounge Access...', 'snhotel'),
            'repeatable' => true,
      ),
    );
    $facility_security = array(
      array(
            'id' => 'securitytitlename',
            'name' => __( 'Display Name', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Enter Text that overwrites "Security"', 'snhotel'),
      ),
      array(
            'id' => 'securitydisplayname',
            'name' => __( 'Security', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Eg: Figer-Print Access, Sprinkler System, ...', 'snhotel'),
            'repeatable' => true,
      ),
    );
    $facility_communication = array(
      array(
            'id' => 'communicationtitlename',
            'name' => __( 'Display Name', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Enter Text that overwrites "Communication"', 'snhotel'),
      ),
      array(
            'id' => 'communicationdisplayname',
            'name' => __( 'Communication', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Eg: Wired Internet, Wireless Internet, ...', 'snhotel'),
            'repeatable' => true,
      ),
    );
    $facility_entertainment = array(
      array(
            'id' => 'entertainmenttitlename',
            'name' => __( 'Display Name', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Enter Text that overwrites "Entertainment"', 'snhotel'),
      ),
      array(
            'id' => 'entertainmentdisplayname',
            'name' => __( 'Entertainment', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Eg: iPhone Dock, 40" OLED TV...', 'snhotel'),
            'repeatable' => true,
      ),
    );
    $facility_openinghour = array(
      array(
            'id' => 'openinghourtitlename',
            'name' => __( 'Display Name', 'snhotel' ),
            'type' => 'text',
            'desc' => __('Enter Text that overwrites "Opening Hours"', 'snhotel'),
      ),
      array(
            'id' => 'openinghourfrom',
            'name' => __( 'From', 'snhotel' ),
            'type' => 'time',

      ),
	  array(
            'id' => 'openinghourto',
            'name' => __( 'To', 'snhotel' ),
            'type' => 'time',

      ),
    );

    $facility_setting = array(
      array(
            'id' => 'setting',
            'name' => __( '', 'snhotel' ),
            'type' => 'text',
      ),
    );
    $facility_type = array(
      array(
            'id' => 'type',
            'name' => __( '', 'snhotel' ),
            'type' => 'text',
      ),
    );
    $facility_location = array(
      array(
            'id' => 'location',
            'name' => __( '', 'snhotel' ),
            'type' => 'text',
			'repeatable' => true,
      ),
    );
    $facility_additionalimage = array(
      array(
          'id'   => 'additionalimage',
          'name' => '',
          'type' => 'image',
          'repeatable' => true,
      ),
    );
	$facility_floorplan = array(
      array(
          'id'   => 'floorplan',
          'name' => '',
          'type' => 'image',
      ),
    );
	$facility_downloads = array(
      array(
          'id'   => 'download',
          'name' => '',
          'type' => 'file',
		  'repeatable' => true,
      ),
    );
    $facility_contactlink = array(
      array(
            'id' => 'contactlink',
            'name' => __( '', 'snhotel' ),
            'type' => 'text',
      ),
    );
    $facility_contactphone = array(
      array(
            'id' => 'contactphone',
            'name' => __( '', 'snhotel' ),
            'type' => 'text',
			'repeatable' => true,
      ),
    );

    $meta_boxes[] = array(
      'title' => __( 'Size', 'snhotel' ),
      'pages' => 'snhotel_room',
      'fields' => $accommodation_size,
      'context' => 'side',
    );
    $meta_boxes[] = array(
      'title' => __( 'Default Occupancy', 'snhotel' ),
      'pages' => 'snhotel_room',
      'fields' => $accommodation_defaultoccupancy,
      'context' => 'side',
    );

    $meta_boxes[] = array(
      'title' => __( 'Bedding', 'snhotel' ),
      'pages' => 'snhotel_room',
      'fields' => $accommodation_bedding,
      'context' => 'side',
    );

    $meta_boxes[] = array(
      'title' => __( 'Additional Occupancy (Extra Beds)', 'snhotel' ),
      'pages' => 'snhotel_room',
      'fields' => $accommodation_additionaloccupancy,
      'context' => 'side',
    );

    $meta_boxes[] = array(
      'title' => __( 'View', 'snhotel' ),
      'pages' => 'snhotel_room',
      'fields' => $accommodation_view,
      'context' => 'side',
    );

    $meta_boxes[] = array(
      'title' => __( 'Location', 'snhotel' ),
      'pages' => 'snhotel_room',
      'fields' => $accommodation_location,
      'context' => 'side',
    );

    $meta_boxes[] = array(
      'title' => __( 'Bedroom Image', 'snhotel' ),
      'pages' => 'snhotel_room',
      'fields' => $accommodation_bedroomimage,
      'context' => 'side',
    );

    $meta_boxes[] = array(
      'title' => __( 'Bathroom Image', 'snhotel' ),
      'pages' => 'snhotel_room',
      'fields' => $accommodation_bathroomimages,
      'context' => 'side',
    );

    $meta_boxes[] = array(
      'title' => __( 'View from Accommodation Image', 'snhotel' ),
      'pages' => 'snhotel_room',
      'fields' => $accommodation_viewfromaccommodationimages,
      'context' => 'side',
    );

    $meta_boxes[] = array(
      'title' => __( 'Additional Images', 'snhotel' ),
      'pages' => 'snhotel_room',
      'fields' => $accommodation_additionalimage,
      'context' => 'side',
    );

    $meta_boxes[] = array(
      'title' => __( 'Floor Plan', 'snhotel' ),
      'pages' => 'snhotel_room',
      'fields' => $accommodation_floorplan,
      'context' => 'side',
    );

    //$meta_boxes[] = array(
    //  'title' => __( 'Connected Offer(s)', 'snhotel' ),
    //  'pages' => 'snhotel_room',
    //  'fields' => $accommodation_connectedoffers,
    //  'context' => 'side',
    //);
    //
    $meta_boxes[] = array(
        'title' => __( 'Connected Offer(s)', 'snhotel' ),
        'pages' => 'snhotel_room',
		'context' => 'side',
        'fields' => $accommodation_tax_off,
    );

    $meta_boxes[] = array(
      'title' => __( 'Booking Link', 'snhotel' ),
      'pages' => 'snhotel_room',
      'fields' => $accommodation_bookinglink,
      'context' => 'side',
    );
    $meta_boxes[] = array(
      'title' => __( 'Book From', 'snhotel' ),
      'pages' => 'snhotel_room',
      'fields' => $accommodation_bookfrom,
      'context' => 'side',
    );

    $meta_boxes[] = array(
        'title' => __( 'Room Features', 'snhotel' ),
        'pages' => 'snhotel_room',
        'fields' => $accommodation_features
    );

    $meta_boxes[] = array(
        'title' => __( 'Bathroom', 'snhotel' ),
        'pages' => 'snhotel_room',
        'fields' => $accommodation_bathroom
    );

    $meta_boxes[] = array(
        'title' => __( 'Room Amenities', 'snhotel' ),
        'pages' => 'snhotel_room',
        'fields' => $accommodation_amenities
    );

    $meta_boxes[] = array(
        'title' => __( 'Room Security', 'snhotel' ),
        'pages' => 'snhotel_room',
        'fields' => $accommodation_security
    );

    $meta_boxes[] = array(
        'title' => __( 'Room Communication', 'snhotel' ),
        'pages' => 'snhotel_room',
        'fields' => $accommodation_communication
    );

    $meta_boxes[] = array(
        'title' => __( 'Bed', 'snhotel' ),
        'pages' => 'snhotel_room',
        'fields' => $accommodation_bed
    );

    $meta_boxes[] = array(
        'title' => __( 'Entertainment', 'snhotel' ),
        'pages' => 'snhotel_room',
        'fields' => $accommodation_entertainment
    );

	$meta_boxes[] = array(
        'title' => __( 'Connected Accomodation(s)', 'snhotel' ),
        'pages' => 'snhotel_offer',
		'context' => 'side',
        'fields' => $offer_tax
    );
	$meta_boxes[] = array(
        'title' => __( 'Connected Event(s)', 'snhotel' ),
        'pages' => 'snhotel_offer',
		'context' => 'side',
        'fields' => $offer_tax_eve
    );
	$meta_boxes[] = array(
        'title' => __( 'Connected Facility/ Facilities', 'snhotel' ),
        'pages' => 'snhotel_offer',
		'context' => 'side',
        'fields' => $offer_tax_faci
    );
    $meta_boxes[] = array(
        'title' => __( 'Event Details', 'snhotel' ),
        'pages' => 'snhotel_event',
        'fields' => $event_fields
    );

    $meta_boxes[] = array(
        'title' => __( 'Offer Details', 'snhotel' ),
        'pages' => 'snhotel_event',
        'fields' => $offer_details
    );

    $meta_boxes[] = array(
        'title' => __( 'Offer Restriction', 'snhotel' ),
        'pages' => 'snhotel_event',
        'fields' => $offer_validity
    );
    $meta_boxes[] = array(
        'title' => __( 'Terms & Conditions', 'snhotel' ),
        'pages' => 'snhotel_event',
        'fields' => $offer_termsCondition
    );
	$meta_boxes[] = array(
        'title' => __( 'Connected Offer(s)', 'snhotel' ),
        'pages' => 'snhotel_event',
		'context' => 'side',
        'fields' => $event_tax_off,
    );

    $meta_boxes[] = array(
        'title' => __( 'Offer Details', 'snhotel' ),
        'pages' => 'snhotel_offer',
        'fields' => $offer_fields
    );

    $meta_boxes[] = array(
        'title' => __( 'Offer Restriction', 'snhotel' ),
        'pages' => 'snhotel_offer',
        'fields' => $offer_validity
    );

    $meta_boxes[] = array(
        'title' => __( 'Terms & Conditions', 'snhotel' ),
        'pages' => 'snhotel_offer',
        'fields' => $offer_termsCondition
    );
    $meta_boxes[] = array(
        'title' => __( 'Features', 'snhotel' ),
        'pages' => 'snhotel_facility',
        'fields' => $facility_features
    );
    $meta_boxes[] = array(
        'title' => __( 'Amenities', 'snhotel' ),
        'pages' => 'snhotel_facility',
        'fields' => $facility_amenities
    );
    $meta_boxes[] = array(
        'title' => __( 'Security', 'snhotel' ),
        'pages' => 'snhotel_facility',
        'fields' => $facility_security
    );
    $meta_boxes[] = array(
        'title' => __( 'Communication', 'snhotel' ),
        'pages' => 'snhotel_facility',
        'fields' => $facility_communication
    );
    $meta_boxes[] = array(
        'title' => __( 'Entertainment', 'snhotel' ),
        'pages' => 'snhotel_facility',
        'fields' => $facility_entertainment
    );
    $meta_boxes[] = array(
        'title' => __( 'Opening Hours', 'snhotel' ),
        'pages' => 'snhotel_facility',
        'fields' => $facility_openinghour
    );
    $meta_boxes[] = array(
      'title' => __( 'Setting', 'snhotel' ),
      'pages' => 'snhotel_facility',
      'fields' => $facility_setting,
      'context' => 'side',
    );
    $meta_boxes[] = array(
      'title' => __( 'Type', 'snhotel' ),
      'pages' => 'snhotel_facility',
      'fields' => $facility_type,
      'context' => 'side',
    );
    $meta_boxes[] = array(
      'title' => __( 'Location', 'snhotel' ),
      'pages' => 'snhotel_facility',
      'fields' => $facility_location,
      'context' => 'side',
    );
    $meta_boxes[] = array(
      'title' => __( 'Additional Images', 'snhotel' ),
      'pages' => 'snhotel_facility',
      'fields' => $facility_additionalimage,
      'context' => 'side',
    );
	$meta_boxes[] = array(
      'title' => __( 'Floor Plan', 'snhotel' ),
      'pages' => 'snhotel_facility',
      'fields' => $facility_floorplan,
      'context' => 'side',
    );
	$meta_boxes[] = array(
      'title' => __( 'Downloads', 'snhotel' ),
      'pages' => 'snhotel_facility',
      'fields' => $facility_downloads,
      'context' => 'side',
    );

    $meta_boxes[] = array(
        'title' => __( 'Connected Offer(s)', 'snhotel' ),
        'pages' => 'snhotel_facility',
		'context' => 'side',
        'fields' => $facility_tax_off,
    );
    $meta_boxes[] = array(
      'title' => __( 'Contact Link', 'snhotel' ),
      'pages' => 'snhotel_facility',
      'fields' => $facility_contactlink,
      'context' => 'side',
    );
    $meta_boxes[] = array(
      'title' => __( 'Contact Phone', 'snhotel' ),
      'pages' => 'snhotel_facility',
      'fields' => $facility_contactphone,
      'context' => 'side',
    );

    return $meta_boxes;
}

add_filter( 'cmb_meta_boxes', 'snhotel_cmb_fields' );
