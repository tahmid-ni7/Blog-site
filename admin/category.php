<a href="?a=add_category" class="link-btn">Add category</a>



		<?php

		if(isset($_GET['did']))
		{
			delete();
			print '<h5 class = "deleteMessage">Deleted successfully.</h5>';
		}


			$sql = "select c1.id, c1.name, c1.description , c2.name as category from category as
			c1 left join category as c2 on c1.categoryId = c2.id";
			$table = mysqli_query($cn, $sql);

			print '<table>';
			print '<tr><th>ID</th><th>Name</th><th>Description</th><th>Category</th><th>Pages</th><th>Action</th></tr>';
			while($row = mysqli_fetch_assoc($table))
			{
				print '<tr>';
				print '<td>'.$row["id"].'</td>';
				print '<td>'.htmlentities($row["name"]).'</td>';
				print '<td>'.htmlentities($row["description"]).'</td>';
				print '<td>'.htmlentities($row["category"]).'</td>';
				print '<td>'.htmlentities(pageCount($row["id"])).'</td>';
				print '<td><a class="action-e" href = "">Edit</a>
				<a class= "action-d" href= "?a='.$_GET['a'].'&did='.$row['id'].'">Delete</a></td>';
				print '</tr>';
			}
			print '</table>';

    //============= For counting the page in each category...=================
	function pageCount($ctg)
	{
		global $cn;
		$a[] = $ctg;
		subCategory($a, $ctg);
		
		$sql = " select count(id) as count from page where categoryId in(".implode(", ", $a).")";
		
		$table = mysqli_query($cn, $sql);
		
		while($row = mysqli_fetch_assoc($table))
		{
			return $row["count"];
		}
		
	}

    function subCategory(&$a, $ctg)
    {
                global $cn;
                $sql = " select id, name from category where categoryId = ".$ctg;

                $table = mysqli_query($cn, $sql);

                while($row = mysqli_fetch_assoc($table))
                {
                    $a[] = $row["id"];
                    subCategory($a, $row["id"]);
                }

    }

    function delete()
    {
            global $cn;
            $sql = "delete from category where id =".$_GET['did'];
            mysqli_query($cn,$sql);
    }
       

		?>


