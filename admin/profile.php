<?php
$sql = "select id, name, email, contact,type from users where id =".$_SESSION['id'];
$table = mysqli_query($cn, $sql);
print '<row>';
while($row = mysqli_fetch_assoc($table))
{
    print '<div class = "col-md-4">';
    print '<h1>'.htmlentities($row["name"]).'</h1>';
    print '<hr>';
    print '<h6>Contact: '.htmlentities($row["contact"]).'</h6>';
    print '<p>Email: '.htmlentities($row["email"]).'</p>';
    print '</div>';
}
print '</row>';
?>