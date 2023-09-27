<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variabletype</title>
</head>
<body>
    <?php
    print("Integers <br>");
    $int_var = 12345;
    print("<br>");
    print("$int_var");
    print("<br>");
    $another_int = -12345 + 12345;
    print("$another_int");
    print("<br> Doubles");
    $many = 2.2888800;
    $many_2 = 2.2111200;
    $few = $many + $many_2;
    print("<br>"); 
    print($many + $many_2 = $few);
    print("<br>");
    print("bollean type <br>");
    if (TRUE)
        print("This will always print<br>");
    else
        print("This will never print<br>");

        $true_num = 3 + 0.14159;
        $true_str = "Tried and true";
        $true_array[49] = "An array element";
        $false_array = array();
        $false_null = NULL;
        $false_num = 999 - 999;
        $false_str = "";

        
    ?>
</body>
</html>