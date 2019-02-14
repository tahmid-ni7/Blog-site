<?php
$email = "";

$eemail = "";

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    
    $er = 0;
    
    if($email == "")
    {
        $er++;
        $eemail = '<span class = "error">*Required</span>'; 
    }
    if($er == 0)
    {
        $sql = "select id, name from users where email = '".ms($email)."'";
        $table = mysqli_query($cn, $sql);
        
        while($row = mysqli_fetch_assoc($table))
        {
/*===================== Message sending to user mail for reset password ===============...*/
            $message = "Hello ".$row["name"]."<br>";
            $message .= "You have recently password reset request from :".$_SERVER['REMOTE_ADDR'].".Please clik the link below if that was you<br>";
            $message .= "<a href=\"http://localhost/blogsite/?p=resetPass&id=".$row["id"]."\">Reset Password</a>";
            
            $message .= "<br> If it is not you ignore the link. THANKS";
            
            /*mail($email, "Request for password recovery", $message);*/
            
            print $message;
        }
    }
}
    
?>
<div class="login-form login-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="login-wrap">
                   <div class="message">Recover your password, give your</div>
                    <form action="" method="post">
                        <p><label for="email">Email</label><?php print $eemail; ?></p>
                        <p><input type="text" name="email" value=""></p>
                        
                        <p><input type="submit" name="submit" value="Submit"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>