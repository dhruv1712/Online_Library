// <?php
//	define("DB_SERVER","int.instance34525.db.xeround.com.:3107");
//	define("DB_USER","50cf192bdc6e4");
//	define("DB_Pass","8da6f5a847973b7f797ad029613a183fc5abc5c9");
//	define("DB_NAME","orchestra");
// ?>


<?php
  $con = mysql_pconnect("int.instance34525.db.xeround.com.:3107");
  if (!$con)
    die('Could not connect: ' . mysql_error());
  mysql_select_db("mydb");

 
?>
