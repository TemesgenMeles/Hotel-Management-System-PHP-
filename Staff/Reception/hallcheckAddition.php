<?php

include ("connection.php");
session_start();
if(isset($_POST['bank_check'])){
    $reserv_ID = $_POST['reserv_ID'];
    $trans_ref = $_POST['transsactionReference'];
    $bank = $_POST['bank_name'];

    $sql = "SELECT * from bank where trans_ref = '$trans_ref' AND bank_name = '$bank'";
    $result = mysqli_query($db,$sql);
    $numrow = mysqli_num_rows($result);
    if($numrow != 0){
        $reservaton_select = "SELECT customer_ID,bank_check from hall_reservation where ID = '$reserv_ID'";
        $reservaton_result = mysqli_query($db,$reservaton_select);
        $reservaton_row = mysqli_fetch_array($reservaton_result);
        $cust_ID =$reservaton_row['customer_ID'];
        if ($reservaton_row['bank_check'] == 0) {
            $update_sql = "UPDATE hall_reservation set transaction = NULL , bank_check = 1";
            $update_result = mysqli_query($db,$update_sql);
            if ($update_result) {
                $_SESSION['bank_msg'] = "The customer uploded transaction picture used before. ";
                header("Location: ../../Staff/Reception/reservationHall.php");
            }
        }else {
            $ins_before_del = "INSERT INTO reservation_drop values ('$cust_ID')";
            $ins_result = mysqli_query($db,$ins_before_del);
            $delete_sql = "DELETE from hall_reservation where ID = '$reserv_ID'";
            $delete_result = mysqli_query($db,$delete_sql);
            if ($delete_result) {
                $_SESSION['bank_msg'] = "The system drops the customer hall reservation";
                header("Location: ../../Staff/Reception/reservationHall.php");
            }
        }
        
    }
    else{
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
        <div>
            <div class="row container">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <?php 
                        // to get the image of the transaction 
                        $img = "SELECT * from hall_reservation where ID = '$reserv_ID'";
                        $img_result = mysqli_query($db,$img);
                        $img_row = mysqli_fetch_array($img_result);
                        $customer_id = $img_row['customer_ID'];
                        
                        ?>
                        <img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($img_row['transaction']).'';?>" alt="image from database" style="width: 100%; height: 100%;">
                    </div>
                    <form class="form-horizontal" action="insertIntoBank.php" method="post">
                        <input type="text" name="type" value="hall_reservation" hidden>
                        <input type="text" name="trans_ref" value="<?php echo $trans_ref; ?>" hidden>
                        <input type="text" name="bank_name" value="<?php echo $bank; ?>" hidden>
                        <input type="text" name="customer_id" value="<?php echo $customer_id; ?>" hidden>
                        <div class="panel-body"> 
                            <div class="form-group">
                                <label for="AccountNumber" class="control-label col-sm-3">Dr. Account Number:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="accountNumber" class="form-control">
                                </div>  
                            </div>
                            <div class="form-group">
                                <label for="AccountName" class="control-label col-sm-3">Account Name:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="accountName" class="form-control">
                                </div>  
                            </div>
                            <div class="form-group">
                                <label for="DeptAmount" class="control-label col-sm-3">Dept Amount:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="amount" class="form-control">
                                </div>  
                            </div>
                            <div class="form-group">
                                <label for="date" class="control-label col-sm-3">Date:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="date" class="form-control">
                                </div>  
                            </div>
                        </div>
                        <div class="panel-footer">
                            <center><button type="submit" name="checked" class="btn btn-success ">Checked</button></center>
                        </div>
                    </form>
                </div>
            </div>    
        </div>
    </body>
</html>


        <?php
    }
}

?>
