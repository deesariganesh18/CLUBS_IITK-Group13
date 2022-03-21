<?php 
//include('user/partials-front/menu.php');
include('config/constants.php'); 

?><!--   ----------------------------------------------------------------------------------->

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
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   

<div class="main-content">
    <div class="wrapper">
          
        <br><br>

        <?php 
            if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['add']; //Display the SEssion Message if SEt
                unset($_SESSION['add']); //Remove Session Message
            }
        ?>
       <div class="login-form"> 
        <form action="" method="POST" class="text-center">
               <div class="avatar"><i class="fa fa-user"></i></div>
               <h1 class="text-center">Sign Up</h1>
               <div  class = "form-group">
                    <div class="input-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter Your name"><br><br>
                    </div>
                </div>
                <div  class = "form-group">
                    <div class="input-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email"><br><br>
                    </div>
                </div>
                <div  class = "form-group">
                    <div class="input-group">
                    <input type="text" name="username" class="form-control" placeholder="User name"><br><br>
                    </div>
                </div>
                <div  class = "form-group">
                    <div class="input-group">
                    <input type="password" name="password" class="form-control"  placeholder="Enter Password"><br><br>
                </div>
                <br><br>
                <input type="submit" name="submit" value="SignUp" class="btn-primary">
            <br><br>
           <!-- <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="name" placeholder="Enter Your Name">
                    </td>
                </tr>
                <tr>
                    <td>Email-ID: </td>
                    <td>
                        <input type="email" name="email" placeholder="Enter Your email">
                    </td>
                </tr>        
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Sig333n Up" class="btn-secondary">
                    </td>
                </tr>
            </table> -->
        </form>
        </div>
    </div>
</div>

<?php 
    //Process the Value from Form and Save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked
        //echo "Button Clicked";

        //1. Get the Data from form
        $full_name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = ($_POST['password']); //Password Encryption with MD5

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO user_details SET 
            NAME='$full_name',
            emailid = '$email',
            username='$username',
            password='$password'
        ";

        //  echo  $sql;
 
        //3. Executing Query and Saving Data into Datbase
        $conn = mysqli_connect('localhost','root','root','clubs_iitk','3308');
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        //echo "hi";
        if($res==TRUE)
        {
            //Data Inserted
             echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'>Signed Up Successfully.</div>";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'');
        }
        else
        {
            //FAiled to Insert DAta
            echo "Fail  to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Failed to Sign up.</div>";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'signup.php');
        }

    }
    
?>