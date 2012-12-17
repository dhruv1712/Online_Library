<?php require_once("common/header.php");?>
<?php require_once("common/connection.php");?>
<?php require_once("common/functions.php");?>
<?php require_once("common/session.php");?>
	<section id="body" class="container_24">
		<div class="grid_18">&nbsp;</div>
		<div class="grid_5" style="text-align:right;">Hi <?php echo $_SESSION['name'];?>!</div>
		<div class="grid_1">&nbsp;</div>
		<div class="clear"></div>
		<div class="grid_1">&nbsp;</div>
		<div class="grid_22">
			<hgroup><h2>Read Books</h2><hgroup>
			<table class="tablecloth" >
				<thead>
					<tr>
						<th>Sn</th>
						<th>Title</th>
						<th>Category</th>
						<th>Author</th>
						<th>Publish Year</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$books=get_all_book('category, title');
						$i=1;
						while($Book=mysql_fetch_array($books)){
					?>
					<tr>
						<td align="center"><?php echo $i; $i++?></td>
						<td><a target="_blank" href="<?php echo "upload/".$Book["file_name"] ;?>"><?php echo ucfirst($Book["title"]) ;?></a></td>
						<td><?php echo ucfirst($Book["category"]) ;?></td>
						<td><?php echo ucfirst($Book["author"]) ;?></td>
						<td align="center"><?php echo $Book["year"] ;?></td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
		<div class="grid_1">&nbsp;</div>
		<div class="clear"></div>
	</section>
<?php require_once("common/footer.php");?>