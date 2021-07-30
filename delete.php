<?php
//to check if delete button has been clicked use the GET method since its a link
if(isset($_GET["my_id"])){
    $id = $_GET["my_id"];

    //to delete connect to database
    require_once "database_connection.php";

    //Prepare delete query

    $delete_query = "DELETE FROM `products` WHERE id='$id'";

    //execute delete query using mysqli_query()
    $delete = mysqli_query($connection,$delete_query);

    //check if deletion was successful
    if(isset($delete)){
        header("location:view_feeds_values");
    }else{
        echo "Deletion failed";
    }
}
