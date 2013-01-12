<?php

include 'php-ofc-library/open-flash-chart.php';

	  include("sql_setting.php");
      
	  mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
      
        $query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Web'") or die(mysql_error());
    	$result1 = mysql_num_rows($query);
    	
        $query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Facebook for iPhone'") or die(mysql_error());
    	$result2 = mysql_num_rows($query);
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Facebook for iPad'") or die(mysql_error());
    	$result3 = mysql_num_rows($query);
        
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Facebook for Android'") or die(mysql_error());
    	$result4 = mysql_num_rows($query);    
    
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'iOS'") or die(mysql_error());
    	$result5 = mysql_num_rows($query);
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Twitter'") or die(mysql_error());
    	$result6 = mysql_num_rows($query);
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Socialcam'") or die(mysql_error());
    	$result7 = mysql_num_rows($query);
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Instagram'") or die(mysql_error());
    	$result8 = mysql_num_rows($query);
    	
		$query = mysql_query("SELECT * FROM `facebook_status` WHERE application != 'Socialcam' AND application != 'Twitter' AND application !='iOS' AND application != 'Facebook for Android' AND application != 'Facebook for iPad' AND application !='Facebook for iPhone'AND application != 'Web' AND application != 'Instagram' AND application != 'BlackBerry Smartphon' AND application != 'BlackBerry Smartphone' AND application != 'BlackBerry Smartphones App' AND application != 'Mobile' AND application != 'Facebook for Every Phone'") or die(mysql_error());
    	$result9 = mysql_num_rows($query);
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'BlackBerry Smartphone' OR application = 'BlackBerry Smartphon' OR application = 'BlackBerry Smartphones App'") or die(mysql_error());
    	$result10 = mysql_num_rows($query);
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Mobile'") or die(mysql_error());
    	$result11 = mysql_num_rows($query);
    	
    	$query = mysql_query("SELECT * FROM `facebook_status` WHERE application = 'Facebook for Every Phone'") or die(mysql_error());
    	$result12 = mysql_num_rows($query);
/*    	
$title = new title( 'PT and SPT Facebook Client Use' );

$pie = new pie();
$pie->set_start_angle( 35 );
$pie->set_animate( true );
$pie->set_tooltip( '#val# of #total#<br>#percent# of 100%' );
$pie->set_values( array(new pie_value($result1, "Web ($result1)"),new pie_value($result2, "Facebook for iPhone ($result2)"),new pie_value($result3, "Facebook for iPad ($result3)"),new pie_value($result4, "Facebook for Android ($result4)"),new pie_value($result5, "iOS ($result5)"),new pie_value($result6, "Twitter ($result6)"),new pie_value($result7, "Socialcam ($result7)"),new pie_value($result8, "Instagram ($result8)"),new pie_value($result9, "BlackBerry Smartphone ($result10)"),new pie_value($result9, "Other ($result9)")));
$pie->pie_slice_colours( array('#FF0000','#00FF00','#0000FF') );

$chart = new open_flash_chart();
$chart->set_title( $title );
$chart->add_element( $pie );


$chart->x_axis = null;

echo $chart->toPrettyString();
*/
/*include_once( 'php-ofc-library/open-flash-chart.php' );
$g = new graph();

//
// PIE chart, 60% alpha
//
$g->pie(60,'#505050','{font-size: 12px; color: #404040;');
//
// pass in two arrays, one of data, the other data labels
//
$g->pie_values( $result1,$result2,$result3,$result4,$result5,$result6,$result7,$result8,$result9,$result10 , array('Web','Facebook for iPhone','Facebook for iPad','Facebook for Android','iOS','Twitter','Socialcam','Instagram','Other','BlackBerry'));

//
// Colours for each slice, in this case some of the colours
// will be re-used (3 colurs for 5 slices means the last two
// slices will have colours colour[0] and colour[1]):
//
$g->pie_slice_colours( array('#d01f3c','#356aa0','#C79810') );

$g->set_tool_tip( '#val#%' );

$g->title( 'PT and SPT Facebook Client Use', '{font-size:18px; color: #d01f3c}' );
echo $g->render();
?>
*/


// generate some random data
srand((double)microtime()*1000000);

$data = array();
for( $i=0; $i<5; $i++ )
{
  $data[] = rand(5,15);
}

include_once( 'php-ofc-library/open-flash-chart.php' );
$g = new graph();

//
// PIE chart, 60% alpha
//
$g->pie(60,'#505050','{font-size: 12px; color: #404040;');
//
// pass in two arrays, one of data, the other data labels
//
$g->pie_values( array($result1,$result2,$result3,$result4,$result5,$result6,$result7,$result8,$result9,$result10,$result11,$result12), array('Web','Facebook for iPhone','Facebook for iPad','Facebook for Android','iOS','Twitter','Socialcam','Instagram','Other','BlackBerry','Mobile Web','FBJava App') );
//
// Colours for each slice, in this case some of the colours
// will be re-used (3 colurs for 5 slices means the last two
// slices will have colours colour[0] and colour[1]):
//
$g->pie_slice_colours( array('#d01f3c','#356aa0','#C79810','#5FEFEF','#6CB72F','#F97720','#DDFF7F') );

$g->set_tool_tip( "#x_label# <br>จำนวน #val# " );

$g->title( 'PT and SPT Facebook Client Use', '{font-size:18px; color: #d01f3c}' );
echo $g->render();
?>