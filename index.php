<?php 
$flag=headers_sent();
echo $flag;
include('config/constants.php');
//include('user/partials-front/menu.php');
 ?>


<html>
    <head>
        <title>Login -  </title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
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
    .form-control, .login-btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .input-group-addon .fa {
        font-size: 18px;
    }
    .login-btn {
        font-size: 15px;
        font-weight: bold;
    }
  .social-btn .btn {
    border: none;
        margin: 10px 3px 0;
        opacity: 1;
  }
    .social-btn .btn:hover {
        opacity: 0.9;
    }
  .social-btn .btn-primary {
        background: #507cc0;
    }
  .social-btn .btn-info {
    background: #64ccf1;
  }
  .social-btn .btn-danger {
    background: #df4930;
  }
    .or-seperator {
        margin-top: 20px;
        text-align: center;
        border-top: 1px solid #ccc;
    }
    .or-seperator i {
        padding: 0 10px;
        background: #f7f7f7;
        position: relative;
        top: -11px;
        z-index: 1;
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
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <h3>CLUBS_IITK</3>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="http://localhost/CLUBS_IITK/signup.php">SIGNUP</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>admin">ADMIN LOGIN</a>
                    </li>
                
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
        
        <div class="login">
            
            <?php 

            $flag = headers_sent();
            echo $flag;
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <div class="login-form">
            <!-- Login Form Starts HEre -->
            <form action="" method="POST" class="text-center">
                <div class="avatar"><i class="fa fa-user"></i></div>
                <h1 class="text-center">Login</h1>

             <br>
               <div  class = "form-group">
                    <div class="input-group">
                    


                    <input type="text" name="username" class="form-control" placeholder="Enter Username"><br><br>
                    </div>
                </div>
                <div  class = "form-group">
                    <div class="input-group">
                    <input type="password" name="password" class="form-control"  placeholder="Enter Password"><br><br>
                </div>
            
            
            <input type="submit" name="submit" value="Login" class="btn-primary btn">
            <br><br>
            </form>
            <!-- Login Form Ends HEre -->
            </div>

            <p class="text-center">Created By - <a href="www.vijaythapa.com">Group 14</a></p>
        </div>

    </body>
</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        $username = $_POST['username'];
        $password = $_POST['password'];
        // echo '$username'
        //$username = mysqli_real_escape_string($conn, $_POST['username']);
        
        // $raw_password = md5($_POST['password']);
        // $password = mysqli_real_escape_string($conn, $raw_password);

        //2. SQL to check whether the user with username and password exists or not

        //echo "$username $password";
        $sql = "SELECT * FROM user_details WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User AVailable and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'user/');
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'index.php');
        }


    }

?>