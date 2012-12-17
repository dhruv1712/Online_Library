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
	
	//---------------------------------Country-------------------------------------------
	function get_all_country($order){
		global $conn;
		$query = "select * from country order by ". $order ;
		$countries=mysql_query($query,$conn);
		confirm_query($countries);
		return $countries;
	}
	
	function get_country_by_id($id){
		global $conn;
		$query = "select * from country where id='".$id."' ";
		$country=mysql_query($query,$conn);
		confirm_query($country);
		return $country;
	}
	
	function get_country_without_vat($order){
		global $conn;
		$query = "SELECT *
					FROM country
					WHERE NOT id
					IN (
						SELECT vat.country_id
						FROM vat
						ORDER BY country_id
					)
					ORDER BY ". $order;
		$countries=mysql_query($query,$conn);
		confirm_query($countries);
		return $countries;
	}
	
	function get_country_without_currency($order){
		global $conn;
		$query = "SELECT *
					FROM country
					WHERE NOT id
					IN (
						SELECT currency.country_id
						FROM currency
						ORDER BY country_id
					)
					ORDER BY ". $order;
		$countries=mysql_query($query,$conn);
		confirm_query($countries);
		return $countries;
	}
	
	function get_country_without_rate_range($order){
		global $conn;
		$query = "SELECT *
					FROM country
					WHERE NOT id
					IN (
						SELECT rate_range.country_id
						FROM rate_range
						ORDER BY country_id
					)
					ORDER BY ". $order;
		$countries=mysql_query($query,$conn);
		confirm_query($countries);
		return $countries;
	}
	
	//---------------------------------Role-------------------------------------------
	function get_all_role($order){
		global $conn;
		$query = "select * from role order by ". $order ;
		$roles=mysql_query($query,$conn);
		confirm_query($roles);
		return $roles;
	}
	
	function get_role_by_id($id){
		global $conn;
		$query = "select * from role where id='".$id."' ";
		$role=mysql_query($query,$conn);
		confirm_query($role);
		return $role;
	}
	
	//---------------------------------Unit-------------------------------------------
	function get_all_unit($order){
		global $conn;
		$query = "select * from unit order by ". $order ;
		$units=mysql_query($query,$conn);
		confirm_query($units);
		return $units;
	}
	
	function get_unit_by_id($id){
		global $conn;
		$query = "select * from unit where id='".$id."' ";
		$unit=mysql_query($query,$conn);
		confirm_query($unit);
		return $unit;
	}
	
	//---------------------------------PMS-------------------------------------------
	function get_all_pms($order){
		global $conn;
		$query = "select * from pms order by ". $order ;
		$pmses=mysql_query($query,$conn);
		confirm_query($pmses);
		return $pmses;
	}
	
	function get_pms_by_id($id){
		global $conn;
		$query = "select * from pms where id='".$id."' ";
		$pms=mysql_query($query,$conn);
		confirm_query($pms);
		return $pms;
	}
	
	//---------------------------------Facility-------------------------------------------
	function get_all_facility($order){
		global $conn;
		$query = "select * from facility order by ". $order ;
		$facilities=mysql_query($query,$conn);
		confirm_query($facilities);
		return $facilities;
	}
	
	function get_facility_by_id($id){
		global $conn;
		$query = "select * from facility where id='".$id."' ";
		$facility=mysql_query($query,$conn);
		confirm_query($facility);
		return $facility;
	}
	
	//---------------------------------Status-------------------------------------------
	function get_all_status($order){
		global $conn;
		$query = "select * from status order by ". $order ;
		$statuses=mysql_query($query,$conn);
		confirm_query($statuses);
		return $statuses;
	}
	
	function get_status_by_id($id){
		global $conn;
		$query = "select * from status where id='".$id."' ";
		$status=mysql_query($query,$conn);
		confirm_query($status);
		return $status;
	}
	
	//---------------------------------Type-------------------------------------------
	function get_all_type($order){
		global $conn;
		$query = "select * from type order by ". $order ;
		$types=mysql_query($query,$conn);
		confirm_query($types);
		return $types;
	}
	
	function get_type_by_id($id){
		global $conn;
		$query = "select * from type where id='".$id."' ";
		$type=mysql_query($query,$conn);
		confirm_query($type);
		return $type;
	}
	
	//---------------------------------Star-------------------------------------------
	function get_all_star($order){
		global $conn;
		$query = "select * from star order by ". $order ;
		$stars=mysql_query($query,$conn);
		confirm_query($stars);
		return $stars;
	}
	
	function get_star_by_id($id){
		global $conn;
		$query = "select * from star where id='".$id."' ";
		$star=mysql_query($query,$conn);
		confirm_query($star);
		return $star;
	}
	
	//---------------------------------Region-------------------------------------------
	function get_all_region($order){
		global $conn;
		$query = "SELECT country.country, region . *
					FROM region
					INNER JOIN country ON region.country_id = country.id
					ORDER BY ". $order ;
		$regions=mysql_query($query,$conn);
		confirm_query($regions);
		return $regions;
	}
	
	function get_region_by_country_id($country_id){
		global $conn;
		$query = "SELECT country.country, region . *
					FROM region
					INNER JOIN country ON region.country_id = country.id 
					where country.id='".$country_id."' ";
		$region=mysql_query($query,$conn);
		confirm_query($region);
		return $region;
	}
	
	function get_region_by_id($id){
		global $conn;
		$query = "SELECT country.country, region . *
					FROM region
					INNER JOIN country ON region.country_id = country.id 
					where region.id='".$id."' ";
		$region=mysql_query($query,$conn);
		confirm_query($region);
		return $region;
	}
	
	function get_region_without_compset_size($order){
		global $conn;
		$query = "SELECT *
					FROM region
					WHERE NOT id
					IN (
						SELECT compset_size.region_id
						FROM compset_size
						ORDER BY region_id
					)
					ORDER BY ". $order;
		$countries=mysql_query($query,$conn);
		confirm_query($countries);
		return $countries;
	}
	
	//---------------------------------City-------------------------------------------
	function get_all_city($order){
		global $conn;
		$query = "SELECT country.country, city . *
					FROM city
					INNER JOIN country ON city.country_id = country.id
					ORDER BY ". $order ;
		$cities=mysql_query($query,$conn);
		confirm_query($cities);
		return $cities;
	}
	
	function get_city_by_id($id){
		global $conn;
		$query = "SELECT country.country, city . *
					FROM city
					INNER JOIN country ON city.country_id = country.id 
					where city.id='".$id."' ";
		$city=mysql_query($query,$conn);
		confirm_query($city);
		return $city;
	}
	
	//---------------------------------Vat-------------------------------------------
	function get_all_vat($order){
		global $conn;
		$query = "SELECT country.country, vat . *
					FROM vat
					INNER JOIN country ON vat.country_id = country.id
					ORDER BY ". $order ;
		$vats=mysql_query($query,$conn);
		confirm_query($vats);
		return $vats;
	}
	
	function get_vat_by_id($id){
		global $conn;
		$query = "SELECT country.country, vat . *
					FROM vat
					INNER JOIN country ON vat.country_id = country.id 
					where vat.id='".$id."' ";
		$vat=mysql_query($query,$conn);
		confirm_query($vat);
		return $vat;
	}
	
	function get_vat_by_country_id($country_id){
		global $conn;
		$query = "SELECT country.country, vat . *
					FROM vat
					INNER JOIN country ON vat.country_id = country.id 
					where vat.country_id='".$country_id."' ";
		$vat=mysql_query($query,$conn);
		confirm_query($vat);
		return $vat;
	}
	
	//---------------------------------Currency-------------------------------------------
	function get_all_currency($order){
		global $conn;
		$query = "SELECT country.country, currency . *
					FROM currency
					INNER JOIN country ON currency.country_id = country.id
					ORDER BY ". $order ;
		$currencies=mysql_query($query,$conn);
		confirm_query($currencies);
		return $currencies;
	}
	
	function get_currency_by_id($id){
		global $conn;
		$query = "SELECT country.country, currency . *
					FROM currency
					INNER JOIN country ON currency.country_id = country.id 
					where currency.id='".$id."' ";
		$currency=mysql_query($query,$conn);
		confirm_query($currency);
		return $currency;
	}
	
	function get_currency_by_country_id($country_id){
		global $conn;
		$query = "SELECT country.country, currency . *
					FROM currency
					INNER JOIN country ON currency.country_id = country.id 
					where currency.country_id='".$country_id."' ";
		$currency=mysql_query($query,$conn);
		confirm_query($currency);
		return $currency;
	}
	
	//---------------------------------compset_size-------------------------------------------
	function get_all_compset_size($order){
		global $conn;
		$query = "SELECT region.region, region.priority, compset_size . *
					FROM compset_size
					INNER JOIN region ON compset_size.region_id = region.id
					ORDER BY ". $order ;
		$compset_sizes=mysql_query($query,$conn);
		confirm_query($compset_sizes);
		return $compset_sizes;
	}
	
	function get_compset_size_by_id($id){
		global $conn;
		$query = "SELECT region.region, region.priority, compset_size . *
					FROM compset_size
					INNER JOIN region ON compset_size.region_id = region.id 
					where compset_size.id='".$id."' ";
		$compset_size=mysql_query($query,$conn);
		confirm_query($compset_size);
		return $compset_size;
	}
	
	function get_compset_size_by_region_id($region_id){
		global $conn;
		$query = "SELECT region.region, region.priority, compset_size . *
					FROM compset_size
					INNER JOIN region ON compset_size.region_id = region.id 
					where compset_size.region_id='".$region_id."' ";
		$compset_size=mysql_query($query,$conn);
		confirm_query($compset_size);
		return $compset_size;
	}
	
	//---------------------------------User-------------------------------------------
	function get_all_user($order){
		global $conn;
		$query = "SELECT role.role, status.status, 
					(SELECT country
						FROM country
						WHERE country.id = city.country_id) AS country, 
					city.city, user . *
					FROM user
					INNER JOIN role ON user.role_id = role.id
					INNER JOIN status ON user.status_id = status.id
					INNER JOIN city ON user.city_id = city.id
					ORDER BY ". $order ;
		$users=mysql_query($query,$conn);
		confirm_query($users);
		return $users;
	}
	
	function get_user_by_id($id){
		global $conn;
		$query = "SELECT role.role, status.status, 
					(SELECT country
						FROM country
						WHERE country.id = city.country_id) AS country, 
					city.city, user . *
					FROM user
					INNER JOIN role ON user.role_id = role.id
					INNER JOIN status ON user.status_id = status.id
					INNER JOIN city ON user.city_id = city.id 
					where user.id='".$id."' ";
		$user=mysql_query($query,$conn);
		confirm_query($user);
		return $user;
	}
	
	function get_user_by_role($role_id){
		global $conn;
		$query = "SELECT role.role, status.status, 
					(SELECT country
						FROM country
						WHERE country.id = city.country_id) AS country, 
					city.city, user . *
					FROM user
					INNER JOIN role ON user.role_id = role.id
					INNER JOIN status ON user.status_id = status.id
					INNER JOIN city ON user.city_id = city.id 
					where user.role_id='".$role_id."' ";
		$user=mysql_query($query,$conn);
		confirm_query($user);
		return $user;
	}
	
	function get_user_by_status($status_id){
		global $conn;
		$query = "SELECT property.property, user.username, region.region , user.id
					FROM user
					INNER JOIN property ON property.user_id = user.id
					INNER JOIN region ON property.region_id = region.id
					where user.status_id='".$status_id."'
					order by property.property";
		$user=mysql_query($query,$conn);
		confirm_query($user);
		return $user;
	}
	
	function get_all_user_without_data_this_week(){
		global $conn;
		$timeStamp = StrToTime("monday this week");
		$add_days = StrToTime('13 days', $timeStamp);
		$last_date = date('Y-m-d', $add_days);
		$query = "SELECT email, firstname, othername, property
					FROM user
					INNER JOIN property ON property.user_id = user.id
					where user.status_id='2' 
					AND property.id not in (select property_id 
												FROM units_sold 
												WHERE transdate = '".$last_date."')					
					order by user.id";
		$users=mysql_query($query,$conn);
		confirm_query($users);
		return $users;
	}
	
	//---------------------------------property-------------------------------------------
	function get_all_property($order){
		global $conn;
		$query = "SELECT user.username, user.firstname, user.othername, user.email, user.phone, user.address, 
					city.city, status.status, region.region, region.country_id, country.country, star.star, rate_range.min_rate, rate_range.max_rate,
					(SELECT pms
						FROM pms
						WHERE id = property.pms_id) AS pms,
					property . *
					FROM property
					INNER JOIN user ON user.id = property.user_id
					INNER JOIN city ON city.id = user.city_id
					INNER JOIN status ON status.id = user.status_id
					INNER JOIN region ON region.id = property.region_id
					INNER JOIN country ON country.id = region.country_id
					INNER JOIN star ON star.id = property.star_id
					INNER JOIN rate_range ON rate_range.star_id = property.star_id
											AND rate_range.country_id = country.id
					ORDER BY ". $order ;
		$properties=mysql_query($query,$conn);
		confirm_query($properties);
		return $properties;
	}
	
	function get_property_by_id($id){
		global $conn;
		$query = "SELECT user.username, user.firstname, user.othername, user.email, user.phone, user.address, 
					city.city, status.status, region.region, region.country_id, country.country, star.star, rate_range.min_rate, rate_range.max_rate,
					(SELECT pms
						FROM pms
						WHERE id = property.pms_id) AS pms,
					property . *
					FROM property
					INNER JOIN user ON user.id = property.user_id
					INNER JOIN city ON city.id = user.city_id
					INNER JOIN status ON status.id = user.status_id
					INNER JOIN region ON region.id = property.region_id
					INNER JOIN country ON country.id = region.country_id
					INNER JOIN star ON star.id = property.star_id
					INNER JOIN rate_range ON rate_range.star_id = property.star_id
											AND rate_range.country_id = country.id
					where property.id='".$id."'
					ORDER BY property.property ";
		$property=mysql_query($query,$conn);
		confirm_query($property);
		return $property;
	}
		
	function get_property_by_user_id($user_id){
		global $conn;
		$query = "SELECT user.username, user.firstname, user.othername, user.email, user.phone, user.address, 
					city.city, status.status, region.region, region.country_id, country.country, star.star, rate_range.min_rate, rate_range.max_rate,
					(SELECT pms
						FROM pms
						WHERE id = property.pms_id) AS pms,
					property . *
					FROM property
					INNER JOIN user ON user.id = property.user_id
					INNER JOIN city ON city.id = user.city_id
					INNER JOIN status ON status.id = user.status_id
					INNER JOIN region ON region.id = property.region_id
					INNER JOIN country ON country.id = region.country_id
					INNER JOIN star ON star.id = property.star_id
					INNER JOIN rate_range ON rate_range.star_id = property.star_id
											AND rate_range.country_id = country.id
					where property.user_id='".$user_id."'
					ORDER BY property.property ";
		$property=mysql_query($query,$conn);
		confirm_query($property);
		return $property;
	}
	
	function get_property_for_compset($id, $region_id){
		global $conn;
		$query = "SELECT user.username, user.firstname, user.othername, user.email, user.phone, user.address, 
					city.city, status.status, region.region, region.country_id, country.country, star.star, rate_range.min_rate, rate_range.max_rate, property_unit.max_unit, 
					(SELECT pms
						FROM pms
						WHERE id = property.pms_id) AS pms,
					property . *
					FROM property
					INNER JOIN user ON user.id = property.user_id
					INNER JOIN city ON city.id = user.city_id
					INNER JOIN status ON status.id = user.status_id
					INNER JOIN region ON region.id = property.region_id
					INNER JOIN country ON country.id = region.country_id
					INNER JOIN star ON star.id = property.star_id
					INNER JOIN property_unit ON property_unit.property_id = property.id and property_unit.unit_id = '1'
					INNER JOIN rate_range ON rate_range.star_id = property.star_id
											AND rate_range.country_id = country.id
					where not property.id='".$id."'
						AND property.region_id='".$region_id."' AND user.status_id='2'
					ORDER BY property.property ";
		$property=mysql_query($query,$conn);
		confirm_query($property);
		return $property;
	}
	
	function get_property_for_compset_by_star($id, $region_id, $star_id){
		global $conn;
		$query = "SELECT user.username, user.firstname, user.othername, user.email, user.phone, user.address, 
					city.city, status.status, region.region, region.country_id, country.country, star.star, rate_range.min_rate, rate_range.max_rate, property_unit.max_unit, 
					(SELECT pms
						FROM pms
						WHERE id = property.pms_id) AS pms,
					property . *
					FROM property
					INNER JOIN user ON user.id = property.user_id
					INNER JOIN city ON city.id = user.city_id
					INNER JOIN status ON status.id = user.status_id
					INNER JOIN region ON region.id = property.region_id
					INNER JOIN country ON country.id = region.country_id
					INNER JOIN star ON star.id = property.star_id
					INNER JOIN property_unit ON property_unit.property_id = property.id and property_unit.unit_id = '1'
					INNER JOIN rate_range ON rate_range.star_id = property.star_id
											AND rate_range.country_id = country.id
					where not property.id='".$id."'
						AND property.region_id='".$region_id."' 
						AND property.star_id='".$star_id."' 
						AND user.status_id='2'
					ORDER BY property.property ";
		$property=mysql_query($query,$conn);
		confirm_query($property);
		return $property;
	}
	function get_property_for_compset_by_reporting_type($id, $region_id, $reporting_type_id){
		global $conn;
		$query = "SELECT user.username, user.firstname, user.othername, user.email, user.phone, user.address, 
					city.city, status.status, region.region, region.country_id, country.country, star.star, rate_range.min_rate, rate_range.max_rate, property_unit.max_unit, 
					(SELECT pms
						FROM pms
						WHERE id = property.pms_id) AS pms,
					property . *
					FROM property
					INNER JOIN user ON user.id = property.user_id
					INNER JOIN city ON city.id = user.city_id
					INNER JOIN status ON status.id = user.status_id
					INNER JOIN region ON region.id = property.region_id
					INNER JOIN country ON country.id = region.country_id
					INNER JOIN star ON star.id = property.star_id
					INNER JOIN property_unit ON property_unit.property_id = property.id and property_unit.unit_id = '1'
					INNER JOIN rate_range ON rate_range.star_id = property.star_id
											AND rate_range.country_id = country.id
					where not property.id='".$id."'
						AND property.region_id='".$region_id."' 
						AND property.reporting_type_id='".$reporting_type_id."' 
						AND user.status_id='2'
					ORDER BY property.property ";
		$property=mysql_query($query,$conn);
		confirm_query($property);
		return $property;
	}
	
	//---------------------------------property_unit-------------------------------------------
	function get_property_unit_by_property_and_unit($property_id, $unit_id){
		global $conn;
		$query = "SELECT property.property, unit.id AS unitId, unit.unit, property_unit.max_unit
					FROM property_unit
					INNER JOIN unit ON unit.id = property_unit.unit_id
					INNER JOIN property ON property.id = property_unit.property_id
					WHERE property_id ='".$property_id."' 
						AND unit_id ='".$unit_id."'
					LIMIT 1";
		$property_units=mysql_query($query,$conn);
		confirm_query($property_units);
		return $property_units;
	}
	
	//---------------------------------property_facility-------------------------------------------
	function get_property_facility_by_property($property_id){
		global $conn;
		$query = "SELECT property.property, facility.id AS facilityId, facility.facility
					FROM property_facility
					INNER JOIN facility ON facility.id = property_facility.facility_id
					INNER JOIN property ON property.id = property_facility.property_id
					WHERE property_id ='".$property_id."'
					ORDER BY facility.facility ";
		$property_facilities=mysql_query($query,$conn);
		confirm_query($property_facilities);
		return $property_facilities;
	}
	
	function get_property_facility_by_property_and_facility($property_id, $facility_id){
		global $conn;
		$query = "SELECT property.property, facility.id AS facilityId, facility.facility
					FROM property_facility
					INNER JOIN facility ON facility.id = property_facility.facility_id
					INNER JOIN property ON property.id = property_facility.property_id
					WHERE property_id ='".$property_id."' 
						AND facility_id ='".$facility_id."'
					LIMIT 1 ";
		$property_facilities=mysql_query($query,$conn);
		confirm_query($property_facilities);
		return $property_facilities;
	}
	
	//---------------------------------property_type-------------------------------------------
	function get_property_type_by_property($property_id){
		global $conn;
		$query = "SELECT property.property, type.id AS typeId, type.type
					FROM property_type
					INNER JOIN type ON type.id = property_type.type_id
					INNER JOIN property ON property.id = property_type.property_id
					WHERE property_id ='".$property_id."'
					ORDER BY type.type ";
		$property_facilities=mysql_query($query,$conn);
		confirm_query($property_facilities);
		return $property_facilities;
	}
	
	function get_property_type_by_property_and_type($property_id, $type_id){
		global $conn;
		$query = "SELECT property.property, type.id AS typeId, type.type
					FROM property_type
					INNER JOIN type ON type.id = property_type.type_id
					INNER JOIN property ON property.id = property_type.property_id
					WHERE property_id ='".$property_id."' 
						AND type_id ='".$type_id."'
					LIMIT 1 ";
		$property_facilities=mysql_query($query,$conn);
		confirm_query($property_facilities);
		return $property_facilities;
	}
	
	//---------------------------------units_sold-------------------------------------------
	function get_units_sold_status($transdate, $property_id, $unit_id){
		global $conn;
		$query = "SELECT id
					FROM units_sold
					WHERE transdate = '".$transdate."'
						AND property_id = '".$property_id."'
						AND unit_id = '".$unit_id."'
					Limit 1";
		$status=mysql_query($query,$conn);
		confirm_query($status);
		return $status;
	}
	
	function check_units_sold_status($entered_date, $property_id){
		global $conn;
		$timeStamp = StrToTime("monday this week");
		$add_days = StrToTime('13 days', $timeStamp);
		$last_date = date('Y-m-d', $add_days);
		$query = "SELECT id
					FROM units_sold
					WHERE transdate = '".$last_date."'
						AND property_id = '".$property_id."'
					Limit 1";
		$status=mysql_query($query,$conn);
		confirm_query($status);
		if(mysql_num_rows($status) == 1){
			return 1;
		}else{
			return 0;
		}
	}
	
	function check_units_sold_status_of_region($entered_date, $region_id, $limit){
		global $conn;
		$timeStamp = StrToTime("monday this week");
		$add_days = StrToTime('13 days', $timeStamp);
		$last_date = date('Y-m-d', $add_days);
		$query = "SELECT distinct(property_id)
					FROM units_sold
					WHERE transdate = '".$last_date."'
						AND property_id in (
							select id from property where region_id='".$region_id."')";
		$status=mysql_query($query,$conn);
		confirm_query($status);
		if(mysql_num_rows($status) >= $limit){
			return 1;
		}else{
			return 0;
		}
	}
	
	function get_units_sold_for_property($property_id, $unit_id, $start_date, $end_date){
		global $conn;
		$query = "SELECT *
					FROM units_sold
					WHERE property_id = '".$property_id."'
						AND unit_id = '".$unit_id."'
						AND transdate between '".$start_date."' and '".$end_date."'
					ORDER BY transdate";
		$units_sold=mysql_query($query,$conn);
		confirm_query($units_sold);
		return $units_sold;
	}
	
	function get_occ_rate_revpar_for_property($property_id, $unit_id, $start_date, $end_date){
		global $conn;
		$query = "SELECT units_sold.property_id, 
					round(((sum(unit_sold)/sum(max_unit))*100), 2) as occupancy,
					round((sum(unit_sold * avg_rate)/sum(unit_sold)), 2) as rate,
					round(((sum(unit_sold)*(round((sum(unit_sold * avg_rate)/sum(unit_sold)), 2)))/sum(max_unit)), 2) as revpar
				From units_sold 
				INNER JOIN property_unit on units_sold.property_id=property_unit.property_id  
				WHERE units_sold.property_id ='".$property_id."' 
					AND units_sold.unit_id = '".$unit_id."' 
					AND not units_sold.unit_sold = '0' 
					AND transdate between '".$start_date."' and '".$end_date."' 
				Group BY units_sold.property_id";
		$units_sold=mysql_query($query,$conn);
		confirm_query($units_sold);
		return $units_sold;
	}
	
	
	
	//---------------------------------rate_range-------------------------------------------
	function get_all_rate_range($order){
		global $conn;
		$query = "SELECT country.country, star.star, rate_range . *
					FROM rate_range
					INNER JOIN star ON star.id = rate_range.star_id
					INNER JOIN country ON country.id = rate_range.country_id
					ORDER BY ". $order ;
		$rate_ranges=mysql_query($query,$conn);
		confirm_query($rate_ranges);
		return $rate_ranges;
	}
	
	function get_rate_range_by_country_and_star($country_id, $star_id){
		global $conn;
		$query = "SELECT country.country, star.star, rate_range . *
					FROM rate_range
					INNER JOIN star ON star.id = rate_range.star_id
					INNER JOIN country ON country.id = rate_range.country_id
					WHERE country_id = '".$country_id."'
						AND star_id = '".$star_id."'" ;
		$rate_range=mysql_query($query,$conn);
		confirm_query($rate_range);
		return $rate_range;
	}
	
	//---------------------------------pool-------------------------------------------
	function get_all_pool($order){
		global $conn;
		$query = "SELECT user.*, property.property, pool . *
					FROM pool
					INNER JOIN user ON user.id = pool.user_id
					INNER JOIN property ON property.id = pool.property_id
					ORDER BY ". $order ;
		$pools=mysql_query($query,$conn);
		confirm_query($pools);
		return $pools;
	}
	
	//---------------------------------compset_history-------------------------------------------
	function get_compset_history_by_property($property_id){
		global $conn;
		$query = "SELECT p1.property, p2.property AS competitor, p2.id AS competitor_id, compset_history . *
					FROM compset_history
					INNER JOIN property AS p1 ON p1.id = compset_history.property_id
					INNER JOIN property AS p2 ON p2.id = compset_history.comp_property_id
					WHERE property_id =  '".$property_id."'
					ORDER BY start_date, end_date " ;
		$compset_history=mysql_query($query,$conn);
		confirm_query($compset_history);
		return $compset_history;
	}
	
	function get_compset_history_by_property_and_type_and_today($property_id, $Compset_type, $today){
		global $conn;
		$query = "SELECT p1.property, p2.property AS competitor, p2.id AS competitor_id, compset_history . *
					FROM compset_history
					INNER JOIN property AS p1 ON p1.id = compset_history.property_id
					INNER JOIN property AS p2 ON p2.id = compset_history.comp_property_id
					WHERE property_id =  '".$property_id."' 
						and Compset_type =  '".$Compset_type."'
						and start_date <=  '".$today."'
						and end_date >=  '".$today."'
					ORDER BY start_date, end_date " ;
		$compset_history=mysql_query($query,$conn);
		confirm_query($compset_history);
		return $compset_history;
	}
	
	//---------------------------------Financial Partner-------------------------------------------
	function get_all_financial_partner($order){
		global $conn;
		$query = "select * from financial_partner order by ". $order ;
		$countries=mysql_query($query,$conn);
		confirm_query($countries);
		return $countries;
	}
	
	function get_financial_partner_by_id($id){
		global $conn;
		$query = "select * from financial_partner where id='".$id."' ";
		$financial_partner=mysql_query($query,$conn);
		confirm_query($financial_partner);
		return $financial_partner;
	}
	
	//---------------------------------avg_rate with/without vat-------------------------------------------
	function with_vat($avg_rate, $vat){
		$with_vat = number_format(($avg_rate + (($vat * $avg_rate)/100)),2);
		return $with_vat;
	}
	
	function without_vat($avg_rate, $vat){
		$without_vat = number_format((($avg_rate * 100)/(100 + $vat)),2);
		return $without_vat;
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
	
	//---------------------------------isMonday-------------------------------------------
	function isMonday(){
		$timeStamp = StrToTime("monday this week");
		$monday = date('Y-m-d', $timeStamp);
		$timeStamp = StrToTime("today");
		$today = date('Y-m-d', $timeStamp);
		if($today == $monday){
			return true;
		}else{
			return false;
		}
	}
?> 