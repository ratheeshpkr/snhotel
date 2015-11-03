<?php
/**
 * The Template for displaying all single offer.
 *
 * Override this template by copying it to yourtheme/snhotel/single-offer.php
 *
 * @author      Sakha
 * @package     Snhotel/Templates
 * @version     0.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'snhotel' ); ?>

    <?php do_action( 'snhotel_before_main_content' ); ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <?php snhotel_get_template_part( 'content', 'single-offer' ); ?>

        <?php endwhile; // end of the loop. ?>

    <?php do_action( 'snhotel_after_main_content' ); ?>

    <?php do_action( 'snhotel_sidebar' ); ?>

<?php get_footer( 'snhotel' ); ?>