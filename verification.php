<?php include('common/header.php');?>

<?php
if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
}
if(isset($_SESSION['user_id'])){
   $id = $_SESSION['user_id'];
}else{
  header('location:index.php');
}

 $mail = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM mail WHERE id=1"));

// -----------email verify---------
  if(isset($_POST['gmail_verify'])){
  $tim=time();
  $sql = "UPDATE user_info SET verificode='$tim' WHERE id=$id";
  $query = mysqli_query($conn,$sql);
  $email =  $show['email'];
  $id = $show['id'];
  $code = $email.$id; 
  $verify_code = base64_encode($code);
  $verify_link = "https://support.bddonation.com/verification_code.php?verify=$tim";

  $smtp_host = $mail['smtp_host'];
  $smtp_username = $mail['smtp_user_name'];
  $smtp_password = $mail['smtp_user_pass'];
  $smtp_port = $mail['smtp_port'];
  $smtp_secure = $mail['smtp_security'];
  $site_email = $mail['site_email'];
  $site_name = $mail['site_replay_email'];
  $address = $email;
  $body = 'Hi, Mr. Your verification link is: '.$verify_link;
  $subject = 'OTP verification';
  $send = sendVarifyCode($smtp_host,$smtp_username,$smtp_password,$smtp_port,$smtp_secure,$site_email,$site_name,$address,$body,$subject);

    if($send){
        $msg = 'Your message was sent successfully. Verify your message from your mail.';
        header("location:verification.php?msg=$msg");
    }
  
}

  if(isset($_POST['nid_verify'])){
  $nid_type = $_POST['nid_type'];
  $nid_number = $_POST['nid_number'];
  $nid_info = $_POST['nid_info'];
  $time = time();
  
  $nid_front = $_FILES['nid_front']['name'];
  $nid_front_tmp = $_FILES['nid_front']['tmp_name'];
  move_uploaded_file($nid_front_tmp,"upload/$nid_front");


  $sql = "UPDATE user_info SET nid_type='$nid_type',nid_number='$nid_number',nid_info='$nid_info',nid_front='$nid_front', nid_time='$time' WHERE id=$id";
  $query = mysqli_query($conn,$sql);
  if(!$query){
    echo "Successfully Updated your Profile";
  }
}
$query = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user_info WHERE id=$id"));
$db_code = $query['gmail_verify'];

?>
<main class="content_wrapper">
    <!--===== main page content =====-->
    <div class="content">
        <div class="container">
            <div class="page_content">
                <div class="dashboard_layout">
                    <?php include('common/sidebar.php');?>

                    <div class="dashboard_content">
                      
                        <!-- ------box item------ -->
                        <div class="dc_box">
                        <?php if(empty($db_code)){ ?>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="dc_box_header">
                                    <div class="dc_box_container">
                                        <h6>
                                            <span class="icon">
                                                <img src="assets/icons/verified-user.png" alt="" />
                                            </span>
                                            <span class="text">Email Verification </span>
                                        </h6>
                                        <?php if(isset($msg)){ ?><div class="alert_info">
                                        <?php if(isset($msg)){echo $msg;}?>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="dc_box_container email_verify">
                                    <p>Not Verified
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                    </p>
                                    <?php 
                                    if(!empty($show['email'])){ ?>
                                    <input name="gmail_verify" type="submit" class="base_btn" value="Send Verification Link!" />
                                    <?php }else{?>
                                        <a href="profile.php?msg=Please Insert Your Email">Update your email here.</a>
                                        <?php } ?>
                                </div>
                            </form>
                            <?php }else{ ?>
                              <div class="dc_box_header">
                                    <div class="dc_box_container">
                                        <h6>
                                            <span class="icon">
                                                <img src="assets/icons/verified-user.png" alt="" />
                                            </span>
                                            <span class="text">Email Verification</span>
                                        </h6>
                                    </div>
                                </div>
                                <div class="dc_box_container email_verify">
                                    <p style="color:#00C7FF">Your Email is Verified</p>
                                </div>
                         <?php   } ?>


                        </div>
                        <!-- ------Nid verification section------ -->
                        <?php
                        if(!empty($show['gmail_verify'])){

                        if(empty($show['nid_verify'])){?>
                        <div class="dc_box">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="dc_box_header">
                                    <div class="dc_box_container">
                                        <h6>
                                            <span class="icon">
                                                <img src="assets/icons/verified-user.png" alt="" />
                                            </span>
                                            <span class="text"> Verification </span>
                                        </h6>
                                    </div>
                                </div>

                                <div class="dc_box_container">
                                    <div class="flex_inputs">
                                        <div class="input_area">
                                            <label for="f_name">Document Type</label>
                                            <select name="nid_type" class="base_select">
                                                <option value="nid">National ID Card</option>
                                                <option value="passport">Passport</option>
                                                <option value="driving">Driving License</option>
                                            </select>
                                        </div>
                                        <div class="input_area">
                                            <label for="d_number">Document Number</label>
                                            <input name="nid_number" required id="d_number" type="text"
                                                class="base_input" placeholder="Document Number" />
                                        </div>
                                    </div>
                                    <br />
                                    <div class="input_area">
                                        <label for="a_info">Additional information</label>
                                        <textarea name="nid_info" placeholder="Additional information" id="a_info"
                                            class="base_textarea"></textarea>
                                    </div>

                                    <br />
                                    <div class="input_area">
                                        <label for="a_info">Document File</label>
                                        <input name="nid_front" style="height: fit-content; padding: 12px" type="file"
                                            class="base_input" />
                                    </div>

                                    <br />
                                    <input name="nid_verify" type="submit" class="base_btn" value="Submit" />
                                </div>
                            </form>
                        </div>
                        <?php }else{ ?>
                            <div class="dc_box">

                                <div class="dc_box_header">
                                    <div class="dc_box_container">
                                        <h6>
                                            <span class="icon">
                                                <img src="assets/icons/verified-user.png" alt="" />
                                            </span>
                                            <span class="text">NID Verification</span>
                                        </h6>
                                    </div>
                                </div>
                                <div class="dc_box_container email_verify">
                                    <p style="color:#00C7FF">Your NID is Verified</p>
                                </div>
                        </div>
                     <?php }} ?>

                    </div>
                </div>
            </div>
        </div>


        <?php include('common/footer.php');?>
