<?php
/*
Plugin Name: Custom Store Locator Addon Plugin
Description: Custom changes for the WP Store Locator Plugin specific Flirty Girl Lash Studios
Version: 0.1
Author: Marketing In Color
Author URI: http://marketingincolor.com
*/


//add_filter( 'wpsl_include_post_content', '__return_true' );
// Add POST CONTENT to the JSON data snown on MAP

// Get the CATEGORIES assigned to a single Store Location as an Array
add_filter( 'wpsl_store_meta', 'custom_store_meta', 10, 2 );
function custom_store_meta( $store_meta, $store_id ) {
    $terms = wp_get_post_terms( $store_id, 'wpsl_store_category' );
    $store_meta['terms'] = '';
    if ( $terms ) {
        if ( !is_wp_error( $terms ) ) {
            if ( count( $terms ) > 1 ) {
                $location_terms = array();

                foreach ( $terms as $term ) {
                    $location_terms[] = $term->name;
                }

                $store_meta['terms'] = implode( ', ', $location_terms );
            } else {
                $store_meta['terms'] = $terms[0]->name;    
            }
        }
    }
    return $store_meta;
}

// Add additional META information to each store location for Booker Appointment URL
add_filter( 'wpsl_meta_box_fields', 'custom_meta_box_fields' );
function custom_meta_box_fields( $meta_fields ) {
    $meta_fields[__( 'Additional Information', 'wpsl' )] = array(
        'phone' => array(
            'label' => __( 'Tel', 'wpsl' )
        ),
        'fax' => array(
            'label' => __( 'Fax', 'wpsl' )
        ),
        'email' => array(
            'label' => __( 'Email', 'wpsl' )
        ),
        'url' => array(
            'label' => __( 'Url', 'wpsl' )
        ),
        'appointment_url' => array(
            'label' => __( 'Appointment', 'wpsl' )
        )
    );
    return $meta_fields;
}

// indclude data from appointment_url in JSON response
add_filter( 'wpsl_frontend_meta_fields', 'custom_frontend_meta_fields' );
function custom_frontend_meta_fields( $store_fields ) {
    $store_fields['wpsl_appointment_url'] = array( 
        'name' => 'appointment_url',
        'type' => 'url'
    );
    return $store_fields;
}




// Use Custom Template for Locations Page
add_filter( 'wpsl_templates', 'custom_templates', 10 );
function custom_templates( $templates ) {
    /**
     * The 'id' is for internal use and must be unique ( since 2.0 ).
     * The 'name' is used in the template dropdown on the settings page.
     * The 'path' points to the location of the custom template,
     * in this case the folder of your active theme.
     */
    $templates[] = array (
        'id'   => 'custom',
        'name' => 'Custom Locations Template',
        'path' => get_stylesheet_directory() . '/' . 'wpsl-templates/custom.php',
    );

    return $templates;
}


// Apply Custom output to NO RESULTS
add_filter( 'wpsl_no_results', 'custom_no_results' );
function custom_no_results() {
    /**
     * Optionally, instead of the output below, an ACF WYSIWYG component could
     * be substituted to further customize the data.
     */
    $output = '<h2>No Salon in your Area!</h2>';
    $output .= '<p>Sorry, but there is no Flirty Girl Salon near you YET!</p><p>Please contact us at <a href="tel:123456">+123456</a> or <a href="mailto:support@mydomain.com">support@mydomain.com</a>.</p>';
    $output .= '<img src="http://satyr.io/512x128/f0f?text=Sample+CTA" alt="demo cta banner"/>';
    
    return $output;
}


// Apply Custom output to LISTING
add_filter( 'wpsl_listing_template', 'custom_listing_template' );
add_filter( 'wpsl_info_window_template', 'custom_listing_template' );
function custom_listing_template() {

    global $wpsl, $wpsl_settings;
    $listing_template = '<li class="custom-locator cell" data-store-id="<%= id %>">' . "\r\n";
    $listing_template .= "\t\t" . '<div class="wpsl-store-location">' . "\r\n";
    $listing_template .= "\t\t\t" . '<p><%= thumb %>' . "\r\n";
    $listing_template .= "\t\t\t\t" . wpsl_store_header_template( 'listing' ) . "\r\n"; // Check which header format we use
    $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><%= address %></span>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<% if ( address2 ) { %>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><%= address2 %></span>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<span>' . wpsl_address_format_placeholders() . '</span>' . "\r\n"; // Use the correct address format

    if ( !$wpsl_settings['hide_country'] ) {
        $listing_template .= "\t\t\t\t" . '<span class="wpsl-country"><%= country %></span>' . "\r\n";
    }

    // Check if the 'appointment_url' contains data before including it.
    $listing_template .= "\t\t\t" . '<% if ( appointment_url ) { %>' . "\r\n";
    $listing_template .= "\t\t\t" . '<p><a href="<%= appointment_url %>">' . __( 'BOOK NOW!', 'wpsl' ) . '</a></p>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";

    $listing_template .= "\t\t\t" . '</p>' . "\r\n";
    
     /**
     * Include the data from a custom field called 'my_textinput'.
     * 
     * Before you can access the 'my_textinput' data in the template, 
     * you first need to make sure the data is included in the JSON output.
     * 
     * You can make the data accessible through the wpsl_frontend_meta_fields filter.
     */
    //$listing_template .= "\t\t\t" . '<% if ( my_textinput ) { %>' . "\r\n";
    //$listing_template .= "\t\t\t" . '<p><%= my_textinput %></p>' . "\r\n";
    //$listing_template .= "\t\t\t" . '<% } %>' . "\r\n";


    $listing_template .= "\t\t\t" . '<% if ( terms ) { %>' . "\r\n";
    $listing_template .= "\t\t\t" . '<p>' . __( 'Categories:', 'wpsl' ) . ' <%= terms %></p>' . "\r\n";
    $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";


    // Show the phone, fax or email data if they exist.
    if ( $wpsl_settings['show_contact_details'] ) {
        $listing_template .= "\t\t\t" . '<p class="wpsl-contact-details">' . "\r\n";
        $listing_template .= "\t\t\t" . '<% if ( phone ) { %>' . "\r\n";
        $listing_template .= "\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'phone_label', __( 'Phone', 'wpsl' ) ) ) . '</strong>: <%= formatPhoneNumber( phone ) %></span>' . "\r\n";
        $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
        $listing_template .= "\t\t\t" . '<% if ( fax ) { %>' . "\r\n";
        $listing_template .= "\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'fax_label', __( 'Fax', 'wpsl' ) ) ) . '</strong>: <%= fax %></span>' . "\r\n";
        $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
        $listing_template .= "\t\t\t" . '<% if ( email ) { %>' . "\r\n";
        $listing_template .= "\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'email_label', __( 'Email', 'wpsl' ) ) ) . '</strong>: <%= email %></span>' . "\r\n";
        $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
        $listing_template .= "\t\t\t" . '</p>' . "\r\n";
    }

    $listing_template .= "\t\t\t" . wpsl_more_info_template() . "\r\n"; // Check if we need to show the 'More Info' link and info
    $listing_template .= "\t\t" . '</div>' . "\r\n";
    $listing_template .= "\t\t" . '<div class="wpsl-direction-wrap">' . "\r\n";

    if ( !$wpsl_settings['hide_distance'] ) {
        $listing_template .= "\t\t\t" . '<%= distance %> ' . esc_html( $wpsl_settings['distance_unit'] ) . '' . "\r\n";
    }

    $listing_template .= "\t\t\t" . '<%= createDirectionUrl() %>' . "\r\n"; 
    $listing_template .= "\t\t" . '</div>' . "\r\n";
    $listing_template .= "\t" . '</li>';

    return $listing_template;
}


