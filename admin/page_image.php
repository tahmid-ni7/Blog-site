<a href="?a=add_page_image" class="link-btn">Add image</a>


<?php

	if(isset($_GET['did']))
	{
		delete();
		print '<h5 class = "deleteMessage">Deleted successfully.</h5>';
	}


$sql = "select pageimage.id, page.title as page, pageimage.title, pageimage.dateTime, pageimage.image from pageimage left join page on pageimage.pageId = page.id";

$table = mysqli_query($cn, $sql);

print '<table>';
print '<tr><th>ID</th><th>Page</th><th>Title</th><th>Date Time</th><th>Image</th><th>Action</th></tr>';

while($row = mysqli_fetch_assoc($table))
{
    print '<tr>';
    print '<td>'.htmlentities($row["id"]).'</td>';
    print '<td>'.htmlentities($row["page"]).'</td>';
    print '<td>'.htmlentities($row["title"]).'</td>';
    print '<td>'.htmlentities($row["dateTime"]).'</td>';
    print '<td><img src="uploads/images/'.$row["id"].'_'.$row["image"].'" height = "100px" width="120px"/></td>';
    print '<td><a class= "action-e" href="">Edit</a>
    <a class= "action-d" href="?a='.$_GET['a'].'&did='.$row['id'].'">Delete</a></td>';
    print '</tr>';
}
print '</table>';


	function delete()
	{
		global $cn;
		$sql = "delete from pageimage where id =".$_GET['did'];
		mysqli_query($cn,$sql);
	}
?>