<?php

include('connection.php');
session_start();
if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $sql = "DELETE from comment where ID = '$id'";
    $result = mysqli_query($db,$sql);
    echo mysqli_error($db);
    if($result){
        $_SESSION['delete_msg'] = "<script>alert('Delete message successfully!');</script>";
        header("Location: ../../Staff/Manager/oldComment.php");
    }
    else{
        echo "error deleting messages! " . mysqli_error($db) . "<br>";
        echo "<a href='../../Staff/Manager/oldComment.php'> < Back</a>";
    }
}



?>