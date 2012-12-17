<?php require_once("common/session.php");?>
<?php require_once("common/connection.php");?>
<?php require_once("common/functions.php");?>
<?php require_once("common/form_functions.php");?>
<?php

if(isset($_POST['title']) && isset($_POST['category']) && isset($_POST['author']) && isset($_POST['year'])){
$allowedExts = array("pdf", "doc", "docx", "rtf", "ppt", "pptx");
$extension = end(explode(".", $_FILES["file"]["name"]));
if (($_FILES["file"]["size"] < 800000) && in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
	  
	  //insert in database
	if(isset($_POST['title'])){$title = $_POST['title'];}else{$title="";}
	if(isset($_POST['category'])){$category = $_POST['category'];}else{$category="";}
	if(isset($_POST['author'])){$author = $_POST['author'];}else{$author="";}
	if(isset($_POST['year'])){$year = $_POST['year'];}else{$year="";}
		  $query = "insert into books 
						(title, category, author, year, file_name)  values
						('".$title."', '".$category."', '".$author."', '".$year."', '".$_FILES["file"]["name"]."')";
		  }
		  $result = mysql_query($query,$conn);
		if($result){
			redirect_to("add_books.php?success=1");
		}
    }
  }
else
  {
	if(isset($_POST['title'])){$title = $_POST['title'];}else{$title="";}
	if(isset($_POST['category'])){$category = $_POST['category'];}else{$category="";}
	if(isset($_POST['author'])){$author = $_POST['author'];}else{$author="";}
	if(isset($_POST['year'])){$year = $_POST['year'];}else{$year="";}
	redirect_to("add_books.php?title=".$title."&category=".$category."&author=".$author."&year=".$year);
  }
}else{
	if(isset($_POST['title'])){$title = $_POST['title'];}else{$title="";}
	if(isset($_POST['category'])){$category = $_POST['category'];}else{$category="";}
	if(isset($_POST['author'])){$author = $_POST['author'];}else{$author="";}
	if(isset($_POST['year'])){$year = $_POST['year'];}else{$year="";}
	redirect_to("add_books.php?title=".$title."&category=".$category."&author=".$author."&year=".$year);
}
?> 