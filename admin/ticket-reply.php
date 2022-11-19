<?php include('common/header.php');?>

<?php 

$admin_id = $show['id'];
$admin_name = $show['name'];
$admin_img = $show['img'];

if(isset($_GET['user_id'])){
  $user_id = $_GET['user_id'];
  $ticket_id = $_GET['ticket_id'];
}

if(isset($_POST['reply_ticket'])){
  $reply_message = $_POST['message'];
  $admin_time = time();
  
  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"../upload/$file_name");
  
  $sql = "INSERT INTO ticket(admin_id,admin_name,admin_img,ticket_id,reply_message,reply_file,admin_time) VALUES('$admin_id','$admin_name','$admin_img','$ticket_id','$reply_message','$file_name','$admin_time')";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Send Message!";
    header("location:ticket-reply.php?user_id=$user_id&&ticket_id=$ticket_id  ");    
  }
  mysqli_query($conn,"UPDATE ticket SET status='Answered' WHERE ticket_id='$ticket_id' ORDER BY id DESC");
}
$view = mysqli_query($conn,"SELECT * FROM ticket WHERE ticket_id='$ticket_id'");
$view2 = mysqli_query($conn,"SELECT * FROM ticket WHERE ticket_id='$ticket_id'");



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
                  <h6>
                  <span class="text"><?php $viewdata = mysqli_fetch_assoc($view2); echo $viewdata['subject']?></span>
                  </h6>
                  <?php if(isset($msg)){ ?><div class="alert_info">
                  <?php if(isset($msg)){echo $msg;}?>
                  </div>
                <?php }?>
                </div>
              </div>

              <div class="all_ticket">
             <?php while($row = mysqli_fetch_assoc($view)){?>

              <?php if(!empty($row['user_id'])){?>
              <div class="old_message">
                <ul>
                  <li>
                    <img src="../upload/<?php echo $row['user_img']?>" alt="">
                    <h6><?php echo $row['user_name']?></h6>
                    <p><?php $user_time = $row['user_time'];echo time_elapsed_string($user_time,true);?></p>
                    <div>
                    <p><?php echo $row['message']?></p>
                  </div>
                  <?php if(!empty($row['file_name'])){?>
                    <a href="../upload/<?php echo $row['file_name']?>" target="blank">Clik Hare to See file....</a>
                    <?php } ?>
                  </li>
                </ul>
              </div>
              <?php } ?>
              
              <?php if(!empty($row['admin_id'])){?>
              <div class="new_message">
                <ul>
                  <li>
                    <img src="../upload/<?php echo $row['admin_img']?>" alt="">
                    <h6><?php echo $row['admin_name']?></h6>
                    <p><?php $admin_time = $row['admin_time'];echo time_elapsed_string($admin_time,true);?></p>
                    <div>
                    <p><?php echo $row['reply_message']?></p>
                  </div>
                  <?php if(!empty($row['reply_file'])){?>
                    <a href="../upload/<?php echo $row['reply_file']?>" target="blank">Clik Hare to See file....</a>
                    <?php } ?>
                      </li>
                </ul>
              </div>
          <?php }} ?>

            </div>

            </div>  
            
            
            <!-- ----------- -->
            <div class="dc_box">
              <div class="dc_box_header">
                <div class="dc_box_container">
                </div>
              </div>
              <form action="" method="POST" enctype="multipart/form-data" class="dc_box_container">
                <div class="input_area">
                  <label for="message">Reply Message</label>
                  <textarea
                    name="message"
                    id="redactor"
                    cols="30"
                    rows="10"
                    class="base_textarea"
                    placeholder="Reply here..."
                    required
                  ></textarea>
                </div>
                <br />
                <div class="input_area">
                  <label for="file">Choose File</label>
                  <input
                    name="file"
                    id="file"
                    type="file"
                    class="base_input"
                    style="height: fit-content; padding: 12px"
                  />
                </div>
                <br />
                <button type="submit" name="reply_ticket" class="base_btn">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
        <?php include('common/footer.php');?>

  <script type="text/javascript">
	$(document).ready(
		function()
		{
			$('#redactor').redactor();
		}
	);
	</script>