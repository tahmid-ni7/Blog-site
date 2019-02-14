<ul>
	<li><a href="?p=home-page">Home</a></li>

	<?php
				$sql = "select id, name from category where categoryId = 0";
				$table = mysqli_query($cn, $sql);
				
				while($row = mysqli_fetch_assoc($table))
				{
					print '<li><a href="?p=article&ctg='.$row["id"].'">'.$row["name"].'</a>';
					findChild($row["id"]);
					print '</li>';
				}
	?>

 <?php
    
    if(isset($_SESSION['type']))
    {
        $type = $_SESSION['type'];
        if($type == 1)
        {
//          print '<li><a href="?p=article&ctg='.$row["id"].'">'.$row["name"].'</a></li>';
            print '<li><a href="?p=profile">'.$_SESSION['name'].'</a></li>
            <li><a href="?p=logout">Logout</a></li>';
        }
        elseif($type == 2)
        {
            print '<li><a href="#">Admin <i class ="fa fa-arrow-down"></i></a>
                <ul>
                    <li><a href="?a=category">category</a></li>
                    <li><a href="?a=pages">pages</a></li>
                    <li><a href="?a=users">Users</a></li>
                    <li><a href="?a=page_image">Image</a></li>
                    <li><a href="?a=page_file">File</a></li>
                </ul>
            </li>
            <li><a href="?a=profile">'.$_SESSION['name'].'</a></li>
            <li><a href="?p=logout">Logout</a></li>';
        }

    }
    else
    {
        print '<li><a href="?p=registration" class = "reg-btn"><i class = "fa fa-user-plus reg-icon"></i>Register</a></li>
        <li><a href="?p=login"><i class = "fa fa-sign-in login-icon"></i>Login</a></li>';
    }

    
 ?>
</ul>


<?php
function findChild($pid)
{
	global $cn;
	$sql = "select id, name from category where categoryId = ".$pid;
	$table = mysqli_query($cn, $sql);
				
	print '<ul>';
	while($row = mysqli_fetch_assoc($table))
	{
		print '<li><a href="?p=article&ctg='.$row["id"].'">'.$row["name"].'</a>';
		findchild($row["id"]);
		print '</li>';
	}
	print '</ul>';
}


?>
