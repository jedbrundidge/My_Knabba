<?php
session_start();
// added in v4.0.0
include_once('C:\xampp\htdocs\xampp\phpMySql\Knabba\home\includes\autoload.php');
include_once('C:\xampp\htdocs\xampp\phpMySql\Knabba\home\includes\functions.php');
// require_once 'includes/autoload.php';
// require 'includes/functions.php';
require_once( '../Facebook/FacebookSession.php' );
require_once( '../Facebook/FacebookRedirectLoginHelper.php' );
require_once( '../Facebook/FacebookRequest.php' );
require_once( '../Facebook/FacebookResponse.php' );
require_once( '../Facebook/FacebookSDKException.php' );
require_once( '../Facebook/FacebookRequestException.php' );
require_once( '../Facebook/FacebookAuthorizationException.php' );
require_once( '../Facebook/GraphObject.php' );
require_once( '../Facebook/Entities/AccessToken.php' );
require_once( '../Facebook/HttpClients/FacebookHttpable.php' );
require_once( '../Facebook/HttpClients/FacebookCurlHttpClient.php' );
require_once( '../Facebook/HttpClients/FacebookCurl.php' ); 

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '1627505460827936','bf0844ef327672b2c70db3dc220f2290' );
// login helper with redirect_uri
    // $helper = new FacebookRedirectLoginHelper('http://localhost:81/xampp/phpMySql/Knabba/home/includes/fbconfig.php' );
      $helper = new FacebookRedirectLoginHelper('http://localhost:81/xampp/phpMySql/Knabba/home/includes/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
      $fname = $graphObject->getProperty('first_name');
      $lname = $graphObject->getProperty('last_name');
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;           
      $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
      $_SESSION['FNAME'] = $fname;
      $_SESSION['LNAME'] = $lname;
      checkuser($fbid,$fbfullname,$femail);
    /* ---- header location after session ----*/
  header("Location: ../r_profile.php");
    // header("Location: fbsessioncheck.php");
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>