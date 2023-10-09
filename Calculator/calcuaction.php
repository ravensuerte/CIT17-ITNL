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
</style>
<body>
<?php
if (isset($_POST['submit'])) {

  $num1 = $_POST['num1'];
  $num2 = $_POST['num2'];
  $operator = $_POST['operator'];


  if ($operator == 'add') {
    $result = $num1 + $num2;
  } elseif ($operator == 'subtract') {
    $result = $num1 - $num2;
  } elseif ($operator == 'multiply') {
    $result = $num1 * $num2;
  } elseif ($operator == 'divide') {
    $result = $num1 / $num2;
  }

  if (isset($result)) {
    echo "<h1>Result: $result<h1>";
  }
} ?>





</body>
</html>
