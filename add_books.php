<?php require_once("common/header.php");?>

	<section id="body" class="container_24">
		<div class="grid_18">&nbsp;</div>
		<div class="grid_5" style="text-align:right;">Hi <?php echo $_SESSION['name'];?>!</div>
		<div class="grid_1">&nbsp;</div>
		<div class="clear"></div>
		
		<div class="grid_1">&nbsp;</div>
		<div class="grid_22 cms">
			<hgroup><h2>Add Books</h2><hgroup>
			<form action="upload_book.php" method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td class="label">Title<span class="mandatory">*</span></td>
						<td><input type="text" name="title" maxlength="100" value="<?php if(isset($_REQUEST['title'])){echo $_REQUEST['title'];}?>"></td>
					</tr><tr>
						<td class="label">Category<span class="mandatory">*</span></td>
						<td>
							<select name="category" value="<?php if(isset($_REQUEST['category'])){echo $_REQUEST['category'];}?>">
								<option value="">--Select--</option>
								<option value="Fiction">Fiction</option>
								<option value="Science">Science</option>
								<option value="Crime">Crime</option>
								<option value="History">History</option>
							</select>
						</td>
					</tr><tr>
						<td class="label">Author<span class="mandatory">*</span></td>
						<td><input type="text" name="author" maxlength="100" value="<?php if(isset($_REQUEST['author'])){echo $_REQUEST['author'];}?>"></td>
					</tr><tr>
						<td class="label">Publish Year<span class="mandatory">*</span></td>
						<td><input type="text" name="year" maxlength="100" value="<?php if(isset($_REQUEST['year'])){echo $_REQUEST['year'];}?>"></td>
					</tr><tr>
						<td class="label">Upload Book<span class="mandatory">*</span></td>
						<td><input type="file" name="file" id="file"></td>
					</tr><tr>
						<td colspan="2"><input type="submit" name="submit" value="Upload"></td>
					</tr>
				</table>
			</form>
			<?php if(isset($_REQUEST['title'])){
				echo "<span class='mandatory'>Please enter all fields.</span>";
			}
			if(isset($_REQUEST['success'])){
				echo "<span style='color:green'>Book Uploaded Successfully.</span>";
			}
			?>
		</div>
		<div class="grid_1">&nbsp;</div>
		<div class="clear"></div>
	</section>
<?php require_once("common/footer.php");?>