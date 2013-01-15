<link rel="stylesheet" type="text/css" href="tag-cloud-master/css/tagcloud.css" />

<div>

	<?
include 'tag-cloud-master/classes/tagcloud.php';
ini_set('display_errors','on');

	  include("sql_setting.php");
	  mysql_connect($sql_host,$sql_user,$sql_pass)or die("Error SQL Server");
      mysql_select_db("$sql_db");
      mysql_query("set names utf8");
    $cloud = new tagcloud();
	$getBooks = mysql_query("SELECT message FROM `facebook_status`");
	if ($getBooks) {
    while ($rowBooks = mysql_fetch_assoc($getBooks)) {
        $cloud->addString($rowBooks['message']);
        
    }
}
//echo $cloud->render();
$myCloud = $cloud->render('array');
if (is_array($myCloud)) {
    foreach ($myCloud as $key => $value) {
        echo ' <a href="showresult.php?result='.urlencode($value['tag']).'" target="_blank">'.'<font size=3.'.($value['range']).' color=black>'.$value['tag'].'</a></font>';
    }
}
mysql_close();
	?>

</div>