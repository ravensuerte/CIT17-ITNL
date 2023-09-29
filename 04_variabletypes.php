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
        h5{ 
            color: red;
        }
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
    <p>
    $int_var = 12345;<br>
    $another_int = -12345 + 12345;
    <h5>OUTPUT</h5>
    <?php 
    $int_var = 12345;
    print("$int_var");
    print("<br>");
    $another_int = -12345 + 12345;
    print("$another_int");
     ?>
    </p>
   
     
     <h3>DOUBLE</h3>
     <p>
     $many = 2.2888800;<br>
     $many_2 = 2.2111200;<br>
     $few = $many + $many_2;<br>
     print("$many + $many_2 = $few");<br>
     <h5>OUTPUT</h5>
     <?php   
    $many = 2.2888800;
    print("$many");
    print("<br>");
    $many_2 = 2.2111200;
    print("$many_2");
    print("<br>");
    $few = $many + $many_2;
    print("$many + $many_2 = $few<br>");
    ?>
     </p>
     
    <h3>BOLEAN</h3>
    <p>First Example:<br>
    if (TRUE)<br>
        print("This will always print");<br>
    else<br>
        print("This will never print");<br>
    <h5>OUTPUT</h5>
    <?php
    if (TRUE)
        print("This will always print<br>");
    else
        print("This will never print<br>");
    ?>
    </p>
    
    <p>2nd Example:<br>
    $true_num = 3 + 0.14159;<br>
        $true_str = "Tried and true"<br>
        $true_array[49] = "An array element";<br>
        $false_array = array();<br>
        $false_null = NULL;<br>
        $false_num = 999 - 999;<br>
        $false_str = "";
        <h5>OUTPUT</h5>
    <?php
        $true_num = 3 + 0.14159;
        print("$true_num");
        print("<br>");
        $true_str = "Tried and true";
        print"$true_str";
        print("<br>");
        $true_array[49] = "An array element";
        print("$true_array[49]");
        print("<br>");
        $false_array = array();
        $false_null = NULL;
        print("$false_null");
        print("<br>");
        $false_num = 999 - 999;
        print"$false_num";
        print("<br>");
        $false_str = "";
        print"$false_str";
        print("<br>");
    ?>
    </p>
    <h3>NULL</h3>
    <p>
    $my_var = NULL;<br>
    $my_var = nulULL;
    <h5>OUTPUT:</h5>
    <?php
    $my_var = NULL;
    print("$my_var");
    print("<br>");
    $my_var1 = null;
    print("$my_var1");

    ?>
    </p>
        <h3>STRING</h3>
        <p>
        $string_1 = "This is a string in double quotes";<br>
        $string_2 = "This is a somewhat longer, singly quoted string";<br>
        $string_39 = "This string has thirty-nine characters";<br>
        $string_0 = ""; // a string with zero characters<br>
        EXAMPLE:<br>
        $variable = "name";<br>
        $literally = 'My $variable will not print!\\n';<br>
        print($literally);<br>
        $literally = "My $variable will print!\\n";<br>
        print($literally);
        <h5>OUTPUT:</h5>
        </p>
        <?php
        
        $variable = "name";
    $literally = 'My $variable will not print!<br> ';
        print($literally);

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