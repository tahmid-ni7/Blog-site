<a href="?a=add_page" class="link-btn">Add New Page</a>


<?php 
	if(isset($_GET['did']))
	{
		delete();
		print '<h5 class = "deleteMessage">Deleted successfully.</h5>';
	}



		$sql = "select page.id, page.title, page.tag, page.dateTime, page.userId, category.name as category,page.count from page left join category on page.categoryId= category.id";

		$table = mysqli_query($cn, $sql);

		print '<table>';
		print '<tr><th>ID</th><th>Title<br>Tag<br>Category</th><th>Date Time<br>Hit count<br>User</th><th>Content</th><th>Action</th></tr>';

		while($row = mysqli_fetch_assoc($table))
		{
			print '<tr>';
			print '<td>'.$row["id"].'</td>';
			print '<td><p>'.htmlentities($row["title"]).'</p><b>'.htmlentities($row["tag"]).'</b><br>'.$row["category"].'</td>';
			print '<td>'.$row["dateTime"].'<br>'.$row["count"].'<br>'.$row["userId"].'</td>';
			
//======================== Open file from another folder. Read mode...=====================
			$fileName = "article/".str_replace(" ", "_", trim($row["title"])).".html";
			$file = fopen($fileName, "r");
			$content = fread($file, filesize($fileName));
			print '<td>'.substr(strip_tags($content), 0, 200).' ...... <a href="?a=pages_edit&id='.$row["id"].'">Read More</a> </td>';
			
			print '<td><a class="action-e" href = "">Edit</a>
				<a class= "action-d" href= "?a='.$_GET['a'].'&did='.$row['id'].'">Delete</a></td>';
			print '</tr>';
		}
		print '</table>';


	function delete()
	{
		global $cn;
		$sql = "delete from page where id =".$_GET['did'];
		mysqli_query($cn,$sql);
	}
	


	?>
