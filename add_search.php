<?php 
require_once("common/connection.php");
require_once("common/functions.php");
require_once("common/form_functions.php");

$link = $_REQUEST['link'];
$name = $_REQUEST['name'];
$author = $_REQUEST['author'];
$rating = $_REQUEST['rating'];

echo $link;
if(isset($conn)) mysql_close($conn);

?>