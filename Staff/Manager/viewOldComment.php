<?php

include('connection.php');
if(isset($_POST['view'])){
    $id = $_POST['id'];

    $sql = "SELECT * from comment where ID = '$id'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);

    $cust_id = $row['customer_ID'];
    $sql_info = "SELECT * from customer_information where customer_ID = '$cust_id'";
    $result_info = mysqli_query($db,$sql_info);
    $row_info = mysqli_fetch_array($result_info);
    if($row_info['sex'] == "Male"){
        $name = "Mr. ";
    }else{
        $name = "Ms. ";
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lucy hotel</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <center>
    <div class="container">
        <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4><?php echo $name . $row_info['first_name'] . " " . $row_info['last_name']; ?></h4>
            </div>
            <div class="body">
                <p><?php echo $row['message']; ?></p>
            </div>
            <div class="panel-footer" style="float: right ;">
                <form action="actionComment.php" method="POST" style="display: inline;">
                    <input type="text" name="id" value="<?php echo $row['ID']; ?>" hidden>
                    <input type="text" name="old" value="<?php echo 'old'; ?>" hidden>
                    <button type="submit" name="view" class="btn btn-primary"><span></span>View</button>
                </form>
                <form action="actionComment.php" method="POST" style="display: inline;">
                    <input type="text" name="id" value="<?php echo $row['ID']; ?>" hidden>
                    <input type="text" name="old" value="<?php echo 'old'; ?>" hidden>
                    <button type="submit" name="delete" onclick="deleteconformation()" class="btn btn-danger"><span></span>Delete</button>
                 </form>
                 <a href="../../Staff/Manager/oldComment.php" class="btn btn-primary">< Back</a>
            </div>          
        </div>
        </div>
        
    </div>
    </center>
    <div>
        <div>&copy; copyright <strong>Lucy hotel.</strong> All right reserved.</div>
        <div>Designed by <a href="#"> IT Students</a>, Wollo universty, Ethiopia.</div>
    </div>
    <script>
        function deleteconformation(){
            var a = confirm('are you sure? you want to delete customer comment!');
            if(a == false){
            event.preventDefault();
            }
        }
    </script>
    
</body>
</html>
    <?php
}


?>