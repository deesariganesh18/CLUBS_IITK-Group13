
<?php include('partials-front/menu.php'); ?>

    <?php 
        //CHeck whether event id is set or not
        if(isset($_GET['event_id']))
        {
            //Get the event id and details of the selected event
            $event_id = $_GET['event_id'];

            //Get the DEtails of the SElected event
            $sql = "SELECT * FROM tbl_events WHERE id=$event_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                 $image_name = $row['image_name'];
            }
            else
            {
                //Event not Availabe
                //REdirect to Home Page
                header('location:'.SITEURL);
            }
        }
        else
        {
            //Redirect to homepage
            header('location:'.SITEURL);
        }
    ?>

    <!-- Event sEARCH Section Starts Here -->
    <section class="event-search " style="background-color:grey">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your registration.</h2>

            <form action="" method="POST" class="reg">
                <fieldset>
                    <legend>Selected event</legend>

                    <div class="event-menu-img">
                        <?php 
                        
                            //CHeck whether the image is available or not
                            if($image_name=="")
                            {
                                //Image not Availabe
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //Image is Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/events/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        
                    </div>
    
                    <div class="event-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="event" value="<?php echo $title; ?>">

                       
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Registration Details</legend>
                    <div class="reg-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. ShivaMani" class="input-responsive" required>

                    <div class="reg-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="reg-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. asin@nag.com" class="input-responsive" required>

                    
                    <input type="submit" name="submit" value="Confirm Registration" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 

                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $event = $_POST['event'];
                   
                    $reg_date = date("Y-m-d h:i:sa"); //Registration DAte

                    $status = "Requested";  // Requested,  Accepted, Cancelled

                    $name = $_POST['full-name'];
                    $contact = $_POST['contact'];
                    $email = $_POST['email'];
                    

                    //Save the REgistration in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO tbl_regs SET 
                        event = '$event',
                        reg_date = '$reg_date',
                        status = '$status',
                        name = '$name',
                        contact = '$contact',
                        email = '$email'
                        ";

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and Registratoin Saved
                        $_SESSION['reg'] = "<div class='success text-center'>Registered Successfully.</div>";
                        header('location:'.SITEURL.'user/events.php');
                    }
                    else
                    {
                        //Failed to Save Registration
                        $_SESSION['reg'] = "<div class='error text-center'>Failed to Register.</div>";
                        header('location:'.SITEURL );
                    }

                }
            
            ?>

        </div>
    </section>
    <!-- Event search Section Ends Here -->

    <?php //include('partials-front/footer.php'); ?>
