<?php
include 'php-ofc-library/open-flash-chart.php';
	$user_id = $_REQUEST['fb_id'];
	$user_name = $_REQUEST['name'];
	   include("sql_setting.php");
	  mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
      $query = mysql_query("SELECT * FROM `facebook_status` WHERE from_id='$user_id' AND created_time LIKE '%2013-01-14%'") or die(mysql_error());
      $result1 = mysql_num_rows($query);
      $query = mysql_query("SELECT * FROM `facebook_status` WHERE from_id='$user_id' AND created_time LIKE '%2013-01-15%'") or die(mysql_error());
      $result2 = mysql_num_rows($query);
      $query = mysql_query("SELECT * FROM `facebook_status` WHERE from_id='$user_id' AND created_time LIKE '%2013-01-16%'") or die(mysql_error());
      $result3 = mysql_num_rows($query);
      $query = mysql_query("SELECT * FROM `facebook_status` WHERE from_id='$user_id' AND created_time LIKE '%2013-01-17%'") or die(mysql_error());
      $result4 = mysql_num_rows($query);
      $query = mysql_query("SELECT * FROM `facebook_status` WHERE from_id='$user_id' AND created_time LIKE '%2013-01-18%'") or die(mysql_error());
      $result5 = mysql_num_rows($query);
      $query = mysql_query("SELECT * FROM `facebook_status` WHERE from_id='$user_id' AND created_time LIKE '%2013-01-19%'") or die(mysql_error());
      $result6 = mysql_num_rows($query);
      $query = mysql_query("SELECT * FROM `facebook_status` WHERE from_id='$user_id' AND created_time LIKE '%2013-01-20%'") or die(mysql_error());
      $result7 = mysql_num_rows($query);
      $query = mysql_query("SELECT * FROM `facebook_status` WHERE from_id='$user_id' AND created_time LIKE '%2013-01-21%'") or die(mysql_error());
      $result8 = mysql_num_rows($query);
      $query = mysql_query("SELECT * FROM `facebook_status` WHERE from_id='$user_id' AND created_time LIKE '%2013-01-22%'") or die(mysql_error());
      $result9 = mysql_num_rows($query);
      $query = mysql_query("SELECT * FROM `facebook_status` WHERE from_id='$user_id' AND created_time LIKE '%2013-01-23%'") or die(mysql_error());
      $result10 = mysql_num_rows($query);
      $query = mysql_query("SELECT * FROM `facebook_status` WHERE from_id='$user_id' AND created_time LIKE '%2013-01-24%'") or die(mysql_error());
      $result11 = mysql_num_rows($query);
      $query = mysql_query("SELECT * FROM `facebook_status` WHERE from_id='$user_id' AND created_time LIKE '%2013-01-25%'") or die(mysql_error());
      $result12 = mysql_num_rows($query);
      
       
$data_1 = array($result1,$result2,$result3,$result4,$result5,$result6,$result7,$result8,$result9,$result10,$result11,$result12);



$g = new graph();
$g->title( '' . $user_name . ' Total use Facebook', '{font-size: 20px; color: #736AFF}' );

// we add 3 sets of data:
$g->set_data( $data_1 );


$g->line_hollow( 2, 4, '0x80a033', 'การใช้งาน', 10 );

$g->set_x_labels( array( '14 January 2013','15 January 2013','16 January 2013','17 January 2013','18 January 2013','19 January 2013','20 January 2013','21 January 2013','22 January 2013','23 January 2013','24 January 2013','25 January 2013' ) );
$g->set_x_label_style( 10, '0x000000', 0, 2 );

$g->set_y_max( 40 );
$g->y_label_steps( 4 );
$g->set_y_legend( 'ปริมาณการใช้', 12, '#736AFF' );
echo $g->render();
?>