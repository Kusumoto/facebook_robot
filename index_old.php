<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="stats-in-th" content="5200" />
 <!-- CSS -->
  
    <link rel="stylesheet" type="text/css" href="css/lightwindow.css">
    
	<!-- JavaScript -->
	<script type="text/javascript" src="javascript/prototype.js"></script>
	<script type="text/javascript" src="javascript/effects.js"></script>
	<script type="text/javascript" src="javascript/lightwindow.js"></script>

<title>Micro Facebook Robot</title>
<link rel="shortcut icon" type="image/x-icon" href="http://data.kusumoto.co/logo.png">

<b><font size="5">BOT FACEBOOK เก็บข้อมูลตั้งแต่วันที่ 7 มกราคม 2556 เวลา 10:37 PM</font></b>
<hr>
Micro Faceboook Robot By <a href="http://fb.me/Azerdar.T.Kusumoto">Kusumoto</a> (<a href="http://twitter.com/Kusumoto_ton">@Kusumoto_ton</a>) <a href="http://tools.kusumoto.co/ticker/report/">[ ดูรายงานการสรุปประจำสัปดาห์ ]</a>
<hr>
<?php 
$today = date("F j, Y, g:i a",strtotime("+12 hour")); ?>
<i>เวลาบนเครื่อง Robot Server <?php echo $today; ?> | Server Load :: <?php $load = sys_getloadavg(); echo $load[0] .",". $load[1];  ?></i></br>
<!--<div id="warning" style="text-align:center;background-color:red;color:white;font-weight:bold;font-size:120%;padding:5px;">ช่วงเวลาประมาณ 3:00 ทางเราประสบปัญหาเรื่องของ Internet ออกนอกประเทศ เพื่อติดต่อไปยัง facebook มีปัญหาติดต่อได้บ้างไม่ได้บ้าง ไม่ทราบว่ากลับมาปกติเมื่อไหร่ และเวลา 12:00-15.00 จะมีการปรับปรุงระบบและรวบรวมข้อมูล ข้อมูลในช่วงเวลาดังกล่าว อาจจะไม่เป็นไปตามที่ควรจะเป็น ขออภัยมาด้วยครับ<br />
--></div>
<center></br><b>สรุปการทำงานของ Facebook Bot</b></br>
<?php
include_once 'php-ofc-library/open_flash_chart_object.php';
open_flash_chart_object( 500, 400, 'chart_bot.php' );
?>
<div id="my_chart"></div></br>
<?php
	  include("sql_setting.php");
      
	  mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
      echo "<table border=1 cellspacing=1 cellpadding=2 bordercolordark=white>";
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
    	
    	?>
    	</table>
    	</center>
    	
<center></br></br><b>Client ที่มีการใช้งาน</b></br>
<?php
include_once 'php-ofc-library/open_flash_chart_object.php';
open_flash_chart_object( 500, 400, 'chart_cl.php' );
?>
<div id="my_chart"></div></br>


<?php
	  
      

      
	  mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
      echo "<table border=1 cellspacing=1 cellpadding=2 bordercolordark=white>";
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

    	?>
    	</table>
    	</center>
    	<center></br></br><b>อัตราส่วนระหว่างสถานะและการกระทำต่างๆ บน Facebook</b></br>
<?php
include_once 'php-ofc-library/open_flash_chart_object.php';
open_flash_chart_object( 500, 400, 'chart_status.php' );
?>
<div id="my_chart"></div></br>


<?php
	 

      
	  mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
       echo "<table border=1 cellspacing=1 cellpadding=2 bordercolordark=white>";
        $query = mysql_query("SELECT message FROM `facebook_status` WHERE message != ''") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>Status</th><th>" . $result . "</th></tr>";
    	
    	$query = mysql_query("SELECT story FROM `facebook_status` WHERE story != ''") or die(mysql_error());
    	$result = mysql_num_rows($query);
    	echo "<tr><th>Activity</th><th>" . $result . "</th></tr>";
    	?>
    	</table>
    	</center>
    	</br></br><b><center>ปริมาณการใช้งาน Facebook ในวันต่างๆ</center></b></br>
    	<center><?php
		include_once 'php-ofc-library/open_flash_chart_object.php';
		open_flash_chart_object( 700, 300, 'chart_people.php' );
		?></center>
		
		</br></br><b><center>ปริมาณรูปที่ถูกอัพโหลดขึ้นแต่ละวัน</center></b></br>
    	<center><?php
		include_once 'php-ofc-library/open_flash_chart_object.php';
		open_flash_chart_object( 700, 300, 'chart_photoupload.php' );
		?></center>
    	
    	</br></br><b><center>ค้นหาวลี/คำ ที่ผู้คนใช้กันบน Facebook</center></b></br>
    	<center><form name="form" id="form" action="showresult.php" method="POST" target="_Blank">
    		<input type="text" name="result" value="" width="300"/>
    		<button type="submit">ค้นหา</button>
    	</form></center>
    	<center></br></br><b>Tag Cloud (Beta) แสดงวลีที่คนพูดถึง</b></br>
    	<iframe src="tag.php" width="900" height="200" scrolling="yes">
</iframe> 
    	</br></br><b>10 ข้อมูลที่บอทได้รับล่าสุด</b></br>
    	<iframe src="show10bot.php" width="900" height="500" scrolling="yes">
</iframe> </center>
<center></br></br><b>รูปภาพที่ระบบเก็บได้ล่าสุด (วิธีดูจำนวน Like ให้เอาเมาส์ชี้ไปที่รูปที่ต้องการดู)</b></br>
    	<iframe src="showtopimg.php" width="800" height="350" scrolling="yes">
</iframe> </center>

</br></br><b>ข้อมูลคนใช้งานในระบบ</b></br>
<?php
     
      
	  mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
       $query = mysql_query("SELECT * FROM `facebook_status` ORDER BY from_id DESC") or die(mysql_error());
       $result = mysql_num_rows($query);
       $i=0;
       $y=0;
       
 while( $i < $result ) {
 	$fetcharr1 = mysql_fetch_array($query);
 	$from_name = $fetcharr1['from_name'];
 	$from_id = $fetcharr1['from_id'];
 	
 	if ( $from_id != $y ) {
 	echo "<img src='https://graph.facebook.com/$from_id/picture'> <a href='http://www.facebook.com/$from_id'>$from_name</a> <a href='userchart.php?fb_id=$from_id' target='_blank'><img src='chart.gif'></a> [ <a href='admin_show.php?fb_id=$from_id' target='_blank'>Admin</a> ]";
 	$query2 = mysql_query("SELECT * FROM `facebook_status` where from_id='$from_id'") or die(mysql_error());
 	$result2 = mysql_num_rows($query2);
 	echo " มีข้อมูลในระบบ = $result2</br>";
 	$y = $from_id;
 	} else {
 	}
 	$i++;
 	}