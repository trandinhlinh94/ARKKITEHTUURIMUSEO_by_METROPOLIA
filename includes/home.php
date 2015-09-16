<?php
session_start();

include_once 'class_admin.php';
$admin = new Admin();

if (isset($_REQUEST['submit'])) {
        extract($_REQUEST);
        $login = $admin->check_login($username, $password);
        if ($login) {
            // Registration Success
           header("location:home.php");
        } else {
            // Registration Failed
            echo 'Wrong username or password';
        }
    }


$id = $_SESSION['ID'];
if (!$admin->get_session()){
 header("location:login.php");
}

if (isset($_GET['q'])){
 $admin->admin_logout();
 header("location:login.php");
 }

?>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
Home
<style><!--
 body{
 font-family:Arial, Helvetica, sans-serif;
 }
 h1{
 font-family:'Georgia', Times New Roman, Times, serif;
 }
--></style>
<div id="container">
<div id="header"><a href="home.php?q=logout">LOGOUT</a></div>
<div id="main-body">
<h1>Hello <?php $admin->getAdminname($id); ?></h1>
</div>
<div id="footer"></div>
</div>
