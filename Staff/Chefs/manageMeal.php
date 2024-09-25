<?php

include('connection.php');
session_start();
//from update meal
echo @$_SESSION['msg'];
unset($_SESSION['msg']);
//------------------------------------
$sql = "SELECT * from meal";
$result = mysqli_query($db,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <title>Lucy Hotel</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="navigation.css">
    <link rel="stylesheet" href="home.css">
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
                    <li class="mymenu-item"><a href="Home.php" class="mymenu-link"><i class="fa-sharp fa-solid fa-house-chimney"></i>Home</a></li>
                    <li class="mymenu-current drop"><a href="manageMeal.php" class="mymenu-link"><i class="fa-solid fa-file-circle-check"></i>Meal <i class="fa-solid fa-caret-down" id="last"></i></a>
                        <ul class="mydropdown">
                            <li class="dropitem"><a href="manageMeal.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Manage Meal</a></li>
                            <li class="dropitem lastitem"><a href="addMealform.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Add Meal</a></li>
                        </ul>
                    </li>
                    <li class="mymenu-item"><a href="orderDelivery.php" class="mymenu-link"><i class="fa-solid fa-users"></i>Orders</a></li>
                    <li class="logout_button"><a href="logout.php" class="logout-link"><button type="button" class="mymenu-button"><i class="fa-sharp fa-solid fa-right-from-bracket"></i>Logout</button></a></li>
                </ul>
        </nav>
    </header>
    <section class="mybody">
            <!-- row -->
        <div>
            <div class="row">
                <!-- colomn -->
                <div class="col-md-3">
                    <nav>
                        <ul>
                            <li><a href="manageMeal.php">Manage Meal</a></li>
                            <li><a href="addMealform.php">Add Meal</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- colomn -->
                <div class="col-md-9">
                    <h4>Manage Meal</h4>
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Meal name</th>
                            <th>Price in birr</th>
                            <th colspan="3">action</th>
                        </tr>
                        <?php
                        $num = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $num++;
                                ?>
                        <tr>
                            <td><?php echo $num; ?></td>
                            <td><?php echo $row['meal_name']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <form action="viewMeal.php" method="POST">
                                <input type="text" name="id" value="<?php echo $row['ID']; ?>" hidden>
                                <td><button type="submit" name="view" class="btn btn-primary"><span>icon</span>View</button></td>
                            </form>
                            <form action="updateMeal.php" method="POST">
                                <input type="text" name="id" value="<?php echo $row['ID']; ?>" hidden>
                                <td><button type="submit" name="edit" class="btn btn-success"><span>icon</span>Edit</button></td>
                            </form>
                            <?php if ($row['status'] == 1) {
                                    ?>
                            <form action="enableDisable.php" method="POST">
                                <input type="text" name="id" value="<?php echo $row['ID']; ?>" hidden>
                                <td><button type="submit" name="enable" class="btn btn-success"><span class="">icon</span>Enable</button></td>
                                </form>
                            <?php
                                }else{
                                    ?>
                            <form action="enableDisable.php" method="POST">
                                <input type="text" name="id" value="<?php echo $row['ID']; ?>" hidden>
                                <td><button type="submit" name="disable" onclick="deleteconformation()" class="btn btn-danger"><span class="">icon</span>Disable</a></td>
                            </form>
                                    <?php
                                }
                            ?>
                        </tr>
                                <?php
                            }
                        ?>
                        
                    </table>
                </div>
            </div> 
        </div>
    </section>
    
    <!-- section -->
    <div class="footer">
        <div>&copy; copyright <strong>Lucy Hotel</strong>. All right reserved.</div>
        <div>Designed by <a href="#">IT students</a> Wollo universty, Ethiopia</div>
    </div>
</body>
</html>