<?php 
include_once 'class_admin.php'; 

$admin = new Admin(); // Checking for user logged in or not

 if (isset($_REQUEST['submit'])){
 extract($_REQUEST);
 $register = $admin->reg_admin($username, $password, $email);
	 if ($register) {
	 // Registration Success
	 echo 'Registration successful <a href="login.php">Click here</a> to login';
	 } else {
	 // Registration Failed
	 echo 'Registration failed. Email or Username already exits please try again';
	 }
 }
 ?>
// ?>