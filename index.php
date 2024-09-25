<?php
session_start();
session_unset();
include('connection.php');
if (isset($_POST['Book_now'])) {
    $checkin = $_POST['check_in'];
    $checkout = $_POST['check_out'];
    $person = $_POST['person'];
    $no_of_room = $_POST['No_room'];

    $_SESSION['check_in'] = $checkin;
    $_SESSION['check_out'] = $checkout;
    $_SESSION['person'] = $person;
    $_SESSION['no_room'] = $no_of_room;

    header("Location: ./booking.php");

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Lucy Hotel </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="mystyle.scss">
    <link rel="stylesheet" href="indexstyle.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <img src="image/lucy-hotel_logo3.svg" alt="logo" class="my-logo-img">
                <a href="index.php" class="mylogo">lucy hotel<span>cradle of lexury</span></a>
                
                    <ul class="mymenu">
                        <li class="mymenu-current"><a href="index.php" class="mymenu-link"><i class="fa-sharp fa-solid fa-house-chimney"></i>Home</a></li>
                        <li class="mymenu-item"><a href="about.html" class="mymenu-link"><i class="fa-solid fa-users"></i>About</a></li>
                        <li class="mymenu-item"><a href="services.html" class="mymenu-link"><i class="fa-solid fa-bell-concierge"></i>Services</a></li>
                        <li class="mymenu-item"><a href="rooms.html" class="mymenu-link"><i class="fa-solid fa-bed"></i>Room</a></li>
                        <li class="mymenu-item"><a href="gallery.html" class="mymenu-link"><i class="fa-solid fa-image"></i>Gallery</a></li>
                        <li class="mymenu-item"><a href="contact.html" class="mymenu-link"><i class="fa-solid fa-address-book"></i>Contact</a></li>
                        <li class="mymenu-item"><a href="loginform.php" class="mymenu-button"><i class="fa-solid fa-right-to-bracket"></i>Login</a></li>
                    </ul> 
        </nav>
    </header>
    <section id="body">
        <div class="logo-body">
            <img src="image/lucy-hotel_logo3.svg" alt=" lucy hotel logo">
            <h1>Lucy Hotel</h1>
            <h4>Cradle of Lexury</h4>
            <p>Stay with friends and families</p>
            <p>come and enjoy precious moment with us</p>
            <button type="button" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
                Read More</button>
        </div>
        <!-- Read more modal value -->
        <div class="body-footer">
            <p>Get Accomodation today!</p>
        </div>
    </section>
    
<!-- for read more modals -->
<div id="id01" class="modal">
    <div class="modal-content">
        <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="image/lucy-hotel_logo3.svg" alt=" lucy hotel logo"><h3>lucy hotel</h3>
        <img src="./image/lucy3.jpg" alt="hotel image" class="hotel_image">
        </div>

        <div class="notecontainer">
            <h4>we know what you love</h4>
            <p>Providing guests unique and enchanting views from their rooms with its exceptional amenities, 
                makes Lucy Hotel one of bests in its kind.
                Try our food menu, awesome services and friendly staff while you are here.</p>
        </div>
    </div>
    </div>
        

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

    <section id="body2">
        <section id="reservation">
            <h3>Reservation</h3>
            <div class="myform">
                <form action="index.php" method="post" class="form-inline">
                    <div class="form-group">
                        <label for="checkin">Check in:</label>
                        <input type="date" name="check_in" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="checkout">Check out:</label>
                        <input type="date" name="check_out" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="person">person:</label>
                        <select name="person" class="form-control myselect">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="room">Room:</label>
                        <select name="No_room" class="form-control myselect">
                            <option value="1" selected>1</option>
                        </select>
                    </div>
                    <div class="mybutton">
                        <button type="Submit" name="Book_now" class="button"><i class="fa-sharp fa-solid fa-list-check"></i>Book Now</button>
                    </div>
                    
                </form>
            </div>
        </section>
        <section id="note">
            <p class="notes">Hospitality is central to the hotel business, yet it's a hard idea to define 
                <br>precisely, mostly, it involves being nice to people and making them <br>
                feel welcome. it is the thing we are good at.
            </p><br>
            <p class="slogan">We are always here to serve you.</p>
        </section>
        <section id="information">
            <div class="row">
                <div class="col-md-4 address">
                    <h3>Lucy Hotel</h3>
                    <p><i class="fa-solid fa-location-dot"></i> Menafesha, Buanbuha <br>
                         Wollo, Dessie<br>
                          Ethiopia <br><br>
                        <i class="fa-solid fa-phone"></i> +251 333 119107<br>
                        <i class="fa-solid fa-envelope"></i> <a href="">lucyHotel@gmail.com</a><br></p>
                </div>
                <div class="col-md-4 mylinks">
                    <h4>Useful links</h4>
                    <ul>
                        <li><a href="index.php"><i class="fa-solid fa-caret-right"></i> Home</a></li>
                        <li><a href="about.html"><i class="fa-solid fa-caret-right"></i> About us</a></li>
                        <li><a href="services.html"><i class="fa-solid fa-caret-right"></i> Services</a></li>
                        <li><a href="#"><i class="fa-solid fa-caret-right"></i> Term of Service</a></li>
                        <li><a href="#"><i class="fa-solid fa-caret-right"></i> privacy policy</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mywebs">
                    <ul>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i> twitter.com</a></li>
                        <li><a href="https://www.facebook.com/lucyhoteldessie/"><i class="fa-brands fa-facebook"></i> facebook.com</a></li>
                        <li><a href="https://www.instagram.com/lucy_hoteldessie/"><i class="fa-brands fa-instagram"></i> instagram.com</a></li>
                    </ul>
                </div>
            </div>
            
        </section>
        
        <div class="footer">
            <div>&copy; copyright <strong>Lucy hotel.</strong> All right reserved.</div>
            <div>Designed by <a href="#"> IT Students</a>, Wollo universty, Ethiopia.</div>
        </div> 
    </section>
    
</body>
</html>
