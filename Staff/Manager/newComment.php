<?php

include('connection.php');
session_start();
echo @$_SESSION['comment_msg'];
unset($_SESSION['comment_msg']);
echo @$_SESSION['delete_msg'];
unset($_SESSION['delete_msg']);
$sql = "SELECT * from comment where save_status = '0' ORDER BY ID DESC";
$result = mysqli_query($db,$sql);
$num = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Lucy Hotel </title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../fontawesome/css/all.min.css">
        <link rel="stylesheet" href="navigation.css">
        <link rel="stylesheet" href="checkinview.css">
    </head>
    <body>
    <header class="topmenu">
        <nav>
            <ul>
                <li class="topitem"><i class="fa-solid fa-user"></i><i class="fa-solid fa-caret-down"></i>
                    <ul class="topdropdown">
                        <li class="topdownitem"><a href="viewAccount.php"><i class="fa-solid fa-eye"></i>View Account</a></li>
                        <li class="topdownitem"><a href="changePassword.php"><i class="fa-solid fa-key"></i>Change password</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <header class="mainmenu">
        <nav>
            <img src="../../image/lucy-hotel_logo3.svg" alt="logo" class="my-logo-img">
            <a href="home.php" class="mylogo">lucy hotel<span>cradle of lexury</span></a>
                <ul class="mymenu">
                    <li class="mymenu-item"><a href="home.php" class="mymenu-link"><i class="fa-sharp fa-solid fa-house-chimney"></i>Home</a></li>
                    
                    <li class="mymenu-item drop"><a href="userEmployee.php" class="mymenu-link"><i class="fa-solid fa-users"></i>User <i class="fa-solid fa-caret-down" id="last"></i></a>
                        <ul class="mydropdown">
                            <li class="dropitem"><a href="userEmployee.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Employee</a></li>
                            <li class="dropitem lastitem"><a href="userCustomer.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Customer</a></li>
                        </ul>
                    </li>
                    <li class="mymenu-item"><a href="report.html" class="mymenu-link"><i class="fa-sharp fa-solid fa-list-check"></i>Report</a></li>
                    <li class="mymenu-current"><a href="newComment.php" class="mymenu-link"><i class="fa-solid fa-comment"></i>Message</a></li>
                    <li class="logout_button"><a href="logout.php" class="logout-link"><button type="button" class="mymenu-button"><i class="fa-sharp fa-solid fa-right-from-bracket"></i>Logout</button></a></li>
                </ul>
        </nav>
    </header>
    <section id="view">
<div class="row"><!-- row -->
            <div class="col-md-3"><!-- colomn -->
                <nav>
                    <ul>
                        <li><a href="newComment.php">New Messages</a></li>
                        <li><a href="oldComment.php">Old Messages</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-9">
                <!-- loop the messages -->
                <div class="row">

                <?php
                if($num == 0){
                    ?>
                <h4>there is no comment here</h4>
                    <?php
                }
                while ($row = mysqli_fetch_array($result)) {
                    $cus_id = $row['customer_ID'];
                    $sql_info = "SELECT * from customer_information where customer_ID = '$cus_id'";
                    $csu_result = mysqli_query($db,$sql_info);
                    $cus_row = mysqli_fetch_array($csu_result);
                    if($cus_row['sex'] == "Male"){
                        $name = "Mr. ";
                    }else{
                        $name = "Ms. ";
                    }
                
                ?>
                    <div class="col-md-4">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <?php 
                                if($row['seen_status'] == 0){
                                    $sta = "Not Seen";
                                }else{
                                    $sta = "Seen";
                                }
                                    ?>
                                <p style="float: right;"><?php echo $sta; ?></p>
                                <center><h4><?php echo $name . $cus_row['first_name'] . " " . $cus_row['last_name'] ?></h4></center>
                            </div>
                            
                            <div class="panel-body"> 
                                <p><?php echo $row['message']; ?></p>
                            </div>
                            <div class="panel-footer" style="float: right ;">
                                <form action="actionComment.php" method="POST" style="display: inline;">
                                    <input type="text" name="id" value="<?php echo $row['ID']; ?>" hidden>
                                    <input type="text" name="old" value="<?php echo 'new'; ?>" hidden>
                                    <button type="submit" name="view" class="btn btn-primary"><span></span>View</button>
                                </form>
                                <form action="actionComment.php" method="POST" style="display: inline;">
                                    <input type="text" name="id" value="<?php echo $row['ID']; ?>" hidden>
                                    <button type="submit" name="replay" class="btn btn-warning"><span></span>Replay</button>
                                </form>
                                <form action="actionComment.php" method="POST" style="display: inline;">
                                    <input type="text" name="id" value="<?php echo $row['ID']; ?>" hidden>
                                    <input type="text" name="old" value="<?php echo 'new'; ?>" hidden>
                                    <button type="submit" name="delete" onclick="deleteconformation()" class="btn btn-danger"><span></span>Delete</button>
                                </form>
                                <form action="actionComment.php" method="POST" style="display: inline;">
                                    <input type="text" name="id" value="<?php echo $row['ID']; ?>" hidden>
                                    <button type="submit" name="save" class="btn btn-success"><span></span>Save</button>
                                </form>
                            </div>                           
                        </div>
                    </div>
                    <?php
                    $cid = $row['ID'];
                    $seen_sql = "UPDATE comment set seen_status = '1' where ID = '$cid'";
                    $seen_result = mysqli_query($db,$seen_sql);
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
        
        <div class="footer">
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
        