    
    <?php include('partials-front/menu.php'); ?>
    <style>
        .btn-primary{
            background-color: purple;
            font-color: green;
        }
     </style>

    <?php 
        //CHeck whether id is passed or not
        if(isset($_GET['club_id']))
        {
            //Club id is set and get the id
            $club_id = $_GET['club_id'];
            // Get the Club Title Based on Club ID
            $sql = "SELECT title FROM tbl_clubs WHERE id=$club_id";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Get the value from Database
            $row = mysqli_fetch_assoc($res);
            //Get the TItle
            $club_title = $row['title'];
        }
        else
        {
            //Club not passed
            //Redirect to Home page
            header('location:'.SITEURL);
        }
    ?>


    <!-- Event sEARCH Section Starts Here -->
    <section class="event-search text-center">
        <div class="container">
            
            <h2>Events on <a href="#" class="text-white">"<?php echo $club_title; ?>"</a></h2>

        </div>
    </section>
    <!-- Event sEARCH Section Ends Here -->



    <!-- Event List Section Starts Here -->
    <section class="event-menu d-flex flex-row">
        <div class="container">
            <h2 class="text-center"><b>Event list</b></h2>

            <?php 
            
                //Create SQL Query to Get Events based on Selected Club
                $sql2 = "SELECT * FROM tbl_events WHERE club_id=$club_id";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //Count the Rows
                $count2 = mysqli_num_rows($res2);

                //CHeck whether Events are available or not
                if($count2>0)
                {
                    //Event is Available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                         $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>
                        
                        <div class="event-menu-box d-flex flex-row">
                            <div class="event-menu-img">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/events/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
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
                    //Events not available
                    echo "<div class='error'>Events not Available.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- Event list Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
