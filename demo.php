<?php
include_once("Slim/Slim.php");
\Slim\Slim::registerAutoloader();
require "NotORM.php";
$app = new \Slim\Slim();

require('../config/vi-config.php');
require_once('stripe-test/init.php');

//\Stripe\Stripe::setApiKey('sk_test_mW5NQKvAzUJyEoD1NC1jLK5o');
\Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);

require_once('../notifier/android_notify.php');
$android_obj = new andriod_push();

require_once('../notifier/iphone_notify.php');
$iphone_obj = new iphone_push();




function getConnection() {
    try {
//        $db_username = "herodb";
  //      $db_password = "Admin123!@#";
    //    $conn = new PDO('mysql:host=localhost;dbname=hero_app', $db_username, $db_password);
        $conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    return $conn;
}
function netAmountInd($amount){
	$net_amount = $amount - (($amount * 0.029) + 0.30) - ($amount * 0.22);
	return $net_amount;

}
function netAmount($amount){
	$net_amount = $amount - (($amount * 0.029)) - ($amount * 0.22);
	return $net_amount;
}

function sendNotification($consumer_id,$provider_id,$message,$title,$action,$request_id = ''){

	global $android_obj,$iphone_obj;
	$request_id = (int)$request_id;


    $sql_query = "SELECT user_id,device_id,device_type,user_type FROM app_users WHERE user_id IN  ('".$consumer_id."','".$provider_id."') AND device_id != '' ";
 	//echo $sql_query;
	//die;
    try {
        $dbCon = getConnection();
        $stmt   = $dbCon->query($sql_query);
        $user_array  = $stmt->fetchAll(PDO::FETCH_OBJ);

		if(!empty($user_array)){








  ...
  ...

  ...
  ...

  ...
  dummy code for demo purposes only

  ...

  ...
  ...


  function getDistance($lat1, $lon1, $lat2, $lon2, $unit) {

  	  $theta = $lon1 - $lon2;
  	  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  	  $dist = acos($dist);
  	  $dist = rad2deg($dist);
  	  $miles = $dist * 60 * 1.1515;
  	  $unit = strtoupper($unit);

  	  if ($unit == "K") {
  		return ($miles * 1.609344);
  	  } else if ($unit == "N") {
  		  return ($miles * 0.8684);
  		} else {
  			return $miles;
  		  }
  }
  function getLatlog($zipcode) {

  	$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$zipcode."&sensor=false";
  	$details = file_get_contents($url);
  	$result = json_decode($details,true);
  	$result_new['latitude'] = $result['results'][0]['geometry']['location']['lat'];
  	$result_new['longitude'] = $result['results'][0]['geometry']['location']['lng'];

  	return $result_new;
  }
  function getaddress($lat,$lng){

  	$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
  	$json = @file_get_contents($url);
  	$data=json_decode($json);
  	$status = $data->status;

  	if($status=="OK"){
  		$adderss = explode(',',$data->results[0]->formatted_address);
  		$address_array  = explode(' ',trim($adderss[2]));
  		$result_array['state'] = trim($address_array[0]);
  		$result_array['zipcode'] = $address_array[1];


  		return $result_array;
  	}else
  		return false;
  }



  function addUser() {

      global $app;
      $req = $app->request(); // Getting parameter with names


      $firstname = $req->params('firstname');
      $lastname = $req->params('lastname');
  	$station = $req->params('station');
      $password = $req->params('password');
      $user_type = $req->params('user_type');
      $email_address = $req->params('email_address');
      $gender = $req->params('gender');
      $dob = $req->params('dob');
      $street = $req->params('street');
      $city = $req->params('city');
      $state = $req->params('state');
      $post_code = $req->params('post_code');
      $country = $req->params('country');
      $phone = $req->params('phone');
  	$phone = preg_replace("/[^0-9]/","",$phone);
  	$device_type = $req->params('device_type');
      $device_id = $req->params('device_id');
      $stripe_token = $req->params('stripe_token');

      $routing_number = $req->params('routing_number');
      $account_number = $req->params('account_number');
    	$ssn = $req->params('ssn');


  	if(!empty($dob) && !empty($gender))
  	    $sql = "INSERT INTO app_users SET `phone`= :phone,`firstname`= :firstname,`lastname` = :lastname ,`password` = :password,`user_type`=:user_type,`email_address` = :email_address,`gender` = :gender,`dob` = :dob,`street` = :street,`city` = :city,`state` = :state,`post_code` = :post_code,`country` = :country,`join_date`= '".TODAY_DATE_TIME."',`ip_address` = :ip_address,`status` = 'N', `hash`= '".md5($email_address."Cech4tHe")."',`station` = :station";
  	else


    ...

    ....
    ...

    ?>
