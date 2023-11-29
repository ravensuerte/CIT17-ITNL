<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP and MySQL</title>
</head>
<body>
    <h1>PHP and MySQL</h1>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname= "phpscriptdemo";

    $conn = new mysqli($servername, $username ,$password, $dbname);

    if($conn-> connect_error){
        die("Sorry Connection failed:" . $con->connect_error);
    }
    else{
        echo "Connected Successfully";
        echo "<br>";
    }
    
    $sql = "select * from course";
    $result = $conn->query($sql);
    echo "<br> Course Table <br>";
    if($result){
        while($row = $result -> fetch_assoc()){
            print( "CourseID: " . $row["CourseID"]. "   |--- | CourseName: " .$row["CourseName"] . "  |--- |   Credits:  ". $row["Credits"] );
        }
    }

    


    $conn->close();

?>
</body>
</html>

