<?php

//================== Code for logout...==================
if(isset($_GET['p']) && $_GET['p'] == "logout")
{
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['contact']);
    unset($_SESSION['type']);
}

//================== Code for login...==================
if(isset($_POST['btnLogin']))
{
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
        
        while($row = mysqli_fetch_assoc($table))
            {
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['contact'] = $row['contact'];
                $_SESSION['type'] = $row['type'];
        
                break;
            }
        }
    }
}

?>