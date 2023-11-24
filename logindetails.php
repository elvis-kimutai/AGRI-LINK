<?php
//establishing connection to serverl login data connection 
$server="localhost";
$user="root";
$pw="";
$db="efood";
	 
$connect = new mysqli($server, $user, $pw, $db);
// Check connection
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
} 	 	 

//this part of code allows you to declare, store and collect the values that will be entered by the user 

if(isset($_POST['user_name'])){
     $user_name=$_POST['user_name'];
}
if(isset($_POST['user_password'])){
     $user_password=$_POST['user_password'];
}

//this parthandles the mysqlquery funtion that allows the backend of the code connect to the sql services onthe srever
if(isset($_POST['user_name']) && isset($_POST['user_password']) ){
	$sql = "INSERT INTO logdetails (username,mypassword) VALUES('$user_name', '$user_password')";
	if ($connect->query($sql) === TRUE) {
	  echo "You are logged In ";
     
      // Page on which the user will be
      // redirected after logging in
      header('location: index.php');
	} else {
	  echo "Error: " . $sql . "<br>" . $connect->error;
	}

$connect->close();
	
}

?>