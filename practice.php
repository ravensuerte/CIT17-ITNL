<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice lang</title>
    <h1>PHP PRACTICE SYNTAX</h1>
</head>
<body>
<?

# This is a comment, and
# This is the second line of the comment
// This is a comment too. Each style comments only
print "An example with single line comments";
?>
<?
# First Example
print <<<END
This uses the "here document" syntax to output
multiple lines with $variable interpolation. Note
that the here document terminator must appear on a
line with just a semicolon no extra whitespace!
END;
# Second Example
print "This spans
multiple lines. The newlines will be
output as well";
?>

<?
/* This is a comment with multiline
Author : Mohammad Mohtashim
Purpose: Multiline Comments Demo
Subject: PHP
*/
print "An example with multi line comments";
?>
<?
$four = 2 + 2; // single spaces
$four =2    +2 ; // spaces and tabs
$four =
2+
2; // multiple lines
?>
<?php
$capital = 67;
print("Variable capital is $capital<br>");
print("Variable CaPiTaL is <br>");
print(" <br>");
if (3 == 2 + 1)
{
print("Good - I haven't totally");
print("lost my mind.<br>");
}
?>

</body>
</html>