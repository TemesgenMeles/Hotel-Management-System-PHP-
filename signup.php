<?php
session_start();
    include_once 'connection.php';
    if(isset($_POST['signup'])){
        $fname=$_POST['fName'];
        $lname=$_POST['lName'];
        $email=$_POST['email'];
        $mobile=$_POST['PhoneNum'];
        $age=$_POST['age'];
        $sex=$_POST['sex'];
        $country=$_POST['country'];
        $city=$_POST['city'];
        $nationality=$_POST['nationality'];
        $uname=$_POST['userName'];
        $pass=$_POST['password'];
        $cpass=$_POST['confirmPassword'];
        $img=addslashes(file_get_contents('./image/default.jpg'));

        if(!($pass === $cpass)){
            echo "password doesn't match ";
        }
        else{
            $query = "INSERT INTO customer_information(first_name,last_name,sex,age,email,profile_photo,phone_number,city,country,nationality,user_name,password)
            values('$fname','$lname','$sex','$age','$email','$img','$mobile','$city','$country','$nationality','$uname','$pass')";
            $result=mysqli_query($db,$query);

             if($result){
               $_SESSION['sign_up_msg'] = "<script>alert('Sign up successfully');</script>";
               header('Location: ./loginform.php');
             }else{
              die ("failed".mysqli_error($db));
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucy Hotel</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="mystyle.scss">
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <script>
        
    </script>
</head>
<body>
<header>
        <nav>
        <img src="./image/lucy-hotel_logo3.png" alt="logo" class="my-logo-img">
                <a href="index.php" class="mylogo">lucy hotel<span>cradle of lexury</span></a>
                
                    <ul class="mymenu">
                        <li class="mymenu-item"><a href="loginform.php" class="mymenu-link"><i class="fa-solid fa-caret-left"></i>Back</a></li>
                    </ul> 
        </nav>
    </header>
    <div class="mycontainer">
        <div class="row bigrow">
            <div class="col-md-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <img src="./image/lucy-hotel_logo3.svg" alt=" lucy hotel logo">
                        <h4>Customer Registration Form</h4>
                    </div>
                    <form action="signup.php" method="post">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="First_Name">First Name:</label>
                                        <input type="text" name="fName" id="name" class="form-control" placeholder="First Name" pattern="[A-Za-z]{3,20}"
                                        title="Name should only contain letters and should be greater than 3 and lessthan 20 e.g John" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Last_Name">Last Name:</label>
                                        <input type="text" name="lName" class="form-control" placeholder="Last Name" pattern="[A-Za-z]{3,20}"
                                        title="Name should only contain letters and should be greater than 3 and lessthan 20 character e.g John" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Email">Email:</label>
                                        <input type="text" name="email" pattern='^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,
                                        ;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$'
                                         title="email should be in correct format e.g example@gmail.com" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Phone_Number">Phone Number:</label>
                                        <input type="text" name="PhoneNum" class="form-control" placeholder="Phone Number" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Age">Age:</label>
                                        <input type="number" name="age" class="form-control" min="18" max="90" id="age"
                                        title="you can't create account unless you are 18 years old and above" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Sex">Sex:</label><br>
                                        <input type="radio" name="sex" value="Male" checked><span>Male</span>  &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="sex" value="Male"><span>Female</span> 
                                    </div>
                                    
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="country">Country:</label>
                                        <input type="text" name="country" class="form-control" placeholder="Country" pattern="[A-Za-z]{2,20}"
                                         title="only contain letters and should be greater than 3 and lessthan 20 character e.g Ethiopia" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="City">City:</label>
                                        <input type="text" name="city" class="form-control" placeholder="City" pattern="[A-Za-z]{2,15}"
                                        title="e.g Dessie" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nationality">Nationality:</label>
                                        <input type="text" name="nationality" class="form-control" placeholder="Nationality" pattern="[A-Za-z]{2,20}"
                                         title="only contain letters and should be greater than 3 and lessthan 20 character e.g Ethiopia" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="User_Name">User Name:</label>
                                        <input type="text" name="userName" class="form-control" placeholder="Example@123" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Password">Password:</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Confirm_Password">Confrim Password:</label>
                                        <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                            </div>
                        <div class="panel-footer">
                            <button type="submit" name="signup" class="button_signup"><i class="fa-solid fa-user-plus"></i>Sign up</button>
                            <button type="reset" class="button_cancel"><i class="fa-solid fa-user-xmark"></i>Cancel</button>
                        </div>
                    </form>
                </div> 
            </div>
            
        </div>  
    </div>
    
    <div class="footer">
        <div>&copy; copyright <strong>Lucy hotel.</strong> All right reserved.</div>
        <div>Designed by <a href="#"> IT Students</a>, Wollo universty, Ethiopia.</div>
    </div>
</body>
</html>



