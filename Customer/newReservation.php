<?php
session_start();
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

    header("Location: http://localhost/Lucy hotel/customer/booking.php");

}

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>lucy hotel</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
        <style>
            .button{
                background-color: transparent;
                color: #ffce14;
                font-weight: bold;
                border: 2px solid #ffce14;
                padding: 5px 20px;
            }
            .button:hover{
                background-color: #ffce14;
                color: #0f2453;
            }
        </style>
    </head>
    <body>
       <section id="reservation">
            <h3>Reservation</h3>
            <div class="myform">
                <form action="newReservation.php" method="post" class="form-inline">
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

                <a href="http://localhost/lucy hotel/Customer/roomReservation.php" class="btn btn-primary">< Back</a>
            </div>
        </section> 
    </body>
    </html>
    