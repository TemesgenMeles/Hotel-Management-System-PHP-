<?php
    session_start();
    include('connection.php');
    $ID = $_SESSION['ID'];
    $retrive="SELECT * FROM employee_information where emp_ID = '$ID'";

    $result=mysqli_query($db,$retrive);

    $row=mysqli_fetch_array($result);
    
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
            <div class="container" style=" margin-top: 20px ;">
                <div class="panel panel-success" style="width: 500px;">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-3">
                                <center><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($row['profile_photo']).'';?>" 
                                alt="pic" width="100px" height="100px" style="border-radius: 50%;" ></center> 
                            </div>
                            <center>
                                    <div class="row">
                                        <div class=" col-sm-4" style="padding-top: 4px;">
                                            <div style="padding-top: 4px; font-size:18px; font-weight: bold; color:black">
                                                <?php echo $row['first_name']." ".$row['last_name'];?>
                                            </div>
                                            <div style="padding-top: 6px; font-size:15px; font-weight: bold; color:black">
                                                <?php echo $row['email'];?>
                                             </div>
                                        </div>
                                        <div class="col-sm-1" style="padding-top: 4px; font-weight:bold;">
                                            <?php echo $row['type'];?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h4>Adminstrator of Lucy Hotel</h4>
                                    </div>
                                    <div class="row">
                                        <form action="changeProfile.php" method="post">
                                            <input type="text" name="id" value="<?php echo $row['emp_ID']; ?>" hidden>
                                            <button type="submit" name="profile" class="btn btn-primary">Change Profile</button>
                                        </form>
                                    </div>
                            </center>
                            
                        </div>
                       
                    </div>
                    <div class="panel-body">
                        <div class="container">
                            <div style="line-height: 2em;"><b>First Name:</b> <?php echo $row['first_name']; ?></div>
                            <div style="line-height: 2em;"><b>last Name:</b> <?php echo $row['last_name']; ?></div>
                            <div style="line-height: 2em;"><b>Email:</b> <?php echo $row['email']; ?></div>
                            <div style="line-height: 2em;"><b>Phone Number:</b> <?php echo $row['phone_number']; ?></div>
                            <div style="line-height: 2em;"><b>City:</b> <?php echo $row['city']; ?></div>
                            <div style="line-height: 2em;"><b>User Name:</b> <?php echo $row['user_name']; ?></div>                            
                        </div>
                    </div>
                    <div class="panel-footer" style="float: right;">
                        <a href="../../Staff/Manager/home.php" class=" btn btn-primary" >< Back</a>
                    </div>
                    
                </div>
            </div>
        </body>
        </html>