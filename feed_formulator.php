
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feed Formulator</title>
    <script src="bootstrap/js/jquery-3.4.0.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="custom.css">
</head>
<body>
<h1 class="text-primary text-center ml-5" >Feed Formulator</h1>
  <h4 style="color: #21cf05" class="ml-5">Automating the <b>Pearson Square</b> method for easier and efficient formulation of animal feeds at home! </h4>
<hr>
<div class="row mainDiv">
    <div class="col-md-3"></div>
    <div class="col-md-6 formulator" >
<form action="feed_formulator.php" method="POST">

    <label class="text-primary font-weight-bold ml-3">Feed Ingredient 1
        <input type="text" placeholder="enter first ingredient" name="feed1">
    </label>
    <label class="text-primary font-weight-bold ml-3">Ingredient 1 %CP
        <input type="text" placeholder="enter ingredient1 %CP" name="cp1">
    </label>
    <br><br>

    <label class="text-primary font-weight-bold ml-3">Feed Ingredient 2
        <input type="text" placeholder="enter second ingredient" name="feed2">
    </label>
    <label class="text-primary font-weight-bold ml-3">Ingredient 2 %CP
        <input type="text" placeholder="enter ingredient2 %CP" name="cp2">
    </label>
    <br><br>

    <label class="text-primary font-weight-bold ml-3">Animal %CP Requirements
        <input type="text" placeholder="enter %CP requirements" name="animalCP">
    </label>
    <br><br>

    <label class="text-primary font-weight-bold ml-3">Desired Feed Amount(kg)
        <input type="text" placeholder="enter feed amount(kg)" name="amount">
    </label>
    <br><br>

    <input type="submit" value="Calculate" name="ans" class="btn btn-primary" >
    <br><br>
    <a href="BizLand/index.html" class="text-danger">Back Home</a>
</form>
    </div>
    <div class="col-md-3"></div>
</div>
<h1 style="color: #ff0003"><b>Results:</b></h1>
<?php
if(isset($_POST["ans"])){
    $feedOneCp = $_POST["cp1"];
    $feedTwoCp = $_POST["cp2"];
    $feedOne = $_POST["feed1"];
    $feedTwo = $_POST["feed2"];
    $animalCp = $_POST["animalCP"];
    $feedBatch = $_POST["amount"];
    $feedOneParts = (abs($feedTwoCp - $animalCp)); //abs() Function returns the positive value of a number
    $feedTwoParts = (abs($feedOneCp - $animalCp));
    $totalParts = $feedOneParts + $feedTwoParts;
    $feedOneKgs = round($feedBatch * ($feedOneParts/$totalParts),1);
    $feedTwoKgs = round($feedBatch * ($feedTwoParts/$totalParts),1);

    echo "Hello there farmer, For a feed batch that is <div id='a'> $feedBatch kg,</div> You need <div id='b'>$feedOneKgs kg of $feedOne</div> and<div id='c'> $feedTwoKgs kg of $feedTwo</div>";
    echo "<br>";
}
?>
</body>
</html>
