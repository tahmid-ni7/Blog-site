<?php
$name = "";
$email = "";
$contact = "";
$password = "";
$cpassword = "";

$ename = "";
$eemail = "";
$econtact = "";
$epassword = "";
$ecpassword = "";

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    $er = 0;
    
    if($name == "")
    {
        $er++;
        $ename = '<span class = "error">*Required</span>';
    }
    else
    {
        $name = validation($name);
        if(!preg_match("/^[a-zA-Z ]*$/", $name))
        {
            $er++;
            $ename = '<span class = "error">*Only letters and spaces are allowed</span>';
        }
            
    }
    
    if($email == "")
    {
        $er++;
        $eemail = '<span class = "error">*Required</span>';
    }
    else
    {
        $email = validation($email);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $er++;
            $eemail = '<span class = "error">*Invalid email format.</span>';
        }
    }
    
    if($contact == "")
    {
        $er++;
        $econtact = '<span class = "error">*Required</span>';
    }
    else
    {
        $contact = validation($contact);
        if(!preg_match("/^[+0-9 ]*$/", $contact))
        {
            $er++;
            $econtact = '<span class = "error">*Only numbers are allowed</span>';
        }
    }
    if($password == "")
    {
        $er++;
        $epassword = '<span class = "error">*Required</span>';
    }
    if($cpassword == "")
    {
        $er++;
        $ecpassword = '<span class = "error">*Required</span>';
    }
    else
    {
        if($password != $cpassword)
        {
            $er++;
            $ecpassword = '<span class = "error">*This password doesn\'t match with previous one.</span>';
        }
    }
    if($er == 0)
    {
        $sql = "insert into users (name, email, contact, password, cpassword) values('".ms(strip_tags($name))."','".ms(strip_tags($email))."',
        '".ms(strip_tags($contact))."',password('".ms(strip_tags($password))."'), password('".ms(strip_tags($cpassword))."'))";
        
        if(mysqli_query($cn, $sql))
        {
            print '<span class = "successMessage">Data Saved</span>';
            $name = "";
            $email = "";
            $contact = "";
            $password = "";
            $cpassword = "";
        }
        else
        {
            print '<span class = "error">'.mysqli_error($cn).'</span>';
        }
    }
    else
    {
      print '<span class = "error">*Please fill the all fields correctly...</span>';   
    }
}
function validation($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

?>

<div class="reg-form reg-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="reg-wrap">
                    <div class="reg-title">Registration form</div>
                    <form action="" method="post" class="reg-form">
                        <p><label for="name">Name</label>
                            <?php print $ename; ?>
                        </p>
                        <p><input type="text" name="name" value="<?php print $name; ?>"></p>

                        <p><label for="email">Email</label>
                            <?php print $eemail; ?>
                        </p>
                        <p><input type="text" name="email" value="<?php print $email; ?>"></p>

                        <p><label for="conatct">Contact</label>
                            <?php print $econtact; ?>
                        </p>
                        <p><input type="text" name="contact" value="<?php print $contact; ?>"></p>

                        <p><label for="password">Password</label>
                            <?php print $epassword; ?>
                        </p>
                        <p><input type="password" name="password" value=""></p>
                        
                        <p><label for="cpassword">Confirm Password</label>
                            <?php print $ecpassword; ?>
                        </p>
                        <p><input type="password" name="cpassword" value=""></p>

                        <p><input type="submit" name="submit" value="Submit"></p>

                        <div>Already have an account? <a href="?p=login">Sign in now</a></div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

