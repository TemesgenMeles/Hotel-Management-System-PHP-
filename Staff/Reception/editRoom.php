<?php

include ('connection.php');
if (isset($_POST['edit'])) {
    $room_ID = $_POST['room_ID'];
    $room_type = $_POST['room_type'];
}
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
    <form action="updateroom.php" method="post">
        <input type="text" name="room_ID" value="<?php echo $room_ID; ?>" hidden>
        <input type="text" name="room_type" value="<?php echo $room_type; ?>" hidden>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" class="form_control">
        </div>
        <input type="submit" name="update" value="Update" class="btn btn-success">
    </form>
</body>
</html>

