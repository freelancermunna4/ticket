<?php include('common/header.php');?>
<?php 
 $id = $show['id'];
 $user_phone = $show['phone'];
 $oldpass = $show['pass'];

if(isset($_POST['confirm_pass'])){
  $phone =$_POST['phone'];
  $pass =md5($_POST['pass']);

    if($user_phone==$phone&&$oldpass==$pass){
        $remove_data = mysqli_query($conn,"DELETE FROM ticket WHERE phone=$phone");
        $close = mysqli_query($conn,"DELETE FROM user_info WHERE id=$id");
        header('location:logout.php');
      }else{
        $msg = "Your Password and confirm password not same";
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
                <form action="" method="POST">
                <div class="dc_box">
                  <div class="dc_box_header">
                    <div class="dc_box_container">
                      <h6>
                        
                        <span class="icon">
                          <i class="fa fa-user"></i>
                        </span>
                        <span class="text"> Confirm Delete </span>
                      </h6>


                      <?php if(isset($msg)){ ?><div class="alert_info">
                      <?php if(isset($msg)){echo $msg;}?>
                      </div>
                    <?php }?>

                    </div>
                  </div>

                  <div class="dc_box_container">
                    <div class="input_area">
                      <label for="current_p">Phone</label>
                      <input
                        required
                        name="phone"
                        id="current_p"
                        type="text"
                        class="base_input"
                        placeholder="Phone"
                      />
                    </div>
                    <br />

                    <div class="input_area">
                      <label for="new_p">Password</label>
                      <input
                        required
                        name="pass"
                        id="new_p"
                        type="password"
                        class="base_input"
                        placeholder="Password"
                      />
                    </div>
                    <br />
                    
                    <?php
                    $user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user_info WHERE id=$id"));                    
                    if(!$user['role']=='Admin'){ ?>
                      <input name="confirm_pass" type="submit" class="base_btn" value="Delete" />
                   <?php }else{ ?>
                    <input onclick="alert('Admin can not do it!')" type="submit" class="base_btn" value="Delete" />
                  <?php } ?>
                    
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <?php include('common/footer.php');?>
