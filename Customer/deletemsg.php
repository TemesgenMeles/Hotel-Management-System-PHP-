<?php

include('connection.php');
session_start();
$id = $_POST['id'];
$sql = "DELETE from replay_msg where ID = '$id'";
$result = mysqli_query($db,$sql);
if($result){
    $_SESSION['delete_msg'] = "<script>alert('Delete message successfully!');</script>";
}else{
    $_SESSION['delete_msg'] = "<script>alert('Deleting message failed!');</script>";
}
header("Location://localhost/lucy hotel/Customer/messages.php");
?>