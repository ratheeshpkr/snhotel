<?php
/**
 * The Template for displaying all single facility.
 *
 * Override this template by copying it to yourtheme/snhotel/single-facility.php
 *
 * @author      Sakha
 * @package     Snhotel/Templates
 * @version     0.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'snhotel' ); ?>

    <?php do_action( 'snhotel_before_main_content' ); ?>

        <?php while ( have_posts() ) : the_post(); ?>
               
            <?php snhotel_get_template_part( 'content', 'single-facility' );
            
            //echo get_the_title();
            
            ?>

        <?php endwhile; // end of the loop. ?>
        <div class="snhotel-col-3 sidebar">

           <aside class="room-nav-widget">
               <?php
                   $current_room = get_the_ID();
                   $rooms = new WP_Query('post_type=snhotel_facility&posts_per_page=-1');
               ?>
               <ul class="room-nav">

                   <?php while ( $rooms->have_posts() ) : $rooms->the_post(); ?>
                   <?php
                       $class = (get_the_ID() == $current_room ? 'current-room' : '');
                   ?>
                   <li><a class="<?php echo $class; ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                   <?php endwhile; wp_reset_postdata(); ?>
               </ul>
           </aside>

           <?php dynamic_sidebar( 'room-sidebar' ); ?>

       </div> <!-- .snhotel-col-3 .sidebar -->
    <?php do_action( 'snhotel_after_main_content' ); ?>

    <?php do_action( 'snhotel_sidebar' ); ?>

<?php get_footer( 'snhotel' ); ?>