<?php

include('connection.php');
session_start();
echo @$_SESSION['delete_msg'];
unset($_SESSION['delete_msg']);
$sql = "SELECT * from comment";
$result = mysqli_query($db,$sql);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Lucy Hotel </title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
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
            <div class="col-md-9"><!-- colomn -->
                <!-- loop the messages -->
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Massage</th>
                        <th colspan="2">Action</th>
                    </tr>
                    <?php
                    $num = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $num++;
                            $cus_id = $row['customer_ID'];
                            $sql_info = "SELECT * from customer_information where customer_ID = '$cus_id'";
                            $result_info = mysqli_query($db,$sql_info);
                            $row_info = mysqli_fetch_array($result_info); 
                        
                    ?>
                    <tr>
                        <td><?php echo $num; ?></td>
                        <td><?php echo $row_info['first_name']; ?></td>
                        <td><?php echo $row_info['last_name']; ?></td>
                        <td style="overflow: hidden;"><?php echo $row['message']; ?></td>
                        <form action="viewOldComment.php" method="POST">
                            <input type="text" name="id" value="<?php echo $row['ID']; ?>" hidden>
                            <td><button type="submit" name="view" class="btn btn-primary">View</button></td>
                        </form>
                        <form action="deleteOldComment.php" method="POST">
                            <input type="text" name="id" value="<?php echo $row['ID']; ?>" hidden>
                            <td><button type="submit" name="delete" onclick="deleteconformation()" class="btn btn-danger">Delete</button></td>
                        </form>
                    </tr>
                    <?php
                        }
                        ?>
                </table>
            </div>
        </div>
    </section>
        
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
        