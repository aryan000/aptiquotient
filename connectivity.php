<?php
define('db_host','localhost');
define('db_name','aptiquotient');
define('db_user','root');
define('db_pass','');

$con = mysql_connect(db_host,db_user,db_pass) or die("failed to connect to mysql : ".mysql_error());

$db = mysql_select_db(db_name,$con) or die("Failed to connect to Mysql : ".mysql_error());




function SignIn()
{
	session_start(); // starting the session for user profile page
// $id = $_POST['user'];
// $pass = $_POST['pass'];

if(!empty($_POST['user']))
{	
	$statement = " select * from username where username = '$_POST[user]' and pass='$_POST[pass]' ";

	// echo $statement;
	$query = mysql_query($statement) or die(mysql_error());
		// echo $query;

	$row = mysql_fetch_array($query) ;
	// echo $row;

	if(!empty($row['username']) And !empty($row['pass']))
	{
		$_SESSION['username'] = $row['pass'];
		echo "successfully logged in to the profile page ";
	}

	else {
		# code...
		echo "Sorry you have entered wrong id and password .... Please try again!!!";
	}
}
}

if(isset($_POST['submit']))

{
	SignIn();
}


?>