<article itemscope itemtype="http://schema.org/Product" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

   <div class="snhotel-summary-before">
       <?php
       /**
        * snhotel_template_accommodation_schema, 15
        * snhotel_template_accommodation_book_now, 20
        */
       do_action( 'snhotel_before_single_accommodation_summary' ); ?>
   </div>

   <div class="snhotel-summary">

       <?php
       /**
        * snhotel_template_post_content, 10
        */
       do_action( 'snhotel_single_accommodation_summary' ); ?>
   </div>

   <div class="snhotel-summary-after">
       <?php
       /**
        * snhotel_template_accommodation_tab_accommodation 15
        */
       do_action( 'snhotel_after_single_accommodation_summary' ); ?>
   </div>

</article>