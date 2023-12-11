<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Binay_an"; 

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
    header("Location: main.html");
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the database
$conn->select_db($dbname);

// Create Users table
$sql = "CREATE TABLE IF NOT EXISTS Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) NOT NULL,
    Password VARCHAR(50) NOT NULL,
    UserType ENUM('Admin', 'Student', 'Instructor') NOT NULL
)";
$conn->query($sql);

// Create Student table
$sql = "CREATE TABLE IF NOT EXISTS Student (
    StudentID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    DateOfBirth DATE,
    Email VARCHAR(50) NOT NULL,
    Phone VARCHAR(15),
    UNIQUE(Email)
)";
$conn->query($sql);

// Create Course table
$sql = "CREATE TABLE IF NOT EXISTS Course (
    CourseID INT AUTO_INCREMENT PRIMARY KEY,
    CourseName VARCHAR(100) NOT NULL,
    Credits INT
)";
$conn->query($sql);

// Create Instructor table
$sql = "CREATE TABLE IF NOT EXISTS Instructor (
    InstructorID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    Phone VARCHAR(15),
    UNIQUE(Email)
)";
$conn->query($sql);

// Create Enrollment table
$sql = "CREATE TABLE IF NOT EXISTS Enrollment (
    EnrollmentID INT AUTO_INCREMENT PRIMARY KEY,
    StudentID INT,
    CourseID INT,
    EnrollmentDate DATE,
    Grade VARCHAR(2),
    FOREIGN KEY (StudentID) REFERENCES Student(StudentID),
    FOREIGN KEY (CourseID) REFERENCES Course(CourseID)
)";
$conn->query($sql);

$conn->close();
?>
