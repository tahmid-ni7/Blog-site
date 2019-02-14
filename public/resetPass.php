<?php
$password = "";
$passwordRe = "";

$epassword = "";
$repassword = "";

if(isset($_POST['submit']))
{
	$password = $_POST['password'];
    $passwordRe = $_POST['passwordRe'];
    
    $er = 0;
    if($password == "")
    {
        $er++;
        $epassword = '<span class = "error">*Required</span>';
    }
    if($passwordRe == "")
    {
        $er++;
        $repassword = '<span class = "error">*Required</span>';
    }
    else
    {
     if($password != $passwordRe)
     {
         $er++;
         $repassword = '<span class = "error">*This password doesn\'t match</span>';
         
     }
    }
    if($er == 0)
    {
       	$sql = "update users set password = password('".ms($password)."') where id = ".ms($_GET['id']);
	if(mysqli_query($cn, $sql))
	{
		print '<span class = "successMessage">Your password changed successfully</span>';
	}
	else
    {
		print mysqli_error($cn);
	} 
    }

}
?>

<div class="login-form login-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="login-wrap">
                    <form action="" method="post">
                        <p><label for="password">New Password</label><?php print $epassword; ?></p>
                        <p><input type="password" name="password" value=""></p>
                        <p><label for="password">Re-enter Password</label><?php print $repassword; ?></p>
                        <p><input type="password" name="passwordRe" value=""</p>
                        
                        <p><input type="submit" name="submit" value="Submit"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>