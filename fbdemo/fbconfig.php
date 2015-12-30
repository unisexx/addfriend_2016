<?php
session_start();
// added in v4.0.0
require_once 'autoload.php';
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
FacebookSession::setDefaultApplication( '532330300263938','c0db7d2ab15b99b16dbea991fb70099e' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://localhost:8080/addfriend_2016/fbdemo/fbconfig.php' );
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

	$request = new FacebookRequest( $session, 'GET', '/me?locale=en_US&fields=name,email' );
	$response = $request->execute();
	
	// get response
	$graphObject = $response->getGraphObject();
	$fbid = $graphObject->getProperty('id'); // To Get Facebook ID
	$fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	$femail = $graphObject->getProperty('email'); // To Get Facebook email ID
	
	/* ---- Session Variables -----*/
	
	$_SESSION['FBID'] = $fbid;
	$_SESSION['FULLNAME'] = $fbfullname;
	$_SESSION['EMAIL'] = $femail;
	
	/* ---- header location after session ----*/
	require 'functions.php';
	checkuser($fbid,$fbfullname,$femail);
	header("Location: index.php");
} else {
	$loginUrl = $helper->getLoginUrl(array('req_perms' => 'email'));
	require 'functions.php';
	header("Location: ".$loginUrl);
}
?>