<?php
//error_reporting(0);
require('db.php');
session_start();
 
if (!isset($_SESSION['userId']) || !isset($_SESSION['usercategory']) || $_SESSION['usercategory'] != 'user') {
    header("Location: home.php");
    exit();
}
$user_id = $_SESSION['userId'];
$conn=getcon();

if (isset($_POST['updateMobileButton'])) {
    $mobile = $_POST['mobile'];
    $sql = "UPDATE user_Details SET mobile = '$mobile' WHERE User_Id = '$user_id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['mobile'] = $mobile;
        echo "<script>alert('Mobile number updated successfully!');</script>";
        header("Refresh:0; url=viewitems.php");
    } else {
        echo "<script>alert('Mobile number updation failed!');</script>";
        header("Refresh:0; url=viewitems.php");
    }
}

if (isset($_POST['updateAddressButton'])) {
    $address = $_POST['address'];
    $sql = "UPDATE user_Details SET Address = '$address' WHERE  User_Id = '$user_id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['address'] = $address;
        echo "<script>alert('Address updated successfully!');</script>";
        header("Refresh:0; url=viewitems.php");
    } else {
        echo "<script>alert('Address updation failed!');</script>";
        header("Refresh:0; url=viewitems.php");
    }
}
?>