
<?php include('partials-front/menu.php'); ?>
    

<section class="event-search text-center">
    <div class="container">
        
        <form action="<?php echo SITEURL; ?>user/event-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Events.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>



    <!-- Clubs Section Starts Here -->
    <div style ="background-color:#432E29;">
        <div class="container">
            <h2 class="text-center" style="color:white"><b>Explore Clubs</b></h2>

            <?php 

                //Display all the cateories that are active
                //Sql Query
                $sql = "SELECT * FROM tbl_clubs WHERE active='Yes'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);
                
                //CHeck whether Clubs available or not
                if($count>0)
                {
                    //Clubs Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        <a href="<?php echo SITEURL; ?>user/club-events.php?club_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not found.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img  style= "width:250px; height:200px;margin:20px;"src="<?php echo SITEURL; ?>images/clubs/<?php echo $image_name; ?>" alt="club_pic" class="img-responsive img-curve">
                                        <p class ="title" style="margin-left = 10px;color:white"> <?php echo $title; ?> </p>
                                        <?php
                                    }

                                ?>
                            <b><h3 class="float-text text-white "><?php echo $title; ?></h3></b>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //Clubs Not Available
                    echo "<div class='error'>Clubs not found.</div>";
                }
                
            
            ?>

        </div>
    </div>
    <!-- Clubs Section Ends Here -->


    <?php include('partials-front/footer.php'); ?>