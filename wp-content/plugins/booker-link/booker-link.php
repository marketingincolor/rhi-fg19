<?php
/*
Plugin Name: Booker.com Link
Plugin URI: http://zeepress.com/plugins/bookerlink
Description: Provides a link to Booker.com Salon Management.
Version: 0.1
Author: Marketing In Color
Author URI: http://marketingincolor.com
Text Domain: booker-link
Domain Path: /lang/
*/

if(!class_exists('Wp_Booker_Link'))
{
    // Create Class
    class Wp_Booker_Link {

        // Constructor
        public function __construct() {
            add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        }

        // Styles and Scripts
        public function enqueue_scripts() {
            // Styles
            wp_enqueue_style('wp_booker_link', plugins_url('assets/css/style.css', __FILE__), null, '');

            // Scripts
            wp_enqueue_script('wp_booker_link', plugins_url('assets/js/script.js', __FILE__), array('jquery'), '', true);
        }

    } // END class Wp_Booker_link
} // END if(!class_exists('Wp_Booker_link'))

// Add a Global variable if you need to use outside of instantiated scope
Global $wp_booker_link;

if(class_exists('Wp_Booker_Link'))
{
    // Instantiate
    $wp_booker_link = new Wp_Booker_Link();
}




















/**
 * AUTHENTICATION API 
 * Requires SSL by default, so VERIFYHOST and VERFIYPEER Curl Options are set to FALSE when handle (ch) is created
 */
$subscription_key = 'fe2de837b6624c91a93e36350743e223'; // PRIMARY Key from Booker API
$scope = 'customer';
$test_client_id = 'wjfobeqQUIsQ'; //code will vary by LOCATION as each has seperate API
$test_client_secret = '7HcPPOhErNE1'; //code will vary by LOCATION as each has seperate API
$client_id = $test_client_id;
$client_secret = $test_client_secret;


$location_api_url = 'http://url-for-api'; // something like https://api-staging.booker.com/v4.1/customer/
$location_key = '12345678keyforlocation';


function createBookerToken() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api-staging.booker.com/v5/auth/connect/token');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials&client_id=wjfobeqQUIsQ&client_secret=7HcPPOhErNE1&scope=customer");

    if ($_SERVER['SERVER_NAME'] == 'localhost') {
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    }

    curl_setopt($ch, CURLOPT_POST, 1);
    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    $headers[] = 'Ocp-Apim-Subscription-Key: fe2de837b6624c91a93e36350743e223';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    } 
    curl_close($ch);
    return $result;
}

// $api_url = $api_root.'/'.$api_key.'/radius.json/'.$zip_code.'/'.$zip_radius.'/miles?minimal';

// $curl = curl_init($api_url);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// $curl_response = curl_exec($curl);
// if ($curl_response === false) {
// $info = curl_getinfo($curl);
// curl_close($curl);
// die('error occured during curl exec. Additional info: ' . var_export($info));
// }

// // This will return an array of zip codes in the specified radius
// header('Content-Type: application/json');
// header("Location: /");
// echo $curl_response;







/*        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "http://graph.facebook.com/me");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        print_r($output);
        // close curl resource to free up system resources
        curl_close($ch);    


        // create curl resource
        $ch = curl_init();
        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://api.genderize.io/?name=Baron");
        // $output contains the output json
        $output = curl_exec($ch);
        // close curl resource to free up system resources 
        curl_close($ch);
        // {"name":"Baron","gender":"male","probability":0.88,"count":26}
        var_dump(json_decode($output, true)); */
