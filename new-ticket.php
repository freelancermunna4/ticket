<?php include('common/header.php');

if(isset($_GET['msg'])){
  $msg = $_GET['msg'];
}

$user_id = $show['id'];
$user_name = $show['fname'];
$phone = $show['phone'];
$img = $show['img'];

if(isset($_POST['add_ticket'])){
  $subject = $_POST['subject'];
  $option = $_POST['option'];
  $message = $_POST['message'];
  $time = time();
  $user_time = time();
  $ticket_id = rand(1000,999999999);
  $refarence = rand(1000,999999999);

  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"upload/$file_name");

 $sql = "INSERT INTO ticket (user_name,user_id,user_img,ticket_id,subject,phone,option,message,file_name,user_time,time,refarence) VALUES ('$user_name', '$user_id', '$img','$ticket_id','$subject', '$phone', '$option', '$message', '$file_name','$user_time','$time','$refarence')";

  $sql = mysqli_query($conn,$sql);
  if($sql){ 
    $msg = "Successfully Created Ticket!";
    header("location:new-ticket.php?msg=$msg"); 
  }else{
    $msg = "Seomethings error! Please try again";
 }
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
                  <div class="dc_box_header">
                    <div class="dc_box_container">
                      <h6>
                        <span class="text">SUBMIT NEW TICKET </span>
                      </h6>
                      <?php if(isset($msg)){ ?><div class="alert_info">
                      <?php if(isset($msg)){echo $msg;}?></div>
                    <?php }?>
                    </div>
                  </div>
                  <form action="" method="POST" enctype="multipart/form-data" class="dc_box_container">
                    
                    <div class="input_area">
                      <label for="order">Select Category</label>
                      <select
                        name="option"
                        id="order"
                        required
                        class="base_select"
                      >
                      <?php
                      $category = mysqli_query($conn,"SELECT * FROM category");
                      while($row = mysqli_fetch_assoc($category)){ ?>
                        <option value="<?php echo $row['category'];?>"><?php echo $row['category'];?></option>
                      <?php }?>
                    </select>
                    </div>
                    <br />
                    <div class="input_area">
                      <label for="subject">Subject</label>
                      <input
                        name="subject"
                        required
                        id="subject"
                        type="text"
                        class="base_input"
                        placeholder="Subject"
                      />
                    </div>
                    <br />
                    <div class="input_area">
                      <label for="message">Message</label>
                      <textarea
                        name="message"
                        id="redactor"
                        cols="30"
                        rows="10"
                        class="base_textarea"
                        placeholder="Message..."
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
                    <button type="submit" name="add_ticket" class="base_btn">Submit</button>
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
