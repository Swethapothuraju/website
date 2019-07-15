<?php
session_start();
if(!isset($_SESSION['username']))
{
  header('Refresh:3; url=login.php');
   echo "Please Log In First";
exit();

}



 ?>
 <?php
$name="";
$address="";
$id=0;
$edit_state=false;

$db=mysqli_connect('localhost','admin','admin','crud');

if(isset($_POST['save'])){
  $name=$_POST['name'];
  $address=$_POST['address'];


$query="INSERT INTO tb(name,address) VALUES('$name','  $address')";
$_SESSION['msg'] ="New data inserted";
mysqli_query($db,$query);
header('Location: practice.php');
  }


if (isset($_POST['update'])) {
  $name=trim($_POST['name']);
  $address=trim($_POST['address']);
  $id = (int)$_POST['id'];


//UPDATE tb SET name='dfdddd', address='ffff' WHERE id = 35
  // $id = (int)mysqli_real_escape_string($_POST['id']);
$Upquery = "UPDATE tb SET name='$name', address='$address' WHERE id = $id";
// print_r($Upquery);
// var_dump($_POST);
// exit;
  mysqli_query($db, $Upquery);
  $_SESSION['msg'] ="New data updated";
  header('Location:practice.php');

}
if(isset($_GET['del'])) {
  $id = $_GET['del'];
  mysqli_query($db,"DELETE FROM tb WHERE id=$id");
    $_SESSION['msg'] ="deleted";
    header('Location:practice.php');
}
    if(isset($_GET['log'])) {
      $id = $_GET['log'];
      mysqli_query($db,"DELETE FROM tb WHERE id=$id");
        $_SESSION['msg'] ="logout";
        header('Location:logout.php');
    }




$result=mysqli_query($db,"SELECT * FROM tb");
//echo "submitted";
























 ?>
