<?php

$sql = "select id, (select name from users where userId = id) as name, dateTime, comment from pagecomments where pageId = ".$_GET['id'];
$table = mysqli_query($cn, $sql);

print '<div class = "all-comments">';
while($row = mysqli_fetch_assoc($table))
{
	
	print '<div class = "row">';
	print '<div class = "col-md-10">';
	print '<div class = "single-comment">';
	print '<div class = "row">';
	print '<div class = "col-md-3">';
	print '<b>'.$row["name"].'</b> <br>'.$row["dateTime"];
	print '</div>';
	print '<div class = "col-md-7">';
	print '<p>'.htmlentities($row["comment"]).'</p>';
	print '</div>';
	print '</div>';
	print '</div>';
	print '</div>';
	print '</div>';
}
print '</div>';
?>
