================================
Basic Login Page
================================

<?php
$email = "";
$password = "";
$type = "";

$eemail = "";
$epassword = "";
$etype = "";

if(isset($_POST['btnLogin']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    
    $er = 0;
    
    if($email == "")
    {
        $er++;
        $eemail = '<span class = "error">*Required</span>';
    }
    if($password == "")
    {
        $er++;
        $epassword = '<span class = "error>*Required</span>';
    }
    if($type == 0)
    {
        $er++;
        $etype = '<span class = "error>*Please select your type</span>';
    }
    if($er == 0)
    {
        $sql = "select id, name, email, contact, password, type from users where (email = '".ms($email)."' or contact = '".ms($email)."') and password = password('".ms($password)."') and type = '".ms($type)."'";
        
        $table = mysqli_query($cn, $sql);
        
        if(mysqli_num_rows($table) <= 0)
        {
            print '<span class = "error">Invalid login.</span>';
        }
        else
        {
            while($row = mysqli_fetch_assoc($table))
            {
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['contact'] = $row['contact'];
                $_SESSION['type'] = $row['type'];
                
                print '<span class = "successMessage">Login is successfull.</span>';
                break;
            }
        }
    }
}


?>

<div class="login-form login-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="login-wrap">
                    <div class="log-title">Login form</div>
                    <form action="" method="post" class="login-form">
                        <p><label for="email">Email</label><?php print $eemail; ?></p>
                        <p><input type="text" name="email" placeholder="Type your email..." class="login-field"></p>

                        <p><label for="password">Password</label></p>
                        <p><input type="password" name="password" placeholder="Your password..." class="login-field"></p>
                        <a href="#" class="forget-btn">Forget your password?</a>

                        <p><label for="type">Type</label></p>
                        <select name="type">
                            <option value="0">Select</option>
                            <option value="1">User</option>
                            <option value="2">Admin</option>
                        </select>

                        <p><input type="submit" name="btnLogin" value="Login"></p>

                        <div>Not a member?<a href="#" class="sign-up-btn">Sign up now</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
