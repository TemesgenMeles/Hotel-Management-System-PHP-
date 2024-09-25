<?php

include('connection.php');
session_start();
echo @$_SESSION['success'];
unset($_SESSION['success']);
$sql = "SELECT * from employee_information";
$result = mysqli_query($db,$sql);

 

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
        <link rel="stylesheet" href="reservaationRoom.css">
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
                    <li class="mymenu-current drop"><a href="manageWorker.php" class="mymenu-link">User Account <i class="fa-solid fa-caret-down" id="last"></i></a>
                        <ul class="mydropdown">
                            <li class="dropitem"><a href="manageWorker.php" class="mymenu-link">Manage Account</a></li>
                            <li class="dropitem lastitem"><a href="activateAccount.php" class="mymenu-link">Activate/Deactivate Account</a></li>
                            <li class="dropitem lastitem"><a href="createAccountform.php" class="mymenu-link">Create Account</a></li>
                        </ul>
                    </li>
                    <li class="logout_button"><a href="logout.php" class="logout-link"><button type="button" class="mymenu-button"><i class="fa-sharp fa-solid fa-right-from-bracket"></i>Logout</button></a></li>
                </ul>
        </nav>
    </header>
        <div><!-- section -->
            <div class="row"><!-- row -->
                <div class="col-md-3"><!-- colomn -->
                    <nav>
                        <ul>
                            <li><a href="manageWorker.php">Worker</a></li>
                            <li><a href="manageCustomer.php">Customer</a></li>
                            <li><a href="activateAccount.php">Activate/Deactivate Account</a></li>
                            <li><a href="createAccountform.php">Create Account</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-9"><!-- colomn -->
                    <h4>Worker Account</h4>
                    <div><!-- table -->
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Type</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $num = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        $num++;
                                        ?>
                                <tr>
                                    <td><?php echo $num; ?></td>
                                    <td><?php echo $row['first_name']; ?></td>
                                    <td><?php echo $row['last_name']; ?></td>
                                    <td><?php echo $row['user_name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone_number']; ?></td>
                                    <td><?php echo $row['type']; ?></td>
                                    <form action="viewWorker.php" method="POST">
                                        <input type="text" name="emp_id" value="<?php echo $row['emp_ID']; ?>" hidden>
                                        <td><button type="submit" name="view" class="btn btn-primary"><span class="">icon View</span></button></td>
                                    </form>
                                    <form action="editWorker.php" method="POST">
                                        <input type="text" name="emp_id" value="<?php echo $row['emp_ID']; ?>" hidden>
                                        <td><button type="submit" name="edit" class="btn btn-success"><span class="">icon Edit</span></button></td>
                                    </form>
                                    <form action="deleteWorker.php" method="POST">
                                        <input type="text" name="emp_id" value="<?php echo $row['emp_ID']; ?>" hidden>
                                        <td><button type="submit" name="delete" onclick="deleteconformation()" class="btn btn-danger"><span class="">icon Delete</span></a></td>
                                    </form>
                                    
                                </tr> 
                                        <?php
                                    }
                                ?>
                                
                            </tbody> 
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div>&copy; copyright <strong>Lucy hotel.</strong> All right reserved.</div>
            <div>Designed by <a href="#"> IT Students</a>, Wollo universty, Ethiopia.</div>
        </div>
        <script>
            function deleteconformation(){
                var a = confirm('are you sure? you want to delete the employee from the database');
                if(a == false){
                event.preventDefault();
            }
            }
        </script>