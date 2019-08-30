<?php
//
// ORGINAL CODES AND KEYS STORED COMMENTED BELOW
//
//$OASKey = 'fe2de837b6624c91a93e36350743e223';
//$grantstring = "grant_type=client_credentials&client_id=wjfobeqQUIsQ&client_secret=7HcPPOhErNE1&scope=customer";

$client_id = 'wjfobeqQUIsQ';
$client_secret = '7HcPPOhErNE1';

function createBookerToken($cid, $csecret) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api-staging.booker.com/v5/auth/connect/token');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, sprintf("grant_type=client_credentials&client_id=%s&client_secret=%s&scope=customer", $cid, $csecret) );


    //if ($_SERVER['SERVER_NAME'] == 'localhost') {
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //}

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

$tokenoutput = createBookerToken($client_id, $client_secret);
$token = json_decode($tokenoutput);
$sessiontoken = $token->access_token; //This value, once generated, is good for 30 minutes (1800 seconds)



class sortLocationsBy {
    public $SortBy = 'Name';
    public $SortDirection = 0;
}

class findLocations {
    public $UsePaging = "";
    public $PageNumber = "";
    public $PageSize = "";

    public $SortBy = array();
    public function __construct(){
        array_push($this->SortBy, new sortLocationsBy);
    }
    public $access_token = "";
}
$p = new FindLocations();
$p->UsePaging = true;
$p->PageNumber = 1;
$p->PageSize = 20;
$p->access_token = $sessiontoken;

$pstring = json_encode($p);
echo $pstring;
echo "<hr><hr><hr>";
//--------------------Trying another option, and it WORKS!!!!!!!!    
//--------------------Trying another option, and it WORKS!!!!!!!!    




function findBookerLocation($stringToPost) {
    $chloc = curl_init();
    curl_setopt($chloc, CURLOPT_URL, 'https://api-staging.booker.com/v4.1/customer/locations');
    curl_setopt($chloc, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($chloc, CURLOPT_POSTFIELDS, $stringToPost );

    //if ($_SERVER['SERVER_NAME'] == 'localhost') {
    curl_setopt($chloc, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($chloc, CURLOPT_SSL_VERIFYPEER, false);
    //}

    curl_setopt($chloc, CURLOPT_POST, 1);
    $locheaders = array();
    $locheaders[] = 'Content-Type: application/json';
    $locheaders[] = 'Ocp-Apim-Subscription-Key: fe2de837b6624c91a93e36350743e223';
    curl_setopt($chloc, CURLOPT_HTTPHEADER, $locheaders);
    $locresult = curl_exec($chloc);
    if (curl_errno($chloc)) {
        echo 'Error:' . curl_error($chloc);
    }
    curl_close($chloc);
    return $locresult;
}

$findlocation = findBookerLocation($pstring);
//$findlocation = findBookerLocation($sessiontoken);

$location = json_decode($findlocation);
echo "<br><br>";
var_dump($findlocation);