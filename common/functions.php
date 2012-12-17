<?php
	function mysql_prep($value){
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists("mysql_real_escape_string");
		if($new_enough_php){
			if($magic_quotes_active){
				$value = stripslashes($value);
			}
			$value = mysql_real_escape_string($value);
		}else{
			if(!$magic_quotes_active){
				$value = addslashes($value);
			}
		}
		return $value;
	}
	
	function redirect_to($location = NULL){
		if($location != NULL){
			header("Location: {$location}");
			exit();
		}
	}
	
	function confirm_query($result_set)	{
		if(!$result_set)
			die("Databse query failed:" . mysql_error());
	}
	
	function database_change_date($givendate) {
		$cd = strtotime($givendate);
		$newdate = date('Y-m-d', mktime(date('h',$cd),
		date('i',$cd), date('s',$cd), date('m',$cd),
		date('d',$cd), date('Y',$cd)));
		return $newdate;
    }
			  
	function change_date($givendate) {
		$cd = strtotime($givendate);
		$newdate = date('d-M-Y', mktime(date('h',$cd),
		date('i',$cd), date('s',$cd), date('m',$cd),
		date('d',$cd), date('Y',$cd)));
		return $newdate;
	}
	
	function showmonth($monthid){
	  switch($monthid)
	   {
		case 1: return "January";
				break;
		case 2: return "February";
				break;
		case 3: return "March";
				break;	
		case 4: return "April";
				break;		
		case 5: return "May";
				break;		
		case 6: return "June";
				break;		
		case 7: return "July";
				break;					
		case 8: return "August";
				break;				
		case 9: return "September";
				break;		
		case 10: return "October";
				break;				
		case 11: return "November";
				break;				
		case 12: return "December";
				break;				
	   }
	}
	
	//---------------------------------calculate time difference-------------------------------------------
	function timeDiff($firstTime,$lastTime){

		// convert to unix timestamps
		$firstTime=strtotime($firstTime);
		$lastTime=strtotime($lastTime);

		// perform subtraction to get the difference (in seconds) between times
		$timeDiff=$lastTime-$firstTime;

		// return the difference
		return $timeDiff;
	}
	
	//---------------------------------Book-------------------------------------------
	function get_all_book($order){
		global $conn;
		$query = "select * from books order by ". $order ;
		$countries=mysql_query($query,$conn);
		confirm_query($countries);
		return $countries;
	}
	
	function get_book_by_id($id){
		global $conn;
		$query = "select * from books where id='".$id."' ";
		$country=mysql_query($query,$conn);
		confirm_query($country);
		return $country;
	}
	
	//---------------------------------User-------------------------------------------
	function get_all_user($order){
		global $conn;
		$query = "SELECT * FROM user ORDER BY ". $order ;
		$users=mysql_query($query,$conn);
		confirm_query($users);
		return $users;
	}
	
	function get_user_by_id($id){
		global $conn;
		$query = "SELECT * FROM user where id='".$id."' ";
		$user=mysql_query($query,$conn);
		confirm_query($user);
		return $user;
	}
	
	function get_user_by_role($role){
		global $conn;
		$query = "SELECT * From user where role='".$role."' ";
		$user=mysql_query($query,$conn);
		confirm_query($user);
		return $user;
	}


?>