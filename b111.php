<?php
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require 'facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '439992059399601',
  'secret' => '797b2f53ad25686ec4d9d3a8b60b7909',
));

// Get User ID
$user = $facebook->getUser();

if($_SESSION && isset($_POST['fb_checkbox'])) {
    $facebook->api('/me/feed', 'post', array('message'=>$_POST['user_status']));
}

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me/home?fields=id,name,message,from,story,type,application,likes,picture,link&limit=25');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}


// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl();
}

// This call will always work since we are fetching public data.
$naitik = $facebook->api('/naitik');

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>php-sdk</title>
    <style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <h1>php-sdk</h1>

    <?php if ($user): ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
    <?php else: ?>
      <div>
        Login using OAuth 2.0 handled by the PHP SDK:
        <a href="<?php echo $loginUrl; ?>&scope=read_stream">Login with Facebook</a>
      </div>
    <?php endif ?>

    <h3>PHP Session</h3>
    <pre><?php print_r($_SESSION); ?></pre>

    <?php if ($user): ?>
      <h3>You</h3>
      <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">
	<META HTTP-EQUIV="refresh" CONTENT="5">
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
      <h3>Your User Object (/me)</h3>
      <pre><?php print_r($user_profile); ?></pre>
      <?php
     include("sql_setting.php");
      
    
      $i=0;
 	  while( $i < 25 ) {
      $fb_id = $user_profile['data'][$i]['id'];
      $message = $user_profile['data'][$i]['message'];
      $name = $user_profile['data'][$i]['name'];
      $from_name = $user_profile['data'][$i]['from'][name];
      $from_id = $user_profile['data'][$i]['from']['id'];
      $application = $user_profile['data'][$i]['application']['name'];
      $type = $user_profile['data'][$i]['type'];
      $created_time = $user_profile['data'][$i]['created_time'];
      $story = $user_profile['data'][$i]['story'];
      $like = $user_profile['data'][$i]['likes'][count];
      $picture = $user_profile['data'][$i]['picture'];
      $link = $user_profile['data'][$i]['link'];
      
      if (empty($application)) {
      $application = "Web";
      }
      
      function cutname($raw){
     $raw = preg_replace('#[^-ก-๙a-zA-Z0-9 ]#u', ' ', $raw);
     return $raw;
}

	$name = cutname("$name");
	$message = cutname("$message");
	$story = cutname("$story");
	$from_name = cutname("$from_name");
	      
		
      mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
        $query = mysql_query("SELECT * FROM `facebook_status` WHERE fb_id = '$fb_id'") or die(mysql_error());
    	$result = mysql_fetch_array($query);
     if (!empty($result)) {
     
     	} else {
     	$query = mysql_query(sprintf("INSERT INTO `facebook_status` (fb_id, message, story, from_name, from_id, type, created_time, application) VALUES ('$fb_id', '$message', '$story', '$from_name', '$from_id', '$type', '$created_time', '$application')"))or die(mysql_error());	
     	}
			
     	$i++;
     	}
    
      ?>
    <?php else: ?>
      <strong><em>You are not Connected.</em></strong>
      <pre><?php print_r($user_profile); ?></pre>
    <?php endif ?>

    <h3>Public profile of Naitik</h3>
    <img src="https://graph.facebook.com/naitik/picture">
    <?php echo $naitik['name']; ?>
  </body>
</html>
