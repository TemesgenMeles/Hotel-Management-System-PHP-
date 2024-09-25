<?php
include ('connection.php');
session_start();
$id = $_SESSION['ID'];
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
    <link rel="stylesheet" href="resturant.css">
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
            <img src="http://localhost/lucy hotel/image/lucy-hotel_logo3.svg" alt="logo" class="my-logo-img">
            <a href="home.php" class="mylogo">lucy hotel<span>cradle of lexury</span></a>
                <ul class="mymenu">
                    <li class="mymenu-item"><a href="home.php" class="mymenu-link"><i class="fa-sharp fa-solid fa-house-chimney"></i>Home</a></li>
                    <li class="mymenu-item drop"><a href="roomReservation.php" class="mymenu-link"><i class="fa-solid fa-file-circle-check"></i>Reservation <i class="fa-solid fa-caret-down" id="last"></i></a>
                        <ul class="mydropdown">
                            <li class="dropitem"><a href="roomReservation.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Room Reservation</a></li>
                            <li class="dropitem lastitem"><a href="meetingHall.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Meeting Hall</a></li>
                        </ul>
                    </li>
                    <li class="mymenu-current drop"><a href="resturantHome.php" class="mymenu-link"><i class="fa-sharp fa-solid fa-hotel"></i>Resturant<i class="fa-solid fa-caret-down" id="last"></i></a>
                        <ul class="mydropdown">
                            <li class="dropitem current"><a href="resturantHome.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Home</a></li>
                            <li class="dropitem"><a href="resturantHome.php#my_specials" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Specials</a></li>
                            <li class="dropitem"><a href="resturantHome.php#id2" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Menus</a></li>
                            <li class="dropitem lastitem"><a href="viewOrder.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Orders</a></li>
                        </ul>
                    </li>
                    <li class="logout_button"><a href="logout.php" class="logout-link"><button type="button" class="mymenu-button"><i class="fa-sharp fa-solid fa-right-from-bracket"></i>Logout</button></a></li>
                </ul>
        </nav>
    </header>
    <header id="header_resturant">
        <nav>
            <h1><a href="resturantHome.php#" class="resturantlogo">Resturant</a></h1>
                <ul class="resturant_menu">
                    <li class="rest_curent_item"><a href="resturantHome.php#" class="rest_link">Home</a></li>
                    <li class="rest_item"><a href="resturantHome.php#my_specials" class="rest_link">Specials</a></li>
                    <li class="rest_item"><a href="resturantHome.php#id2" class="rest_link">Menu</a></li>
                    <li class="rest_item"><a href="viewOrder.php" class="rest_link">Order</a></li>
                    <li class="rest_item"><a href="resturantHome.php#book_a_table" class="rest_button"><button>Book A Table</button></a></li>
                </ul>
        </nav>
    </header>
    <section id="rest_home">
        <div class="homepage">
            <img src="http://localhost/lucy hotel/image/lucy-hotel_logo3.svg" alt=" lucy hotel logo"/>
            <h1>Lucy Hotel</h1>
            <h4>Cradle of Lexury</h4>
            <p>A taste you’ll remember.</p>
            <a href="resturantHome.php#id2"><button>Our Menu</button></a>
            <a href="resturantHome.php#id2"><button>Order</button></a>
            <a href="resturantHome.php#book_a_table"><button>Book A Table</button></a>
            <p class="head_footer">Get the best or nothing at all.</p>
        </div>
    </section>
    
    <!--row -->
    <section id="body">
        <div class="mycontainer" >
            <div class="row">
                <!--column -->
                <div class="col-md-6">
                    <h4>Choose healthy. Be strong. Live long.</h4>
                    <p style="text-align: center; margin-top: 60px;">"70% of diners say they are more likely to choose a<br>
                        restaurant that offers healthy menu options."</p>
                        <p style="text-align: center;">- National Restaurant Association</p>
                        <p style="margin-top: 100px;padding-left: 20px;">Our resturant serves delicious and healthy foods with a beautiful menu for you, <br> yourfamily and your friends. </p>
                        <p style="margin-top: 30px; text-align: center; ">We are always here to serve you.</p>
                </div>
                <!--column2 -->
                <div class="col-md-5" style="overflow: hidden; flex: 1;">
                    <img src="http://localhost/lucy hotel/image/res1.jpg" alt="resturant picture" style="box-sizing: border-box;  width: 100%;">
                </div>
            </div>
        </div>
    </section>
    
    
    <!-- Specials  -->
    <section id="my_specials">
        <div class="mycontainer">
            <h3 class="title">Specials</h3>
            <h4 class="note">Check our Specials</h4>
        <!--row -->
        
            <div class="row">
                <!--column-->
                <div class="col-md-4 mybuttons">
                    <form action="#my_specials" method="POST">
                        <div class="row">
                            <div class="col-md-5" >
                                <button type="submit" name="special1" class="btn btn-block btn-warning" style="margin: 2px; overflow: hidden;">Tibs</button>
                            </div>
                            <div class="col-md-7" >
                                <button type="submit" name="special2" class="btn btn-block btn-warning" style="margin: 2px; overflow: hidden;">Rice and Chicken Biryani</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5" >
                                <button type="submit" name="special3" class="btn btn-block btn-warning" style="margin: 2px; overflow: hidden;">Doro Wot</button>
                            </div>
                            <div class="col-md-7" >
                                <button type="submit" name="special4" class="btn btn-block btn-warning" style="margin: 2px; overflow: hidden;">Chicken Fried with Chili</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
                <!--column2-->
                
                <!-- this is to choose which image and note about the special foods -->
                    <?php
                            if (isset($_POST['special2'])) {
                        ?>
                    <div class="col-md-3">
                        <div>
                            <img src="http://localhost/lucy hotel/food image/a2.jpg" alt="pic for special 2" 
                            style="border-radius: 20%; height: 100%;  width: 100%; margin-bottom: 10px;" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-4 mynotes">
                        <h3>Lucy Rice and Chicken Biryani</h3>
                        <p>Infused with Indian flavored spices like turmeric and jeera, khao mok gai is the Thai 
                            version of chicken rice biryani. When you get a good plate, the rice should melt in your 
                            mouth and the chicken should slide right off the bone with ultimate tenderness!</p>
                    </div>
                    
                        <?php
                            }
                            elseif (isset($_POST['special3'])) {
                                ?>
                    <div class="col-md-3">
                        <div>
                            <img src="http://localhost/lucy hotel/food image/e4.jpg" alt="pic for special 3" 
                            style="border-radius: 20%; height: 100%;  width: 100%; margin-bottom: 10px;" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-4 mynotes">
                        <h3>Doro Wot</h3>
                        <p>Doro is a tasty Ethiopian dish that is mostly served on religious holidays and special occasions 
                            and offered as a sign of respect to welcome guests. Doro is prepared from a whole chicken cut into 
                            12 parts and cooked with hot sauce of berbere, onion, cardamom, and butter. 
                            After it's cooked, boiled eggs are added and it is served with injera.</p>
                    </div>
                                <?php
                            }
                            elseif (isset($_POST['special4'])) {
                                ?>
                    <div class="col-md-3">
                        <div>
                            <img src="http://localhost/lucy hotel/food image/a4.jpg" alt="pic for special 4" 
                            style="border-radius: 20%; height: 100%;  width: 100%; margin-bottom: 10px;" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-4 mynotes">
                        <h3>Chicken Fried with Chili</h3>
                        <p>Pad prik gaeng is one of my favorite go-to dishes when I just need something quick and tasty. 
                            Chicken stir fried with string beans in chili paste over rice never fails to deliver the flavor!</p>
                    </div>
                                <?php
                            }else{
                                ?>
                    <div class="col-md-3">
                        <div>
                            <img src="http://localhost/lucy hotel/food image/e5.jpg" alt="pic for special 1" 
                            style="border-radius: 20%; height: 100%;  width: 100%; margin-bottom: 10px;" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-4 mynotes">
                        <h3>Tibs</h3>
                        <p>Tibs is one of the most popular dishes for Ethiopians. It’s made from sliced beef, butter, 
                            garlic, chili, and onion. Tibs is a non-fasting food that is mostly served
                            on holidays and special occasions. It is served with a hot sauce called “Awaze”.</p>
                    </div>
                                <?php
                            }
                        ?>
                </div>
            </div>
        </div>      
    </section>
           
    <!-- Menu -->
   
<section id="id2">
<div class="mycontainer">
    <div>
        <div>
            <h3 class="title">Menu</h3>
            <h4 class="note">Check our Testy Menu</h4>
        </div>
        <div>
            
            <!-- row -->
            <div class = "row">
                <!-- column1 -->
                <!-- loop from database -->
                <div class="col-md-6">
                <h4 class="mytitle">Testy Foods</h4>
                    <?php 
                        $sql = "SELECT * from meal where status = '0'";
                        $result = mysqli_query($db,$sql);
                        while ($row = mysqli_fetch_array($result)) {
                            if($row['country'] == "Not"){

                            
                            ?>
                    <div class="row bigrow" style="margin-bottom: 10px;">
                        <div class="col-md-2">
                            <img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($row['meal_image']).'';?>" 
                             class="b"> 
                        </div>
                        <div class="col-md-10" >
                            <div class="row">
                                <div class="col-xs-9"">
                                    <h4 class="mealname" style="margin: 0px;"><?php echo $row['meal_name'] ?></h4>
                                </div>
                                <div class="col-xs-3">
                                    <h4><?php echo $row['price']; ?> birr</h4>
                                </div>
                            </div>
                            
                    <div class="row">
                                    <?php 
                                    # to display the button if the customer only checked in the hotel unles it doesn't display
                                    $sql_select_from_checkin = "SELECT * from check_in where customer_ID = '$id'";
                                    $result_check_in = mysqli_query($db,$sql_select_from_checkin);
                                    $num_rows = mysqli_num_rows($result_check_in);

                                    if($num_rows != 0){
                                        ?>
                                    <form action="mealDetail.php" method="POST">
                                        <input type="text" name="id" value="<?php echo $row['ID']; ?>" hidden>
                                        <button type="submit" name="order" class="btn btn-warning">Order</button>
                                    </form>
                                        <?php
                                    }
                                    ?>
                                    
                        </div>
                        </div>
                    </div>
                    
                    
                            <?Php
                            }
                        }
                    ?>
                    
                </div>
                <div class="col-md-6">
                <h4 class="mytitle">Ethiopian cultural food</h4>
                    <?php 
                        $sql = "SELECT * from meal where status = '0'";
                        $result = mysqli_query($db,$sql);
                        while ($row = mysqli_fetch_array($result)) {
                            if($row['country'] == "Yes"){

                            
                            ?>
                    <div class="row bigrow" style="margin-bottom: 10px;">
                        <div class="col-md-2">
                            <img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($row['meal_image']).'';?>" class="b"> 
                        </div>
                        <div class="col-md-10" >
                            <div class="row">
                                <div class="col-xs-9"">
                                    <h4 class="mealname" style="margin: 0px;"><?php echo $row['meal_name'] ?></h4>
                                </div>
                                <div class="col-xs-3">
                                    <h4><?php echo $row['price']; ?> birr</h4>
                                </div>
                            </div>
                            <div class="row">
                            <?php 
                                # to display the button if the customer only checked in the hotel unles it doesn't display
                                $sql_select_from_checkin = "SELECT * from check_in where customer_ID = '$id'";
                                $result_check_in = mysqli_query($db,$sql_select_from_checkin);
                                $num_rows = mysqli_num_rows($result_check_in);

                                if($num_rows != 0){
                                    ?>
                                <form action="mealDetail.php" method="POST">
                                    <input type="text" name="id" value="<?php echo $row['ID']; ?>" hidden>
                                    <button type="submit" name="order" class="btn btn-warning">Order</button>
                                </form>
                                <?php
                                }
                                ?>
                            </div>
                
                        </div>
                        
                    </div>
                    
                    
                            <?Php
                            }
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<section id="book_a_table">
        <div class="table">
            <h3>Resevation</h3>
            <h4>Book a tabel</h4>
            <form action="#" method="post">
                <label>Date:</label>
                <input type="date" name="date">
                <label>Time:</label>
                <input type="time" name="time">
                <label>Number of Person:</label>
                <input type="number" name="person" min="1" max="6"><br>
                <label>Message:</label>
                <textarea name="msg" cols="30" rows="5"></textarea><br>
                <input type="submit" class="tablebutton" name="bookTabel" value="Book A Table">
            </form>
        </div>

    
</section>
    <div class="footer">
        <div>&copy; copyright <strong>Lucy hotel.</strong> All right reserved.</div>
        <div>Designed by <a href="#"> IT Students</a>, Wollo universty, Ethiopia.</div>
    </div>
</body>
</html>
    