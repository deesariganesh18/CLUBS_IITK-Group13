
    <?php include('partials-front/menu.php'); ?>
    <link rel="icon" type="image/x-icon" href="../images/logo.jpg">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<style>
    .btn-primary{
        background-color: purple;
        font-color: green;
    }
</style>

<?php 
    if(isset($_SESSION['reg']))
    {
        echo $_SESSION['reg'];
        unset($_SESSION['reg']);
    }
?>

<!-- Event sEARCH Section Starts Here -->
<section class="event-search text-center">
    <div class="container">
        
        <form action="<?php echo SITEURL; ?>user/event-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Events.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- Event sEARCH Section Ends Here -->



<!-- Event MEnu Section Starts Here -->
<section class="event-menu   d-flex flex-row">
    <div class="container">
        <h2 class="text-center"><b>Event list</b></h2>

        <?php 
            //Display Events that are Active
            $sql = "SELECT * FROM tbl_events WHERE active='Yes'";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //CHeck whether the Events are availalable or not
            if($count>0)
            {
                //Events Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the Values
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
    
                    $image_name = $row['image_name'];
                    ?>
                    
                    <div class="event-menu-box d-flex flex-row">

                        <div class="event-menu-img">
                            <?php 
                                //CHeck whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not Available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/events/<?php echo $image_name; ?>" alt="Event.jpg" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            
                        </div>

                        
                        <div class="event-menu-desc d-flex flex-column">
                            <div >
                            <h4 class = "text-center event-heading"><b><?php echo $title; ?></b></h4>
                             <p class="event-detail text-center">
                                <?php echo $description; ?>
                            </p>
                            </div>
                            <br>
                            <div class="text-center justify-content-end reg-button">
                            <a href="<?php echo SITEURL; ?>user/reg.php?event_id=<?php echo $id; ?>" class="btn btn-primary text-center reg-button">Register</a>
                            </div>
                        </div>
                            
                    </div>

                    <?php
                }
            }
            else
            {
                //Event not Available
                echo "<div class='error'>Event not found.</div>";
            }
        ?>

        

        

        <div class="clearfix"></div>

        

    </div>

</section>
<!-- Event list Section Ends Here -->

<?php include('partials-front/footer.php'); ?>