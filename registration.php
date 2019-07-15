<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="p.css" />
</head>
<body>
<?php
	require('db.php');

    if(isset($_POST['register'])) {

    //get the name and comment entered by user
    $username = $_POST['username'];
    $email = $_POST['email'];
		$password  = $_POST['password'];

    //connect to the database
    $dbc = mysqli_connect('localhost', 'admin', 'admin', 'crud') or die('Error connecting to MySQL server');
    $check=mysqli_query($dbc,"select * from registration where username='$username' and email='$email' and password='$password'");
		//echo "select * from registration where username='$username' and email='$email' and password='$password'";exit;
    //$checkrows=mysqli_num_rows($check);
     //echo $checkrows;exit
   if(mysqli_num_rows($check)>0) {
      echo "Already exists";
   } else {
    //insert results from the form input
      $query = "INSERT IGNORE INTO registration(username,email,password) VALUES('$username','$email','$password')";
		//	echo "$query";
      $result = mysqli_query($dbc, $query) or die('Error querying database.');

      mysqli_close($dbc);
			  echo "Successfully Added";
    }

    };

?>
<div class="">
<h1 style="text-align:center;margin-top:100px;">Registration</h1>
<form name="registration" action="" method="post" class="form2">
<input type="text" name="username" placeholder="Username" required /><br><br>
<input type="email" name="email" placeholder="Email" required /><br><br>
<input type="password" name="password" placeholder="Password" required /><br><br>
<input type="submit" name="register" value="Register" />
<a href="login.php"><input name="submit" type="submit" value="Login" /></a>


</form>
</div>


</body>
</html>
