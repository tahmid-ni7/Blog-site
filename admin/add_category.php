<?php
$name = "";
$description = "";
$category = "";

$ename = "";

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$description = $_POST['description'];
	$category = $_POST['category'];
	
	$er = "";
	
	if($name == "")
	{
		$er++;
		$ename = '<span class = "error">*Required</span>';
	}
	
	if($er== 0)
	{
		$sql = "insert into category (name, description, categoryId) values ('".ms(strip_tags($name))."', '".ms(strip_tags($description))."',".ms(strip_tags($category)).")";
		
		if(mysqli_query($cn, $sql))
		{
			print '<h6 class= "successMessage">Data saved</h6>';
			$name = "";
			$description = "";
			$category = "";
		}
		else
		{
			print '<h6 class= "errorMessage">'.mysqli_error($cn).'</h6>';
		}
	}
	else
	{
		print '<h6 class = "errorMessage">Please fill all the field.</h6>';
	}
}
?>



<div class="row">
	<div class="col-md-7">
		<form action="" method="post">
			<p><label for="name">Name</label><?php print $ename; ?></p>
			<p><input type="text" name="name" value="<?php print $name; ?>"></p>
			
			<h6><label for="description">Description</label></h6>
			<p><textarea name="description"><?php print $description; ?></textarea></p>
			
			<h6><label for="category">Category</label></h6>
			<select name="category" id="">
				<option value="0">Select</option>
				<?php
				$sql = "select id, name from category";
				$table = mysqli_query($cn, $sql);
				
				while($row = mysqli_fetch_assoc($table))
				{
					print '<option value="'.$row["id"].'">'.$row["name"].'</option>';
				}
				?>
			</select>
			
			<p><input type="submit" name="submit" value="Submit"></p>
		</form>
	</div>
</div>
