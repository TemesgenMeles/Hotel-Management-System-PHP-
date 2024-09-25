<?php
    session_start();
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
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="loginform.css">
</head>
<body>
<header>
        <nav>
        <img src="image/lucy-hotel_logo3.png" alt="logo" class="my-logo-img">
                <a href="index.php" class="mylogo">lucy hotel<span>cradle of lexury</span></a>
                
                    <ul class="mymenu">
                        <li class="mymenu-item"><a href="index.php" class="mymenu-link"><i class="fa-sharp fa-solid fa-house-chimney"></i>Home</a></li>
                        <li class="mymenu-current"><a href="loginform.php" class="mymenu-link"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
                    </ul> 
        </nav>
    </header>
    <?php
    echo @$_SESSION['failed'];
    echo @$_SESSION['sign_up_msg'];
    unset($_SESSION['sign_up_msg']);
    unset($_SESSION['failed']);
    ?>
    <div class="mycontainer">
        <div class="row">
            <div class="col-md-6 myform">
                <div class="panel panel-primary" style="width: 100%;">
                    <div class="panel-heading">
                        <img src="image/lucy-hotel_logo3.svg" alt=" lucy hotel logo">
                        <h4>Wellcome to <span>Lucy Hotel</span> </h4>
                    </div>
                    <div class="panel-body"> 
                        <form action="login.php" method="post">
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="fa-solid fa-user"></i></span>
                                <input type="text" name="username" id="username" class="form-control" placeholder="User Name">
                            </div>
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" name="password" id="pwd" class="form-control" placeholder="Password">
                            </div>        
                    </div>
                    <div class="panel-footer">
                            <button type="submit" name="login" class="button_login"><i class="fa-solid fa-right-to-bracket"></i>Login</button>
                            <a href="signup.php"><button type="button" class="button_signup"><i class="fa-solid fa-user-plus"></i>Sign up</button></a>
                        
                            
                        </form>
                        
                        
                    </div>
                        
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
