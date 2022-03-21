
    <?php include('partials-front/menu.php'); ?>

    <!-- Event search Section Starts Here -->
    <section class="event-search text-center">
        <div class="container">
            <?php 

                //Get the Search Keyword
                // $search = $_POST['search'];
                $search = mysqli_real_escape_string($conn, $_POST['search']);
            
            ?>


            <h2>Events on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- Event search Section Ends Here -->



    <!-- Event list Section Starts Here -->
    <section class="event-menu">
        <div class="container">
            <h2 class="text-center">Events</h2>

            <?php 

                //SQL Query to Get Event based on search keyword
                //$search = burger '; DROP database name;
                // "SELECT * FROM tbl_events WHERE title LIKE '%search'%' OR description LIKE '%search%'";
                $sql = "SELECT * FROM tbl_events WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether Event available of not
                if($count>0)
                {
                    //Event Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="event-menu-box">
                            <div class="event-menu-img">
                                <?php 
                                    // Check whether image name is available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/events/<?php echo $image_name; ?>" alt="image.jpg" class="img-responsive img-curve">
                                        <?php 

                                    }
                                ?>
                                
                            </div>

                            <div class="event-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                  <p class="event-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="#" class="btn btn-primary">Register</a>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Event Not Available
                    echo "<div class='error'>Event not found.</div>";
                }
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- Event Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
