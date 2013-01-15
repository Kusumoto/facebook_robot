
<?php

$user = 'admin';
$pwd = 'kusumoto123';

if (!isset($_SERVER['PHP_AUTH_USER']))  {
	header('WWW-Authenticate: Basic ream="For Admin Only" ');
	header('HTTP/1.0 401 Unauthorized');
	echo '<center>คุณไม่มีสิทธิ์ !!!</center>';
	exit;
	}
	if ( !(($_SERVER['PHP_AUTH_USER'] == $user ) and ($_SERVER['PHP_AUTH_PW'] == $pwd )) ) {
	
echo '<center>คุณไม่มีสิทธิ์ การทำงานของระบบผิดพลาด</center>';
exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
 include("sql_setting.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Micro Robot Facebook - Admin Page</title>
<link rel="shortcut icon" type="image/x-icon" href="http://data.kusumoto.co/logo.png">
<style type="text/css">
body {
	background-color: #CCC;
}
</style>
</head><body>

<?php
$fb_id = $_REQUEST['fb_id'];
if (empty($fb_id)) {
	echo "Enter FB ID???";
	exit;
	}
	?>
<p><strong><font size="+3">Micro Robot Facebook</font> - เว็บไซต์เก็บสถิติการใช้งาน facebook</strong><br /><hr/>
</div>
</p> <?php
     include("sql_setting.php");
      
	  mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
       $query = mysql_query("SELECT * FROM `facebook_status` WHERE from_id='$fb_id'") or die(mysql_error());
       $result = mysql_num_rows($query);
       if (empty($result)) {
       echo "FB ID Not Found in Database";
       exit;
       }
        echo "<center><table border=1 cellspacing=1 cellpadding=2 bordercolordark=white>";
       echo "<tr bgcolor=#77E2F4><th>Images</th><th>Ativity/Status</th><th>Type</th><th>From</th><th>Time (UTC+0)</th><th>App่</th><th>Go to post</th></tr>";
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
	if (empty($message)) {
	echo "<tr><td><img src='http://graph.facebook.com/$from_id/picture'></td><td>[Activity] $story</td><td>$type</td><td><a href='http://www.facebook.com/$from_id' target='_BLANK'>$from_name</a> <a href='userchart.php?fb_id=$from_id' target='_blank'><img src='chart.gif'></a></td><td>$created_time</td><td>$application</td><td><a href='http://www.facebook.com/$fb_id' target='_blank'>Click</a></td></th>";
	}else{
	echo "<tr><td><img src='http://graph.facebook.com/$from_id/picture'></td><td>[Status] $message</td><td>$type</td><td><a href='http://www.facebook.com/$from_id' target='_BLANK'>$from_name <a href='userchart.php?fb_id=$from_id' target='_blank'><img src='chart.gif'></a></a></td><td>$created_time</td><td>$application</td><td><a href='http://www.facebook.com/$fb_id' target='_blank'>Click</a></td></th>";
	}
	$i++;
	}
	echo "</table>";
	echo "<img src='http://graph.facebook.com/$from_id/picture'> โดยรวมแล้ว คุณ $from_name <a href='userchart.php?fb_id=$from_id' target='_blank'><img src='chart.gif'></a> นั้นมี $result การกระทำอยู่ในฐานข้อมูล";
	?>
</center><hr />
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