<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <title>Lucy Hotel</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="navigation.css">
    <link rel="stylesheet" href="Home.css">
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
        <!-- section -->
    <div>
        <!-- row -->
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
            <!-- column -->
            <div class="col-md-9">
                <div class="col-md-7">
                    <?php echo @$_SESSION['add_meal_msg']; ?>
                    <form action="addMeal.php" method="post" enctype="multipart/form-data">
                    <label for="Meal Name">Meal Name</label>
                    <input type="text" name="mealName" class="form-control">
                    <label for="Gridient">Gridient</label>
                    <textarea name="gridient" cols="30" rows="4" class="form-control"></textarea>
                    <label for="Price">Price</label>
                    <input type="text" name="price" class="form-control">
                    <label for="Image">Image</label>
                    <input type="file" name="image" class="form-control">
                    <label for="Image">Is it Cultural:</label>
                    <select name="Ethiopian" class="form-control">
                        <option value="Not">Not</option>
                        <option value="Yes">Yes</option>
                    </select>
                    <input type="reset" value="cancle" class="btn btn-danger">
                    <input type="submit" name="add" value="Add" class="btn btn-success">
                </form>
                </div>
                
            </div>
        </div>
    </div>
        <!-- footer -->
    </section>
    
    <div class="footer" style="margin-top: 100px;">
        <div>&copy; copyright <strong>Lucy Hotel</strong>. All right reserved.</div>
        <div>Designed by <a href="#">IT students</a> Wollo universty, Ethiopia</div>
    </div>
</body>
</html>
    