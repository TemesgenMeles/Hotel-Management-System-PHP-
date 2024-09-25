<?php
session_start();
echo @$_SESSION['login_msg'];
unset($_SESSION['login_msg']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lucy hotel</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.css">
</head>
<body>
    <div class="mycontainer">
        <div class="row">
            <div class="panel panel-warning col-md-6">
        <div class="panel-heading">
            <img src="../image/lucy-hotel_logo3.svg" alt=" lucy hotel logo">
            <h4>Staff login Page</h4>
        </div>
        <div class="panel-body">
            <form action="login.php" method="post">
                <div class="input-group form-group">
                    <span class="input-group-addon">User Name:<i class="fa fa-user"></i></span>
                    <input type="text" name="uname"  class="form-control" placeholder="User Name">
                </div>
                <div class="input-group form-group">
                    <span class="input-group-addon">Password:</span>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="input-group form-group">
                    <span class="input-group-addon">User Type</span>
                    <select name="usertype" class="form-control"> 
                        <option class="selected" value="no_selection">Select User Type</option>
                        <option value="Admin">Admin</option>
                        <option value="Manager">Manager</option>
                        <option value="Reception">Reception</option>
                        <option value="Chef">Chef</option>
                    </select>
                </div>
                
        </div>
        <div class="panel-footer">
            <div class="btn-group">
                <input type="reset" value="Cancle" class="btn btn-danger button_cancel">
                <input type="submit" value="Login" name="login" class="btn btn-success button_login">
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
<style>
    :root{
    --primary-color: #ffce14;
    --secondary-color: #0f2453;
    --white-color: white;
    --black-color: black;
    --blue-color: rgb(0, 119, 255);
    --green-color: rgb(255, 5, 5);
}

*{
    padding: 0px 0px;
    margin: 0px 0px;
    text-decoration: none;
    list-style: none;
    box-sizing: border-box;
}
.mycontainer{
    height: 90vh;
    background: linear-gradient(rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.85)), url("../image/hotel-bg.jpg") center/cover no-repeat;
}
.mycontainer .row{
    padding: 0px 0px;
    display: flex;
    justify-content: space-around;
    padding-top: 50px;
    padding-left: 150px;
}
.mycontainer .row .panel{
    border: 3px solid var(--primary-color);
    background-color: transparent;
}
.mycontainer .row .panel-heading{
   background-color: transparent;
   border-bottom: 1px solid var(--primary-color);
   text-align: center;
}
.mycontainer .row .panel-heading h4{
    text-transform: uppercase;
    font-size: 20px;
    font-weight: bold;
    text-align: center;
    color: white;
}
.mycontainer .row .panel-heading h4 span{
    color: var(--primary-color);
}
.mycontainer .row .panel-body input ,
.mycontainer .row .panel-body span,
.mycontainer .row .panel-body select{
    background-color: transparent;
    border: 1px solid var(--primary-color);
    color: var(--primary-color);
    font-weight: bold;
}
.mycontainer .row .panel-body input:focus{
    background-color: transparent;
    color: var(--primary-color);
    font-weight: bold; 
}
.mycontainer .row .panel-body .form-group{
    padding: 7px 10px;
}
.mycontainer .row .panel-footer{
    background-color: transparent;
    border-top: none;
    text-align: center;
    margin-bottom: 20px;
}
.mycontainer .row .panel-footer .button_login{
    background-color: transparent;
    border: 2px solid var(--blue-color);
    padding: 5px 15px;
    color: var(--blue-color);
    letter-spacing: 1.7px;
    font-size: 15px;
    font-weight: bold;
    border-radius: 10px;
    margin-right: 10px;
}
.mycontainer .row .panel-footer .button_login:hover{
    color: var(--white-color);
    background-color: var(--blue-color);
}
.mycontainer .row .panel-footer .button_cancel{
    background-color: transparent;
    border: 2px solid var(--green-color);
    padding: 5px 15px;
    color: var(--green-color);
    letter-spacing: 1.7px;
    font-size: 15px;
    font-weight: bold;
    border-radius: 10px;
    margin-right: 10px;
}
.mycontainer .row .panel-footer .button_cancel:hover{
    color: var(--white-color);
    background-color: var(--green-color);
}
.footer{
    position: relative;
    padding-top: 10px;
    padding-bottom: 10px;
    font-size: 16px;
    letter-spacing: 0.9px;
    color: var(--white-color);
    background-color: #2f3138;
    text-align: center;
    
}
.footer a{
    text-decoration: none;
    color: var(--primary-color);
    font-weight: bold;
}
.footer a:hover{
    color: var(--primary-color);
    font-size: 17px;
    font-weight: bold;
}
</style>
</html>