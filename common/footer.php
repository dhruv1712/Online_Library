			<footer class="container_24">
				<div class="grid_15">
					<ul>
						<?php if(!isset($_SESSION['role'])){?>
						<li class=""><a href="login.php">Login</a></li>
						<li class=""><a href="registration.php">Register</a></li>
						<?php }else{?>
							<?php if($_SESSION['role'] == "Staff"){?>
						<li class=""><a href="add_books.php">Add Books</a></li>
							<?php }?>
						<li class=""><a href="all_books.php">Read Books</a></li>
						<li class=""><a href="logout.php">Logout</a></li>
						
						<?php }?>
					</ul>
				</div>
				<section class="grid_9 connect">
					<ul>
					<li><a href="#"><img src="images/l.png"></a></li>
					<li><a href="#"><img src="images/twitter.png"></a></li>
					<li><a href="#"><img src="images/f.png"></a></li>
					<li><a href="#"><img src="images/y.png"></a></li>
					<li><a href="#"><img src="images/pinterest.png"></a></li>
					<li><a href="#"><img src="images/skype.png"></a></li>
					<li><a href="#"><img src="images/vimeo.png"></a></li>
				</ul>
				</section>
				<br>
				<iframe src="http://www.facebook.com/plugins/like.php?href=elibrary.com"
        scrolling="no" frameborder="0"
        style="border:none; width:450px; height:80px"></iframe>
				<div class="clear"></div>
			</footer>
		</section>
	</body>
</html>