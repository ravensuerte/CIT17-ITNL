<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  body{
    text-align: center;

  }
  .dive{
    height: 70px;
    background-color: lightgray;
    border: 2px solid black;
    width: 150px;
    position: absolute;
    top: 30%;
    left: 25%;
    justify-content: center;
    align-items: center;
  }
  .katawan{
    position: absolute;
    top: 10%;
    left: 39%;
    border: 3px;
    background-color: gray;
    height: 300px;
    width: 300px;
  }
</style>
<body>
  <div class="katawan">
    <h1>CALCULATOR</h1>
  <div class="dive">
<?php
if (isset($_POST['submit'])) {

  $num1 = $_POST['num1'];
  $num2 = $_POST['num2'];
  $operator = $_POST['operator'];

  
  if ($operator == '+') {
    $result = $num1 + $num2;
  } elseif ($operator == '-') {
    $result = $num1 - $num2;
  } elseif ($operator == '*') {
    $result = $num1 * $num2;
  } elseif ($num2 != 0) {
    $result = $num1 / $num2;
  } elseif ($num2 == 0){
    echo "Division by zero is not allowed.";
  }

  if (isset($result)) {
    print("$num1");
    print("$operator");
    print("$num2");
    echo "<h1>= $result<h1>";
  }
} ?>
</div>
</div>




</body>
</html>

