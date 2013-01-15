<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link rel="shortcut icon" type="image/x-icon" href="http://data.kusumoto.co/logo.png">
<style type="text/css">
body {
	background-color: #CCC;
}
</style>
</head>
<body>
<p><strong><font size="+3">Micro Robot Facebook</font> - เว็บไซต์เก็บสถิติการใช้งาน facebook</strong></p>
<hr/>
<?php

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
 include("sql_setting.php");

		$fb_id = $_REQUEST['fb_id'];
      
	  mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
       $query = mysql_query("SELECT * FROM `facebook_status` WHERE from_id='$fb_id'") or die(mysql_error());
       $result = mysql_num_rows($query);
       
       $fetcharr1 = mysql_fetch_array($query);
 	$from_name = $fetcharr1['from_name'];
 	$from_id = $fetcharr1['from_id'];
 	echo "<center><b><img src='https://graph.facebook.com/$from_id/picture'> <a href='http://www.facebook.com/$from_id'>$from_name</a></b></center></br>";
 	?>

<center>
<title>Micro Robot Facebook - State for <?php echo $from_name; ?></title>
<?php
include_once 'php-ofc-library/open_flash_chart_object.php';
open_flash_chart_object( 800, 300, 'chart_user.php?fb_id='. $from_id . '&name=' . $from_name . '' );
?>

</center>
<hr/>
<div><?php $today = date("F j, Y, g:i a",strtotime("+12 hour")); ?>
<i>เวลาบนเครื่อง Robot Server :: <?php echo $today; ?> | Server Load :: <?php $load = sys_getloadavg(); echo $load[0] .",". $load[1];  ?> | <?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo 'Page generated in '.$total_time.' seconds.';
?> | memory usage: <?php
function convert($size)
 {
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
 }

echo convert(memory_get_usage(true)); // 123 kb
?></i></div>
</body>
</html>
