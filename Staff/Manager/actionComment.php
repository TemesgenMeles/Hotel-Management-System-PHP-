<?php

include('connection.php');
if(isset($_POST['view'])){
    $id = $_POST['id'];
    $old = $_POST['old'];
    $sql = "SELECT * from comment where ID = '$id'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);

    $cus_id = $row['customer_ID'];
    $sql_info = "SELECT * from customer_information where customer_ID = '$cus_id'";
    $info_result = mysqli_query($db,$sql_info);
    $info_row = mysqli_fetch_array($info_result);
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
        <div class="panel panel-primary" style="width: 500px;">
            <div class="panel-heading">
                <div class="row">      
                     <div class="col-sm-3">
                        <center><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($info_row['profile_photo']).'';?>" 
                        alt="pic" width="100px" height="100px" style="border-radius: 50%;" ></center> 
                    </div>
                    <div class="col-sm-9">
                        <center>
                            <div class="row">
                                <div class=" col-sm-6" style="padding-top: 4px;">
                                    <div style="padding-top: 4px; font-size:18px; font-weight: bold; color:black">
                                        <?php echo $info_row['first_name']." ".$info_row['last_name'];?>
                                    </div>
                                    <div style="padding-top: 6px; font-size:15px; font-weight: bold; color:black">
                                        <?php echo $info_row['email'];?>
                                    </div>
                                </div>
                                <div class="col-sm-1" style="padding-top: 4px; font-weight:bold;">
                                    <p>Customer</p>
                                </div>
                            </div>
                        </center>
                    </div>
                    
                </div>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div style="line-height: 2em;"><b>First Name:</b> <?php echo $info_row['first_name']; ?></div>
                    <div style="line-height: 2em;"><b>last Name:</b> <?php echo $info_row['last_name']; ?></div>
                    <div style="line-height: 2em;"><b>Email:</b> <?php echo $info_row['email']; ?></div>
                    <div style="line-height: 2em;"><b>Phone Number:</b> <?php echo $info_row['phone_number']; ?></div>
                    <div style="line-height: 2em;"><b>Country:</b> <?php echo $info_row['country']; ?></div>
                    <div style="line-height: 2em;"><b>City:</b> <?php echo $info_row['city']; ?></div>
                    <div style="line-height: 2em;"><b>Nationality:</b> <?php echo $info_row['nationality']; ?></div>                          
                </div>
            </div>
            <div class="panel-footer" style="float: right;">
            <?php if($old == "old"){
                ?>
                <a href="../../Staff/Manager/oldComment.php" class=" btn btn-primary" >< Back</a>
                <?php

            }else{
                ?>
                <a href="../../Staff/Manager/newComment.php" class=" btn btn-primary" >< Back</a>
                <?php
            } ?>
                
            </div>
        </div>
    </div>
</body>
</html>

    <?php
}
elseif(isset($_POST['replay'])){
    $id = $_POST['id'];
    $sql = "SELECT * from comment where ID = '$id'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);

    $cus_id = $row['customer_ID'];
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
        <div>
            <nav>
                <ul>
                    <li><i>icon</i>
                        <ul>
                            <li><a href="viewAccount.php">View Account</a></li>
                            <li><a href="changePassword.php">Change password</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <div>
            <a href="home.php"><span>lucy hotel</span><p>cradle of lexury</p></a>
            <nav>
               <ul>
                    <li class="current"><a href="home.php">Home</a></li>
                    <li><a href="userEmployee.php">Users</a>
                        <ul>
                            <li><a href="userEmployee.php">Employee</a></li>
                            <li><a href="userCustomer.php">Customer</a></li>
                        </ul>
                    </li>
                    <li><a href="report.html">Report</a></li>
                    <li><a href="newComment.php">Messages</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>    
            </nav>
        </div>
    <a href="../../Staff/Manager/newComment.php">< Back</a>
    <form action="sendReplay.php" method="POST" class="col-md-5">
        <input type="text" name="id" value="<?php echo $cus_id; ?>" hidden>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="msg" cols="30" rows="10" class="form-control" placeholder="Message"></textarea>
        </div><br>
        <button type="submit" name="send" class="btn btn-success">Send</button>
    </form>
</body>
</html>
    <?php
}elseif(isset($_POST['delete'])){
    $id = $_POST['id'];
    $old = $_POST['old'];
    $sql = "DELETE from comment where ID = '$id'";
    $result = mysqli_query($db,$sql);
    if($result){
        $_SESSION['delete_msg'] = "<script>alert('Delete message successfully!');</script>";
        if($old == "old"){
            header("Location: ../../Staff/Manager/oldComment.php");
        }else{
            header("Location: ../../Staff/Manager/newComment.php");
        }
        
    }
    else{
        echo "error deleting messages! " . mysqli_error($db) . "<br>";
        echo "<a href='../../Staff/Manager/newComment.php'> < Back</a>";
    }
}elseif(isset($_POST['save'])){
    $id = $_POST['id'];
    $sql = "UPDATE comment set save_status = '1' where ID = '$id'";
    $result = mysqli_query($db,$sql);
    if($result){
        $_SESSION['save_msg'] = "<script>alert('Massage saved Successfully!');</script>";
        header("Location: ../../Staff/Manager/newComment.php");
    }else{
        echo "error saving messages! " . mysqli_error($db) . "<br>";
        echo "<a href='../../Staff/Manager/newComment.php'> < Back</a>";
    }
}

?>