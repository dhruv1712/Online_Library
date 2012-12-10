<?php require_once("common/header.php");?>
<script language="javascript">
function BSave_onclick(){
	if(document.login_form.username.value == ""){
		alert("Please enter Username.");
		return false;
	}
	if(checkIllegalChars(document.login_form.username) == false)return false;
	if(document.login_form.password.value == ""){
		alert("Please enter Password.");
		return false;
	}
	if(checkIllegalChars(document.login_form.password) == false)return false;
	PageLoad(document.login_form,'login1.php')
}
function EditForm(page){  
	popUpWindow=window.open(page,'popUpWindow','height=200,width=500,left=550,top=150,resizable=no,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no, status=yes');
}
</script>
			<section id="body" class="container_24">
				<div class="grid_6">&nbsp;</div>
				<div class="grid_10" id="login">
					<hgroup><h2>Sign In</h2></hgroup>
					<form  name="login_form" method="post" action="login.php">
						<div>
							<?php
								if(isset($_GET['login']) && $_GET['login'] == 3){
									echo "<p style='color:green'>Password updated successfully. Please enter username and new password.</p>";}
							?>
							<p>Username<br>
							<input class="box" name="username" type="text" tabindex="1">
							</p><br>
							<p>Password<br>
							<input class="box" name="password" type="password" tabindex="2">
							</p><br>
							<?php
								if(isset($_GET['logout']) && $_GET['logout'] == 1){
									$message = "You are now logged out.";}
								if(isset($_GET['login']) && $_GET['login'] == 1){
									$message = "Username/Password is not correct.";}
								if(!empty($message)) {echo "<p class=\"mandatory\">". $message ."</p>";}
							?>
						</div>
					</form>
					<span style="float:right;margin-right:10px;"> <a href="#">I forgot my password</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					<button type="button" tabindex="3" class="join green" onclick="BSave_onclick()">Login</button><span>
				</div>
				<div class="grid_8">&nbsp;</div>
				<div class="clear"></div>
			</section>
<?php require_once("common/footer.php");?>