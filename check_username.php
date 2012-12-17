<?php

	require_once("common/connection.php");
	require_once("common/functions.php");
	
	$username=trim($_GET["username"]);
	$qry="select id from user where username='".$username."'";
	$rschk=mysql_query($qry);
	confirm_query($rschk);
	if ($username=="undefined"){
		echo 1;
	}else{
		echo mysql_num_rows($rschk);
	}
	//echo $_GET["username"];
	
?>