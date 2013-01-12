<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link rel="shortcut icon" type="image/x-icon" href="http://data.kusumoto.co/logo.png">

<?php
		$fb_id = $_REQUEST['fb_id'];
		include("sql_setting.php");
      
	  mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
       $query = mysql_query("SELECT * FROM `facebook_status` WHERE from_id='$fb_id'") or die(mysql_error());
       $result = mysql_num_rows($query);
       
       $fetcharr1 = mysql_fetch_array($query);
 	$from_name = $fetcharr1['from_name'];
 	$from_id = $fetcharr1['from_id'];
 	echo "<center><b><img src='https://graph.facebook.com/$from_id/picture'> <a href='http://www.facebook.com/$from_id'>$from_name</a></b></center>";
 	?>

<center>
<title>State for <?php echo $from_name; ?></title>
<?php
include_once 'php-ofc-library/open_flash_chart_object.php';
open_flash_chart_object( 800, 300, 'chart_user.php?fb_id='. $from_id . '&name=' . $from_name . '' );
?>
<div id="my_chart"></div></br>
</center>
