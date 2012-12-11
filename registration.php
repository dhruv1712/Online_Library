<?php require_once("common/header.php");?>
<link rel="stylesheet" type="text/css" media="all" href="form/niceforms-default.css" />
<link rel="stylesheet" type="text/css" media="all" href="form/style2.css" />

<script language="javascript">
function BSave_onclick(){
	if(IsBlank(document.form1.username) == false)return false;
	if(IsBlank(document.form1.name) == false)return false;
	if(IsBlank(document.form1.email) == false)return false;
	if(IsEmail(document.form1.email) == false)return false;
	if(IsBlank(document.form1.pass1) == false)return false;
	if(IsBlank(document.form1.pass2) == false)return false;
	if(document.form1.pass1.value != document.form1.pass2.value){
		alert("Password do not match.");
		return false;
	}
	PageLoad(document.form1,'registration1.php')
}
</script>
	<section id="body" class="container_24">
	
	<div class="grid_1">
		&nbsp;</div>
		</div>
		<div class="grid_22">
			
		<center><h1 style="font-size:48px; padding-bottom:5px; margin-top:-10px;">Registration</h1></center>
				
		<center><form action="" method="post" name="form1" >
			<fieldset>
				<legend>Details</legend>
				<table>
				<tr>
					<td class="label">Username<span class="mandatory">*</span></td>
					<td colspan="3">
						<input class="tb7" id="username" name="username" type="text" value="" size="30" maxlength="100" onblur="CheckUsername()"><span id="check"></span>
					</td>
				</tr><tr>
					<td class="label">Name<span class="mandatory">*</span></td>
					<td><input class="tb7"  name="name" type="text" id="name" value="" maxlength="100"></td>
					<td class="label" style="padding-left:30px">Email<span class="mandatory">*</span></td>
					<td><input class="tb7"  name="email" type="text" id="email" value="" maxlength="100"></td>
				</tr><tr>
					<td class="label">Password<span class="mandatory">*</span></td>
					<td><input class="tb7"  name="pass1" type="password" id="pass1" value="" maxlength="100"></td>
					<td class="label" style="padding-left:30px">Confirm Password<span class="mandatory">*</span></td>
					<td><input class="tb7"  type="password" name="pass2" maxlength="20" value=""></td>
				</tr><tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				</table>
				</fieldset>
				<fieldset class="action">
				<table>
				<tr>
					<td align="right" colspan="4" style="float:right;"><button type="button" style="font-size:24px;" class="join green" value="" onClick="BSave_onclick();">Join</button></td>
				</tr>
			</table></fieldset>
		</form>
		</div>
				<div class="grid_1">&nbsp;</div>
				<div class="clear"></div>
			</section>
<?php require_once("common/footer.php");?>
