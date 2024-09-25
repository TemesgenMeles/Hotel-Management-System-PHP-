<?php
    include('connection.php');
    session_start();
    echo @$_SESSION['delete_msg'];
    unset($_SESSION['delete_msg']);
    $ID = $_SESSION['ID'];
    $sql = "SELECT * from replay_msg where customer_ID = '$ID'";
    $result = mysqli_query($db,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lucy hotel</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="navigation.css">
</head>
<body>
<header class="mainmenu">
        <nav>
            <img src="http://localhost/lucy hotel/image/lucy-hotel_logo3.svg" alt="logo" class="my-logo-img">
            <a href="home.php" class="mylogo">lucy hotel<span>cradle of lexury</span></a>
                <ul class="mymenu">
                    <li class="mymenu-item"><a href="home.php" class="mymenu-link"><i class="fa-sharp fa-solid fa-house-chimney"></i>Home</a></li>
                </ul>
        </nav>
</header>
<div>
                <!-- loop the messages -->
                <div class="row">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                
                ?>
                    <div class="col-md-4">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <?php 
                                if($row['seen_status'] == null){
                                    $sta = "Not Seen";
                                }else{
                                    $sta = "Seen";
                                }
                                    ?>
                                <p style="float: right;"><?php echo $sta; ?></p>
                                <center><h4>From the Manager</h4></center>
                            </div>
                            
                            <div class="panel-body"> 
                                <p><?php echo $row['message']; ?></p>
                            </div>
                            <div class="panel-footer" style="float: right ;">
                                <a href="http://localhost/lucy hotel/Customer/home.php#body2" class="btn btn-warning">Replay</a>
                                <form action="deletemsg.php" method="POST" style="display: inline;">
                                    <input type="text" name="id" value="<?php echo $row['ID']; ?>" hidden>
                                    <button type="submit" name="delete" onclick="deleteconformation()" class="btn btn-danger"><span></span>Delete</button>
                                </form>
                            </div>                           
                        </div>
                    </div>
                    <?php
                    $cid = $row['ID'];
                    $seen_sql = "UPDATE replay_msg set seen_status = '1' where Customer_ID = '$ID'";
                    $seen_result = mysqli_query($db,$seen_sql);
                    }
                    ?>
                </div>
            </div>
        </div>
        <div>
            <div>&copy; copyright <strong>Lucy hotel.</strong> All right reserved.</div>
            <div>Designed by <a href="#"> IT Students</a>, Wollo universty, Ethiopia.</div>
        </div>
        <script>
            function deleteconformation(){
                var a = confirm('are you sure? you want to delete this message!');
                if(a == false){
                event.preventDefault();
            }
            }
        </script>
</body>
</html>