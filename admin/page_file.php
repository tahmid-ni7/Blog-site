<a href="?a=add_page_file" class="link-btn">Add new file</a>

<?php

	if(isset($_GET['did']))
	{
		delete();
		print '<h5 class = "deleteMessage">Deleted successfully.</h5>';
	}


$sql = "select pagefile.id, page.title as page, pagefile.title, pagefile.dateTime, pagefile.file from pagefile left join page on pagefile.pageId = page.id";

$table = mysqli_query($cn, $sql);

print '<table>';
print '<tr><th>ID</th><th>Page</th><th>Date Time</th><th>file</th><th>Action</th></tr>';

while($row = mysqli_fetch_assoc($table))
{
    print '<tr>';
    print '<td>'.htmlentities($row["id"]).'</td>';
    print '<td>'.htmlentities($row["page"]).'</td>';
    print '<td>'.htmlentities($row["dateTime"]).'</td>';
    print '<td><a href="uploads/files/'.$row["id"].'_'.$row["file"].'">'.$row['title'].'</a></td>';
    print '<td><a class= "action-e" href="">Edit</a>
    <a class= "action-d" href="?a='.$_GET['a'].'&did='.$row['id'].'">Delete</a></td>';
    print '</tr>';
}
print '</table>';


	function delete()
	{
		global $cn;
		$sql = "delete from pagefile where id =".$_GET['did'];
		mysqli_query($cn,$sql);
	}
?>