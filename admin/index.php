  
<?php include('partials/menu.php'); ?>

<style>
.main-content {
    height: 70%;
}
</style>

        <!-- Main Content Section Starts -->
        <div class="main-content" >
            <div class="wrapper" >
                <h1>Dashboard</h1>
                <br><br>
                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>

                <div class="col-4 text-center">

                    <?php 
                         $sql = "SELECT * FROM tbl_clubs";    //Sql Query    
                        $res = mysqli_query($conn, $sql);     //Execute Query
                      $count = mysqli_num_rows($res);                 //Count Rows
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Clubs
                </div>

                <div class="col-4 text-center">

                    <?php 
                        $sql2 = "SELECT * FROM tbl_events";       //Sql Query 
                        $res2 = mysqli_query($conn, $sql2);     //Execute Query
                        $count2 = mysqli_num_rows($res2);        //Count Rows
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Events
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        
                        $sql3 = "SELECT * FROM tbl_regs";          //Sql Query 
                        $res3 = mysqli_query($conn, $sql3);         //Execute Query
                       $count3 = mysqli_num_rows($res3);            //Count Rows
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Total Registrations
                </div>

               <!-- <div class="col-4 text-right">
                    
                    <?php 
                        //Creat SQL Query to Get Total Revenue Generated
                        //Aggregate Function in SQL
                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_regs WHERE status='Delivered'"; 
                        $res4 = mysqli_query($conn, $sql4);         //Execute the Query
                        $row4 = mysqli_fetch_assoc($res4);               //Get the VAlue
                         $total_revenue = $row4['Total'];                //GEt the Total REvenue

                    ?>

                    <h1>$<?php echo $total_revenue; ?></h1>
                    <br />
                    Revenue egfGenerated
                </div> -->

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main Content Setion Ends -->
       
<?php include('partials/footer.php'); ?>
 