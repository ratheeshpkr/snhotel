<article itemscope itemtype="http://schema.org/Product" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

   <div class="snhotel-summary-before">
       <?php
       /**
        * snhotel_template_event_schema, 15
        * snhotel_template_event_book_now, 20
        */
       do_action( 'snhotel_before_single_event_summary' ); ?>
   </div>

   <div class="snhotel-summary">

       <?php
       /**
        * snhotel_template_post_content, 10
        */
       do_action( 'snhotel_single_event_summary' ); ?>
   </div>

   <div class="snhotel-summary-after">
       <?php
       /**
        * snhotel_template_event_tab_event 15
        */
       do_action( 'snhotel_after_single_event_summary' ); ?>
   </div>

</article>