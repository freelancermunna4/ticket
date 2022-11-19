<?php include('common/header.php');?>

<?php 
$user_id = $show['id'];
$name = $show['fname'];
$img = $show['img'];

if(isset($_GET['ticket_id'])){
  $ticket_id = $_GET['ticket_id'];
}

if(isset($_POST['reply_ticket'])){
  $message = $_POST['message'];
  $time = time();
  
  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"upload/$file_name");
  
  $sql = "INSERT INTO ticket(user_id,user_img,user_name,ticket_id,message,file_name,user_time) VALUES($user_id,'$img','$name','$ticket_id','$message','$file_name','$time')";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Send Message!";
    header("location:ticket-view.php?ticket_id=$ticket_id");
    
  }
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
                        <?php 
                        if(empty($viewdata['solved'])){ ?>
                          <span style="color:white;margin-left:40px;background:#24a324;border:2px solid green;padding:5px;">Open</span>                          
                        <?php }else{ ?>
                        <span style="color:white;margin-left:40px;background:#ff9999;border:2px solid red;padding:5px;">Solved</span>
                        <?php } ?>
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
                        <img src="upload/<?php echo $row['user_img']?>" alt="">
                        <h6><?php echo $row['user_name']?></h6>
                        <p><?php $user_time = $row['user_time'];echo time_elapsed_string($user_time,true);?></p>
                        <div>
                        <p><?php echo $row['message']?></p>
                      </div>
                      <?php if(!empty($row['file_name'])){?>
                        <a href="upload/<?php echo $row['file_name']?>" target="blank">Clik Hare to See file....</a>
                        <?php } ?>
                      </li>
                    </ul>
                  </div>
                  <?php } ?>


                  <?php if(!empty($row['admin_id'])){?>
                  <div class="new_message">
                    <ul>
                      <li>
                        <img src="upload/<?php echo $row['admin_img']?>" alt="">
                        <h6><?php echo $row['admin_name']?></h6>
                        <p><?php $admin_time = $row['admin_time'];echo time_elapsed_string($admin_time,true);?></p>
                        <div>
                        <p><?php echo $row['reply_message']?></p>
                      </div>
                      <?php if(!empty($row['reply_file'])){?>
                        <a href="upload/<?php echo $row['reply_file']?>" target="blank">Clik Hare to See file....</a>
                        <?php } ?>
                      </li>
                    </ul>
                  </div>
              <?php }} ?>

                </div>

                </div>  
                
                
                <!-- ----------- -->
                <?php 
                $solved = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ticket WHERE ticket_id='$ticket_id'"));                
                $solved = $solved['solved'];
                if($solved != 'true'){ ?>
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
                <?php }else{
                  echo "<h4 style ='color:red;'>Your ticket is solved.</h4>";
                } ?>
                
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