<div class="mainbar">
      <div class="bar-head top-bar clearfix">
      <?php
            include "status_check.php";
                if($veri_status == 'verified'){
								if($status == 'paid'){
                                    ?>
           <div class="profile-card pull-right">
                <a href="#" class="profile-card-image">
                     <img src="images/<?php echo $picturenye;?>" alt="My Image"> 
                    </a> 
                    <div class="profile-body"><?php echo $first_namenye.' '.$last_namenye?></div> 
            </div>
            <!-- /.profile-card --> 
            
            <a href="admin_3.html" class="btn btn-transparent pull-right">Add Listing</a>

            <?php
                    }else{?>
                    <h4 style="text-align:justify; word-spacing:-3px;">
                    KINDLY COMPLETE YOUR REGISTRATION BY MAKING THE REQUIRED PAYMENT</h4>
                    <div class="profile-card pull-right">
                <a href="#" class="profile-card-image">
                
                     <img src="images/<?php echo $picturenye;?>" alt="My Image"> 
                    </a> 
                    <div class="profile-body"><?php echo $first_namenye.' '.$last_namenye?></div> 
            </div>
            <!-- /.profile-card -->
        <a href="../payment/initializenye.php" class="btn btn-transparent pull-right">Pay Now</a>
                    <?php } }

                    else{ ?>

<h4 style="">
                    Kindly complete your verificaton <a href="./verification.php">here</a></h4>
                    <div class="profile-card pull-right">
                <a href="#" class="profile-card-image">
                
                     <img src="images/<?php echo $picturenye;?>" alt="My Image"> 
                    </a> 
                    <div class="profile-body"><?php echo $first_namenye.' '.$last_namenye?></div> 
            </div>
            <!-- /.profile-card -->
        <a href="../payment/initializenye.php" class="btn btn-transparent pull-right">Pay Now</a>

                    <?php 
                    }
            ?>
     </div