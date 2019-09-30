<?php
/*
Plugin Name: Custom Store Locator Addon Plugin
Description: Custom changes for the WP Store Locator Plugin specific Flirty Girl Lash Studios
Version: 0.1
Author: Marketing In Color
Author URI: http://marketingincolor.com
*/

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
    
    $output = '<h2>No Salon in your Area!</h2>';
    $output .= '<p>Sorry, but there is no Flirty Girl Salon near you YET!</p><p>Please contact us at <a href="tel:123456">+123456</a> or <a href="mailto:support@mydomain.com">support@mydomain.com</a>.</p>';
    $output .= '<img src="http://satyr.io/512x128/f0f?text=Sample+CTA" alt="demo cta banner"/>';
    
    return $output;
}



//add_filter( 'wpsl_include_post_content', '__return_true' );

// Apply Custom output to LISTING
add_filter( 'wpsl_listing_template', 'custom_listing_template' );

function custom_listing_template() {

    global $wpsl, $wpsl_settings;
    
    $listing_template = '<li data-store-id="<%= id %>">' . "\r\n";
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


