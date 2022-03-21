    <?php include('partials-front/menu.php'); ?>
    <style>
        .btn-primary{
            background-color: purple;
            font-color: green;
        }
        </style>

    <!-- Event search Section Starts Here -->
    <section class="event-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>user/event-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Events.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Event sEARCH Section Ends Here -->

    <?php 
        if(isset($_SESSION['reg']))
        {
            echo $_SESSION['reg'];
            unset($_SESSION['reg']);
        }
    ?>

    <!-- clubs Section Starts Here -->
    <section class="clubs" style="background-color:#bacae3">
        <div class="container">
            <h2 class="text-center"><b>Explore Clubs</b></h2>

            <?php 
                //Create SQL Query to Display clubs from Database
                $sql = "SELECT * FROM tbl_clubs WHERE active='Yes' AND featured='Yes' LIMIT 3";
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                //Count rows to check whether the club is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //Clubs Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values like id, title, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        
                        <a href="<?php echo SITEURL; ?>user/club-events.php?club_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    //Check whether Image is available or not
                                    if($image_name=="")
                                    {
                                        //Display MEssage
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img style="height:200px;width:200px"src="<?php echo SITEURL; ?>images/clubs/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <!-- <h3 class="float-text text-white"><?php echo $title; ?></h3> -->
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //Clubs not Available
                    echo "<div class='error'>Club not Added.</div>";
                }
            ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- clubs Section Ends Here -->



    <!-- Event list Section Starts Here -->
    <section class="event-menu">
        <div class="container">
            <h2 class="text-center"><b>Event list</b></h2>

            <?php 
            
            //Getting Events from Database that are active and featured
            //SQL Query
            $sql2 = "SELECT * FROM tbl_events WHERE active='Yes' AND featured='Yes' LIMIT 4";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //CHeck whether Event available or not
            if($count2>0)
            {
                //Event Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
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
                       <div class="text-center justify-content-end reg-button" style="margin-bottom:-50px">
                        <a href="<?php echo SITEURL; ?>user/reg.php?event_id=<?php echo $id; ?>" class="btn btn-primary text-center reg-button">Register</a>
                     </div>
             </div>
    
            </div>

                    <?php
                }
            }
            else
            {
                //Events Not Available 
                echo "<div class='error'>Events not available.</div>";
            }
            
            ?>

            

 

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="http://localhost/CLUBS_IITK/user/events.php">See All Events</a>
        </p>
    </section>
    <!-- Event list Section Ends Here -->

    
    <?php include('partials-front/footer.php'); ?>
