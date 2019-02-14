<?php
/*================ Database connection...=====================*/
$cn = mysqli_connect("localhost", "root", "", "db_blogsite");


/*================ Function for insert secuirty...=============*/
function ms($value)
{
	global $cn;
	return mysqli_real_escape_string($cn, $value);
}
?>