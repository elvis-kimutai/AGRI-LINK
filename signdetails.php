<?php
//establishing connection to server
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

if(isset($_POST['myname'])){
     $myname=$_POST['myname'];
}
if(isset($_POST['myemail'])){
     $myemail=$_POST['myemail'];
}
if(isset($_POST['mydob'])){
     $mydob=$_POST['mydob'];
}
if(isset($_POST['mypas_10'])){
    $mypas_10=$_POST['mypas_10'];
}
if(isset($_POST['mypas_20'])){
    $mypas_20=$_POST['mypas_20'];
}

//this parthandles the mysqlquery function that allows the backend of the code connect to the sql services onthe srever
if(isset($_POST['myname']) && isset($_POST['myemail']) && isset($_POST['mydob']) && isset($_POST['mypas_10']) && isset($_POST['mypas_20']) ){
	$sql = "INSERT INTO signupdetails (myname,email,mydate,passsword_10,password_20) VALUES('$myname', '$myemail', '$mydob','$mypas_10','$mypas_20')";
	if ($connect->query($sql) === TRUE) {
        echo "You have logged in!";
         
        } else {
          echo "Error: " . $sql . "<br>" . $connect->error;
        }
    
    $connect->close();
        
    }
    
    ?>