
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Members</title>


    <script src="bootstrap/js/jquery-3.4.0.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
<h1 class="text-center text-primary">Feed Nutritive Values</h1>
<table class=" table table-bordered table-dark">
    <tr>
        <th class="text-danger">Feed Name</th>
        <th class="text-danger">Feed Type</th>
        <th class="text-danger">%CP</th>
        <th class="text-danger">Delete</th>
        <th class="text-danger">Update</th>
    </tr>
    <?php
    //connect to database to fetch data
    require_once "database_connection.php";

    //prepare a select query
    $select_query = "SELECT * FROM `products` WHERE 1";

    //use mysqli_query() to fetch feeds
    $feeds = mysqli_query($connection,$select_query);

    //write while loop to display respective feeds from DB
    while($row = mysqli_fetch_assoc($feeds)){
        extract($row);
        echo " <tr>
                   <td>$jina</td>
                   <td>$status</td>
                   <td>$cp</td>
                   <td><a href='delete.php?my_id=$id'>Delete</a></td>
                 <td><a href='update.php?my_id=$id&my_name=$jina&my_status=$status &my_cp=$cp'>Update</a></td>
               </tr>";
    }
    ?>
</table>

<a href="input_feed.php">Update Feeds Nutritive Values</a> <br><br>
<a href="BizLand/index.html">Back Home</a>
</body>
</html>

