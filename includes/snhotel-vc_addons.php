<?php

//Navigation Menu

function vc_menu_func( $atts, $content) {
ob_start();		
	?>
	<nav class="navbar navbar-default" id="menunav">
				<div class="container">
					<div class="row">
						<ul class="nav navbar-nav pull-right margin-right-15">
							<li class="dropdown resv-dropdown" id="ibe-dropdown">
								<a class="resv-link dropdown-toggle" href="#back-to-reserve" id="ibe-dropdown-button"><?php echo esc_html( get_theme_mod( 'booking_button_text', esc_attr__( 'Reservations', 'Property Theme' ) ) ); ?>
								</a>
							</li>
						</ul>

						<?php
							if (has_nav_menu('primary_navigation')) :
								wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav navbar-right']);
							endif;
						?>
					</div>
				</div>
			</nav>
	<?php
	$returnvariable = ob_get_clean();
    return $returnvariable;
} 

add_shortcode( 'vc_menu', 'vc_menu_func');
vc_map( array(
    "name" => __("Naviagtion Menu", "js_composer"), // add a name
    "base" => "vc_menu", // bind with our shortcode
	"category" => "SNHotels Addons",
    "content_element" => true, // set this parameter when element will has a content
    "is_container" => true, // set this param when you need to add a content element in this element
    // Here starts the definition of array with parameters of our compnent    
) );
/*-------------------------------------------------------------------------------
 Custom SNH archive destination
-------------------------------------------------------------------------------*/

vc_map( array(
        "name"      => __( "Archive Destination", "__x__" ),
        "base"      => "vc_archive_dest",  
        'icon'        => 'text-output',
        'description' => __( 'Place a Content Block in your content.', '__x__' ),
        "wrapper_class" => "clearfix",
        "category" => "SNHotels Addons",
		'params' => array(
				
				array(
					'type' => 'textfield',
					'value' => '',
					'heading' => 'Number of Posts',
					'param_name' => 'post_count',
					), 
				
		   		),
			
			)); 
// SNH Archive Destination
function x_shortcode_archive_dest( $atts ) {
	ob_start();
	extract( shortcode_atts( array(
        'post_count' => 6,
		), $atts ));
	$count = ( $count != '') ? $count : "{$post_count}";
 global $q;
 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
 $q = new WP_Query( array(
  'orderby'          => 'date',
  'post_type'        => 'snhotel_destination',
  'paged' 			=> $paged,
  'post_status'		 => 'publish',
  'posts_per_page'   => "{$count}",
  
  
  ));
include (locate_template('vc-archive-snhotel_destination.php'));
//get_template_part('archive-snhotel_destination');
 
  ?>
  <div class="clear"></div>
  <div class="container">
	<div class="next-previous"><?php post_pagination();?></div>
  </div>
<?php

 wp_reset_postdata();
 $returnvariable = ob_get_clean();
 return $returnvariable;
} 
add_shortcode( 'vc_archive_dest', 'x_shortcode_archive_dest' );


/*-------------------------------------------------------------------------------
 Custom SNH archive accomodation
-------------------------------------------------------------------------------*/
vc_map( array(
        "name"      => __( "Archive Accomodation", "__x__" ),
        "base"      => "vc_archive_accom",  
        'icon'        => 'text-output',
        'description' => __( 'Place a Content Block in your content.', '__x__' ),
        "wrapper_class" => "clearfix",
        "category" => "SNHotels Addons",
		'params' => array(
				
				array(
                'type' => 'loop',
                'value' => '',
                'heading' => 'Query for Taxonomy',
                'param_name' => 'taxonomy_loop',
            ), 
				
		   		),
			)); 
// SNH Archive Rooms
function x_shortcode_archive_accom( $atts ) {
	ob_start();
 extract( shortcode_atts( array(
        'taxonomy_loop' => 'taxonomy_loop',
        
    ), $atts));

 $query=$taxonomy_loop;
 $query=explode('|',$query);
 foreach($query as $query_part)
	{
		$q_part=explode(':',$query_part);
		switch($q_part[0])
		{
			case 'post_type':
				$query_post_type=explode(',',$q_part[1]);
			break;
			
			case 'size':
				$query_posts_per_page=($q_part[1]=='All' ? -1:$q_part[1]);
			break;
			
			case 'order_by':
				
				$query_meta_key='';
				$query_orderby='';
				
				$public_orders_array=array('ID','date','author','title','modified','rand','comment_count','menu_order');
				if(in_array($q_part[1],$public_orders_array))
				{
					$query_orderby=$q_part[1];
				}else
				{
					$query_meta_key=$q_part[1];
					$query_orderby='meta_value_num';
				}
				
			break;
			
			case 'order':
				$query_order=$q_part[1];
			break;
			
			case 'by_id':
				$query_by_id=explode(',',$q_part[1]);
				$query_by_id_not_in=array();
				$query_by_id_in=array();
				foreach($query_by_id as $ids)
				{
					if($ids<0)
					{
						$query_by_id_not_in[]=$ids;
					}else{
						$query_by_id_in[]=$ids;
					}
				}
			break;
			
			case 'categories':
				$query_categories=explode(',',$q_part[1]);
				$query_cat_not_in=array();
				$query_cat_in=array();
				foreach($query_categories as $cat)
				{
					if($cat<0)
					{
						$query_cat_not_in[]=$cat;
					}else
					{
						$query_cat_in[]=$cat;
					}
				}
			break;
			
			case 'tags':
				$query_tags=explode(',',$q_part[1]);
				$query_tags_not_in=array();
				$query_tags_in=array();
				foreach($query_tags as $tags)
				{
					if($tags<0)
					{
						$query_tags_not_in[]=$tags;
					}else
					{
						$query_tags_in[]=$tags;
					}
				}
			break;
			
			case 'authors':
				$query_author=explode(',',$q_part[1]);
				$query_author_not_in=array();
				$query_author_in=array();
				foreach($query_author as $author)
				{
					if($tags<0)
					{
						$query_author_not_in[]=$author;
					}else
					{
						$query_author_in[]=$author;
					}
				}
				
			break;

			case 'tax_query':
				$all_tax=get_object_taxonomies( $query_post_type );

				$tax_query=array();
				$query_tax_query=array('relation' => 'AND');
				foreach ( $all_tax as $tax ) {
					$values=$tax;
					$query_taxs_in=array();
					$query_taxs_not_in=array();
					
					$query_taxs=explode(',',$q_part[1]);
					foreach($query_taxs as $taxs)
					{
						if(term_exists( absint($taxs), $tax )){
							if($taxs<0)
							{
								$query_taxs_not_in[]=absint($taxs);
							}else
							{
								$query_taxs_in[]=$taxs;
							}
						}
					}

					if(count($query_taxs_not_in)>0)
					{
						$query_tax_query[]=array(
							'taxonomy' => $tax,
							'field'    => 'id',
							'terms'    => $query_taxs_not_in,
							'operator' => 'NOT IN',
						);
					}else if(count($query_taxs_in)>0)
					{
						$query_tax_query[]=array(
							'taxonomy' => $tax,
							'field'    => 'id',
							'terms'    => $query_taxs_in,
							'operator' => 'IN',
						);
					}
					
					//break;
				}
				
			break;
		}
	}

 
 $q = new WP_Query( array(
  'orderby'          => $query_orderby,
  'post_type'        => $query_post_type,
  'posts_per_page'   => $query_posts_per_page,
  'tax_query' => $query_tax_query   
    ) );

include (locate_template('vc-archive-snhotel_room.php'));
/* get_template_part('archive-snhotel_room'); */

?>
  <div class="clear"></div>
  <div class="container">
	<div class="next-previous"><?php post_pagination();?></div>
  </div>
<?php
 wp_reset_postdata();
 $returnvariable = ob_get_clean();
 return $returnvariable;
} 
add_shortcode( 'vc_archive_accom', 'x_shortcode_archive_accom' );


/*-------------------------------------------------------------------------------
 Custom SNH archive offers
-------------------------------------------------------------------------------*/
vc_map( array(
        "name"      => __( "Archive Offers", "__x__" ),
        "base"      => "vc_archive_offer",  
        'icon'        => 'text-output',
        'description' => __( 'Place a Content Block in your content.', '__x__' ),
        "wrapper_class" => "clearfix",
        "category" => "SNHotels Addons",
		'params' => array(
				
				array(
                'type' => 'loop',
                'value' => '',
                'heading' => 'Query for Taxonomy',
                'param_name' => 'taxonomy_loop',
            ),
			))); 
// SNH Archive Offer
function x_shortcode_archive_offer( $atts ) {
	ob_start();
 extract( shortcode_atts( array(
        'taxonomy_loop' => 'taxonomy_loop',
        
    ), $atts));

 $query=$taxonomy_loop;
 $query=explode('|',$query);
 foreach($query as $query_part)
	{
		$q_part=explode(':',$query_part);
		switch($q_part[0])
		{
			case 'post_type':
				$query_post_type=explode(',',$q_part[1]);
			break;
			
			case 'size':
				$query_posts_per_page=($q_part[1]=='All' ? -1:$q_part[1]);
			break;
			
			case 'order_by':
				
				$query_meta_key='';
				$query_orderby='';
				
				$public_orders_array=array('ID','date','author','title','modified','rand','comment_count','menu_order');
				if(in_array($q_part[1],$public_orders_array))
				{
					$query_orderby=$q_part[1];
				}else
				{
					$query_meta_key=$q_part[1];
					$query_orderby='meta_value_num';
				}
				
			break;
			
			case 'order':
				$query_order=$q_part[1];
			break;
			
			case 'by_id':
				$query_by_id=explode(',',$q_part[1]);
				$query_by_id_not_in=array();
				$query_by_id_in=array();
				foreach($query_by_id as $ids)
				{
					if($ids<0)
					{
						$query_by_id_not_in[]=$ids;
					}else{
						$query_by_id_in[]=$ids;
					}
				}
			break;
			
			case 'categories':
				$query_categories=explode(',',$q_part[1]);
				$query_cat_not_in=array();
				$query_cat_in=array();
				foreach($query_categories as $cat)
				{
					if($cat<0)
					{
						$query_cat_not_in[]=$cat;
					}else
					{
						$query_cat_in[]=$cat;
					}
				}
			break;
			
			case 'tags':
				$query_tags=explode(',',$q_part[1]);
				$query_tags_not_in=array();
				$query_tags_in=array();
				foreach($query_tags as $tags)
				{
					if($tags<0)
					{
						$query_tags_not_in[]=$tags;
					}else
					{
						$query_tags_in[]=$tags;
					}
				}
			break;
			
			case 'authors':
				$query_author=explode(',',$q_part[1]);
				$query_author_not_in=array();
				$query_author_in=array();
				foreach($query_author as $author)
				{
					if($tags<0)
					{
						$query_author_not_in[]=$author;
					}else
					{
						$query_author_in[]=$author;
					}
				}
				
			break;

			case 'tax_query':
				$all_tax=get_object_taxonomies( $query_post_type );

				$tax_query=array();
				$query_tax_query=array('relation' => 'AND');
				foreach ( $all_tax as $tax ) {
					$values=$tax;
					$query_taxs_in=array();
					$query_taxs_not_in=array();
					
					$query_taxs=explode(',',$q_part[1]);
					foreach($query_taxs as $taxs)
					{
						if(term_exists( absint($taxs), $tax )){
							if($taxs<0)
							{
								$query_taxs_not_in[]=absint($taxs);
							}else
							{
								$query_taxs_in[]=$taxs;
							}
						}
					}

					if(count($query_taxs_not_in)>0)
					{
						$query_tax_query[]=array(
							'taxonomy' => $tax,
							'field'    => 'id',
							'terms'    => $query_taxs_not_in,
							'operator' => 'NOT IN',
						);
					}else if(count($query_taxs_in)>0)
					{
						$query_tax_query[]=array(
							'taxonomy' => $tax,
							'field'    => 'id',
							'terms'    => $query_taxs_in,
							'operator' => 'IN',
						);
					}
					
					//break;
				}
				
			break;
		}
	}

 
 $q = new WP_Query( array(
  'orderby'          => $query_orderby,
  'post_type'        => $query_post_type,
  'posts_per_page'   => $query_posts_per_page,
  'tax_query' => $query_tax_query,  
    ));
 
 include (locate_template('vc-archive-snhotel_offer.php'));
//get_template_part('archive-snhotel_offer');
?>
  <div class="clear"></div>
  <div class="container">
	<div class="next-previous"><?php post_pagination();?></div>
  </div>
<?php
 wp_reset_postdata();
 $returnvariable = ob_get_clean();
 return $returnvariable;
} 
add_shortcode( 'vc_archive_offer', 'x_shortcode_archive_offer' );


/*-------------------------------------------------------------------------------
 Custom SNH archive posts
-------------------------------------------------------------------------------*/
vc_map( array(
        "name"      => __( "Archive Posts", "__x__" ),
        "base"      => "vc_archive_post",  
        'icon'        => 'text-output',
        'description' => __( 'Place a Content Block in your content.', '__x__' ),
        "wrapper_class" => "clearfix",
        "category" => "SNHotels Addons",
		'params' => array(
				
				array(
					'type' => 'textfield',
					'value' => '',
					'heading' => 'Number of Posts',
					'param_name' => 'post_count',
					), 
				
		   		),
			)); 
// SNH Archive Destination
function x_shortcode_archive_post( $atts ) {
	ob_start();
	extract( shortcode_atts( array(
        'post_count' => 3,
		), $atts ));
	$count = ( $count != '') ? $count : "{$post_count}";

 ?>
 <div id="content" role="main" class="col-xs-12 col-sm-8 col-md-8">
					<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array(
								'post_type' => 'post',
								'post_status' => 'publish',
								'posts_per_page' => "{$post_count}",
								'paged' => $paged,
								'caller_get_posts' => 1,
							);
						$my_query = new WP_Query($args);
						if ($my_query->have_posts()) {
						while ($my_query->have_posts()) : $my_query->the_post();
						get_template_part('templates/content-common');
					?>

					<?php
						endwhile;
						echo "<script type=\"text/javascript\">";
						echo "var total_blog_pages = ".$my_query->max_num_pages.";";
						echo "</script>";
						/* echo $my_query->found_posts; */
						if($my_query->max_num_pages > 1){
					?>
						<div class="more_blog_post">

						</div>
						<div class="clearfix"></div>
						<div class="load-more color-gray">
							<a href="#" id="more_blogposts"><?php echo __('Load More Posts','snhotel-theme');?></a>
						</div>
					<?php
							}
						}
						wp_reset_query();  // Restore global post data stomped by the_post().
					?>
				</div><!-- #content -->
				<div class="right-sidebar col-xs-12 col-sm-4 col-md-4 margin-t30">
					<div class="col-xs-12" id="right-sidebar"> 
							<?php get_template_part('templates/sidebar'); ?>
					</div>
				</div><!-- /.sidebar -->
			</div>
 <?php
 get_template_part('archives');
 $returnvariable = ob_get_clean();
 return $returnvariable;
} 
add_shortcode( 'vc_archive_post', 'x_shortcode_archive_post' );


/* VC element for events */
vc_map( array(
        "name"      => __( "Archive Events", "__x__" ),
        "base"      => "vc_archive_event",  
        'icon'        => 'text-output',
        'description' => __( 'Place a Content Block in your content.', '__x__' ),
        "wrapper_class" => "clearfix",
        "category" => "SNHotels Addons",
		'params' => array(
				
				array(
                'type' => 'loop',
                'value' => '',
                'heading' => 'Query for Taxonomy',
                'param_name' => 'taxonomy_loop',
            ),
				
		   		),
			)); 
// SNH Archive Events
function x_shortcode_archive_event( $atts ) {
	ob_start();
 extract( shortcode_atts( array(
        'taxonomy_loop' => 'taxonomy_loop',
        
    ), $atts));

 $query=$taxonomy_loop;
 $query=explode('|',$query);
 foreach($query as $query_part)
	{
		$q_part=explode(':',$query_part);
		switch($q_part[0])
		{
			case 'post_type':
				$query_post_type=explode(',',$q_part[1]);
			break;
			
			case 'size':
				$query_posts_per_page=($q_part[1]=='All' ? -1:$q_part[1]);
			break;
			
			case 'order_by':
				
				$query_meta_key='';
				$query_orderby='';
				
				$public_orders_array=array('ID','date','author','title','modified','rand','comment_count','menu_order');
				if(in_array($q_part[1],$public_orders_array))
				{
					$query_orderby=$q_part[1];
				}else
				{
					$query_meta_key=$q_part[1];
					$query_orderby='meta_value_num';
				}
				
			break;
			
			case 'order':
				$query_order=$q_part[1];
			break;
			
			case 'by_id':
				$query_by_id=explode(',',$q_part[1]);
				$query_by_id_not_in=array();
				$query_by_id_in=array();
				foreach($query_by_id as $ids)
				{
					if($ids<0)
					{
						$query_by_id_not_in[]=$ids;
					}else{
						$query_by_id_in[]=$ids;
					}
				}
			break;
			
			case 'categories':
				$query_categories=explode(',',$q_part[1]);
				$query_cat_not_in=array();
				$query_cat_in=array();
				foreach($query_categories as $cat)
				{
					if($cat<0)
					{
						$query_cat_not_in[]=$cat;
					}else
					{
						$query_cat_in[]=$cat;
					}
				}
			break;
			
			case 'tags':
				$query_tags=explode(',',$q_part[1]);
				$query_tags_not_in=array();
				$query_tags_in=array();
				foreach($query_tags as $tags)
				{
					if($tags<0)
					{
						$query_tags_not_in[]=$tags;
					}else
					{
						$query_tags_in[]=$tags;
					}
				}
			break;
			
			case 'authors':
				$query_author=explode(',',$q_part[1]);
				$query_author_not_in=array();
				$query_author_in=array();
				foreach($query_author as $author)
				{
					if($tags<0)
					{
						$query_author_not_in[]=$author;
					}else
					{
						$query_author_in[]=$author;
					}
				}
				
			break;

			case 'tax_query':
				$all_tax=get_object_taxonomies( $query_post_type );

				$tax_query=array();
				$query_tax_query=array('relation' => 'AND');
				foreach ( $all_tax as $tax ) {
					$values=$tax;
					$query_taxs_in=array();
					$query_taxs_not_in=array();
					
					$query_taxs=explode(',',$q_part[1]);
					foreach($query_taxs as $taxs)
					{
						if(term_exists( absint($taxs), $tax )){
							if($taxs<0)
							{
								$query_taxs_not_in[]=absint($taxs);
							}else
							{
								$query_taxs_in[]=$taxs;
							}
						}
					}

					if(count($query_taxs_not_in)>0)
					{
						$query_tax_query[]=array(
							'taxonomy' => $tax,
							'field'    => 'id',
							'terms'    => $query_taxs_not_in,
							'operator' => 'NOT IN',
						);
					}else if(count($query_taxs_in)>0)
					{
						$query_tax_query[]=array(
							'taxonomy' => $tax,
							'field'    => 'id',
							'terms'    => $query_taxs_in,
							'operator' => 'IN',
						);
					}
					
					//break;
				}
				
			break;
		}
	}

 
 $q = new WP_Query( array(
  'orderby'          => $query_orderby,
  'post_type'        => $query_post_type,
  'posts_per_page'   => $query_posts_per_page,
  'tax_query' => $query_tax_query   
    ) );
?>
<?php 
include (locate_template('vc-archive-snhotel_event.php'));
?>
  <div class="clear"></div>
  <div class="container">
	<div class="next-previous"><?php post_pagination();?></div>
  </div>
<?php

 wp_reset_postdata();
 $returnvariable = ob_get_clean();
 return $returnvariable;
} 
add_shortcode( 'vc_archive_event', 'x_shortcode_archive_event' );


/* VC element for facility */
vc_map( array(
        "name"      => __( "Archive Facility", "__x__" ),
        "base"      => "vc_archive_facility",  
        'icon'        => 'text-output',
        'description' => __( 'Place a Content Block in your content.', '__x__' ),
        "wrapper_class" => "clearfix",
        "category" => "SNHotels Addons",
		'params' => array(
				
				array(
                'type' => 'loop',
                'value' => '',
                'heading' => 'Query for Taxonomy',
                'param_name' => 'taxonomy_loop',
            ),
			))); 
// SNH Archive Facility
function x_shortcode_archive_facility( $atts ) {
	ob_start();
 extract( shortcode_atts( array(
        'taxonomy_loop' => 'taxonomy_loop',
        
    ), $atts));

 $query=$taxonomy_loop;
 $query=explode('|',$query);
 foreach($query as $query_part)
	{
		$q_part=explode(':',$query_part);
		switch($q_part[0])
		{
			case 'post_type':
				$query_post_type=explode(',',$q_part[1]);
			break;
			
			case 'size':
				$query_posts_per_page=($q_part[1]=='All' ? -1:$q_part[1]);
			break;
			
			case 'order_by':
				
				$query_meta_key='';
				$query_orderby='';
				
				$public_orders_array=array('ID','date','author','title','modified','rand','comment_count','menu_order');
				if(in_array($q_part[1],$public_orders_array))
				{
					$query_orderby=$q_part[1];
				}else
				{
					$query_meta_key=$q_part[1];
					$query_orderby='meta_value_num';
				}
				
			break;
			
			case 'order':
				$query_order=$q_part[1];
			break;
			
			case 'by_id':
				$query_by_id=explode(',',$q_part[1]);
				$query_by_id_not_in=array();
				$query_by_id_in=array();
				foreach($query_by_id as $ids)
				{
					if($ids<0)
					{
						$query_by_id_not_in[]=$ids;
					}else{
						$query_by_id_in[]=$ids;
					}
				}
			break;
			
			case 'categories':
				$query_categories=explode(',',$q_part[1]);
				$query_cat_not_in=array();
				$query_cat_in=array();
				foreach($query_categories as $cat)
				{
					if($cat<0)
					{
						$query_cat_not_in[]=$cat;
					}else
					{
						$query_cat_in[]=$cat;
					}
				}
			break;
			
			case 'tags':
				$query_tags=explode(',',$q_part[1]);
				$query_tags_not_in=array();
				$query_tags_in=array();
				foreach($query_tags as $tags)
				{
					if($tags<0)
					{
						$query_tags_not_in[]=$tags;
					}else
					{
						$query_tags_in[]=$tags;
					}
				}
			break;
			
			case 'authors':
				$query_author=explode(',',$q_part[1]);
				$query_author_not_in=array();
				$query_author_in=array();
				foreach($query_author as $author)
				{
					if($tags<0)
					{
						$query_author_not_in[]=$author;
					}else
					{
						$query_author_in[]=$author;
					}
				}
				
			break;

			case 'tax_query':
				$all_tax=get_object_taxonomies( $query_post_type );

				$tax_query=array();
				$query_tax_query=array('relation' => 'AND');
				foreach ( $all_tax as $tax ) {
					$values=$tax;
					$query_taxs_in=array();
					$query_taxs_not_in=array();
					
					$query_taxs=explode(',',$q_part[1]);
					foreach($query_taxs as $taxs)
					{
						if(term_exists( absint($taxs), $tax )){
							if($taxs<0)
							{
								$query_taxs_not_in[]=absint($taxs);
							}else
							{
								$query_taxs_in[]=$taxs;
							}
						}
					}

					if(count($query_taxs_not_in)>0)
					{
						$query_tax_query[]=array(
							'taxonomy' => $tax,
							'field'    => 'id',
							'terms'    => $query_taxs_not_in,
							'operator' => 'NOT IN',
						);
					}else if(count($query_taxs_in)>0)
					{
						$query_tax_query[]=array(
							'taxonomy' => $tax,
							'field'    => 'id',
							'terms'    => $query_taxs_in,
							'operator' => 'IN',
						);
					}
					
					//break;
				}
				
			break;
		}
	}

 
 $q = new WP_Query( array(
  'orderby'          => $query_orderby,
  'post_type'        => $query_post_type,
  'posts_per_page'   => $query_posts_per_page,
  'tax_query' => $query_tax_query   
    ) );

?>
<?php 
include (locate_template('vc-archive-snhotel_facility.php'));
?>
<?php
  
 ?>
  <div class="clear"></div>
  <div class="container">
	<div class="next-previous"><?php post_pagination();?></div>
  </div>
<?php
 wp_reset_postdata();
 $returnvariable = ob_get_clean();
 return $returnvariable;
} 
add_shortcode( 'vc_archive_facility', 'x_shortcode_archive_facility' );

/*-------------------------------------------------------------------------------
	Custom Featured Offer Form Config
-------------------------------------------------------------------------------*/
global $wpdb;

 
vc_map( array(
        "name"      => __( "Featured Offer", "__x__" ),
        "base"      => "vc_featured_offer",
		
        'icon'        => 'text-output',
        'description' => __( 'Place a Content Block in your content.', '__x__' ),
        "wrapper_class" => "clearfix",
        "category" => "SNHotels Addons",
        
    ) );
	
	
	// SNH Featured Offer Shortcode
// =============================================================================
 
function x_shortcode_featured_offers( $atts ) {
	ob_start();
	get_template_part('templates/vc-template-featured_offers');
	$returnvariable = ob_get_clean();
	return $returnvariable;
}
 
add_shortcode( 'vc_featured_offer', 'x_shortcode_featured_offers' );

/*SNH Featured Offer Overview */

vc_map( array(
        "name"      => __( "Featured Offer Overview", "__x__" ),
        "base"      => "vc_featured_offer_overview",
		
        'icon'        => 'text-output',
        'description' => __( 'Place a Content Block in your content.', '__x__' ),
        "wrapper_class" => "clearfix",
        "category" => "SNHotels Addons",
        
    ) );
	
	
	// SNH Featured Offer Shortcode
// =============================================================================
 
function x_shortcode_featured_offers_overview( $atts ) {
	ob_start();
	get_template_part('templates/vc-template_featured_offer_overview');
	$returnvariable = ob_get_clean();
	return $returnvariable;
}
 
add_shortcode( 'vc_featured_offer_overview', 'x_shortcode_featured_offers_overview' );



/*-------------------------------------------------------------------------------
 Custom Banner Config
-------------------------------------------------------------------------------*/

vc_map( array(
        "name"      => __( "Banner Image", "__x__" ),
        "base"      => "vc_banner_image",
  
        'icon'        => 'text-output',
        'description' => __( 'Place a Content Block in your content.', '__x__' ),
        "wrapper_class" => "clearfix",
        "category" => "SNHotels Addons",
        "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Primary Title", "primary-title" ),
            "param_name" => "primary_title",
            "description" => __( "Enter Your Primary Page Title.", "primary-title" )
         ),
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Secondary Title", "secondary-title" ),
            "param_name" => "secondary_title",
            "description" => __( "Enter Your Secondary Page Title.", "secondary-title" )
         ),
		array(
            "type" => "attach_image", // it will bind a img choice in WP
            "heading" => __("Image for Banner", "js_composer"),
            "param_name" => "banner_image",
        ),
		), 
    ) );
 
 
 // SNH Banner image Shortcode
// =============================================================================
 
function x_shortcode_banner_image( $atts ) {
 ob_start(); 
 $banner = shortcode_atts( array(
        'primary_title' => 'primary_title',
        'secondary_title' => 'secondary_title',
		'banner_image' => 'banner_image'
    ), $atts );
 include(locate_template('templates/vc-template-banner.php'));
 //get_template_part('templates/template-banner');
 $returnvariable = ob_get_clean();
 return $returnvariable;
}
 
add_shortcode( 'vc_banner_image', 'x_shortcode_banner_image' );



 //Pagination
if (  !function_exists( 'post_pagination' ) ) :
   function post_pagination() {
     global $q;
     $pager = 999999999; // need an unlikely integer
 
        echo paginate_links( array(
             'base' => str_replace( $pager, '%#%', esc_url( get_pagenum_link( $pager ) ) ),
             'format' => '?paged=%#%',
             'current' => max( 1, get_query_var('paged') ),
             'total' => $q->max_num_pages
        ) );
   }
endif; 

//New Shortcode for Homepage Call out widget

vc_map( array(
        "name"      => __( "Post Order", "__x__" ),
        "base"      => "vc_post_order",
		
        'icon'        => 'text-output',
        'description' => __( 'Place a Content Block in your content.', '__x__' ),
        "wrapper_class" => "clearfix",
        "category" => "SNHotels Addons",
		'params' => array(
             array(
                'type' => 'loop',
                'value' => '',
                'heading' => 'Select the post type',
                'param_name' => 'post_homepage',
            ), 
			
			
		),
        
    ) );
add_shortcode( 'vc_post_order', 'post_listing_parameters_shortcode' );
function post_listing_parameters_shortcode( $atts ) {
    ob_start();
	extract( shortcode_atts( array(
        'post_homepage' => 'post_homepage',
        
		), $atts ));
		$query=$post_homepage;
	 $query=explode('|',$query);
	 $query_by_id_in='';
	 foreach($query as $query_part)
		{
		$q_part=explode(':',$query_part);
		switch($q_part[0])
		{
			case 'post_type':
				$query_post_type=explode(',',$q_part[1]);
			break;
			
			case 'size':
				$query_posts_per_page=($q_part[1]=='All' ? -1:$q_part[1]);
			break;
			
			case 'order_by':
				
				$query_meta_key='';
				$query_orderby='';
				
				$public_orders_array=array('ID','date','author','title','modified','rand','comment_count','menu_order');
				if(in_array($q_part[1],$public_orders_array))
				{
					$query_orderby=$q_part[1];
				}else
				{
					$query_meta_key=$q_part[1];
					$query_orderby='meta_value_num';
				}
				
			break;
			
			case 'order':
				$query_order=$q_part[1];
			break;
			
			case 'by_id':
				$query_by_id=explode(',',$q_part[1]);
				$query_by_id_not_in=array();
				$query_by_id_in=array();
				foreach($query_by_id as $ids)
				{
					if($ids<0)
					{
						$query_by_id_not_in[]=$ids;
					}else{
						$query_by_id_in[]=$ids;
					}
				}
			break;
			
			case 'categories':
				$query_categories=explode(',',$q_part[1]);
				$query_cat_not_in=array();
				$query_cat_in=array();
				foreach($query_categories as $cat)
				{
					if($cat<0)
					{
						$query_cat_not_in[]=$cat;
					}else
					{
						$query_cat_in[]=$cat;
					}
				}
			break;
			
			case 'tags':
				$query_tags=explode(',',$q_part[1]);
				$query_tags_not_in=array();
				$query_tags_in=array();
				foreach($query_tags as $tags)
				{
					if($tags<0)
					{
						$query_tags_not_in[]=$tags;
					}else
					{
						$query_tags_in[]=$tags;
					}
				}
			break;
			
			case 'authors':
				$query_author=explode(',',$q_part[1]);
				$query_author_not_in=array();
				$query_author_in=array();
				foreach($query_author as $author)
				{
					if($tags<0)
					{
						$query_author_not_in[]=$author;
					}else
					{
						$query_author_in[]=$author;
					}
				}
				
			break;

			case 'tax_query':
				$all_tax=get_object_taxonomies( $query_post_type );

				$tax_query=array();
				$query_tax_query=array('relation' => 'AND');
				foreach ( $all_tax as $tax ) {
					$values=$tax;
					$query_taxs_in=array();
					$query_taxs_not_in=array();
					
					$query_taxs=explode(',',$q_part[1]);
					foreach($query_taxs as $taxs)
					{
						if(term_exists( absint($taxs), $tax )){
							if($taxs<0)
							{
								$query_taxs_not_in[]=absint($taxs);
							}else
							{
								$query_taxs_in[]=$taxs;
							}
						}
					}

					if(count($query_taxs_not_in)>0)
					{
						$query_tax_query[]=array(
							'taxonomy' => $tax,
							'field'    => 'id',
							'terms'    => $query_taxs_not_in,
							'operator' => 'NOT IN',
						);
					}else if(count($query_taxs_in)>0)
					{
						$query_tax_query[]=array(
							'taxonomy' => $tax,
							'field'    => 'id',
							'terms'    => $query_taxs_in,
							'operator' => 'IN',
						);
					}
					
					//break;
				}
				
			break;
		}
	}
	
    // define attributes and their defaults
   
    // define query parameters based on attributes
    $options = array(
		'orderby'          => $query_orderby,
	    'post_type'        => $query_post_type,
		'posts_per_page'   => $query_posts_per_page,
		'post__in'		  =>  $query_by_id_in,
    );
    $posts = new WP_Query( $options );
    // run the loop based on the query
    if ( $posts->have_posts() ) { 
		$post_count = count(explode(",",$post__in));
       switch($post_count){

		case 1:

			while ($posts->have_posts()): $posts->the_post();

		?>
			<div class="col-xs-12 col-md-4 col-sm-4 no-padding-mobile">
				<?php get_template_part('templates/content-facility'); ?>
			</div>
		<?php

			endwhile;
			break;

		case 2:
			while ($posts->have_posts()): $posts->the_post();

		?>
			<div class="col-xs-12 col-sm-6 no-padding-mobile">
				<?php get_template_part('templates/content-facility'); ?>
			</div>

		<?php
			endwhile;
			break;

		case 3:

			while ($posts->have_posts()): $posts->the_post();

		?>
			<div class="col-xs-12 col-sm-4 no-padding-mobile">
				<?php get_template_part('templates/content-facility'); ?>
			</div>

		<?php
			endwhile;
			break;

		case 4:

			while ($posts->have_posts()): $posts->the_post();

		?>
			<div class="col-xs-12 col-sm-3 no-padding-mobile">
				<?php get_template_part('templates/content-facility'); ?>
			</div>

			<?php
			endwhile;
			break;
		}
    
        $returnvariable = ob_get_clean();
        return $returnvariable;
    }
}



/*-------------------------------------------------------------------------------
	Custom SNH Booking Form Config
-------------------------------------------------------------------------------*/
global $wpdb;

 
vc_map( array(
        "name"      => __( "Booking", "__x__" ),
        "base"      => "vc_booking_form",
		
        'icon'        => 'text-output',
        'description' => __( 'Place a Content Block in your content.', '__x__' ),
        "wrapper_class" => "clearfix",
        "category" => "SNHotels Addons",
		'params' => array(
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => 'Offer Code',
                'param_name' => 'offer_code',
            ), 
        ),        
    ) );
	
	
	// SNH Map Shortcode
// =============================================================================
 
function x_shortcode_booking_form( $atts ) {
	ob_start();
	$a = shortcode_atts( array(
        'offer_code' => 'offer_code',
        
    ), $atts );
 $promo  = $a['offer_code'];
 include (locate_template('templates/content-booking.php'));
 $returnvariable = ob_get_clean();
 return $returnvariable;
}
 
add_shortcode( 'vc_booking_form', 'x_shortcode_booking_form' );



/*-------------------------------------------------------------------------------
	Custom SNH MAP Config
-------------------------------------------------------------------------------*/

function vc_gmap_func( $atts, $content) {   
 ?>
 <?php
  
  //global $url;
 ob_start(); 
 $a = shortcode_atts( array(
        'map_image' => 'map_image',
        'url' => 'url',
  'marker_icon' => 'marker_icon'
    ), $atts );
 
  //$titles = vc_param_group_parse_atts( $atts['url'] );
  
 $mapurl= $a['url']; 
 $image_attributes = wp_get_attachment_image_src( $attachment_id = $a['map_image'] );
 $mapimg= $image_attributes[0];
 $marker_attributes = wp_get_attachment_image_src( $attachment_id = $a['marker_icon'] );
 $marker_icon= $marker_attributes[0];
    //get_template_part( 'mytemp', $type);
 include(locate_template('templates/vc-template-map.php'));
 $returnvariable = ob_get_clean();
 return $returnvariable;
 ?>
 <?php
} 

add_shortcode( 'vc_gmap', 'vc_gmap_func');

vc_map( array(
    "name" => __("SNH Map", "js_composer"), // add a name
    "base" => "vc_gmap", // bind with our shortcode
	"category" => "SNHotels Addons",
    "content_element" => true, // set this parameter when element will has a content
    "is_container" => true, // set this param when you need to add a content element in this element
    // Here starts the definition of array with parameters of our compnent  
 "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "URL", "my-text-domain" ),
            "param_name" => "url",
            "value" => __( "http://", "my-text-domain" ),
            "description" => __( "Enter Your url.", "my-text-domain" )
         ),
   array(
            "type" => "attach_image", // it will bind a img choice in WP
            "heading" => __("Image for google map", "js_composer"),
            "param_name" => "map_image",
        ),
  array(
            "type" => "attach_image", // it will bind a img choice in WP
            "heading" => __("Image for google map marker", "js_composer"),
            "param_name" => "marker_icon",
        ),
   ), 
) );

/*-------------------------------------------------------------------------------
	Custom SNH Related Config
-------------------------------------------------------------------------------*/


function vc_related_func( $atts, $content) {
   ob_start();
   get_template_part( 'templates/vc-template-related_offer' );
   $returnvariable = ob_get_clean();
   return $returnvariable; 
} 
add_shortcode( 'vc_related_offer', 'vc_related_func');

vc_map( array(
    "name" => __("Related Offer", "js_composer"), // add a name
    "base" => "vc_related_offer", // bind with our shortcode
	"category" => "SNHotels Addons",
    "content_element" => true, // set this parameter when element will has a content
    "is_container" => true, // set this param when you need to add a content element in this element
    // Here starts the definition of array with parameters of our compnent
    
) );



/*-------------------------------------------------------------------------------
	Custom SNH Latest Offer
-------------------------------------------------------------------------------*/
global $wpdb;

 
vc_map( array(
        "name"      => __( "Latest Offer", "__x__" ),
        "base"      => "vc_latest_offer",
		
        'icon'        => 'text-output',
        'description' => __( 'Place a Content Block in your content.', '__x__' ),
        "wrapper_class" => "clearfix",
        "category" => "SNHotels Addons",
		'params' => array(
            /* array(
                'type' => 'posttypes',
                'value' => '',
                'heading' => 'Latest Posts',
                'param_name' => 'latest_offer',
            ), */
			array(
                'type' => 'loop',
                'value' => '',
                'heading' => 'Loop for Latest',
                'param_name' => 'latest_offer_loop',
            ),
		),
        
    ) );
	
	
	// SNH Latest Offer
// =============================================================================
 
function x_shortcode_latest_offer( $atts ) {
	ob_start();
	$att =  shortcode_atts( array(
        'latest_offer_loop' => 'latest_offer_loop',
        
    ), $atts);
	
	$type          = ( $type        == 'snhotel_offer' ) ? 'latest-posts' : 'snhotel_offer';
	$count         = ( $count       != ''          ) ? $count : 3;
	
	$q = new WP_Query( array(
		'orderby'          => 'date',
		'post_type'        => "{$type}",
		'posts_per_page'   => "{$count}",
     
    ) );
	
    if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post();
		
		?>
		<div class="col-xs-12 col-md-4">
		<?php
		get_template_part('templates/offers/offer-widget');
		//include(locate_template('templates/offer/offer-widget.php'));
		?>
		</div>
		<?php
		
		endwhile; endif; wp_reset_postdata();
	$returnvariable = ob_get_clean();
    return $returnvariable;	
}
 
add_shortcode( 'vc_latest_offer', 'x_shortcode_latest_offer' );

/*-------------------------------------------------------------------------------
	VC Element for Address Element
-------------------------------------------------------------------------------*/

vc_map( array(
        "name"      => __( "Address Element", "__x__" ),
        "base"      => "vc_contact_us",
		
        'icon'        => 'text-output',
        'description' => __( 'Place a Content Block in your content.', '__x__' ),
        "wrapper_class" => "clearfix",
        "category" => "SNHotels Addons",        
    ) );
	
	
	// SNH Address Shortcode
// =============================================================================
 
function x_shortcode_contact_us( $atts, $content ) {
	ob_start();
	$settings = get_option( "snc_theme_settings" );


					
					$output .= '<address>';
						
							$add1 = esc_html( stripslashes( $settings["snc_add1"] ) );
							$add2 = esc_html( stripslashes( $settings["snc_add2"] ) );
							$city = esc_html( stripslashes( $settings["snc_city"] ) );
							$state = esc_html( stripslashes( $settings["snc_state"] ) );
							$pcode = esc_html( stripslashes( $settings["snc_pcode"] ) );
							$country = esc_html( stripslashes( $settings["snc_country"] ) );


						

						$output .= '<h3 class="post_title">'.esc_html( stripslashes( $settings['snc_hotelname'] ) ).' </h3>';

						$output .=  $add1.','."<br>";
						if(!empty($add2)){
								$output .= $add2.','."<br>";
						}
						$output .= $city.',<br>';
						$output .=$state.' '.$pcode.', '.$country."<br>";

						$output .= '<div class="contact-info margin-bottom-20">

							<span>P: </span>'.esc_html( stripslashes( $settings["snc_phone"] ) ).'<br>';

							if(!empty($settings["snc_fax"])) {
								$output .='<span>F: </span>'.esc_html( stripslashes( $settings["snc_fax"] ) ).'<br>';
							}
							$output .='<span class="margin-t20">E: </span> <a href="mailto:'.esc_html( stripslashes( $settings["snc_email"] ) ).'">'.esc_html( stripslashes( $settings["snc_email"] ) ).'</a></br></div></address>';
					return $output;				
	$returnvariable = ob_get_clean();
	return $returnvariable;
}
 
add_shortcode( 'vc_contact_us', 'x_shortcode_contact_us' );


/*-------------------------------------------------------------------------------
	Custom Review Element Form Config
-------------------------------------------------------------------------------*/

vc_map( array(
        "name"      => __( "Review Carousel", "__x__" ),
        "base"      => "vc_review",  
        'icon'        => 'text-output',
        'description' => __( 'Place a Content Block in your content.', '__x__' ),
        "wrapper_class" => "clearfix",
        "category" => "SNHotels Addons",
		
			)); 
// SNH Archieve Destination
function x_shortcode_review( $atts ) {
	ob_start();
$type = 'reviews';
		$a = shortcode_atts( array(
				'count' => 'attribute 2 default',
    ), $atts );
		$args=array
	  (
	    'post_type' => $type,
	    'post_status' => 'publish',
	    'posts_per_page' => 10,
		  'suppress_filters' => false,
			'order' => "DESC",
      'orderby' => 'date',
    	'meta_query'       => array(
        'relation'    => 'AND',
         array(
            'key'          => 'rating',
            'value'        => '4',
            'compare'      => '>=',
        ),
        array(
            'key'          => 'rating',
            'value'        => '5',
            'compare'      => '<=',
        ),
				array(
            'key'          => 'language',
            'value'        => 'English',
            'compare'      => '=',
        )
    	),
	  );
	 
	  
	$output .= '<div id="reviews-wrapper">
		<div class="reviews" data-current-index="0">';
				
					add_filter('posts_where', 'filter_where_content_is_empty');
					$my_query = new WP_Query($args);
					remove_filter('posts_where', 'filter_where_content_is_empty');
					if( $my_query->have_posts() )
					{
						$counter=0;
						while ($my_query->have_posts()) : $my_query->the_post();
				
				$output .= '<div class="review"><div class="col-xs-12 review-header"><div class="col-xs-2 no-padding">';
				$output .= '<img src="'.get_bloginfo('template_directory').'/imgs/profile.png" alt="" class="review-user-img"></div><div class="col-xs-10"><span class="review-user-name">'.get_post_meta(get_the_ID(),'author', true).' '.get_post_meta(get_the_ID(),'authorlocation', true).'</span><div class="row"><div class="col-xs-12 padding-right-0">';
											
													$triptype = "";
													if(get_post_meta(get_the_ID(),'triptype', true)!=""){
														$triptype = "Trip type: ".get_post_meta(get_the_ID(),'triptype', true);
													}
											
												$output .= '<span class="review-date">'.date( 'M j, Y', strtotime(get_post_meta(get_the_ID(),'datereview', true))).'</span> &nbsp;	<span class="review-trip-type">'. $triptype.'</span>
										</div>
								</div>
						</div>
					</div>
 					<div class="col-xs-12 review-body">
					<div class="col-xs-12 quote">
						<span>';
							
								$content = get_the_content();
								if($content != ""){
									if(strlen($content)>90) {
											$output .= "\"".substr($content, 0, 90).'..."';
									}
									else {
											$output .= '"'.$content.'"';
									}
								}
							
						$output .= '</span>
					</div>
					<div class="col-xs-12">
						<div class="col-xs-8 no-padding review-site-name">'.get_post_meta(get_the_ID(),'reviewsitename', true).'</div>
						<div class="col-xs-4 no-padding" title="'.get_post_meta(get_the_ID(),'rating', true).'out of 5">
							<div class="review-star-bg"></div>
							<div class="review-star" data-value="'. get_post_meta(get_the_ID(),'rating', true).'"></div>
						</div>
					</div>
				</div>
		</div>';

		
    endwhile;
	  }
	   
		$output .= '</div>
		<div class="col-xs-12">
			<a href="'.get_post_type_archive_link( $type ).'" class="all-review">
				Read all Reviews
			</a>
		</div>
	</div>';
 return $output;
 $returnvariable = ob_get_clean();
 return $returnvariable;
} 
add_shortcode( 'vc_review', 'x_shortcode_review' );



/* VC Element for hotel faclities */
function vc_hotel_facilities( $atts, $content) {  
ob_start();
	?>
	<?php
	 
	 //global $url;
	 
	$att= shortcode_atts( array(
        'icon_text' => 'icon_text',
        'icon_fontawesome' => 'icon_fontawesome'
    ), $atts );
	ob_start();
	 //$titles = vc_param_group_parse_atts( $atts['url'] );
	
	//echo $atts['icon_fontawesome'];
	$output .= '<span class="'.$atts['icon_fontawesome'].' aminity-ico text-center">';

		
	$output .= '</span>';
	$output .= '<span class="margin-left-10">'.$atts['icon_text'].'</span>';
return $output;
	$returnvariable = ob_get_clean();
 return $returnvariable;
	?>
	<?php
} 

add_shortcode( 'vc_hf_icon', 'vc_hotel_facilities');

vc_map( array(
    "name" => __("Hotel Facilities", "__x__"), // add a name
    "base" => "vc_hf_icon", // bind with our shortcode
	'icon'        => 'text-output',
    'description' => __( 'Place a Content Block in your content.', '__x__' ),
    "wrapper_class" => "clearfix",
    "category" => "SNHotels Addons",
    // Here starts the definition of array with parameters of our compnent  
	"params" => array(
         array(
             "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Icon Text", "my-text-domain" ),
            "param_name" => "icon_text",
            "value" => __( "", "my-text-domain" ),
            "description" => __( "Enter Your text.", "my-text-domain" )
         ),
		 array(
			'type' => 'dropdown',
			'heading' => __( 'Shape', 'js_composer' ),
			'param_name' => 'style',
			// due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Square', 'js_composer' ) => 'square',
				__( 'Rounded', 'js_composer' ) => 'rounded',
				__( 'Round', 'js_composer' ) => 'round',
			),
			'description' => __( 'Select message box shape.', 'js_composer' ),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => __( 'Icon library', 'js_composer' ),
			'value' => array(
				__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
				__( 'Open Iconic', 'js_composer' ) => 'openiconic',
				__( 'Typicons', 'js_composer' ) => 'typicons',
				__( 'Entypo', 'js_composer' ) => 'entypo',
				__( 'Linecons', 'js_composer' ) => 'linecons',
				__( 'Mono Social', 'js_composer' ) => 'monosocial',
			),
			'param_name' => 'icon_type',
			'description' => __( 'Select icon library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_fontawesome',
			'value' => 'fa fa-info-circle',
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'fontawesome',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_openiconic',
			'value' => 'vc-oi vc-oi-dial',
			'settings' => array(
				'emptyIcon' => false,
				'type' => 'openiconic',
				// default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'openiconic',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_typicons',
			'value' => 'typcn typcn-adjust-brightness',
			'settings' => array(
				'emptyIcon' => false,
				'type' => 'typicons',
				// default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'typicons',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_entypo',
			'value' => 'entypo-icon entypo-icon-note',
			'settings' => array(
				'emptyIcon' => false,
				'type' => 'entypo',
				// default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'entypo',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_linecons',
			'value' => 'vc_li vc_li-heart',
			'settings' => array(
				'emptyIcon' => false,
				'type' => 'linecons',
				// default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'linecons',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_monosocial',
			'value' => 'vc-mono vc-mono-fivehundredpx',
			'settings' => array(
				'emptyIcon' => false,
				'type' => 'monosocial',
				// default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'monosocial',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
) ));


/*---------------VC Templates For Sage---------------*/
/*-------------------------------------------------------------------------------
 Custom Template For Homepage
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc' ); // Hook in
 
function new_template_for_vc() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel HomePage', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" el_class="header_template"][vc_column][vc_banner_image][vc_menu][/vc_menu][vc_booking_form][vc_empty_space][/vc_column][/vc_row][vc_row][vc_column width="2/3"][vc_column_text][/vc_column_text][/vc_column][vc_column width="1/3"][vc_review][/vc_column][/vc_row][vc_row full_width="stretch_row" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" css=".vc_custom_1470206395550{padding-top: 0px !important;}"][vc_column][vc_custom_heading text="Explore all that we have to offer" font_container="tag:h2|text_align:center" use_theme_fonts="yes" css=".vc_custom_1469770079237{padding-top: 0px !important;padding-bottom: 20px !important;}"][vc_post_order post_homepage="post_type:snhotel_facility|by_id:1084,1083" post_count="3" post_id="1084,"][/vc_column][/vc_row][vc_row seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" css=".vc_custom_1469768205521{padding-top: 30px !important;}"][vc_column][vc_featured_offer][/vc_column][/vc_row][vc_row full_width="stretch_row" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" css=".vc_custom_1470204983543{background-color: #f3f3f3 !important;}"][vc_column][vc_custom_heading text="Hotel Facilities" font_container="tag:h3|text_align:center"][vc_row_inner][vc_column_inner width="1/6"][vc_hf_icon icon_text="Lounge" icon_fontawesome="fa fa-glass"][/vc_column_inner][vc_column_inner width="1/6"][vc_hf_icon icon_text="Fitness" icon_fontawesome="fa fa-beer"][/vc_column_inner][vc_column_inner width="1/6"][vc_hf_icon icon_text="Wifi" icon_fontawesome="fa fa-wifi"][/vc_column_inner][vc_column_inner width="1/6"][vc_hf_icon icon_text="Newspapers" icon_fontawesome="fa fa-newspaper-o"][/vc_column_inner][vc_column_inner width="1/6"][vc_hf_icon icon_text="Wheel Chair" style="square" icon_fontawesome="fa fa-wheelchair"][/vc_column_inner][vc_column_inner width="1/6"][vc_hf_icon icon_text="Fax Service" icon_fontawesome="fa fa-fax"][/vc_column_inner][/vc_row_inner][vc_empty_space][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}


/*-------------------------------------------------------------------------------
 Custom Template For Accommodation
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_accommodation' ); // Hook in
 
function new_template_for_vc_accommodation() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel Accommodation Overview', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" el_class="header_template"][vc_column][vc_banner_image][vc_menu][/vc_menu][vc_booking_form][vc_empty_space][/vc_column][/vc_row][vc_row][vc_column][vc_archive_accom][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}

/*-------------------------------------------------------------------------------
 Custom Template For Facility
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_facility' ); // Hook in
 
function new_template_for_vc_facility() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel Facility Overview', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" el_class="header_template"][vc_column][vc_banner_image][vc_menu][/vc_menu][vc_booking_form][vc_empty_space][/vc_column][/vc_row][vc_row][vc_column][vc_archive_facility][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}

/*-------------------------------------------------------------------------------
 Custom Template For Offer
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_offer' ); // Hook in
 
function new_template_for_vc_offer() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel Offers Overview', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" el_class="header_template"][vc_column][vc_banner_image][vc_menu][/vc_menu][vc_booking_form][vc_empty_space][/vc_column][/vc_row][vc_row][vc_column][vc_archive_offer archieve_offer="snhotel_offer" post_order="DESC"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}



/*-------------------------------------------------------------------------------
 Custom Template For Event
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_event' ); // Hook in
 
function new_template_for_vc_event() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel Events Overview', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" el_class="header_template"][vc_column][vc_banner_image][vc_menu][/vc_menu][vc_booking_form][vc_empty_space][/vc_column][/vc_row][vc_row][vc_column][vc_archive_event][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}

/*-------------------------------------------------------------------------------
 Custom Template For Destination
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_destination' ); // Hook in
 
function new_template_for_vc_destination() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel Destination Overview', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" el_class="header_template"][vc_column][vc_banner_image][vc_menu][/vc_menu][vc_booking_form][vc_empty_space][/vc_column][/vc_row][vc_row][vc_column][vc_gmap][/vc_gmap][/vc_column][/vc_row][vc_row][vc_column][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column][vc_archive_dest][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}


/*-------------------------------------------------------------------------------
 Custom Template For Blog
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_blog' ); // Hook in
 
function new_template_for_vc_blog() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel Blog Overview', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" el_class="header_template"][vc_column][vc_banner_image][vc_menu][/vc_menu][vc_booking_form][vc_empty_space][/vc_column][/vc_row][vc_row][vc_column][vc_archive_post archieve_post="post"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}


/*-------------------------------------------------------------------------------
 Custom Template For Header
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_header' ); // Hook in
 
function new_template_for_vc_header() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel Template for Header', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" el_class="header_template"][vc_column][vc_banner_image][vc_menu][/vc_menu][vc_booking_form][vc_empty_space][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}

/*-------------------------------------------------------------------------------
 Custom Template For Contact US
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_contact' ); // Hook in
 
function new_template_for_vc_contact() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel Contact Us', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" el_class="header_template"][vc_column][vc_banner_image][vc_menu][/vc_menu][vc_booking_form][vc_empty_space][/vc_column][/vc_row][vc_row][vc_column width="1/3"][vc_custom_heading text="Contact Us" use_theme_fonts="yes"][vc_contact_us][vc_column_text]Check In Time: 14:00
Check Out Time: 10:00
Central Reservations
1800 303 186 (Within Australia)
0800 480 274 (Within New Zealand)[/vc_column_text][/vc_column][vc_column width="2/3"][ninja_forms_display_form id="5"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}

/*--------------VC ELEMENT FOR LATEST FEATURED OFFER/EVENT ---------------*/

vc_map( array(
        "name"      => __( "Latest Featured Offer/Event", "__x__" ),
        "base"      => "vc_featured_offer_event",
		
        'icon'        => 'text-output',
        'description' => __( 'Place a Content Block in your content.', '__x__' ),
        "wrapper_class" => "clearfix",
        "category" => "SNHotels Addons",
		'params' => array(
            array(
                'type' => 'textfield',
                'value' => '',
                'heading' => 'City Name',
                'param_name' => 'city_name',
            ), 
        ),
        
    ) );
	
	
	// SNH Offer/ Events widget
// =============================================================================
 
function x_featured_offer_event( $atts ) {
	ob_start();
	$a = shortcode_atts( array(
        'city_name' => 'city_name',
        
    ), $atts );
 $city_name  = $a['city_name'];
 include (locate_template('templates/content-offers_events_widget.php'));
 $returnvariable = ob_get_clean();
 return $returnvariable;
}
 
add_shortcode( 'vc_featured_offer_event', 'x_featured_offer_event' );

/*---------------VC ELEMENT FOR Further Available Offers------------------------*/
vc_map( array(
        "name"      => __( "Further Offers/Events", "__x__" ),
        "base"      => "vc_further_available_offer",  
        'icon'        => 'text-output',
        'description' => __( 'Place a Content Block in your content.', '__x__' ),
        "wrapper_class" => "clearfix",
        "category" => "SNHotels Addons",
		'params' => array(
				
				array(
                'type' => 'loop',
                'value' => '',
                'heading' => 'Query for Taxonomy',
                'param_name' => 'taxonomy_loop',
            ),
			))); 
// SNH Archive Offer
function x_shortcode_further_available_offer( $atts ) {
	ob_start();
 extract( shortcode_atts( array(
        'taxonomy_loop' => 'taxonomy_loop',
        
    ), $atts));

 $query=$taxonomy_loop;
 $query=explode('|',$query);
 foreach($query as $query_part)
	{
		$q_part=explode(':',$query_part);
		switch($q_part[0])
		{
			case 'post_type':
				$query_post_type=explode(',',$q_part[1]);
			break;
			
			case 'size':
				$query_posts_per_page=($q_part[1]=='All' ? -1:$q_part[1]);
			break;
			
			case 'order_by':
				
				$query_meta_key='';
				$query_orderby='';
				
				$public_orders_array=array('ID','date','author','title','modified','rand','comment_count','menu_order');
				if(in_array($q_part[1],$public_orders_array))
				{
					$query_orderby=$q_part[1];
				}else
				{
					$query_meta_key=$q_part[1];
					$query_orderby='meta_value_num';
				}
				
			break;
			
			case 'order':
				$query_order=$q_part[1];
			break;
			
			case 'by_id':
				$query_by_id=explode(',',$q_part[1]);
				$query_by_id_not_in=array();
				$query_by_id_in=array();
				foreach($query_by_id as $ids)
				{
					if($ids<0)
					{
						$query_by_id_not_in[]=$ids;
					}else{
						$query_by_id_in[]=$ids;
					}
				}
			break;
			
			case 'categories':
				$query_categories=explode(',',$q_part[1]);
				$query_cat_not_in=array();
				$query_cat_in=array();
				foreach($query_categories as $cat)
				{
					if($cat<0)
					{
						$query_cat_not_in[]=$cat;
					}else
					{
						$query_cat_in[]=$cat;
					}
				}
			break;
			
			case 'tags':
				$query_tags=explode(',',$q_part[1]);
				$query_tags_not_in=array();
				$query_tags_in=array();
				foreach($query_tags as $tags)
				{
					if($tags<0)
					{
						$query_tags_not_in[]=$tags;
					}else
					{
						$query_tags_in[]=$tags;
					}
				}
			break;
			
			case 'authors':
				$query_author=explode(',',$q_part[1]);
				$query_author_not_in=array();
				$query_author_in=array();
				foreach($query_author as $author)
				{
					if($tags<0)
					{
						$query_author_not_in[]=$author;
					}else
					{
						$query_author_in[]=$author;
					}
				}
				
			break;

			case 'tax_query':
				$all_tax=get_object_taxonomies( $query_post_type );

				$tax_query=array();
				$query_tax_query=array('relation' => 'AND');
				foreach ( $all_tax as $tax ) {
					$values=$tax;
					$query_taxs_in=array();
					$query_taxs_not_in=array();
					
					$query_taxs=explode(',',$q_part[1]);
					foreach($query_taxs as $taxs)
					{
						if(term_exists( absint($taxs), $tax )){
							if($taxs<0)
							{
								$query_taxs_not_in[]=absint($taxs);
							}else
							{
								$query_taxs_in[]=$taxs;
							}
						}
					}

					if(count($query_taxs_not_in)>0)
					{
						$query_tax_query[]=array(
							'taxonomy' => $tax,
							'field'    => 'id',
							'terms'    => $query_taxs_not_in,
							'operator' => 'NOT IN',
						);
					}else if(count($query_taxs_in)>0)
					{
						$query_tax_query[]=array(
							'taxonomy' => $tax,
							'field'    => 'id',
							'terms'    => $query_taxs_in,
							'operator' => 'IN',
						);
					}
					
					//break;
				}
				
			break;
		}
	}

 
 $q = new WP_Query( array(
  'orderby'          => $query_orderby,
  'post_type'        => $query_post_type,
  'posts_per_page'   => $query_posts_per_page,
  'tax_query' => $query_tax_query,  
    ));
 if($query_post_type[0] == 'snhotel_offer')
 {
	include (locate_template('templates/vc-content-further_available_offers.php')); 
 }
 if($query_post_type[0] == 'snhotel_event')
 {
	include (locate_template('templates/vc-content-events_meetings.php')); 
 }
//get_template_part('archive-snhotel_offer');
?>
  <div class="clear"></div>
  <div class="container">
	<div class="next-previous"><?php post_pagination();?></div>
  </div>
<?php
 wp_reset_postdata();
 $returnvariable = ob_get_clean();
 return $returnvariable;
} 
add_shortcode( 'vc_further_available_offer', 'x_shortcode_further_available_offer' );

/*--------------------VC Element for Page List and Linked Page List------------------*/
vc_map(
    array(
        'base' => 'vc_page_list',
		'name' => __( 'Page List', 'js_composer' ),
		'class' => '',
		'icon' => 'icon-heart',
		"category" => "SNHotels Addons",
        'params' => array(
           // params group
            array(
                'type' => 'param_group',
                'value' => '',
                'param_name' => 'titles',
                // Note params is mapped inside param-group:
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'value' => '',
                        'heading' => 'Title',
                        'param_name' => 'title',
						'admin_label' => true,
                    ),
					array(
                        'type' => 'textfield',
                        'value' => '',
                        'heading' => 'Excerpt',
                        'param_name' => 'excerpt',
                    ),
					array(
                        'type' => 'vc_link',
                        'value' => '',
                        'heading' => 'URL (Link)',
                        'param_name' => 'link',
						'description' => 'Add link to custom heading.',
                    ),
                )
            )
        )
    )
);
function x_shortcode_page_list( $atts ) {
	ob_start();
	$titles = vc_param_group_parse_atts( $atts['titles'] );
				$output='<div class="abt_facilities bullet"><ul>';
				foreach ($titles as $value) {
					$output.='<li>';
					$output.='<h5>'.$value['title']."</h5>";
					$output.='<p class="text-justify">'.$value['excerpt']."</p>";
					$link=explode('|', $value['link']);					
					$url=explode(':',$link[0]);
					$url_text=explode(':',$link[1]);	
					
					$output.='<div><a href="'.urldecode($url[1]).'"  class="aboutLink">'.urldecode($url_text[1]).'</a></div></li>';
				}
				$output.='</ul></div>';
return $output;
 $returnvariable = ob_get_clean();
 return $returnvariable;
} 
add_shortcode( 'vc_page_list', 'x_shortcode_page_list' );


/*---------------VC Templates For Next Theme---------------*/
/*-------------------------------------------------------------------------------
 Custom Template For Next Homepage
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_parent' ); // Hook in
 
function new_template_for_vc_parent() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel 2 HomePage', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0"][vc_column][vc_gallery interval="3" img_size="full" css=".vc_custom_1471587532205{margin-bottom: 0px !important;}"][vc_booking_form][/vc_column][/vc_row][vc_row][vc_column width="2/3"][vc_custom_heading text="Welcome to NEXT Hotel Brisbane" font_container="tag:h1|text_align:left" el_class="pageheader"][vc_row_inner][vc_column_inner width="1/2"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/3"][vc_custom_heading text="GUEST REVIEWS" font_container="tag:h1|text_align:center" el_class="pageheader"][vc_review][/vc_column][/vc_row][vc_row][vc_column][vc_separator color="white" border_width="10"][/vc_column][/vc_row][vc_row full_width="stretch_row" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" el_id="features-wrapper"][vc_column css=".vc_custom_1470913967347{padding-right: 0px !important;padding-left: 0px !important;}"][vc_custom_heading text="DISCOVER OUR HOTEL IN BRISBANE" font_container="tag:h2|text_align:center" el_class="pageheader"][vc_post_order post_homepage="post_type:snhotel_facility|by_id:5643,1130,1083"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0"][vc_column][vc_gmap url="https://www.thebookingbutton.com.au/silverneedlehotels/properties" map_image="7755" marker_icon="9142"][/vc_gmap][/vc_column][/vc_row][vc_row seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" css=".vc_custom_1471338763387{border-bottom-width: 20px !important;}"][vc_column][vc_custom_heading text="RIGHT NOW IN BRISBANE" font_container="tag:h2|text_align:center" el_class="pageheader"][/vc_column][/vc_row][vc_row seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" css=".vc_custom_1471348352700{background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}"][vc_column width="1/2" css=".vc_custom_1471347481145{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][ess_grid alias="social"][/vc_column][vc_column width="1/2"][ess_grid alias="social instagram"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0"][vc_column][vc_featured_offer_event city_name="BRISBANE"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}


/*-------------------------------------------------------------------------------
 Custom Template For Next Accommodation
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_accommodation_parent' ); // Hook in
 
function new_template_for_vc_accommodation_parent() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel 2 Accommodation Overview', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0"][vc_column][vc_gallery interval="3" img_size="full" css=".vc_custom_1471587667026{border-bottom-width: 0px !important;}"][/vc_column][/vc_row][vc_row][vc_column][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column][vc_custom_heading text="OUR ROOMS AND SUITES" font_container="tag:h2|text_align:center" el_class="pageheader"][/vc_column][/vc_row][vc_row][vc_column][vc_archive_accom taxonomy_loop="size:All|post_type:snhotel_room|tax_query:8"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}

/*-------------------------------------------------------------------------------
 Custom Template For Next Facility
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_facility_parent' ); // Hook in
 
function new_template_for_vc_facility_parent() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel 2 Facility Overview', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0"][vc_column][vc_gallery interval="3" img_size="full" css=".vc_custom_1471587667026{border-bottom-width: 0px !important;}"][/vc_column][/vc_row][vc_row][vc_column][vc_archive_facility taxonomy_loop="post_type:snhotel_facility" post_count=""][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}

/*-------------------------------------------------------------------------------
 Custom Template For Next Offer
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_offer_parent' ); // Hook in
 
function new_template_for_vc_offer_parent() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel 2 Offers Overview', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" css=".vc_custom_1470977567905{border-bottom-width: 0px !important;}"][vc_column][vc_gallery interval="3" img_size="full"][/vc_column][/vc_row][vc_row][vc_column][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column][vc_archive_offer taxonomy_loop="size:1|post_type:snhotel_offer|tax_query:51"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" el_id="offer"][vc_column][vc_custom_heading text="FURTHER AVAILABLE OFFERS" font_container="tag:h2|text_align:center" el_class="pageheader"][vc_further_available_offer taxonomy_loop="post_type:snhotel_offer"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}



/*-------------------------------------------------------------------------------
 Custom Template For Next Event
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_event_parent' ); // Hook in
 
function new_template_for_vc_event_parent() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel 2 Events Overview', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" css=".vc_custom_1470977567905{border-bottom-width: 0px !important;}"][vc_column][vc_gallery interval="3" img_size="full"][/vc_column][/vc_row][vc_row][vc_column][vc_archive_event taxonomy_loop="post_type:snhotel_event"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}

/*-------------------------------------------------------------------------------
 Custom Template For Next Destination
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_destination_parent' ); // Hook in
 
function new_template_for_vc_destination_parent() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel 2 Destination Overview', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0"][vc_column][vc_gmap url="https://www.thebookingbutton.com.au/silverneedlehotels/properties" map_image="7755" marker_icon="9142"][/vc_gmap][/vc_column][/vc_row][vc_row full_width="stretch_row" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" el_id="features-wrapper"][vc_column css=".vc_custom_1470913967347{padding-right: 0px !important;padding-left: 0px !important;}"][vc_custom_heading text="THE WATS OF LUANG PRBANG" font_container="tag:h2|text_align:center" el_class="pageheader"][vc_archive_dest][/vc_column][/vc_row][vc_row seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" css=".vc_custom_1471348352700{background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}"][vc_column width="1/2" css=".vc_custom_1471347481145{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][ess_grid alias="social"][/vc_column][vc_column width="1/2"][ess_grid alias="social instagram"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}


/*-------------------------------------------------------------------------------
 Custom Template For Next Blog
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_blog_parent' ); // Hook in
 
function new_template_for_vc_blog_parent() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel 2 Blog Overview', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row][vc_column][vc_archive_post][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}


/*-------------------------------------------------------------------------------
 Custom Template For Next Header
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_header_parent' ); // Hook in
 
function new_template_for_vc_header_parent() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel 2 Template for Header', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0"][vc_column][vc_gallery interval="3" img_size="full" css=".vc_custom_1471587532205{margin-bottom: 0px !important;}"][vc_booking_form][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
/*-------------------------------------------------------------------------------
 Custom Template For Next Contact Us
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_contact_parent' ); // Hook in
 
function new_template_for_vc_contact_parent() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Hotel 2 Contact Us', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0"][vc_column][vc_gmap url="http://snc.staging.snhotels.com/next/" map_image="7868" marker_icon="9142"][/vc_gmap][/vc_column][/vc_row][vc_row][vc_column width="1/3"][vc_contact_us][vc_custom_heading text="RESERVATIONS" font_container="tag:h3|text_align:left" el_class="line-heading"][vc_separator][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][vc_custom_heading text="DIRECTION" font_container="tag:h3|text_align:left" el_class="line-heading"][vc_separator][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][vc_column width="2/3"][ninja_forms_display_form id="5"][/vc_column][/vc_row][vc_row full_width="stretch_row" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" el_id="offer"][vc_column][vc_custom_heading text="LATEST OFFERS" font_container="tag:h2|text_align:center" el_class="pageheader"][vc_latest_offer latest_offer_loop="post_type:snhotel_offer"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
/*-------------------------------------------------------------------------------
 Custom Template For Kiridara Home page
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_home_kiridara' ); // Hook in
 
function new_template_for_vc_home_kiridara() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Kiridara homepage', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1472114980433{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column css=".vc_custom_1472114958166{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-left: 0px !important;}"][vc_column_text css=".vc_custom_1472115191001{margin-top: 0px !important;margin-bottom: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"]

[the_grid name="homepage-mobile"]
[/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces"][vc_column][vc_booking_form][/vc_column][/vc_row][vc_row][vc_column width="2/3"][vc_custom_heading text="SPECTACULAR VIEWS, SERENE SERVICE" font_container="tag:h1|text_align:left" el_class="pageheader"][vc_column_text]“While most hotels in heritage Luang Prabang don’t have many facilities, this one is built around its sunny swimming pool and courtyard.” (Oyster.com Hotel Tell-All)[/vc_column_text][vc_row_inner][vc_column_inner width="1/2"][vc_column_text]Situated in the north of Central Lao PDR, where the Nam Khan River meets the Mekong River, Luang Prabang is notable as a UNESCO World Heritage Site and well-known for its ancient Buddhist temples and monasteries. Kiridara offers a vast selection of cultural experiences and activities including night and morning markets, temples and alms giving.[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text]The charming hotel is scaled on a hillside and surrounded by native teak forests, offering panoramic views of Mount Phou Si, with easy access to Historic Luang Prabang City Center and the International Airport.[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/3"][vc_custom_heading text="WHY YOU’LL LIKE US:" font_container="tag:h2|text_align:center" el_class="pageheader"][vc_review][/vc_column][/vc_row][vc_row][vc_column][vc_separator color="white" border_width="10"][/vc_column][/vc_row][vc_row full_width="stretch_row" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" el_id="features-wrapper"][vc_column css=".vc_custom_1470913967347{padding-right: 0px !important;padding-left: 0px !important;}"][vc_custom_heading text="DISCOVER OUR BOUTIQUE HOTEL" font_container="tag:h2|text_align:center" el_class="pageheader"][vc_post_order post_homepage="post_type:snhotel_facility|by_id:1083,1084,984"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0"][vc_column][vc_gmap url="https://www.thebookingbutton.com.au/silverneedlehotels/properties" map_image="1030" marker_icon="6917"][/vc_gmap][/vc_column][/vc_row][vc_row seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" css=".vc_custom_1471338763387{border-bottom-width: 20px !important;}"][vc_column][vc_custom_heading text="RIGHT NOW IN BRISBANE" font_container="tag:h2|text_align:center" el_class="pageheader"][/vc_column][/vc_row][vc_row seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0" css=".vc_custom_1471348352700{background-position: center !important;background-repeat: no-repeat !important;background-size: contain !important;}"][vc_column width="1/2" css=".vc_custom_1471347481145{background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column_text][ess_grid alias="social"][/vc_column_text][/vc_column][vc_column width="1/2"][vc_column_text][ess_grid alias="social instagram"][/vc_column_text][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" seperator_indeed_locker="" lk_t="ism_template_1" lk_io="default" lk_dm="0" lk_thm="0" lk_tuo="0" ru_on="0" uhc_on="0" ur_on="0" ref_on="0"][vc_column][vc_featured_offer_event city_name="BRISBANE"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}

/*-------------------------------------------------------------------------------
 Custom Template For Kiridara Accommodation
-------------------------------------------------------------------------------*/

add_action( 'vc_load_default_templates_action','new_template_for_vc_accommodation_kiridara' ); // Hook in
 
function new_template_for_vc_accommodation_kiridara() {
    $data               = array(); // Create new array
    $data['name']       = __( 'Kiridara Accommodation Overview', 'my-text-domain' ); // Assign name for your custom template
    $data['weight']     = 0; // Weight of your template in the template list
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( 'images/custom_template_thumbnail.jpg', __FILE__ ) ); // Always use preg replace to be sure that "space" will not break logic. Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
    $data['content']    = <<<CONTENT
        [vc_row full_width="stretch_row_content_no_spaces"][vc_column][vc_banner_image][/vc_column][/vc_row][vc_row css=".vc_custom_1468588668776{margin-top: 30px !important;}"][vc_column width="1/3"][vc_column_text]Set amidst the awe-inspiring backdrop of Mount Phou Si and sweet-scented Champa trees, the spacious rooms at Kiridara feature balconies, external terraces and courtyards that let you soak up the stunning natural atmosphere.[/vc_column_text][/vc_column][vc_column width="1/3"][vc_column_text]I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.[/vc_column_text][/vc_column][vc_column width="1/3"][vc_widget_sidebar sidebar_id="accomodation-archive"][/vc_column][/vc_row][vc_row css=".vc_custom_1468586158018{margin-top: 30px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column][vc_archive_accom taxonomy_loop="post_type:snhotel_room"][/vc_column][/vc_row][vc_row][vc_column][vc_custom_heading text="Related Offers" font_container="tag:h2|text_align:center" el_class="pageheader"][vc_related_offer][/vc_related_offer][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}

//New VC Element for Banner with button

vc_map( array(
        "name"      => __( "Banner Image with Button Element", "__x__" ),
        "base"      => "vc_banner_btn",
        'icon'        => 'text-output',
        "wrapper_class" => "clearfix",
        "category" => "SNHotels Addons",
    ) );


 // SNH Banner Button Lowest Rate

 function x_banner_button( $atts, $content ) {
  ob_start();
  if (has_post_thumbnail($post->ID)) {
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
                                    $thumb_img = get_post(get_post_thumbnail_id($post->ID));
                                    $imagePath = $image[0];
                                }
   $output  = '<div class="bannerText">';
   $output .= '<div id="page-header" style="background-image: url('. wpthumb( $imagePath, 'width=1500&height=450&crop=1&resize=1' ).')">';
   $output .= '<div class="container">';

   $output .= '<div class="container pageheader">';
  $output .=  '<h1>'. get_the_title().'</h1>';
  $output .= '<div class="text-separator"></div>';
  $output .= '<h4>';
  if ( is_plugin_active( 'secondary-title/secondary-title.php' ) ) {
	//plugin is activated
	 $output .=  get_secondary_title();
	}
	 $output .='</h4>';
    $output .= '</div>';
  
     $settings = get_option("lowestroomavailable");
     $var1 = unserialize($settings);
     //print_r($var1);
     //$amt = $var1->amount;
	 if($var1->amount != 0)
	 {
    $output .= '<a class="btn-danger bannerbtn pull-right">Need a room tonight? Book for '. edd_currency_filter( edd_format_amount( $var1->amount ) ).'</a>';
     }
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
  
  
   return $output;
   $returnvariable = ob_get_clean();
   return $returnvariable;
  }
  
  add_shortcode( 'vc_banner_btn', 'x_banner_button' );
?>