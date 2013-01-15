<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Micro Facebook Robot - Backup</title>
<link rel="shortcut icon" type="image/x-icon" href="http://data.kusumoto.co/logo.png">
<?php
	  include("sql_setting.php");
      
	  mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
       $query = mysql_query("SELECT * FROM `facebook_status` ORDER BY id DESC") or die(mysql_error());
       $result = mysql_num_rows($query);
       echo "<b><font size='4'>Backup Status...</font></b></br>";
       $i=0;
        while( $i < $result ) {
    $fetcharr1 = mysql_fetch_array($query);
	$fb_id = $fetcharr1['fb_id'];
	$message = $fetcharr1['message'];
	$story = $fetcharr1['story'];
	$from_name = $fetcharr1['from_name'];
	$from_id = $fetcharr1['from_id'];
	$type = $fetcharr1['type'];
	$created_time = $fetcharr1['created_time'];
	$application = $fetcharr1['application'];
		$query_status = mysql_query("SELECT * FROM `facebook_logstatus` WHERE fb_id='$fb_id'") or die(mysql_error());
        $result_status = mysql_num_rows($query_status);
        if (!empty($result_status)) {
         echo "Ignore post $fb_id complete!</br>";
        } else {
	$query1 = mysql_query(sprintf("INSERT INTO `facebook_logstatus` (fb_id, message, story, from_name, from_id, type, created_time, application) VALUES ('$fb_id', '$message', '$story', '$from_name', '$from_id', '$type', '$created_time', '$application')"))or die(mysql_error());	
    echo "backup post $fb_id complete!</br>";
    	}
    $i++;
    }
    
    $query = mysql_query("SELECT * FROM `facebook_photo` ORDER BY id DESC") or die(mysql_error());
    $result = mysql_num_rows($query);
    echo "<b><font size='4'>Backup photo...</font></b></br>";
     $y=0;
        while( $y < $result ) {
    $fetcharr1 = mysql_fetch_array($query);
	$fb_id = $fetcharr1['fb_id'];
	$message = $fetcharr1['message'];
	$like = $fetcharr1['like'];
	$picture = $fetcharr1['picture'];
	$original_link = $fetcharr1['original_link'];
	$created_time = $fetcharr1['created_time'];
	$fb_user = $fetcharr1['fb_user'];
	$query_photo = mysql_query("SELECT * FROM `facebook_logphoto` WHERE fb_id='$fb_id'") or die(mysql_error());
        $result_photo = mysql_num_rows($query_photo);
        if (!empty($result_status)) {
         echo "Ignore photo $fb_id complete!</br>";
        } else {
	$query2 = mysql_query("INSERT INTO `facebook_logphoto`(`fb_id`, `message`, `like`, `picture`, `original_link`, `created_time`, `fb_user`) VALUES ('$fb_id','$message','$like','$picture','$original_link','$created_time','$from_id')") or die(mysql_error());
	 echo "backup photo $fb_id complete!</br>";
	 }
    $y++;
    }
     	 $query = mysql_query("TRUNCATE `facebook_status` ") or die(mysql_error());
     	 $query = mysql_query("TRUNCATE `facebook_photo` ") or die(mysql_error());
     	 echo "</br><b><font size='4'>Cleanup Complete</font></b>";
     	 mysql_close();
?>
    
	
    