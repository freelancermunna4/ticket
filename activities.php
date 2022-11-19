<?php include('common/header.php');?>
<?php

$old_time =  $show['time'];
$phone = $show['phone'];


$ticket = "SELECT * FROM ticket WHERE phone='$phone' ORDER BY id DESC";
$tickets = mysqli_query($conn,$ticket);
$ticket = mysqli_num_rows($tickets);
if($ticket>0){  
  $ticket = mysqli_fetch_assoc($tickets);
  $ticket_time = $ticket['time'];
}


?>
  <main class="content_wrapper">
    <!--===== main page content =====-->
    <div class="content">
      <div class="container">
        <div class="page_content">
          <div class="dashboard_layout">
          <?php include('common/sidebar.php');?>

            <div class="dashboard_content">
              <div class="dc_box">
                <div class="activities">
                  <h5 class="title">Your Recent Activities</h5>

                  <div class="activity">
                    <div>
                      <img src="upload/activities.png" alt="" />
                      <b class="username">You</b>
                      <span class="action">have update your</span>
                      <b class="username">account</b>
                    </div>
                    <div class="date"><?php echo time_elapsed_string($old_time,true);?></div>
                  </div>

                  <?php 
                    if(isset($ticket_time)){
                    ?>
                  <div class="activity">
                    <div>
                      <img src="upload/activities.png" alt="" />
                      <b class="username">You</b>
                      <span class="action">have created new</span>
                      <b class="username">ticket</b>
                    </div>
                    <div class="date"><?php echo time_elapsed_string($ticket_time,true);?></div>
                  </div>
                  <?php }?>

                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php include('common/footer.php');?>
    </div>
    <!--===== main page content =====-->
  </main>