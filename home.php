<?php include('common/header.php');?>
<?php 
$ticket = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM ticket WHERE refarence !='' AND user_id=$id"));
$solved = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM ticket WHERE solved='true' AND user_id=$id"));
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
                <div class="dc_box_header">
                  <div class="dc_box_container">
                    <h6>YOUR STATISTICS</h6>
                  </div>
                </div>
                <div class="dc_box_container">
                  <div class="boxes">

                    <div class="box">
                      <div class="value_area">
                        <span class="value_area_icon">
                          <i class="fa-solid fa-coins"></i></span>
                        <span class="value"><?php echo $ticket;?></span>
                      </div> 
                      <div class="title">Total Ticket</div>
                    </div> 

                    <div class="box">
                      <div class="value_area">
                        <span class="value_area_icon">
                          <i class="fa-solid fa-coins"></i></span>
                        <span class="value"><?php echo $solved;?></span>
                      </div>
                      <div class="title">Solved Ticket</div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php include('common/footer.php');?>



 
