<?php


$OASKey = 'fe2de837b6624c91a93e36350743e223';
$grantstring = "grant_type=client_credentials&client_id=wjfobeqQUIsQ&client_secret=7HcPPOhErNE1&scope=customer";


function createBookerToken() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api-staging.booker.com/v5/auth/connect/token');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials&client_id=wjfobeqQUIsQ&client_secret=7HcPPOhErNE1&scope=customer");
    curl_setopt($ch, CURLOPT_POSTFIELDS, sprintf("grant_type=client_credentials&client_id=wjfobeqQUIsQ&client_secret=7HcPPOhErNE1&scope=customer", $OASKey) );

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

$output = createBookerToken();
$token = json_decode($output);
    //print $token->{'access_token'};

//global $sessiontoken;

$sessiontoken = $token->access_token;
//print $sessiontoken;
//echo "<hr>";




class sortbyCLASS {
    public $SortBy = 'Name';
    public $SortDirection = 0;
}

class locationcurlCLASS {
    private $classtoken;
    //public function __construct($classtoken) {
    //    $this->classtoken = $classtoken;
    //}
    

    public $UsePaging = true;
    public $PageNumber = 1;
    public $PageSize = 20;
    public $access_token = "1234";
    //public $access_token = $classtoken;

    public $SortBy = array();
    public function __construct(){
        array_push($this->SortBy, new sortbyCLASS);
    }
}

//$dothisthing = new locationcurlCLASS($sessiontoken);
//
$dothisthing = new locationcurlCLASS($sessiontoken);
//echo json_encode( $dothisthing );

//echo json_encode( new locationcurlCLASS() );
//echo "<hr><hr>";






//--------------------Trying another option, and it WORKS!!!!!!!!    
//--------------------Trying another option, and it WORKS!!!!!!!!                                                                                        
class Please {
    public $UsePaging = "";
    public $PageNumber = "";
    public $PageSize = "";

    public $SortBy = array();
    public function __construct(){
        array_push($this->SortBy, new sortbyCLASS);
    }
    public $access_token = "";
}
$p = new Please();
$p->UsePaging = true;
$p->PageNumber = 1;
$p->PageSize = 20;
$p->access_token = $sessiontoken;

$pstring = json_encode($p);
echo $pstring;
echo "<hr><hr><hr>";
//--------------------Trying another option, and it WORKS!!!!!!!!    
//--------------------Trying another option, and it WORKS!!!!!!!!    








function findBookerLocation($validtoken) {
    $chloc = curl_init();
    curl_setopt($chloc, CURLOPT_URL, 'https://api-staging.booker.com/v4.1/customer/locations');
    curl_setopt($chloc, CURLOPT_RETURNTRANSFER, 1);



// ---------------------------and BOOM goes the dynamite - this is the WORKING code, but fixing the multi-array now
    $new_array = array(
        'UsePaging' => true,
        'PageNumber' => 1,
        'PageSize' => 20,
        //'SortBy' => array(
        //    'SortBy' => 'Name',
        //    'SortDirection' => 0
        //),
        //'access_token' => $validtoken
    );
    //$make_it_json = json_encode($new_array, JSON_FORCE_OBJECT);
    //echo $make_it_json;
    //echo "<hr>";
        //curl_setopt($chloc, CURLOPT_POSTFIELDS, json_encode($new_array, JSON_FORCE_OBJECT) );
    //curl_setopt($chloc, CURLOPT_POSTFIELDS, $make_it_json );




    curl_setopt($chloc, CURLOPT_POSTFIELDS, $validtoken );



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

//$findlocation = findBookerLocation();
$findlocation = findBookerLocation($pstring);
//$findlocation = findBookerLocation($sessiontoken);

$location = json_decode($findlocation);
echo "<br><br>";
var_dump($findlocation);