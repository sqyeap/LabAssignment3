<?php

session_start();

if (!isset($_SESSION['session_id'])) {
    echo "<script>alert('Session not available. Please login.');</script>";
    echo "<script>window.location.replace('login.php');</script>";
}

include_once('dbconnect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <script src="../js/mytutor.js" defer></script>
    <title>Dashboard</title>
</head>

<body>
    <div style="display: flex; margin: auto; padding-right: 10px;">
        <div id="mySidebar" class="w3-sidebar w3-bar-block" style="display: none;">
            <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">&times; Close</button>
            <a href="index.php" class="w3-bar-item w3-button">Dashboard</a>
            <a href="courses.php" class="w3-bar-item w3-button">Courses</a>
            <a href="tutors.php" class="w3-bar-item w3-button">Tutors</a>
            <a href="#" class="w3-bar-item w3-button">Subscriptions</a>
            <a href="#" class="w3-bar-item w3-button">Profile</a>
            <a href="login.php" class="w3-bar-item w3-button">Logout</a>
        </div>
        
        <button class="w3-button w3-xlarge" onclick="w3_open()">&#9776;</button>
        <span class="p1">MyTutor</span>
    </div>
    
    <div class="p2">
        <span>Dashboard</span>
    </div>

    <div style="display: flex; justify-content: center; padding: 10px;">
        <a href="courses.php" class="card" style="margin: 0px 20px 0px 20px;">
            <img src="../assets/coursepic.png" alt="coursepic" class="image">
            <p class="text">Courses</p>
        </a>

        <a href="tutors.php" class="card" style="margin: 0px 20px 0px 20px;">
            <img src="../assets/tutorpic.png" alt="tutorpic" class="image">
            <p class="text">Tutors</p>
        </a>
    </div>
    
    <div style="display: flex; justify-content: center; padding: 10px;">
        <a href="#" class="card" style="margin: 0px 20px 0px 20px;">
            <img src="../assets/subspic.png" alt="subspic" class="image">
            <p class="text">Subscriptions</p>
        </a>
    
        <a href="#" class="card" style="margin: 0px 20px 0px 20px;">
            <img src="../assets/profpic.png" alt="profpic" class="image">
            <p class="text">Profile</p>
        </a>
    </div>

    <footer>
        <p>&copy; MyTutor 2022</p>
    </footer>
</body>

</html>