<?php

// create curl resource
/*$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, "http://graph.facebook.com/me");

// set headers
$headers = array(
    'Content-Type: application/x-www-form-urlencoded',
    'Ocp-Apim-Subscription-Key: fe2de837b6624c91a93e36350743e223',
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);

print_r($output);
// close curl resource to free up system resources
curl_close($ch);    */

///////////////////////////////////////

// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
/*$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api-staging.booker.com/v5/auth/connect/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials&client_id=wjfobeqQUIsQ&client_secret=7HcPPOhErNE1&scope=customer");
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Ocp-Apim-Subscription-Key: fe2de837b6624c91a93e36350743e223';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
print_r($result); //THIS WORKS! But only on an HTTPS connection!
curl_close($ch);*/