<?php require_once("common/header.php");?>
	<section id="body" class="container_24">
		<div class="grid_18">&nbsp;</div>
		<div class="grid_5" style="text-align:right;">Hi <?php echo $_SESSION['name'];?>!</div>
		<div class="grid_1">&nbsp;</div>
		<div class="clear"></div>
		
		<div class="grid_1">&nbsp;</div>
		<div class="grid_22">
			<p>You are the staff user. You all have the rights to add books.<br>To add books please select the "Add Books" link on the top.<br>Also  you can read all the books fro the link above "Read Books".</p>
		<div id="content"></div>
			<script>
      function handleResponse(response) {
		var link = new Array();
		var name = new Array();
		var author = new Array();
		var rating = new Array();
		
	   document.getElementById("content").innerHTML = "<table>";
      for (var i = 0; i < response.items.length; i++) {
        var item = response.items[i];
		link[i] =  item.accessInfo.webReaderLink;
		name[i] =  item.volumeInfo.title;
		author[i] =  item.volumeInfo.authors[0];
		rating[i] =  item.volumeInfo.averageRating;
        // in production code, item.text should have the HTML entities escaped.
         document.getElementById("content").innerHTML += "<tr>";
		 document.getElementById("content").innerHTML += "<td><a href = '" + item.accessInfo.webReaderLink + "' target='_blank'>" + item.volumeInfo.title + "</a></td>";
		 document.getElementById("content").innerHTML += "<td>" + item.volumeInfo.authors[0] + "</td>";
		 document.getElementById("content").innerHTML += "<td>Rating: " + item.volumeInfo.averageRating + "</td>";
		 document.getElementById("content").innerHTML += "</tr>";
      }
	  document.getElementById("content").innerHTML += "</table>";
	  
	  	var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			alert(xmlhttp.responseText);
			}
		  }
		xmlhttp.open("POST","add_search.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("link="+link+"&name="+name+"&author="+author+"&rating="+rating);
    }
    </script>
    <script src="https://www.googleapis.com/books/v1/volumes?q=india&callback=handleResponse"></script>
		</div>
		<div class="grid_1">&nbsp;</div>
		<div class="clear"></div>
	</section>
<?php require_once("common/footer.php");?>