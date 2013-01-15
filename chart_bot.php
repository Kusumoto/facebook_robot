<?php
	
	include 'php-ofc-library/open-flash-chart.php';
 include("sql_setting.php");
      
	  mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
        $query = mysql_query("SELECT * FROM `facebook_status` WHERE type = 'photo'") or die(mysql_error());
    	$result1 = mysql_num_rows($query);
    	
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE type = 'status'") or die(mysql_error());
    	$result2 = mysql_num_rows($query);
    	
    	
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE type = 'video'") or die(mysql_error());
    	$result3 = mysql_num_rows($query);

    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE type = 'link'") or die(mysql_error());
    	$result4 = mysql_num_rows($query);
    	
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE type = 'checkin'") or die(mysql_error());
    	$result5 = mysql_num_rows($query);
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE type != 'checkin' AND type != 'link' AND type != 'video' AND type != 'status' AND type != 'photo'") or die(mysql_error());
    	$result6 = mysql_num_rows($query);
    	mysql_close();
    	
    	include_once( 'php-ofc-library/open-flash-chart.php' );
$g = new graph();

//
// PIE chart, 60% alpha
//
$g->pie(60,'#505050','{font-size: 12px; color: #404040;');
//
// pass in two arrays, one of data, the other data labels
//
$g->pie_values( array($result1,$result2,$result3,$result4,$result5,$result6), array('Photo','Status','Video','Link','Checkin','Other') );
//
// Colours for each slice, in this case some of the colours
// will be re-used (3 colurs for 5 slices means the last two
// slices will have colours colour[0] and colour[1]):
//
$g->pie_slice_colours( array('#d01f3c','#356aa0','#C79810','#5FEFEF','#6CB72F','#F97720','#DDFF7F') );

$g->set_tool_tip( "#x_label# <br>จำนวน #val# " );

$g->title( 'PT and SPT Facebook Post Raking', '{font-size:18px; color: #d01f3c}' );
echo $g->render();
?>
    	
    	?>