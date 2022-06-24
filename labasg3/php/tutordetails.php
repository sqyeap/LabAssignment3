<?php

include_once("dbconnect.php");

if (isset($_GET['ttid'])) {
    $ttid = $_GET['ttid'];
    $sqltutor = "SELECT * FROM tbl_tutors WHERE tutor_id = '$ttid'";
    $stmt = $conn->prepare($sqltutor);
    $stmt->execute();
    $number_of_result = $stmt->rowCount();
    if ($number_of_result > 0) {
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();
    } else {
        echo "<script>alert('Course not found.');</script>";
        echo "<script> window.location.replace('index.php')</script>";
    }
} else {
    echo "<script>alert('Page Error.');</script>";
    echo "<script> window.location.replace('index.php')</script>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/tutordetails.css">
    <script src="../js/mytutor.js" defer></script>
    <title>Tutor Details Page</title>
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
        <span>Tutor Details</span>
    </div>

    <div>
        <?php
            $i = 0;
            foreach ($rows as $tutors) {
                $i++;
                $ttid = $tutors['tutor_id'];
                $ttname = $tutors['tutor_name'];
                $ttdesc = $tutors['tutor_description'];
                $ttemail = $tutors['tutor_email'];
                $ttphone = $tutors['tutor_phone'];

                echo "<div class='w3-card w3-round' style='margin: 0 auto;'>
                     <div style='text-align: center; height: 40px; padding: 10px;'>
                     <span><b>$ttname</b></span></div>";
                echo "<a href='#' style='text-decoration: none;'> 
                     <img class='w3-image' src=../assets/tutors/$ttid.jpg" 
                     . " onerror=this.onerror=null;this.src='../assets/default_pic.png'"
                     . " style='width:auto; height:300px; display: block; margin-left: auto; margin-right: auto;'></a>";
                echo "<div class='w3-container'><p><b>Description:</b> $ttdesc<br><b>Email:</b> $ttemail<br>
                     <b>Phone No.:</b> $ttphone<br></div>
                     <div style='display: flex; justify-content: center; padding: 5px;'>
                     <input type='button' class='button w3-round w3-block' onClick='addCart($ttid)' value='Select Tutor'>
                     </p></div></div>";
            }
        ?>
    </div>
    
    <br>

    <div style="display: flex; justify-content: center;">
        <form action="tutors.php" method="POST">
            <input type="submit" class="button w3-round w3-block" value="&#8592; All Tutors">
        </form>
    </div>

    <footer>
        <p>&copy; MyTutor 2022</p>
    </footer>
</body>

</html>