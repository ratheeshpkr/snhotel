<?php

/*  --------------------------------------------------
            :: START single pages ::
-------------------------------------------------- */




/*  --------------------------------------------------
:: START template Hooks for single pages
-------------------------------------------------- */
/*  --------------------------------------------------
:: Single Event template Hooks
-------------------------------------------------- */

add_action( 'snhotel_before_single_event', 'snhotel_template_featured_image', 10 );
add_action( 'snhotel_before_single_event', 'snhotel_template_post_title' );
//add_action( 'snhotel_single_event_summary', 'snhotel_template_post_content', 10 );
add_action( 'snhotel_before_single_event_summary', 'snhotel_template_time', 15 );
add_action( 'snhotel_before_single_event_summary', 'snhotel_template_events_event', 15 );
//add_action( 'snhotel_before_single_event_summary', 'snhotel_template_join_button', 20 );
add_action( 'snhotel_before_single_event_summary', 'snhotel_template_event_schema', 25 );
//add_action( 'snhotel_after_single_event_summary', 'snhotel_template_event_tab', 10 );

/*  --------------------------------------------------
:: Single Facility template Hooks
-------------------------------------------------- */

add_action( 'snhotel_before_single_facility', 'snhotel_template_featured_image', 10 );
add_action( 'snhotel_before_single_facility', 'snhotel_template_post_title', 15 );
//add_action( 'snhotel_single_facility_summary', 'snhotel_template_post_content', 10 );
add_action( 'snhotel_before_single_facility_summary', 'snhotel_template_time', 15 );
add_action( 'snhotel_before_single_facility_summary', 'snhotel_template_facility_facility', 15 );
//add_action( 'snhotel_before_single_facility_summary', 'snhotel_template_join_button', 20 );
add_action( 'snhotel_before_single_facility_summary', 'snhotel_template_facility_schema', 25 );
//add_action( 'snhotel_after_single_facility_summary', 'snhotel_template_facility_tab', 10 );

/*  --------------------------------------------------
:: Single Room template Hooks
-------------------------------------------------- */

add_action( 'snhotel_before_single_room', 'snhotel_template_featured_image', 10 );
add_action( 'snhotel_before_single_room', 'snhotel_template_post_title', 15 );

add_action( 'snhotel_before_single_room_summary', 'snhotel_template_time', 15 );
add_action( 'snhotel_before_single_room_summary', 'snhotel_template_join_button', 20 );
add_action( 'snhotel_before_single_room_summary', 'snhotel_template_room_room', 20 );
add_action( 'snhotel_before_single_room_summary', 'snhotel_template_room_schema', 25 );

//add_action( 'snhotel_single_room_summary', 'snhotel_template_post_content', 10 );

//add_action( 'snhotel_after_single_room_summary', 'snhotel_template_room_tab', 10 );



/*  --------------------------------------------------
:: Single Offer template Hooks
-------------------------------------------------- */


add_action( 'snhotel_before_single_offer', 'snhotel_template_featured_image', 10 );
add_action( 'snhotel_before_single_offer', 'snhotel_template_post_title', 15 );

add_action( 'snhotel_before_single_offer_summary', 'snhotel_template_offer_offer', 15 );
add_action( 'snhotel_before_single_offer_summary', 'snhotel_template_book_button', 20 );

add_action( 'snhotel_single_offer_summary', 'snhotel_template_post_content', 10 );
add_action( 'snhotel_single_offer_summary', 'snhotel_template_offer_schema', 15 );

add_action( 'snhotel_after_single_offer_summary', 'snhotel_template_offer_tab', 15 );



/*  --------------------------------------------------
:: END template Hooks for single pages
-------------------------------------------------- */





/*  --------------------------------------------------
:: START Functions for single pages
-------------------------------------------------- */

/*  --------------------------------------------------
:: common functions for Single pages
-------------------------------------------------- */


function snhotel_template_post_title() {
    ?>
    <header>
        <h2 class="page-title" itemprop="name"><?php the_title(); ?></h2>
    </header><!-- .entry-header -->
    <?php
}

function snhotel_template_archive_post_title() {
    ?>
    <header>
        <h1 class="entry-title" itemprop="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    </header><!-- .entry-header -->
    <?php
}

function snhotel_template_post_content() {
    ?>
    <div itemprop="description" class="snhotel-description entry-excerpt">
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'snhotel' ) ); ?>
    </div>
    <?php
}

function snhotel_template_archive_post_content() {
    ?>
    <div itemprop="description" class="snhotel-description entry-excerpt">
        <?php the_excerpt(); ?>
    </div>
    <?php
}

/**
 * Featured image
 *
 * @return void
 */
function snhotel_template_featured_image() {

    if ( has_post_thumbnail() ) {

        echo '<div class="snhotel-image-wrap entry-thumb">';

        if ( !is_single() ) {
            printf( '<a href="%s">', get_permalink() );
        }

        $args = array('class' => 'flex-container', 'itemprop' => 'image');
        the_post_thumbnail( 'full', apply_filters( 'snhotel_featured_image', $args ));

        if ( !is_single() ) {
            echo '</a>';
        }

        echo '</div>';

    } else {

    }
}

function snhotel_template_time() {
    snhotel_get_template( 'includes/time.php' );
}

function snhotel_template_join_button() {
    global $post;

    $url = esc_url( get_post_meta( $post->ID, 'url', true ) );
    ?>
    <div align="right" class="snhotel-half">
        <a href="<?php the_permalink(); ?>" taget="_blank" class="snhotel-btn snhotel-btn-default"><?php _e( 'Join Now!', 'snhotel' ); ?></a>
    </div>
    <?php
}

function snhotel_template_book_button() {
    global $post;

    $url = esc_url( get_post_meta( $post->ID, 'url', true ) );
    ?>
    <div align="right" class="snhotel-half" style="float:right;">
        <a href="<?php echo $url; ?>" taget="_blank" class="snhotel-btn snhotel-btn-default"><?php _e( 'Book Now!', 'snhotel' ); ?></a>
    </div>
    <?php
}

/*  --------------------------------------------------
:: Single Event functions
-------------------------------------------------- */

function snhotel_template_events_event() {
    snhotel_get_template( 'events/event.php' );
}

function snhotel_template_event_schema() {
    snhotel_get_template( 'events/schema.php' );
}

function snhotel_template_event_tab() {
    snhotel_get_template( 'events/tab-event.php' );
}
/*  --------------------------------------------------
:: Single Facility functions
-------------------------------------------------- */

function snhotel_template_facility_facility() {
    snhotel_get_template( 'facilities/facility.php' );
}

function snhotel_template_facility_schema() {
    snhotel_get_template( 'facilities/schema.php' );
}

function snhotel_template_facility_tab() {
    snhotel_get_template( 'facilities/tab-facility.php' );
}

/*  --------------------------------------------------
:: Single Offer functions
-------------------------------------------------- */


function snhotel_template_offer_offer() {
    snhotel_get_template( 'offers/offer.php' );
}

function snhotel_template_offer_schema() {
    snhotel_get_template( 'offers/schema.php' );
}

function snhotel_template_offer_tab() {
    snhotel_get_template( 'offers/tab-offer.php' );
}
/*  --------------------------------------------------
:: Single Room functions
-------------------------------------------------- */


function snhotel_template_room_room() {
    snhotel_get_template( 'rooms/room.php' );
}

function snhotel_template_room_schema() {
    snhotel_get_template( 'rooms/schema.php' );
}

function snhotel_template_room_tab() {
    snhotel_get_template( 'rooms/tab-room.php' );
}



/*  --------------------------------------------------
:: End Functions for single pages
-------------------------------------------------- */



/*  --------------------------------------------------
            :: END single pages ::
-------------------------------------------------- */

















/*  --------------------------------------------------
            :: START archive pages ::
-------------------------------------------------- */




/*  --------------------------------------------------
:: START template Hooks for Archive pages
-------------------------------------------------- */

add_action( 'snhotel_before_main_content', 'snhotel_template_archive_title', 10 );


/*  --------------------------------------------------
:: Archive Offer template Hooks
-------------------------------------------------- */


add_action( 'snhotel_before_archive_offer', 'snhotel_template_featured_image', 10 );
add_action( 'snhotel_before_archive_offer', 'snhotel_template_post_title', 15 );
add_action( 'snhotel_before_archive_offer', 'snhotel_template_offer_schema', 20 );

add_action( 'snhotel_before_archive_offer_summary', 'snhotel_template_offer_offer', 15 );
add_action( 'snhotel_before_archive_offer_summary', 'snhotel_template_book_button', 20 );

add_action( 'snhotel_archive_offer_summary', 'snhotel_template_post_content', 10 );

//add_action( 'snhotel_after_archive_offer_summary', 'snhotel_template_offer_tab', 15 );


/*  --------------------------------------------------
:: Archive Event template Hooks
-------------------------------------------------- */

add_action( 'snhotel_before_archive_event', 'snhotel_template_featured_image', 10 );
add_action( 'snhotel_before_archive_event', 'snhotel_template_post_title', 15 );

add_action( 'snhotel_before_archive_event_summary', 'snhotel_template_time', 15 );
add_action( 'snhotel_before_single_event_summary', 'snhotel_template_events_event', 15 );
add_action( 'snhotel_before_archive_event_summary', 'snhotel_template_join_button', 20 );
add_action( 'snhotel_before_archive_event_summary', 'snhotel_template_event_schema', 25 );

add_action( 'snhotel_archive_event_summary', 'snhotel_template_post_content', 10 );

//add_action( 'snhotel_after_archive_event_summary', 'snhotel_template_event_tab', 10 );

/*  --------------------------------------------------
:: Archive Room template Hooks
-------------------------------------------------- */

add_action( 'snhotel_before_archive_room', 'snhotel_template_featured_image', 10 );
add_action( 'snhotel_before_archive_room', 'snhotel_template_post_title', 15 );

add_action( 'snhotel_before_archive_room_summary', 'snhotel_template_time', 15 );
add_action( 'snhotel_before_single_room_summary', 'snhotel_template_room_room', 20 );
add_action( 'snhotel_before_archive_room_summary', 'snhotel_template_join_button', 20 );
add_action( 'snhotel_before_archive_room_summary', 'snhotel_template_room_schema', 25 );

add_action( 'snhotel_archive_room_summary', 'snhotel_template_post_content', 10 );

//add_action( 'snhotel_after_archive_room_summary', 'snhotel_template_room_tab', 10 );



/*  --------------------------------------------------
:: Archive Facility template Hooks
-------------------------------------------------- */

add_action( 'snhotel_before_archive_facility', 'snhotel_template_featured_image', 10 );
add_action( 'snhotel_before_archive_facility', 'snhotel_template_post_title', 15 );

add_action( 'snhotel_before_archive_facility_summary', 'snhotel_template_time', 15 );
add_action( 'snhotel_before_single_facility_summary', 'snhotel_template_facility_facility', 15 );
add_action( 'snhotel_before_archive_facility_summary', 'snhotel_template_join_button', 20 );
add_action( 'snhotel_before_archive_facility_summary', 'snhotel_template_facility_schema', 25 );

add_action( 'snhotel_archive_facility_summary', 'snhotel_template_post_content', 10 );

//add_action( 'snhotel_after_archive_event_summary', 'snhotel_template_event_tab', 10 );


/*  --------------------------------------------------
:: END template Hooks for Archive pages
-------------------------------------------------- */





/*  --------------------------------------------------
:: START Functions for Archive pages
-------------------------------------------------- */


/*  --------------------------------------------------
:: Archive Common functions
-------------------------------------------------- */

function snhotel_template_archive_title() {
    if ( !is_archive() ) {
        return;
    }
    $object = get_queried_object();
?>
<h1 class="snhotel-archive-title">
      <?php echo $object->labels->name; ?>
</h1>
<?php }



/*  --------------------------------------------------
:: End Functions for Archive pages
-------------------------------------------------- */

/*  --------------------------------------------------
            :: END archive pages ::
-------------------------------------------------- */
