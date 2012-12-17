//****************************************************Page Load**********************
function PageLoad(form,page){
    form.action=page;
	form.submit();
}

//***************************************************Check Mandatory**********************
function IsBlank(s){
	if(s.value == ""){
		alert("Fields marked with a red asterix (*) are mandatory.\nA value must be entered.");
		s.focus();
		return false;
	}
	return true;
}

//***************************************************Check Length**********************
function CheckLength(s,l){
	if(s.length > l){
		alert("Max. length for field is " + l + ".");
		s.focus();
		return false;
	}
	return true;
}

//***************************************************Max value**********************
function MaxValue(s, max){
	if(s.value > max){
		alert("The maximum value for this field is " + max + ".");
		s.value="";
		s.focus();
		return false;
	}
	return true;
}

//***************************************************Check Integer**********************
function IsInteger(s){
	var i;
    var validchars = "0123456789";
	for (i=0; i <s.value.length; i++){
		var letter = s.value.charAt(i).toUpperCase();
		if (validchars.indexOf(letter) != -1)
			continue;
		alert("This character that you entered: " + letter + " is not permitted. Please enter numeric values.");
		s.value="";
		s.focus();
		return false;
   }
   // All characters are numbers.
   return true;
}

//***************************************************Check PhoneNumber**********************
function IsPhoneNumber(s){
	var i;
    var validchars = "+0123456789";
	for (i=0; i <s.value.length; i++){
		var letter = s.value.charAt(i).toUpperCase();
		if (validchars.indexOf(letter) != -1)
			continue;
		alert("This character that you entered: " + letter + " is not permitted. Please enter numeric values or + sign for country prefix.");
		s.value="";
		s.focus();
		return false;
   }
   // All characters are numbers.
   return true;
}

//***************************************************Check Close**********************
function IsClose(s){
	var i;
    var validchars = "0123456789xX";
	for (i=0; i <s.value.length; i++){
		var letter = s.value.charAt(i).toUpperCase();
		if (validchars.indexOf(letter) != -1)
			continue;
		alert("This character that you entered: " + letter + " is not permitted. Please enter numeric values or 'x' for closed.");
		s.value="";
		s.focus();
		return false;
   }
   // All characters are numbers.
   return true;
}

//***************************************************Check Decimal**********************
function IsDecimal(s){
	var i;
	var data = s.value
	var dot = (data.split(".").length - 1)
	if(dot>1){
		alert("Please do not enter more than one '.' decimal point in this field.");
		s.value="";
		s.focus();
		return false;
	}
    var validchars = "0123456789.";
	for (i=0; i <s.value.length; i++){
		var letter = s.value.charAt(i).toUpperCase();
		if (validchars.indexOf(letter) != -1)
			continue;
		alert("This character that you entered: " + letter + " is not permitted. Please enter numeric values or '0' for closed.");
		s.value="";
		s.focus();
		return false;
   }
   // All characters are numbers.
   return true;
}

//***************************************************Check Email ID**********************
function IsEmail(str) {
	var at="@"
	var dot="."
	var lat=str.value.indexOf(at)
	var lstr=str.value.length
	var ldot=str.value.indexOf(dot)
	if (str.value == ""){return true;}
	if (str.value.indexOf(at)==-1){
	   alert("You must enter a valid e-mail address.");
	   str.focus();
	   return false;
	}
	if (str.value.indexOf(at)==-1 || str.value.indexOf(at)==0 || str.value.indexOf(at)==lstr){
	   alert("You must enter a valid e-mail address.");
	   str.focus();
	   return false;
	}
	if (str.value.indexOf(dot)==-1 || str.value.indexOf(dot)==0 || str.value.indexOf(dot)==lstr){
		alert("You must enter a valid e-mail address.");
		str.focus();
		return false;
	}
	if (str.value.indexOf(at,(lat+1))!=-1){
		alert("You must enter a valid e-mail address.");
		str.focus();
		return false;
	}
	/*if (str.value.substr.valueing(lat-1,lat)==dot || str.value.substring(lat+1,lat+2)==dot){
		alert("You must enter a valid e-mail address.");
		str.focus();
		return false;
	}*/
	if (str.value.indexOf(dot,(lat+2))==-1){
		alert("You must enter a valid e-mail address.");
		str.focus();
		return false;
	}
	if (str.value.indexOf(" ")!=-1){
		alert("You must enter a valid e-mail address.");
		str.focus();
		return false;
	}
	return true;
}

//****************************************************Check Date**********************
function IsDate(textobj){
	var newValue = textobj.value;
	var newLength = newValue.length;
	var fstSlash=newValue.indexOf("/");
	var lastSlash=newValue.lastIndexOf("/");
	var newSubValue
	newSubValue=newValue
	var i,count
	count=0
	if (textobj.value == ""){return true;}
	for(i=0;i<newSubValue.length;i++){	
		if(newSubValue.indexOf("/",i)!=-1){
			newSubValue=newSubValue.substring(newSubValue.indexOf("/",i),newSubValue.length)
			count=count+1;
		}
	}
	
	if(count!=2){
		if(count>2){
			alert("A date can contain only 2 \'/\'")
			textobj.focus();
			return false;
		}
		if(count<2){
			alert("A date must contain  2 \'/\'")
			textobj.focus();
			return false;
		}	
	}

	if((fstSlash==-1) | (lastSlash==-1)){
		alert("Please enter the date in a valid format")
		textobj.focus();
		return false;
	}
	
	if(newLength<8){
		alert("Please enter the date in a valid format")
		textobj.focus();
		return false;
	}

    var day = parseInt(newValue.substring(fstSlash+1,lastSlash));
    var month = parseInt(newValue.substring(0,fstSlash));

    var yearText=newValue.substring(lastSlash+1,lastSlash+5) // year in text format to check the length
    var year = parseInt(newValue.substring(lastSlash+1,lastSlash+5));  
    
// check for valid number of days
    
     if (day < 01 || day > 31){
			alert("Please Enter correct value for DAY in mm/DD/yyyy format");
			textobj.focus();
			return false
      }
	
// check for valid month
	
    if ((month < 01 ) || (month > 12)){
		alert("Please Enter correct value for MONTH in MM/dd/yyyy format");
		textobj.focus();
		return false
	}
      
// check year range
    
    if (year < 1800 || year > 2050 ){
		alert("Please Enter correct value for YEAR in mm/dd/YYYY format. \n   Year value only between 1800 and 2050 is acceptable. ");
		textobj.focus();
		return false
    }else if(yearText.length!=4){
		alert("Please Enter correct value for YEAR in mm/dd/YYYY format");
		textobj.focus();
		return false
    }
    

// check if it is mm/dd/yyyy format
    if(fstSlash==1){
		//alert("FstSlash=1, Last Slash=" + lastSlash)
        //if ((newValue.charAt(1) !="/" || newValue.charAt(2) !="/") || (newValue.charAt(3)!="/" || newValue.charAt(4)!="/" || newValue.charAt(5)!="/"))
        if(lastSlash!=3 && lastSlash!=4){
			alert("Please Enter in the MM/DD/YYYY format only");
			textobj.focus();
			return false
		}
	}else if(fstSlash==2){
		//alert("FstSlash=2, Last Slash=" + lastSlash)
        //if ((newValue.charAt(1) !="/" || newValue.charAt(2) !="/") || (newValue.charAt(3)!="/" || newValue.charAt(4)!="/" || newValue.charAt(5)!="/"))
        if((lastSlash!=4) && (lastSlash!=5)){
			alert("Please Enter in the MM/DD/YYYY format only");
			textobj.focus();
			return false
		}
	}else{
		alert("Please Enter a valid date format");
		textobj.focus();
		return false
	}
	
// check if the given month matches with the valid number of days in that month

	switch(month){
		case 01:
		case 03:
		case 05:
		case 07:
		case 08:
		case 10:
		case 12:
				if (day < 1 || day > 31){
					alert("Please Enter correct value for DAY in mm/DD/yyyy format.\n Check if you are giving correct number of days for the month");
					textobj.focus();
					return false
				}
				break;
		case 04:
		case 06:
		case 09:
		case 11:
				if (day < 1 || day > 30){
					alert("Please Enter correct value for DAY in mm/DD/yyyy format.\n Check if you are giving correct number of days for the month");
					textobj.focus();
					return false
				}
				break;
		case 02:
				if((year%4)==0){// if it is a LEAP YEAR
					if (day < 1 || day > 29){
						alert("Please Enter correct value for DAY in mm/DD/yyyy format.\n Check if you are giving correct number of days for the month");
						textobj.focus();
						return false
					}
				}else{
					if (day < 1 || day > 28){
						alert("Please Enter correct value for DAY in mm/DD/yyyy format.\n Check if you are giving correct number of days for the month");
						textobj.focus();
						return false
					}
				}	
				break;
		
	}
}

//****************************************************Confirm Password**********************
function CheckPassword(main,check){
	if(main.value=="")
	{
	alert("Please enter new password.")
	return false;
	} 
	if(check.value=="")
	{
	alert("Please confirm new password.")
	check.focus()
	return false;
	} 
	
	if(check.value!=main.value)
	{
	alert("Passwords do not match.")
	check.focus()
	return false;
	} 
}

//****************************************************Calulate Age**********************
function calulate_age(day,month,year,age){
	var day=day.value;
	var month=month.value;
	var year=year.value;
	if (day != "" && month != "" && year !=""){
		var currentDate = new Date()
		var cmonth = currentDate.getMonth() 
		var cday = currentDate.getDate()
		var cyear = currentDate.getFullYear()
		currentDate.setFullYear(cyear,cmonth,cday);
		var compDate = new Date()
		compDate.setFullYear(year,month,day);
		
		// The number of milliseconds in one day
		var ONE_YEAR = 1000 * 60 * 60 * 24 * 356

		// Convert both dates to milliseconds
		var date1_ms = currentDate.getTime()
		var date2_ms = compDate.getTime()

		// Calculate the difference in milliseconds
		var difference_ms = Math.abs(date1_ms - date2_ms)
		
		// Convert back to days and return
		var cal_age = Math.round(difference_ms/ONE_YEAR) -1
		age.value=cal_age;

	}
}

//****************************************************check Illegal Chars**********************
function checkIllegalChars(s){
	var i;
    var invalidchars = "\\ /?:(){}[]+¬~#$£€&%!\"";
	for (i=0; i <s.value.length; i++){
		var letter = s.value.charAt(i).toUpperCase();
		if (invalidchars.indexOf(letter) == -1){
			continue;
		}else if(letter == " "){
			alert("Please do not enter spaces in the Username.")
		}else{
			alert("Please do not enter this character: " + letter + " in the Username.\nPlease use alphabetic characters");
		}
		s.value="";
		s.focus();
		return false;
   }
   // All characters are numbers.
   return true;
}

//****************************************************Check Username**********************
function CheckUsername(){
	var s = document.getElementById("username");
	if(s.value != ""){
		if(checkIllegalChars(s) == false)return false;
		
		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}else{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				//alert(xmlhttp.responseText);
				if(xmlhttp.responseText==0){
					document.getElementById("check").innerHTML=" <font color='green'>Username Available.</font>";
				}else{
					document.getElementById("check").innerHTML=" <font color='red'>Username already exist.</font>";
				}
			}
		}
		xmlhttp.open("GET","check_username.php?username="+s.value,true);
		xmlhttp.send();
	}else{
		document.getElementById("check").innerHTML="";
	}
}

//****************************************************Category Filler**********************
function popcategory(){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("fillcategory").innerHTML=xmlhttp.responseText;
			document.getElementById("fillcategory").style.border="1px solid #A5ACB2";
		}
  	}
	xmlhttp.open("GET","fillcat.php",true);
	xmlhttp.send();
}

//****************************************************Sub-Category Filler**********************
function popsubcategory(catid){
	if (catid.length==0){ 
		document.getElementById("fillsubcategory").innerHTML="";
		document.getElementById("fillsubcategory").style.border="0px";
		return;
  	}
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("fillsubcategory").innerHTML=xmlhttp.responseText;
			document.getElementById("fillsubcategory").style.border="1px solid #A5ACB2";
		}
	}
	xmlhttp.open("GET","fillsubcategory.php?q="+catid,true);
	xmlhttp.send();
}

//****************************************************Sub-Category Detail Filler**********************
function popsubcategorydetail(catid,subcatid){
	if (catid.length==0){ 
  		document.getElementById("fillsubcategorydetails").innerHTML="";
  		document.getElementById("fillsubcategorydetails").style.border="0px";
  		return;
  	}
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById("fillsubcategorydetails").innerHTML=xmlhttp.responseText;
			document.getElementById("fillsubcategorydetails").style.border="1px solid #A5ACB2";
		}
  	}
	xmlhttp.open("GET","fillsubcategorydetails.php?q="+catid+"&r="+subcatid,true);
	xmlhttp.send();
}