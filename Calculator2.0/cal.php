<?php
// Custom error handler function
function handleError($errno, $errstr) {
    echo "Error: $errstr";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the expression from the POST data
    $expression = $_POST["expression"];

    // Set the custom error handler
    set_error_handler("handleError");

    // Try evaluating the expression
    try {
        $result = eval("return $expression;");
        echo $result;
    } catch (Throwable $e) {
        echo "Error: Invalid expression";
    }

    // Restore the default error handler
    restore_error_handler();
}
?>
