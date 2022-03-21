<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Registration</h1>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.No</th>
                        <th>Event</th>
                            
                        <th>Reg. request Date</th>
                        <th>Status</th>
                        <th>User name</th>
                        <th>Contact</th>
                        <th>Email</th>
                         <th>Actions</th>
                    </tr>

                    <?php 
                        //Get all the registrations from database
                        $sql = "SELECT * FROM tbl_regs ORDER BY id DESC"; // DIsplay the Latest Registration at First
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initail value as 1

                        if($count>0)
                        {
                            //registration Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the registration details
                                $id = $row['id'];
                                $event = $row['event'];
                                 
                                $reg_date = $row['reg_date'];
                                $status = $row['status'];
                                $customer_name = $row['name'];
                                $customer_contact = $row['contact'];
                                $customer_email = $row['email'];
                                 
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $event; ?></td>
                                         
                                        <td><?php echo $reg_date; ?></td>

                                        <td>
                                            <?php 
                                                // Requested, Accepted, Cancelled

                                                if($status=="Requested")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                 
                                                elseif($status=="Accepted")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>

                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                         <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-reg.php?id=<?php echo $id; ?>" class="btn-secondary">Update Registration Request</a>
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //No Registrations   Available
                            echo "<tr><td colspan='12' class='error'>No Registrations</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>
<?php include('partials/footer.php'); ?>
 
