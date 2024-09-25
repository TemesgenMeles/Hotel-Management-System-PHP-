<?php

include('connection.php');
session_start();
if (isset($_POST['update'])) {
    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $email = $_POST['email'];
    $PhoneNum = $_POST['PhoneNum'];
    $type = $_POST['type'];
    $id = $_POST['id'];

    $sql = "UPDATE employee_information set first_name = '$fname' , last_name = '$lname' , email = '$email' , phone_number = '$PhoneNum' ,
     type = '$type' where emp_ID = '$id'";
     $result = mysqli_query($db,$sql);
     if ($result) {
        $_SESSION['success'] = "<script>alert('Update successfully');</script>";
        header("Location: ../Staff/Admin/manageWorker.php");
     }else{
         $_SESSION['success'] = "<script>alert('Update failed');</script>";
        header("Location: ../Staff/Admin/manageWorker.php");

     }
}
if (isset($_POST['edit'])) {
    $id = $_POST['emp_id'];
    $sql = "SELECT * from employee_information where emp_ID = '$id'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    $fname = $row['first_name'];
    $lname = $row['last_name'];
    $email = $row['email'];
    $mobile = $row['phone_number'];
    $type = $row['type'];
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lucy hotel</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="panel panel-primary" style="width: 600px;">
            <div class="panel-heading">
                <center><h4>Edit Worker Information</h4>
                <p>the worker edit only five information down below <br> clean only the the value you want update and insert the new value and
            <br>press update</p></center>
            </div>
            <div class="panel-body">
                <form action="editWorker.php" method="post">
                    <input type="text" name="id" value="<?php echo $id; ?>" hidden>
                    <div class="form-group">
                        <label for="First_Name">First Name:</label>
                        <input type="text" name="fName" class="form-control" value="<?php echo $fname ?>" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label for="Last_Name">Last Name:</label>
                        <input type="text" name="lName" class="form-control" value="<?php echo $lname ?>" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $email ?>" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="Phone_Number">Phone Number:</label>
                        <input type="text" name="PhoneNum" class="form-control" value="<?php echo $mobile ?>" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="City">Registred As:</label>
                        <select name="type" class="form-control">
                            <option class="selected" value="<?php echo $type; ?>"></option>
                            <option value="Admin">Admin</option>
                            <option value="Manager">Manager</option>
                            <option value="Reception">Reception</option>
                            <option value="Chef">Chef</option>
                        </select>
                    </div>
                
            </div>
            <div class="panel-footer">
                  <center><button type="submit" name="update" class="btn btn-success">Update</button>        
                </form>
                <a href="../../Staff/Admin/manageWorker.php" class="btn btn-primary">< Back</a></center>  
            </div>
        </div>
    </div>
</body>
</html>


    <?php
}

?>