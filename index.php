<?php if ( ! dirname($_SERVER['PHP_SELF'])) exit('No direct script access allowed');
/*
Plugin Name: Verify Social
Plugin URI: http://kipsoft.com
Description: Make sure a user is liking subscribed or following you before viewing certain content.
Author: KipSoft
Version: 1.0
Author URI: http://kipsoft.com
*/

require_once('sdk/facebook/facebook.php');

$facebook = new Facebook(array(
  'appId'  => getenv('FB_APPID'),
  'secret' => getenv('FB_SECRET'),
));

// See if there is a user from a cookie
$user = $facebook->getUser();

$user_profile;
$user_likes=false;
if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
    //;exit;
    if ($_SESSION[fblike]=='true'){$user_likes=true;}else{$user_likes=false;}
   // print_r($_SESSION[fblike]);
   // print_r($user_likes);exit;
  } catch (FacebookApiException $e) {
   // echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';
    $user = null;
  }
  $likes;
  try {
   // @$likes = $facebook->api("/me/likes/181398148572649");
    //$likes = $facebook->api('/me/likes/181398148572649');  
    //print_r($likes);exit;
    } catch (FacebookApiException $e) {
    //echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';
  }
  //print_r($likes);
  try {
    //$likes = $facebook->api("/me/likes/181398148572649");
    //print_r($user_profile);
    //if(!empty($user_profile['id'])){
    //    $user_likes=true;
    //setcookie( 'FaceBookAuth', 'Successful', time() + 86400, "/wp/" );
    //
    //    	$u = $user_profile;
    	
    //print_r($u);exit;
		
    //    	verify_wpdb_facebook($u);

	
    //}//set_cookie("FaceBookAuth","Successful",15,"/","/");
    
    } catch (FacebookApiException $e) {
    $user = null;
    //$_SESSION[dbidwp]=0;
    //print_r($e);
  }
  //print_r($user_likes);exit;
}
//version: 'v2.0' // use version 2.2


print_r($user);exit;



?>
