<?php
session_start();
$jsonPost = json_decode(file_get_contents("php://input"), true);	  
$mergeadd = $jsonPost["staddress"].$jsonPost["city"].$jsonPost["state"].$jsonPost["postalcode"];
//echo $mergeadd; 
  $Address = urlencode($mergeadd);
  $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") {
      $Lat = $xml->result->geometry->location->lat;
      $Lon = $xml->result->geometry->location->lng;
      $LatLng = "$Lat,$Lon";
	  $json = array('lat'=>"$Lat", 'lon'=>$Lon);
	  echo json_encode($LatLng);
	  /* echo json_encode(
				  array("message1" => "Hi", 
				  "message2" => "Something else")
			 ); 
	  } */
	  }
?> 