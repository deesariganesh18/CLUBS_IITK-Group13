<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Registration</h1>
        <br><br>


        <?php 
        
            //CHeck whether id is set or not
            if(isset($_GET['id']))
            {
                //GEt the Registration Details
                $id=$_GET['id'];

                //Get all other details based on this id
                //SQL Query to get the Registration details
                $sql = "SELECT * FROM tbl_regs WHERE id=$id";
                //Execute Query
                $res = mysqli_query($conn, $sql);
                //Count Rows
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Detail Availble
                    $row=mysqli_fetch_assoc($res);

                    $event = $row['event'];
                    
                    $status = $row['status'];
                    $name = $row['name'];
                    $contact = $row['contact'];
                    $email = $row['email'];
                 }
                else
                {
                    //DEtail not Available/
                    //Redirect to Manage Registration
                    header('location:'.SITEURL.'admin/manage-reg.php');
                }
            }
            else
            {
                //REdirect to Manage Registration PAge
                header('location:'.SITEURL.'admin/manage-reg.php');
            }
        
        ?>

        <form action="" method="POST">
        
            <table class="tbl-30">
                
                

                <table class="tbl-30">
                <tr>
                    <td>Event Name</td>
                    <td><b> <?php echo $event; ?> </b></td>
                </tr>
                
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Requested"){echo "selected";} ?> value="Requested">Requested</option>
                             <option <?php if($status=="Accepted"){echo "selected";} ?> value="Accepted">Accepted</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td> Name: </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </td>
                </tr>

                <tr>
                    <td> Contact: </td>
                    <td>
                        <input type="text" name="contact" value="<?php echo $contact; ?>">
                    </td>
                </tr>

                <tr>
                    <td> Email: </td>
                    <td>
                        <input type="text" name="email" value="<?php echo $email; ?>">
                    </td>
                </tr>

                 
                <tr>
                    <td clospan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        

                        <input type="submit" name="submit" value="Update Register" class="btn-secondary">
                    </td>
                </tr>
            </table>
            </table>
        
        </form>


        <?php 
            //CHeck whether Update Button is Clicked or Not
            if(isset($_POST['submit']))
            {
                //echo "Clicked";
                //Get All the Values from Form
                $id = $_POST['id'];
                 

                $status = $_POST['status'];

                $customer_name = $_POST['name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                 
                //Update the Values
                $sql2 = "UPDATE tbl_regs SET 
                    name = '$customer_name',
                    status = '$status',
                    contact = '$customer_contact',
                    email = '$customer_email'
                      WHERE id=$id
                ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //CHeck whether update or not
                //And Redirect to Manage Registration with Message
                if($res2==true)
                {
                    //Updated
                    $_SESSION['update'] = "<div class='success'>Registration Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-reg.php');
                }
                else
                {
                    //Failed to Update
                    $_SESSION['update'] = "<div class='error'>Failed to Update Registration.</div>";
                    header('location:'.SITEURL.'admin/manage-reg.php');
                }
            }
        ?>


    </div>
</div>

<?php include('partials/footer.php'); ?>
