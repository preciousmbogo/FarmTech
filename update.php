<?php
//to check if update link has been clicked use the GET method since its a url
if(isset($_GET["my_id"])){
    $received_id = $_GET["my_id"];
    $received_name = $_GET["my_name"];
    $received_status = $_GET["my_status"];
    $received_cp = $_GET["my_cp"];
}
?>

<! --start of my html to contain update form -->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <script src="bootstrap/js/jquery-3.4.0.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

</head>
<body>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h1 class="text-primary ml-5">Feed Nutritive Values</h1>
        <form action="update.php" method="POST" >
            <input value="<?php echo $received_id;?>" type="hidden" name="productID" >
            <label class="text-primary font-weight-bold ml-3"> Feed Name
                <input value="<?php echo $received_name?>" type="text" placeholder="enter feed name" name="jina" required>
            </label>
            <br><br>
            <label class="text-primary font-weight-bold ml-3">Feed Type
                <input value="<?php echo $received_status?>" type="text" placeholder="enter feed type" name="status" required>
            </label>
            <br><br>
            <label class="text-primary font-weight-bold ml-3">Crude Protein %
                <input value="<?php echo $received_cp?>" type="text" placeholder="enter feed %CP" name="cp" required>
            </label>
            <br><br>
            <input type="submit" value="Update" name="btn_update" class="btn btn-primary">
            <br><br>
            <a href="view_feeds_values.php" class="btn btn-outline-primary">Cancel</a>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>

<?php
//check if update has been clicked
if(isset($_POST["btn_update"])){
    $id = $_POST["productID"];
    $updatedName = $_POST["jina"];
    $updatedStatus = $_POST["status"];
    $updatedCp = $_POST["cp"];



    //connect to database
    require_once "database_connection.php";

    //create update query
   $updateQuery = "UPDATE `products` SET `jina`='$updatedName',`status`='$updatedStatus',`cp`='$updatedCp' WHERE id='$id'";
    //update user using mysqli_query()
    $update = mysqli_query($connection,$updateQuery);

    //check if update was successful
    if(isset($update)){
        header("location:view_feeds_values.php");   //redirects back to users.php file
    }else{
        echo "Update failed";
    }

}?>

</body>
</html>
