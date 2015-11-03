<?php

function snhotel_p2p_register_connection() {
    // Make sure the Posts 2 Posts plugin is active.
    if ( !function_exists( 'p2p_register_connection_type' ) )
        return;

    p2p_register_connection_type( array(
        'name' => 'event_to_offer',
        'from' => 'snhotel_offer',
        'to' => 'snhotel_event'
    ) );

    p2p_register_connection_type( array(
        'name' => 'event_to_outlet',
        'from' => 'snhotel_outlet',
        'to' => 'snhotel_event'
    ) );

    p2p_register_connection_type( array(
        'name' => 'event_to_leisure',
        'from' => 'snhotel_leisure',
        'to' => 'snhotel_event'
    ) );

    p2p_register_connection_type( array(
        'name' => 'event_to_facility',
        'from' => 'snhotel_event',
        'to' => 'snhotel_facility'
    ) );

    p2p_register_connection_type( array(
        'name' => 'room_to_offer',
        'from' => 'snhotel_offer',
        'to' => 'snhotel_room'
    ) );

    //activity
    p2p_register_connection_type( array(
        'name' => 'outlet_to_activity',
        'from' => 'snhotel_outlet',
        'to' => 'snhotel_activity'
    ) );

    p2p_register_connection_type( array(
        'name' => 'leisure_to_activity',
        'from' => 'snhotel_leisure',
        'to' => 'snhotel_activity'
    ) );

    p2p_register_connection_type( array(
        'name' => 'facility_to_activity',
        'from' => 'snhotel_facility',
        'to' => 'snhotel_activity'
    ) );

    p2p_register_connection_type( array(
        'name' => 'offer_to_activity',
        'from' => 'snhotel_offer',
        'to' => 'snhotel_activity'
    ) );

    //services
    p2p_register_connection_type( array(
        'name' => 'offer_to_services',
        'from' => 'snhotel_offer',
        'to' => 'snhotel_services'
    ) );

    //offer
    p2p_register_connection_type( array(
        'name' => 'offer_to_facility',
        'from' => 'snhotel_offer',
        'to' => 'snhotel_facility'
    ) );

    p2p_register_connection_type( array(
        'name' => 'offer_to_outlet',
        'from' => 'snhotel_offer',
        'to' => 'snhotel_outlet'
    ) );

    p2p_register_connection_type( array(
        'name' => 'offer_to_leisure',
        'from' => 'snhotel_offer',
        'to' => 'snhotel_leisure'
    ) );
}

add_action( 'wp_loaded', 'snhotel_p2p_register_connection' );