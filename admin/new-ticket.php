<?php include('common/header.php');?>

<?php 
$phone = $show['phone'];

if(isset($_POST['add_ticket'])){
  $subject = $_POST['subject'];
  $option = $_POST['option'];
  $message = $_POST['message'];
  $time = time();

  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"upload/$file_name");

  $sql = "INSERT INTO ticket(phone,subject,option,message,file_name,time) VALUES('$phone','$subject','$option','$message','$file_name','$time')";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Created Ticket!";
    header("location:new-ticket.php?msg=$msg");

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
                                          <?php if(isset($msg)){echo $msg;}?>
                                          </div>
                                        <?php }?>
                    </div>
                  </div>
                  <form action="" method="POST" enctype="multipart/form-data" class="dc_box_container">
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
                      <label for="order">Select Order</label>
                      <select
                        name="option"
                        id="order"
                        required
                        class="base_select"
                      >
                        <option value="test">Text2</option>
                        <option value="test">Text3</option>
                        <option value="test">Text4</option>
                        <option value="test">Text5</option>
                        <option value="test">Text6</option>
                      </select>
                    </div>
                    <br />
                    <div class="input_area">
                      <label for="message">Message</label>
                      <textarea
                        name="message"
                        id=""
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