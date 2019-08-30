<?php

// $ch = curl_init();

// curl_setopt($ch, CURLOPT_URL, 'https://api-staging.booker.com/v5/auth/connect/token');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials&client_id=wjfobeqQUIsQ&client_secret=7HcPPOhErNE1&scope=customer");
// curl_setopt($ch, CURLOPT_POST, 1);

// if ($_SERVER['SERVER_NAME'] == 'localhost') {
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //necessary for LOCALHOST
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //
// }

// $headers = array();
// $headers[] = 'Content-Type: application/x-www-form-urlencoded';
// $headers[] = 'Ocp-Apim-Subscription-Key: fe2de837b6624c91a93e36350743e223';
// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// $result = curl_exec($ch);
// if (curl_errno($ch)) {
//     echo 'Error:' . curl_error($ch);
// }
// print_r($result); //THIS WORKS! But only on an HTTPS connection!
// curl_close($ch);
// 

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



//$sessiontoken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsIng1dCI6ImZsckpob3dIZndIaE4taGZsMXVNVHNXZ0VuTSIsImtpZCI6ImZsckpob3dIZndIaE4taGZsMXVNVHNXZ0VuTSJ9.eyJpc3MiOiJodHRwczovL2lkZW50aXR5LXN0Zy5ib29rZXIubmluamEvYXV0aCIsImF1ZCI6Imh0dHBzOi8vaWRlbnRpdHktc3RnLmJvb2tlci5uaW5qYS9hdXRoL3Jlc291cmNlcyIsImV4cCI6MTU2NzAyODQzOSwibmJmIjoxNTY3MDI2NjM5LCJjbGllbnRfaWQiOiJ3amZvYmVxUVVJc1EiLCJjbGllbnRfd3M0X2FjY2VzcyI6IjEiLCJjbGllbnRfcGFydG5lcl91dWlkIjoiOGQxMWFlNDMtMDY2Yy00ZWUwLTgzMWQtNmU4OTIzODIyMDVlIiwiY2xpZW50X2xvY2F0aW9uX3Njb3BlIjoibGltaXRlZCIsImNsaWVudF9lbnYiOiJkZWZhdWx0Iiwic2NvcGUiOiJjdXN0b21lciJ9.lzDlon66mBuXWsvRkpol1pYLefRwxKLQhUGnNeRqJUxtwze7WwtWL9CDqSsRnAjhOw_F07AnP36arVecjLMNowB5J2YTL5rYZws213v-A2Y_N6eyT4LmCPv4aYD9PUDXJHPokCspbfffBEIbC96dLpo_Kjrx5dCpGixVSzM5Kdj7jBcJ7BIsPVH_xbwwFsWxVIeU8F2jgQHuQiySTSkHto3LUK6ybsJHW2KTZeqPnpwA_Hn7ZAScW6WAl2rDpB1rye0DmdgIpLjUU_POg-DptkT4LiRDMLQN1OHgzx4GUKrwMBzzSFrAojcXO9D994WqrW0rtPPuIcgKiO1-7vQh-A';


//$locpoststring = '{ "UsePaging": true, "PageNumber": 1, "PageSize": 20, "SortBy": [{"SortBy": "Name", "SortDirection": 0 }], "access_token": "' . $sessiontoken . '"}';

// --------------------this wanted to work, but wasn't quite the key!
//$locpoststring = '"{ "UsePaging": true, "PageNumber": 1, "PageSize": 20, "SortBy": [{"SortBy": "Name", "SortDirection": 0 }], "access_token": "%s" }"';
//print $locpoststring;
//echo sprintf($locpoststring, $sessiontoken);
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
    public $access_token = "";

    public $SortBy = array();
    public function __construct(){
        array_push($this->SortBy, new sortbyCLASS);
    }
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
    //curl_setopt($chloc, CURLOPT_POSTFIELDS, $locpoststring );

    // BELOW WORKS!!
    //curl_setopt($chloc, CURLOPT_POSTFIELDS, "{ \"UsePaging\": true, \"PageNumber\": 1, \"PageSize\": 20, \"SortBy\": [{\"SortBy\": \"Name\", \"SortDirection\": 0 }], \"access_token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsIng1dCI6ImZsckpob3dIZndIaE4taGZsMXVNVHNXZ0VuTSIsImtpZCI6ImZsckpob3dIZndIaE4taGZsMXVNVHNXZ0VuTSJ9.eyJpc3MiOiJodHRwczovL2lkZW50aXR5LXN0Zy5ib29rZXIubmluamEvYXV0aCIsImF1ZCI6Imh0dHBzOi8vaWRlbnRpdHktc3RnLmJvb2tlci5uaW5qYS9hdXRoL3Jlc291cmNlcyIsImV4cCI6MTU2NzAyODQzOSwibmJmIjoxNTY3MDI2NjM5LCJjbGllbnRfaWQiOiJ3amZvYmVxUVVJc1EiLCJjbGllbnRfd3M0X2FjY2VzcyI6IjEiLCJjbGllbnRfcGFydG5lcl91dWlkIjoiOGQxMWFlNDMtMDY2Yy00ZWUwLTgzMWQtNmU4OTIzODIyMDVlIiwiY2xpZW50X2xvY2F0aW9uX3Njb3BlIjoibGltaXRlZCIsImNsaWVudF9lbnYiOiJkZWZhdWx0Iiwic2NvcGUiOiJjdXN0b21lciJ9.lzDlon66mBuXWsvRkpol1pYLefRwxKLQhUGnNeRqJUxtwze7WwtWL9CDqSsRnAjhOw_F07AnP36arVecjLMNowB5J2YTL5rYZws213v-A2Y_N6eyT4LmCPv4aYD9PUDXJHPokCspbfffBEIbC96dLpo_Kjrx5dCpGixVSzM5Kdj7jBcJ7BIsPVH_xbwwFsWxVIeU8F2jgQHuQiySTSkHto3LUK6ybsJHW2KTZeqPnpwA_Hn7ZAScW6WAl2rDpB1rye0DmdgIpLjUU_POg-DptkT4LiRDMLQN1OHgzx4GUKrwMBzzSFrAojcXO9D994WqrW0rtPPuIcgKiO1-7vQh-A\" }" );


//curl_setopt($chloc, CURLOPT_POSTFIELDS, "{ \"UsePaging\": true, \"PageNumber\": 1, \"PageSize\": 20, \"SortBy\": [{\"SortBy\": \"Name\", \"SortDirection\": 0 }], \"access_token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsIng1dCI6ImZsckpob3dIZndIaE4taGZsMXVNVHNXZ0VuTSIsImtpZCI6ImZsckpob3dIZndIaE4taGZsMXVNVHNXZ0VuTSJ9.eyJpc3MiOiJodHRwczovL2lkZW50aXR5LXN0Zy5ib29rZXIubmluamEvYXV0aCIsImF1ZCI6Imh0dHBzOi8vaWRlbnRpdHktc3RnLmJvb2tlci5uaW5qYS9hdXRoL3Jlc291cmNlcyIsImV4cCI6MTU2NzEwODgxNiwibmJmIjoxNTY3MTA3MDE2LCJjbGllbnRfaWQiOiJ3amZvYmVxUVVJc1EiLCJjbGllbnRfd3M0X2FjY2VzcyI6IjEiLCJjbGllbnRfcGFydG5lcl91dWlkIjoiOGQxMWFlNDMtMDY2Yy00ZWUwLTgzMWQtNmU4OTIzODIyMDVlIiwiY2xpZW50X2xvY2F0aW9uX3Njb3BlIjoibGltaXRlZCIsImNsaWVudF9lbnYiOiJkZWZhdWx0Iiwic2NvcGUiOiJjdXN0b21lciJ9.sz9UTxKT1Re9vQ2WRYLiqUsYP_WEbhES8-24qNey-NrObAZVqOtK2gIkBI7Y2qqselY0eIukV_IlrqTnf8smJxXgwSFYcMUH1fFDgM7lvX72oGC-wX4-mocS-A9HYdF2YrPZhWr7Sf4RtNovBLJmJaLQNiC1V3JBH0D6ihajhFYEB48lzc99ZawUwaX6iDh3vfMuRPkPy_KVQAO8Jkk7ylvTCi87rFuRAsVKbla1plybGdOiMGkoAwCJr3QCGG5nCPITSVRnujE69fGHDWKITqFJhW0XI2YqrQo8sQqNzWQkqwDZSfVB6w4ylFJQ5G7oKpOq9NcBhmRVmUt7to_-bg\" }" );


//$locpoststring = '"{ \"UsePaging\": true, \"PageNumber\": 1, \"PageSize\": 20, \"SortBy\": [{\"SortBy\": \"Name\", \"SortDirection\": 0 }], \"access_token\": \"%s\" }"';
//$newstring = sprintf($locpoststring, $validtoken);
//echo $newstring;
//echo "<hr>";


//curl_setopt($chloc, CURLOPT_POSTFIELDS, $newstring );

    //curl_setopt($chloc, CURLOPT_POSTFIELDS, "{ \"UsePaging\": true, \"PageNumber\": 1, \"PageSize\": 20, \"SortBy\": [{\"SortBy\": \"Name\", \"SortDirection\": 0 }], \"access_token\": ".$sessiontoken." }" );



// ---------------------------and BOOM goes the dynamite - this is the WORKING code, but fixing the multi-array now
    $new_array = array(
        'UsePaging' => true,
        'PageNumber' => 1,
        'PageSize' => 20,
        //'SortBy' => array(
        //    'SortBy' => 'Name',
        //    'SortDirection' => 0
        //),
        'access_token' => $validtoken
    );
    $make_it_json = json_encode($new_array, JSON_FORCE_OBJECT);
    echo $ptoken;//$make_it_json;
    echo "<hr>";
        //curl_setopt($chloc, CURLOPT_POSTFIELDS, json_encode($new_array, JSON_FORCE_OBJECT) );
    curl_setopt($chloc, CURLOPT_POSTFIELDS, $make_it_json );
    //curl_setopt($chloc, CURLOPT_POSTFIELDS, $make_it_json );


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
$findlocation = findBookerLocation($sessiontoken);

$location = json_decode($findlocation);
echo "<br><br>";
var_dump($findlocation);