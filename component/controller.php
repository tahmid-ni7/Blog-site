<?php

	if(isset($_GET['a']))
	{
		if(file_exists('admin/'.$_GET['a'].'.php'))
		{
			if(isset($_SESSION['type']))
            {
                $type = $_SESSION['type'];
                if($type == 2)
                {
                print '<h2 class ="page-title">'.ucwords(str_replace("_", " ", $_GET['a'])).'</h2>';
			     include('admin/'.$_GET['a'].'.php');
                }
            else
                {
                    print '<span class = "error">*You have to login with an admin account to access this content. </span>';
                    include('public/login.php');
                }
            }
            else
                {
                    print '<span class = "error">**You have to login with an admin account to access this content. </span>';
                    include('public/login.php');
                }
            
           
		}
		else
		{
			print '<h2 class ="page-warning">Security warning</h2>';
			include('warning.php');
		}
	}

	else if(isset($_GET['p']))
	{
/*====== For login validation && mantain login and logout delay...=====*/
        if($_GET['p'] == "login")
        {
          if(isset($_POST['btnLogin']))
          {
              if(isset($_SESSION['type']))
              {
                  print '<span class="successMessage">Login is Successfull</span>';
              }
              else
              {
                  print '<span class = "error">*Invalid Login</span>';
                  include ('public/login.php');
              }
          }
            else
            {
                include ('public/login.php');
            }
        }
/*======================== Validation END ============================*/      
           
		else if(file_exists('public/'.$_GET['p'].'.php'))
		{
			print '<h2 class = "page-title">'.ucwords(str_replace("_", " ", $_GET['p'])).'</h2>';
			include('public/'.$_GET['p'].'.php');
		}
		else
		{
			print '<h2 class ="page-warning">Security warning</h2>';
			include('warning.php');
		}
	}
	else
	{
		print '<h2 class ="page-title">Home page</h2>';
		include('home.php');
	}
		

?>
