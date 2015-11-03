<?php
/**
 * Get template part implementation for Snhotel
 *
 * Looks at the theme directory first
 */
function snhotel_get_template_part( $slug, $name = '' ) {
    global $snhotel;

    $templates = array();
    $name = (string) $name;

    // lookup at theme/slug-name.php or snhotel/slug-name.php
    if ( '' !== $name ) {
        $templates[] = "{$slug}-{$name}.php";
        $templates[] = $snhotel->theme_dir_path . "{$slug}-{$name}.php";
    }

    $template = locate_template( $templates );

    // fallback to plugin default template
    if ( !$template && $name && file_exists( $snhotel->template_path() . "{$slug}-{$name}.php" ) ) {
        $template = $snhotel->template_path() . "{$slug}-{$name}.php";
    }

    // if not yet found, lookup in slug.php only
    if ( !$template ) {
        $templates = array(
            "{$slug}.php",
            $snhotel->theme_dir_path . "{$slug}.php"
        );

        $template = locate_template( $templates );
    }

    if ( $template ) {
        load_template( $template, false );
    }
}

function snhotel_get_template( $template_name, $args = array() ) {
    global $snhotel;

    if ( $args && is_array($args) ) {
        extract( $args );
    }

    $template = locate_template( array(
        $snhotel->theme_dir_path . $template_name,
        $template_name
    ) );

    if ( ! $template ) {
        $template = $snhotel->template_path() . $template_name;
    }

    if ( file_exists( $template ) ) {
        include $template;
    }
}

/**
 * Display a multi meta field
 *
 * @param string $meta_key
 * @param int $post_id
 */
function snhotel_display_multi_meta( $meta_key, $post_id, $title = '', $item_prop = '' ) {
    $array = get_post_meta( $post_id, $meta_key );

    if ( count( $array ) > 0 && $array[0] != '' ) {
        if ( $array ) {

            if ( !empty( $title ) ) {
                echo $title;
            }

            if ( !empty( $item_prop ) ) {
                printf( '<ul itemprop="%s">', $item_prop );
            } else {
                echo '<ul>';
            }

            foreach ($array as $item) {
                printf( '<li>%s</li>', $item );
            }
            echo '</ul>';
        }
    }
}

function snhotel_date_iso( $timestamp ) {
    $datetime = date_i18n( 'c', $timestamp, true );

    return $datetime;
}

/**
 * Prints a single taxonomy links from a post
 *
 * @param type $taxonomy
 */
function snhotel_print_tax_link( $taxonomy ) {
    global $post;

    $cat = get_the_term_list( $post->ID, $taxonomy, '', ', ', '' );
    if ( $cat && !is_wp_error( $cat ) ) {
        echo $cat;
    }
}