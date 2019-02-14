
<?php

	if(isset($_GET['did']))
	{
		delete();
		print '<h5 class = "deleteMessage">Deleted successfully.</h5>';
	}


$sql = "select id, name, email, contact, type from users";

$table = mysqli_query($cn, $sql);

print '<table>';
print '<tr><th>ID</th><th>Name</th><th>Email</th><th>Conatct</th><th>Type</th><th>Action</th></tr>';
while($row = mysqli_fetch_assoc($table))
{
    print '<tr>';
    print '<td>'.htmlentities($row['id']).'</td>';
    print '<td>'.htmlentities($row['name']).'</td>';
    print '<td>'.htmlentities($row['email']).'</td>';
    print '<td>'.htmlentities($row['contact']).'</td>';
    print '<td>'.htmlentities($row['type']).'</td>';
    print '<td><a class="action-e" href = "">Edit</a>
    <a class= "action-d" href= "?a='.$_GET['a'].'&did='.$row['id'].'">Delete</a></td>';
    print '</tr>';
}
print '</table>';

	function delete()
	{
		global $cn;
		$sql = "delete from users where id =".$_GET['did'];
		mysqli_query($cn,$sql);
	}
?>