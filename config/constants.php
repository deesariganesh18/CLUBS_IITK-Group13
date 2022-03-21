<?php 
    //Start Session
     session_start();

     $conn = new mysqli("localhost", "root", "root",'clubs_iitk','3308');
     if ($conn->connect_error) 
     {
          die("Connection failed: " . $conn->connect_error);
     }
    //Create Constants to Store Non Repeating Values
     define('SITEURL', 'http://localhost/CLUBS_IITK/');
    // define('LOCALHOST', 'localhost');
    // define('DB_USERNAME', 'root');
    // define('DB_PASSWORD', 'root');
     define('DB_NAME', 'clubs_iitk');
    
    // $conn = mysqli_connect('locahost', 'root', 'root') or die(mysqli_error()); //Database Connection
     $db_select = mysqli_select_db($conn, 'clubs_iitk') or die(mysqli_error()); //SElecting Database

    

?>