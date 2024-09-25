<?php

include('connection.php');
session_start();
if (isset($_POST['reason_delete'])) {
    $emp_id = $_POST['emp_id'];
    // select from employee information to insert deleted worker
    $sqlS = "SELECT * from employee_information where emp_ID = '$emp_id'";
    $result = mysqli_query($db,$sqlS);
    $row = mysqli_fetch_array($result);

    $fname = $row['first_name'];
    $lname = $row['last_name'];
    $sex = $row['sex'];
    $age = $row['age'];
    $email = $row['email'];
    $phone_number = $row['phone_number'];
    $city = $row['city'];
    $reg_date = $row['reg_date'];
    $user_name = $row['user_name'];
    $type = $row['type'];
    //-----------------------------------------------------------------
    //insert into deleted worker
    $fired_date = date("m/d/y");
    $reason = $_POST['reason'];
    $sqlI = "INSERT INTO delete_worker (first_name , last_name , sex , age , email , phone_number , city , reg_date , 
    fired_date , user_name , type , reason) values ('$fname' , '$lname' , '$sex' , '$age' , '$email' , '$phone_number' , 
    '$city' , '$reg_date' , '$fired_date' , '$user_name' , '$type' , '$reason')";
    $resultI = mysqli_query($db,$sqlI);
    //------------------------------------------------------------------
    //delete from employee information
    $sqlD = "DELETE from employee_information where emp_ID = '$emp_id'";
    $resultD = mysqli_query($db,$sqlD);
    //---------------------------------------------------------------------

    if ($resultI && $resultD) {
        $_SESSION['success'] = "<script>alert('Employee infromation Delete form Database successfully');</script>";
        header("Location: ../../Staff/Admin/manageWorker.php");
    }else{
        $_SESSION['success'] = "<script>alert('Something is Wrong!');</script>";
        header("Location: ../../Staff/Admin/manageWorker.php");
    }
}
if(isset($_POST['delete'])){
    $emp_id = $_POST['emp_id'];
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
        <form action="deleteWorker.php" method="POST">
            <input type="text" name="emp_id" value="<?php echo $emp_id; ?>" hidden>
            <div class="form-group">
                <label for="reason">Reason for Delete worker:</label>
                <textarea name="reason" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button type="submit" name="reason_delete" class="btn btn-danger"><span>icon</span>Delete</button>
        </form>
    </body>
    </html>
    <?php
}


?>