<!--<script type="text/javascript" src="../assets/js/tinymce.min.js"></script>-->
<script src=https://cloud.tinymce.com/5-testing/tinymce.min.js?apiKey=s249s53oi6zk06e27ozchm8nscwfac5lv90ped5oz9kok4bh></script>

<script type="text/javascript">
	  tinymce.init({ 
		  selector:'.editor',
		  height: 350,
		  menuBar: false
	  });
</script>


<?php

$title = "";
$tag = "";
$content = "";
$category = "";

$etitle = "";
$etag = "";
$econtent = "";
$ecategory = "";

if(isset($_POST['submit']))
{
	$title = $_POST['title'];
	$tag = $_POST['tag'];
	$content = $_POST['content'];
	$category = $_POST['category'];
	
	$er = "";
	
	if($title == "")
	{
		$er++;
		$etitle = '<span class = "error"> *Required</span>';
	}
	else
	{ 
		$title = test_input($title);
		if(!preg_match("/^[a-zA-Z0-9. ]*$/", $title)){
			$er++;
			$etitle = '<span class = "error"> *Special Charecter are not allowed.</span>';
		}
		
	}
	
	
	if($tag == "")
	{
		$er++;
		$etag = '<span class = "error"> *Required</span>';
	}
	if($content == "")
	{
		$er++;
		$econtent = '<span class = "error"> *Required</span>';
	}
	if($category == "0")
	{
		$er++;
		$ecategory = '<span class = "error"> *Select one</span>';
	}
	
	if ($er == 0)
	{
		$sql = "insert into page (title, tag, categoryId, userId) values('".ms(strip_tags($title))."','".ms(strip_tags($tag))."',".ms(strip_tags($category)).", ".$_SESSION['id'].")";
		
		if(mysqli_query($cn, $sql))
		{
//=========== create new file at the another new folder. Write mode...=================
			$file = fopen("article/".str_replace(" ","_", trim($title)).".html", "w");
			fwrite($file, $content);
			
			print '<h6 class = "successMessage">Data Saved</h6>';
			$title = "";
			$tag = "";
			$content = "";
			$category = "";
		}
		else
		{
			print '<h6 class = "errorMessage">'.mysqli_error($cn).'</h6>';
		}
	}
	else
	{
		print '<h6 class = "errorMessage">Please fill all the field.</h6>';
	}
}

function test_input($data)
{
	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = stripslashes($data);
	return $data;
}
?>



<div class="row">
	<div class="col-md-7">
		<form action="" method="post">
			<p><label for="title">Title</label><?php print $etitle; ?></p>
			<p><input type="text" name = "title" value = "<?php print $title; ?>"></p>
			
			<p><label for="tag">Tag</label><?php print $etag; ?></p>
			<p><input type="text" name = "tag" value = "<?php print $tag; ?>"></p>
			
			<p><label for="content">Content</label><?php print $econtent; ?></p>
			<p><textarea name="content" class="editor"><?php print $content; ?></textarea></p>
			
			<p><label for="category">Category</label></p>
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
			</select><?php print $ecategory; ?>
			
			<p><input type="submit" name= "submit" value="Submit"></p>
		</form>
	</div>
</div>