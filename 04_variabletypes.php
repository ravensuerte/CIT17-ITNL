<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variabletype</title>
    <h1>04_Variables</h1>
</head>
<body>
    <style>
        h1 ,h3{
            color:blue;
        }
        body{
            background-color: black;
            color: white;
            text-align: center;
        }
    </style>
    <h3>INTEGERS</h3>
    <?php
    
    $int_var = 12345;
    print("<br>");
    print("$int_var");
    print("<br>");
    $another_int = -12345 + 12345;
    print("$another_int");
     ?>
     <h3>DOUBLE</h3>
     <?php   
    
    $many = 2.2888800;
    $many_2 = 2.2111200;
    $few = $many + $many_2;
    print("<br>"); 
    print($many + $many_2 = $few);
    print("<br>");

    ?>
    <h3>BOLEAN</h3>
    <?php
    
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
        print("<br>");
        ?>
        <h3>STRING</h3>
        <?php
        $string_1 = "This is a string in double quotes";
        print("<br>");
        print($string_1);
        $string_2 = "This is a somewhat longer, singly quoted string";
        print("<br>");
        print($string_2);
        $string_39 = "This string has thirty-nine characters";
        print("<br>");
        print($string_39);
        print("<br>");
        $string_0 = ""; // a string with zero characters
        $variable = "name";
    $literally = 'My $variable will not print!<br> ';
        print($literally);
        print("<br>");
    $literally = "My $variable will print!<br>";
        print($literally);
        print("<br>");

        

    ?>
    <?php
    $channel =<<<_XML_
    <channel>
    <title>What's For Dinner<title>
    <link>http://menu.example.com/<link>
    <description>Choose what to eat tonight.</description>
    </channel>
    _XML_;
    echo <<<END
    This uses the "here document" syntax to output
    multiple lines with variable interpolation. Note
    that the here document terminator must appear on a
    line with just a semicolon. no extra whitespace!
    <br />
    END;
        print $channel;

    ?>
    <?php
        $x = 4;
        function assignx () {
            $x = 0;
print "\$x inside function is $x. ";
}
assignx();
print "\$x outside of function is $x. ";

// multiply a value by 10 and return it to the caller
function multiply ($value) {
    $value = $value * 10;
    return $value;
    }
    $retval = multiply (10);
    Print "Return value is $retval\n";

    $somevar = 15;
function addit() {
GLOBAL $somevar;
$somevar++;
print "Somevar is $somevar";
}
addit();

function keep_track() {
    STATIC $count = 0;
    $count++;
    print $count;
    print " ";
}
keep_track();
keep_track();
keep_track();
    ?>
</body>
</html>