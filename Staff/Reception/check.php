<?php

include ('connection.php');
session_start();
if (isset($_POST['check'])) {
    $reserv_ID = $_POST['reserv_id'];
    $sql = "SELECT transaction from room_reservation where ID = '$reserv_ID'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);


}

?>

<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Lucy Hotel </title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <div><!-- Continer -->
            <div class="row container">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($row['transaction']).'';?>" alt="transaction image" style="width: 400px;">
                    </div>
                    <form class="form-horizontal" action="checkAddition.php" method="POST">
                        <input type="text" name="reserv_ID" value="<?php echo $reserv_ID; ?>" hidden>
                        <div class="panel-body"> 
                            <div class="form-group">
                                <label for="Type" class="control-label col-sm-3">Transaction Reference:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="transsactionReference" class="form-control">
                                </div>  
                            </div>
                            <div class="form-group">
                                <label for="bank" class="control-label col-sm-3">Bank:</label>
                                <div class="col-sm-4">                                    
                                    <select name="bank_name" class="form-control"> 
                                        <option value="noSelection">-- Select transaction Bank --</option>      
                                        <option value="CBE">Commertial Bank of Ethiopia</option>
                                        <option value="Abay">Abay Bank</option>
                                        <option value="Abisinya">Abisinya Bank</option>
                                        <option value="Buna">Buna Bank</option>
                                    </select>
                                </div>  
                            </div>
                        </div>
                        <div class="panel-footer">
                            <center><button type="submit" name="bank_check" class="btn btn-success ">Check</button></center>
                        </div>
                    </form>
                </div>
            </div>    
        </div>
        
    </body>
</html>