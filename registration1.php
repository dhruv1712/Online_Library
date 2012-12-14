<?php require_once("common/connection.php");?>
<?php require_once("common/functions.php");?>
<?php require_once("common/form_functions.php");?>
<?php
	$errors =array();
	$required_fields = array('username', 'name', 'email', 'pass1');
	foreach($required_fields as $fieldname){
		if (!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
			$errors[] = $fieldname;
		}
	}
	
	$fields_with_lengths = array('username' => 50, 'name' => 50, 'email' => 50, 'pass1' => 50);
	foreach($fields_with_lengths as $fieldname => $maxlength){
		if(strlen(trim(mysql_prep($_POST[$fieldname]))) > $maxlength){
			$errors[] = $fieldname;
		}
	}
	
	if (!empty($errors)){
		//redirect_to("registration.php");
	}
	
	$role = "Student";
	$username = trim(mysql_prep($_POST['username']));
	$name = ucfirst(trim(mysql_prep($_POST['name'])));
	$password = ucfirst(trim(mysql_prep($_POST['pass1'])));;
	$passhash = sha1($password);
	$email = trim(mysql_prep($_POST['email']));
	$created_date = date('Y-m-d H:i:s');
	
	$qry="select id from user where username='".$username."'";
	$rschk=mysql_query($qry);
	confirm_query($rschk);
	
	if(mysql_num_rows($rschk)==0){
		$query = "insert into user 
					(name, username, passhash, email, role, created_date) values 
					('".$name."',  '".$username."', '".$passhash."', '".$email."', '".$role."', '".$created_date."')";
		//echo $query."<br>";
		$result = mysql_query($query,$conn);
		if($result){
			echo "you have successfully registered with online library with username <b>".$username."</b>.";
			redirect_to("register_success.php");
		}else{
			echo "<p>User creation failed.</p>";
			echo "<p>". mysql_error() ."</p>";
		}
	}else{
		echo "<p>Username already exist.</p>";
	}
?>
<?php if(isset($conn)) mysql_close($conn);?>
