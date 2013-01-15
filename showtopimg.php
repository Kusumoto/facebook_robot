<script type="text/javascript" src="lightbox/lightbox.js"></script>
<script src="http://cdn.jquerytools.org/1.2.7/tiny/jquery.tools.min.js"></script>
<link rel="stylesheet" href="lightbox.css" type="text/css" media="screen" />
<meta charset="utf-8">
<META HTTP-EQUIV="refresh" CONTENT="10">
<?php
     include("sql_setting.php");
	  mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
       $query = mysql_query("SELECT * FROM `facebook_photo` ORDER BY `id` DESC LIMIT 50") or die(mysql_error());
       $result = mysql_num_rows($query);
       if (empty($result)) {
       echo "ไม่พบข้อมูล";
       exit;
       }
        $i=0;
 while( $i < $result ) {
 	$fetcharr1 = mysql_fetch_array($query);
	$fb_id = $fetcharr1['fb_id'];
	$message = $fetcharr1['message'];
	$like = $fetcharr1['like'];
	$picture = $fetcharr1['picture'];
	$original_link = $fetcharr1['original_link'];
	$created_time = $fetcharr1['created_time'];
	
	echo "<a href='$original_link' target ='_blank' rel='lightbox' ><img src='$picture' width='100' height='100' title='มีคนกด Like $like ครั้ง'></a>";
	$i++;
	}
	
	mysql_close();
	?>