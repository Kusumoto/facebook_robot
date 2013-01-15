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
<title>Micro Robot Facebook</title>
<link rel="shortcut icon" type="image/x-icon" href="http://data.kusumoto.co/logo.png">
<style type="text/css">
body {
	background-color: #CCC;
}
</style>
</head>

<body>
<p><strong><font size="+3">Micro Robot Facebook</font> - เว็บไซต์เก็บสถิติการใช้งาน facebook</strong></p>
<p>วันแรกของการเก็บข้อมูลในระบบ :: 14 มกราคม 2556 เวลา 00:01 AM<br />
  Micro Faceboook Robot By <a href="http://fb.me/Azerdar.T.Kusumoto">Kusumoto</a> (<a href="http://twitter.com/Kusumoto_ton">@Kusumoto_ton</a>) <a href="http://tools.kusumoto.co/ticker/report/">[ ดูรายงานการสรุปประจำสัปดาห์ ]</a>  [ <a href="index_old.php">ใช้งานเว็บไซต์เก่า</a> ]<br />
</div>
</p>
<div id="warning" style="text-align:center;background-color:red;color:white;font-weight:bold;font-size:120%;padding:5px;">กำลังทดสอบระบบเว็บไซต์รายงานผลเวอร์ชัน 2.0 โดยจะมีการเปลี่ยน UI หน้าเว็บใหม่ หากพบข้อผิดพลาดโปรดแจ้งครับ<br /></div>
<hr/>
<table width="399" border="1" align="center" cellspacing="0">
  <tr>
    <td width="393" bgcolor="#FFCCCC"><center><strong>สรุปการใ้ช้งาน Facebook เมื่อวาน</strong></center></td>
  </tr>
  <tr>
  <?php
 $lastday = date("Y-m-j",strtotime("-1 Day"));
 $video = "video";
 	  mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
      $query = mysql_query("SELECT * FROM `facebook_status` WHERE created_time LIKE '%$lastday%'") or die(mysql_error());
      $last_totaluser = mysql_num_rows($query);
	  
	  $query = mysql_query("SELECT * FROM `facebook_photo` WHERE created_time LIKE '%$lastday%'") or die(mysql_error());
      $last_totalphoto = mysql_num_rows($query);
	  
	  $query = mysql_query("SELECT * FROM `facebook_status` WHERE created_time LIKE '%$lastday%' AND type='$video'") or die(mysql_error());
      $last_totalvideo = mysql_num_rows($query);
  ?>
    <td bgcolor="#FFCC99">- รายงานเป็นของวันที่ = <?php echo $lastday; ?><br />
      - มีการกระทำทั้งหมด = <?php echo $last_totaluser; ?><br />
      - มีการโพสรูปทั้งหมด = <?php echo $last_totalphoto; ?><br />
      - มีการโพสวีดิโอทั้งหมด = <?php echo $last_totalvideo; ?>
      <br />
      - ผู้ใช้งานเยอะที่สุด = <?php echo $last_user; ?><br /></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="1122" height="86" border="0" align="center">
  <tr>
    <td width="357" bgcolor="#CCFF99"><center><strong>สรุปการทำงานของ Facebook Bot ทั้งสัปดาห์</strong></center></td>
    <td width="433" bgcolor="#CCFF99"><center><strong>Client ที่มีการใช้งานทั้งสัปดาห์</strong></center></td>
    <td width="318" bgcolor="#CCFF99"><center><strong>อัตราส่วนระหว่างสถานะและการกระทำต่างๆ บน Facebook ทั้งสัปดาห์</strong></center></td>
  </tr>
  <tr>
    <td><?php
include_once 'php-ofc-library/open_flash_chart_object.php';
open_flash_chart_object( 357, 400, 'chart_bot.php' );
?></td>
    <td><?php
include_once 'php-ofc-library/open_flash_chart_object.php';
open_flash_chart_object( 433, 400, 'chart_cl.php' );
?></td>
    <td><?php
include_once 'php-ofc-library/open_flash_chart_object.php';
open_flash_chart_object( 318, 400, 'chart_status.php' );
?></td>
  </tr>
  <tr valign="top" bgcolor="#CCCCFF">
    <td><center>
	<?php
      
	  mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
      echo "<table border=1 cellspacing=1 cellpadding=2 bordercolordark=white>";
	  echo "<tr><td bgcolor='#31B3BC'><center><strong>รายการ</strong></td><td bgcolor='#31B3BC'><center><strong>จำนวน</strong></center></td></tr>";
        $query = mysql_query("SELECT * FROM `facebook_status` WHERE type = 'photo'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>มีคนอัพรูปไปแล้ว</th><th>" . $result . "</th></tr>";
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE type = 'status'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>มีคนอัพสถานะไปแล้ว</th><th>" . $result . "</th></tr>";
    	
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE type = 'video'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>มีคนอัพวีดิโอไปแล้ว</th><th>" . $result . "</th></tr>";
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE type = 'link'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>มีคนแชร์ลิงค์ไปแล้ว</th><th>" . $result . "</th></tr>";
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE type = 'checkin'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>มีคนเช็คอินไปแล้ว</th><th>" . $result . "</th></tr>";
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE type != 'checkin' AND type != 'link' AND type != 'video' AND type != 'status' AND type != 'photo'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>การกระทำอื่นๆ</th><th>" . $result . "</th></tr>";
    	echo "</table>";
    	?>
    	</center></td>
    <td>
    <center>
    <?php
	  mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
      echo "<table border=1 cellspacing=1 cellpadding=2 bordercolordark=white>";
	  echo "<tr><td bgcolor='#31B3BC'><center><strong>รายการ</strong></td><td bgcolor='#31B3BC'><center><strong>จำนวน</strong></center></td></tr>";
        $query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Web'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>Web</th><th>" . $result . "</th></tr>";
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Mobile'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>Mobile Web</th><th>" . $result . "</th></tr>";
    	
        $query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Facebook for iPhone'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>Facebook for iPhone</th><th>" . $result . "</th></tr>";
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Facebook for iPad'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>Facebook for iPad</th><th>" . $result . "</th></tr>";
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Facebook for Android'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>Facebook for Android</th><th>" . $result . "</th></tr>";
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Facebook for Every Phone'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>Facebook for Every Phone (FBJava App)</th><th>" . $result . "</th></tr>";
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'iOS'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>iOS</th><th>" . $result . "</th></tr>";
    
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Twitter'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>Twitter</th><th>" . $result . "</th></tr>";
    
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Socialcam'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>Socialcam</th><th>" . $result . "</th></tr>";
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Instagram'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>Instagram</th><th>" . $result . "</th></tr>";
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'BlackBerry Smartphone' OR application = 'BlackBerry Smartphon' OR application = 'BlackBerry Smartphones App'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>BlackBerry Smartphone</th><th>" . $result . "</th></tr>";
    	
    
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application != 'Socialcam' AND application != 'Twitter' AND application !='iOS' AND application != 'Facebook for Android' AND application != 'Facebook for iPad' AND application !='Facebook for iPhone'AND application != 'Web' AND application != 'Instagram' AND application != 'BlackBerry Smartphon' AND application != 'BlackBerry Smartphone' AND application != 'BlackBerry Smartphones App' AND application != 'Mobile' AND application != 'Facebook for Every Phone'") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>อื่นๆ</th><th>" . $result . "</th></tr>";
		echo "</table>";
    	?>
      </center>
    </td>
    <td><center>
	<?php    
	  mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
       echo "<table border=1 cellspacing=1 cellpadding=2 bordercolordark=white>";
	   echo "<tr><td bgcolor='#31B3BC'><center><strong>รายการ</strong></td><td bgcolor='#31B3BC'><center><strong>จำนวน</strong></center></td></tr>";
     
        $query = mysql_query("SELECT message FROM `facebook_status` WHERE message != ''") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>Status</th><th>" . $result . "</th></tr>";
    	
    	$query = mysql_query("SELECT story FROM `facebook_status` WHERE story != ''") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>Activity</th><th>" . $result . "</th></tr>";
		echo "</table>";
    	?></center></td>
  </tr>
</table>
<p>&nbsp;</p>
<table border="0" align="center">
  <tr>
    <td width="578" bgcolor="#FF9900"><center><strong>ปริมาณการใช้งาน Facebook ในวันต่างๆ</strong></center></td>
    <td width="578" bgcolor="#FF9900"><center><strong>ปริมาณรูปที่ถูกอัพโหลดขึ้นแต่ละวัน</strong></center></td>
  </tr>
  <tr>
    <td><?php
		include_once 'php-ofc-library/open_flash_chart_object.php';
		open_flash_chart_object( 600, 300, 'chart_people.php' );
		?></td>
    <td><?php
		include_once 'php-ofc-library/open_flash_chart_object.php';
		open_flash_chart_object( 600, 300, 'chart_photoupload.php' );
		?></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="568" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFCC99"><strong><center>ค้นหาวลี/คำ ที่ผู้คนใช้กันบน Facebook</center></strong></td>
    <td bgcolor="#FFCC99"><strong><center>Tag Cloud (Beta) แสดงวลีที่คนพูดถึง</center></strong></td>
  </tr>
  <tr>
    <td><center><form name="form" id="form" action="showresult.php" method="POST" target="_Blank">
    		<input name="result" type="text" value="" size="30" width="300"/>
    		<button type="submit">ค้นหา</button>
    	</form></center></td>
    <td><iframe src="tag.php" width="700" height="200" scrolling="yes">
</iframe> </td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="732" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="542" bgcolor="#66CC66" border="1"><strong><center>10 ข้อมูลที่บอทได้รับล่าสุด</center></strong></td>
  </tr>
  <tr>
    <td>
    <iframe src="show10bot.php" width="900" height="500" scrolling="yes">
</iframe> 
    </td>
  </tr>
  <tr>
    <td bgcolor="#66CB66" border="1"><strong><center>รูปภาพที่ระบบเก็บได้ล่าสุด (วิธีดูจำนวน Like ให้เอาเมาส์ชี้ไปที่รูปที่ต้องการดู)</center></strong></td>
  </tr>
  <tr>
    <td>
    <center><iframe src="showtopimg.php" width="800" height="350" scrolling="yes">
</iframe></center>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
<hr />
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