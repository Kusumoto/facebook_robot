<link rel="stylesheet" type="text/css" href="./css/tagcloud.css" />

<div>

	<?
include 'classes/tagcloud.php';
ini_set('display_errors','on');

	  $sql_host = "localhost";
      $sql_user = "joke_kusumoto";
      $sql_pass = "kusumoto$#@!";
      $sql_db = "joke_kfacebook";
      
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
$myCloud = $cloud->render('array');
if (is_array($myCloud)) {
    foreach ($myCloud as $key => $value) {
        echo ' <a href="showresult.php?result='.urlencode($value['tag']).'">'.'<font size=2.'.($value['range']).'>'.$value['tag'].'</a></font>';
    }
}

	?>

</div>