<?php

include('connection.php');

if (isset($_POST['change'])) {
    $id = $_POST['id'];
    $pic = addslashes(file_get_contents($_FILES['profilePic']['tmp_name']));
    $sql = "UPDATE employee_information set profile_photo = '$pic' where emp_ID = '$id'";
    $result = mysqli_query($db,$sql);

    if ($result) {
        header("Location: ../../Staff/Chefs/viewAccount.php");
    }
    else{
        echo mysqli_error($db);
    }
}

if (isset($_POST['profile'])) {
    $id = $_POST['id'];

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lucy hotel</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <form action="changeProfile.php" method="post" enctype="multipart/form-data">
        <input type="text" name="id" value="<?php echo $id; ?>" hidden>
        <div class="form-group">
            <label for="picture">New Picture:</label>
            <input type="file" name="profilePic" class="form-control">
        </div>
        
        <button class="btn btn-success" type="submit" name="change">Change</button>
    </form>
</body>
</html>
    <?php
}

?>