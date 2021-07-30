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
        <h1 class="text-primary ml-5">Feeds Nutritive Values</h1>
        <form action="input_feed.php" method="POST">

            <label class="text-primary font-weight-bold ml-3">Feed Name
                <input type="text" placeholder="enter feed name" name="x" required>
            </label>
            <br><br>
            <label class="text-primary font-weight-bold ml-3">Feed Type
                <input type="text" placeholder="enter feed type" name="y" required>
            </label>
            <br><br>
            <label class="text-primary font-weight-bold ml-3">Crude Protein %
                <input type="text" placeholder="enter %CP" name="z" required>
            </label>
            <br><br>
            <input type="submit" value="Register" name="btn_reg" class="btn btn-danger"> <br><br>
            <a href="view_feeds_values.php">View Products</a> <br><br>
            <a href="BizLand/index.html">Back Home</a>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
<?php

//to check if register button is clicked
if (isset($_POST["btn_reg"])) {
    $productName = $_POST["x"];
    $nutritionStatus = $_POST["y"];
    $crudeProtein = $_POST["z"];

    //database connection
    require_once "database_connection.php";

    //create insert to save data
    $insertQuery = "INSERT INTO `products`(`id`, `jina`, `status`, `cp`) VALUES (null,'$productName','$nutritionStatus','$crudeProtein')";
    //save by using mysqli_query()
    $save = mysqli_query($connection, $insertQuery);

    //check if saving was successful
    if (isset($save)) {
        echo "Product saved successfully";
    } else {
        echo "Saving failed";
    }
}
?>
</body>
</html>
