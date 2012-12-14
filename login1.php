<?php require_once("common/session.php");?>
<?php require_once("common/connection.php");?>
<?php require_once("common/functions.php");?>
<?php
	
	if(logged_in()){
		if($_SESSION['role'] == "Staff"){
			$first_page = "dashboard.php";
		}else{
			$first_page = "all_books.php";
		}
		redirect_to($first_page);
	}
	
	include("common/form_functions.php");
	
	
	$errors =array();
	
	$required_fields = array('username','password');
	$errors = array_merge($errors, check_required_fields($required_fields));
			
	$fields_with_lengths = array('username' => 50, 'password' => 50);
	$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths));
		
	
	//echo $passhash."<br>";
			
	if (empty($errors)){
		$username = trim(mysql_prep($_POST['username']));
		$password = trim(mysql_prep($_POST['password']));
		$passhash = sha1($password);
		
		$query = "select id, username 
			from user 
			where username = '{$username}' and 
			passhash = '{$passhash}'
			limit 1";
		$result_set = mysql_query($query,$conn);
		confirm_query($result_set);
		if(mysql_num_rows($result_set) == 1){
			$found_user = mysql_fetch_array($result_set);
			
			$_SESSION['user_id'] = $found_user['id'];
			$_SESSION['username'] = $found_user['username'];
			
			$user=get_user_by_id($found_user['id']);
			$User=mysql_fetch_array($user);
			
			$_SESSION['name'] = ucfirst($User["name"]);
			$_SESSION['email'] = $User["email"];
			$_SESSION['role'] = ucfirst($User["role"]);
			
			if($_SESSION['role'] == "Staff"){
				$first_page = "dashboard.php";		
			}else{
				$first_page = "all_books.php";
			}
			redirect_to($first_page);
		}else{
			redirect_to("login.php?login=1");
			$message = "Username/Password combination incorrect.<br>
						Please make sure your caps lock key is off and try again.";
		}
	}else {
		if (count($errors) == 1) {
			$message = "There was 1 error in the form.";
		} else {
			$message = "There were " . count($errors) . " errors in the form.";
		}
	}
	
?>
<?php if(!empty($message)) {echo "<p class=\"mandatory\">". $message ."</p>";} ?>
					<?php if (!empty($errors)) {display_errors($errors);} ?>