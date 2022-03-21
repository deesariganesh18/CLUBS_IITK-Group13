<?php 
    include('partials-front/menu.php');
    //include('../config/constants.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Signin Page</title>
<link rel="icon" type="image/x-icon" href="images/IRCTC1.jpg">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
    }
    .table-responsive {
        margin: 30px 0;
    }
    .table-wrapper {
        min-width: 1000px;
        background: #fff;
        
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {        
        padding-bottom: 15px;
        background: #435d7d;
        color: #fff;
        padding-left: 40px;
        padding-right: 50px;
        padding-top: 35px;
        padding-bottom: 25px;
        
        border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
    .table-title .btn-group {
        float: right;
    }
    .table-title .btn {
        color: #fff;
        float: right;
        font-size: 13px;
        border: none;
        min-width: 50px;
        border-radius: 2px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }
    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }
    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }
    table.table tr th:first-child {
        width: 10%;
    }
    table.table tr th:last-child {
        width: 100px;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }
    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }   
    table.table td:last-child i {
        
        font-size: 22px;
        margin: 0 5px;
    }
    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
        outline: none !important;
    }
    table.table td a:hover {
        color: #2196F3;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }   

  .login-form {
    width: 385px;
    margin: 30px auto;
  }
    .login-form form {        
      margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .login-form .avatar {
        color: #fff;
        margin: 0 auto 10px;
        margin-top: -15px;
        text-align: center;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        z-index: 9;
        background: blue;
        padding: 15px;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }
    .login-form .avatar i {
        font-size: 62px;
    }
</style>
</head>
<body>

    <div class="login-form">
    <form action="" method="post">
            <div class="avatar"><i class="fa fa-user"></i>
            </div>
                <h2 class="text-center">User Details</h2>   
                <div class="form-group">
        <?php
            $username=$_SESSION['user'];
            //echo"$username";
            $cdquery="SELECT * FROM user_details where user_details.username= '$username' ";
            $cdresult=mysqli_query($conn,$cdquery);
            $name="";
            while ($cdrow=mysqli_fetch_array($cdresult)) 
            {
                echo "
                
                    Full Name: ".$cdrow['NAME']." <br>
                    Email: ".$cdrow['emailid']."<br>
                    Username: ".$cdrow['username']."
                ";
                $name=$cdrow['NAME'];
            }

            echo"
                </div></form></div>
                <div class=\"container-sm\">
                    <div class=\"table table-responsive\">
                        <div class=\"table-wrapper\">
                            <div class=\"table-title\">
                                <div class=\"row\">
                                    <div class=\"col-xs-6\">
                                        <h2>Events History</h2>
                                    </div>
                                </div>
                            </div>
                            <table class=\"table table-striped table-hover text-center table-bordered\">
                            <thead>
                                <tr>
                                    <th class=\"text-center\">Sr. No.</th>
                                    <th class=\"text-center\">Event Name</th>
                                    <th class=\"text-center\">Registered Date</th>
                                    <th class=\"text-center\">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                ";
                
                $query="SELECT * FROM  tbl_regs where name='$name' ";
                $result=mysqli_query($conn,$query);
                $i=1;
                while ($row=mysqli_fetch_array($result))
                {
                    echo "<tr>
                        <td>".$i."</td>
                        <td>".$row[1]."</td>
                        <td>".$row[2]."</td>
                        <td>".$row[3]."</td>
                        </tr>
                    ";
                    $i=$i+1;
                }
                echo"
                                </tbody>
                            </table>
                        </div>
                    </div>        
                    </div>  
                ";
        ?>
</body>
</html>