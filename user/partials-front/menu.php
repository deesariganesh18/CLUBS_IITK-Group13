<?php
include('../config/constants.php'); 
include('login-check.php');
?>

<!DOCTYPE html>
 
<html lang="en">
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 


    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLUBS IITK</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
         <div class="container">
            <div class="logo" style="color:white">
                <h3><b>CLUBS_IITK</b></h3>
            </div>

            <div class="menu text-right" style="background-color :black">
                <ul>
                    <li>
                        <a href="http://localhost/CLUBS_IITK/user/index.php">Home</a>
                    </li>
                    <li>
                        <a href="http://localhost/CLUBS_IITK/user/clubs.php">Clubs</a>
                    </li>
                    <li>
                        <a href="http://localhost/CLUBS_IITK/user/events.php">Events</a>
                    </li>
                    <li>
                        <?php
                            $username=$_SESSION['user'];
                            
                             echo"<a href=\"http://localhost/CLUBS_IITK/user/user_profile.php?username=".$username."\">Profile</a>
                            ";
                        ?>
                        
                    </li>
                    <li><a href="logout.php">Logout</a></li>
                
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
     <!-- Navbar Section Ends Here -->