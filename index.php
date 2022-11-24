<?php include('include/functions.php'); ?>
<?php 
if(!session_start()){session_start();}  
if(isset($_SESSION['user_id'])){
  $id = $_SESSION['user_id'];
  if($id>0){
    header('location:home.php');
  }
}
if(isset($_COOKIE['user_id'])){
  $id = $_COOKIE['user_id']; 
  if($id>0){
    header('location:home.php');
  }
}
 $err="";
if(isset($_POST['sign_up'])){
 $phone = $_POST['phone'];
 $u_pass = md5($_POST['pass']);
 $u_cpass = md5($_POST['cpass']);
 $time = time();
 
 
 $sign_check = "SELECT * FROM user_info WHERE phone='$phone'";
 $sign_query = mysqli_query($conn,$sign_check);
 $sign_query = mysqli_fetch_assoc($sign_query); 
 if($sign_query>0){
     $err = "You have an Account! Please login or forgot.";
 }else{
     $insert = "INSERT INTO user_info(phone,pass,time) VALUE('$phone','$u_pass','$time')";
     $insert_query = mysqli_query($conn,$insert);
     if($insert_query){
         $sql = "SELECT * FROM user_info WHERE phone='$phone' AND pass='$u_pass'";
         $result = mysqli_query($conn,$sql);
         $row = mysqli_fetch_assoc($result);
         if($row>0){
          $id = $row['id'];
          $_SESSION['user_id'] = $id;
          setcookie('user_id', $id , time()+86000);
          header('location:home.php');
      } 
     }else{
         $err= "Somethings error!";
     }
 }

}      


if(isset($_POST['login'])){
  $phone =$_POST['phone'];
  $pass = md5($_POST['pass']); 
          $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user_info WHERE phone='$phone' AND pass='$pass'"));
          if($row>0){
              $id = $row['id'];
              $_SESSION['user_id'] = $id;
              setcookie('user_id', $id , time()+86000);
              header('location:home.php');
          }else{
              $error = "You have no account! Please Sign Up.";
          }
 
}
$website = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM website WHERE id=1"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $website['logo_text']?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <meta name="HandheldFriendly" content="true" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="upload/<?php echo $website['logo']?>" type="image/x-icon" />

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Oswald:wght@200;300;400;500;600;700&display=swap"
    rel="stylesheet" />

  <!-- FONT-AWESOME -->
  <script src="https://kit.fontawesome.com/6788eb3be6.js" crossorigin="anonymous"></script>

  <!-- BEGIN CSS STYLES -->
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
  <!-- END CSS STYLES -->
</head>

<body>
  <!-- Header -->
  <header class="header">
    <div class="container">
      <div class="header_left">
        <a href="index.php" class="logo">
          <img src="upload/<?php echo $website['logo'];?>" alt="" />
          <span style="min-width: fit-content;"><?php echo $website['logo_text'];?></span>
        </a>
      </div>

      <ul class="header_right">
        <li class="deposit_btn">
          <a href="#" class="show_fsp" data-ref="login">
            <span class="icon"> <i class="fa-solid fa-wallet"></i> </span>
            <span>Deposit</span>
          </a>
        </li>

        <li class="signup_btn show_fsp" data-ref="signup">
          <a href="#" class="">
            <span>Signup</span>
          </a>
        </li>

        <li class="login_btn show_fsp" data-ref="login">
          <a href="#" class="base_gradient_btn">
            <span class="icon"><i class="fa-solid fa-lock"></i> </span>
            <span>Login</span>
          </a>
        </li>
      </ul>
    </div>
  </header>

  <main class="content_wrapper">
    <!--===== main page content =====-->
    <div class="content">
      <div class="container">
        <div class="page_content">
          <div class="dashboard_layout">
            <div class="dashboard_sidebar">
              <div class="dashboard_sidebar_item">
                <h6 class="ds_title" data-ref="my-profile">
                  <span class="text"> FEATURES </span>
                  <span class="icon"><i class="fa-solid fa-chevron-down"></i></span>
                </h6>
                <ul class="ds_ul" data-ref="my-profile">
                  <li>
                    <a href="https://www.bangladeshisoftware.com">
                    <i class="fa-solid fa-earth-americas"></i> <span>Bangladeshi Software</span>
                    </a>
                  </li>
                  <li>
                  <a href="https://web.facebook.com/bangladeshisoftware/">
                  <i class="fa-brands fa-facebook"></i>
                      <span>Facebook Page</span>
                    </a>
                  </li>
                  <li>
                  <a href="https://www.youtube.com/c/BangladeshiSoftware/">
                  <i class="fa-brands fa-youtube"></i> <span>Youtube Channel</span>
                    </a>
                  </li>
                  <li>
                  <a href="#!">
                  <i class="fa-solid fa-location-dot"></i>
                      <span>Dinajpur, Bangladesh</span>
                    </a>
                  </li>
                </ul>
              </div>

              <div class="dashboard_sidebar_item">
                <h6 class="ds_title" data-ref="setting">
                  <span class="text"> Our Recent Site </span>
                  <span class="icon"><i class="fa-solid fa-chevron-down"></i></span>
                </h6>
                <ul class="ds_ul" data-ref="setting">
                  <li>
                  <a href="https://bddonation.com">
                  <i class="fa-solid fa-earth-americas"></i>  <span>BD Donation</span>
                    </a>
                  </li>
                  <li>
                  <a href="https://cryptoexchanger.bangladeshihacker.com">
                  <i class="fa-solid fa-earth-americas"></i>  <span>Cryptoexchanger</span>
                    </a>
                  </li>
                  <li>
                  <a href="https://www.shamimrezabd.com/">
                  <i class="fa-solid fa-earth-americas"></i> 
                      <span>Shamimrezabd</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="dashboard_content">
              <div class="index">
                <h2>Welcome to our support desk.</h2>
                <h5>Each of our themes comes with 6 months of premium support, which can be extended at any time.</h5>
                <h5><?php echo $website['ticket_time'];?>.</h5>
                <ul>
                  <li><a href="#" class="show_fsp" data-ref="login"> Submit a Ticket</a></li>
                  <li><a href="#" class="show_fsp" data-ref="login"> Submit a Presale Question</a></li>
                  <li><a data-ref="login" class='link3 show_fsp' href="#"> Get a Free Quote</a></li>
                  <li><a data-ref="login" class='link4 show_fsp' href="#"> Website Customization</a></li>
                </ul>
                <p>We answer all questions within 12-24 hours, however in some cases a slight delay may occur due to analyzing and fixing the issue.</p>
                <a href="#">Support Policy</a>
              </div>


            </div>
          </div>
        </div>
      </div>

      <footer class="main_footer">
        <div class="footer_container">
          <div class="footer_left">
          <?php echo $website['f_text'];?>
          </div>
          <ul class="footer_right">
            <li>
              <a href="<?php echo $website['facebook'];?>" style="color: blueviolet">
                <i class="fab fa-facebook"></i>
              </a>
            </li>
            <li>
              <a href="<?php echo $website['twitter'];?>" style="color: blueviolet">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li>
              <a href="<?php echo $website['youtube'];?>" style="color: red">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
            <li>
              <a href="<?php echo $website['linkedin'];?>" style="color: blueviolet">
                <i class="fab fa-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
      </footer>
    </div>
    <!--===== main page content =====-->
  </main>

  <!-- All Popups -->
  <!-- Login Popup -->
  <div class="full_screen_popup" data-ref="login">
    <div class="fsp_overlay"></div>
    <form class="fsp_content" action="" method="POST">
      <h6>Login</h6>

      <div>
        <label for="phone"><small>Phone Number</small></label>
        <div class="base_input_icon">
          <div class="icon">
            <span>
              <i class="fa-solid fa-phone"></i>
            </span>
          </div>
          <input name="phone" type="text" placeholder="Phone" id="phone" required />
        </div>
      </div>

      <div>
        <label for="password"><small>Password</small></label>
        <div class="base_input_icon">
          <div class="icon">
            <span><i class="fa-solid fa-lock"></i> </span>
          </div>
          <input name="pass" type="password" placeholder="Password" id="password" required />
        </div>
      </div>

      <div>
        <!-- <a href="#"><small><u>Forgot Password</u></small></a> -->
      </div>
      <input type="submit" name="login" class="base_btn" value="Login" />
    </form>
  </div>

  <!-- Signup Popup -->
  <div class="full_screen_popup" data-ref="signup">
    <div class="fsp_overlay"></div>
    <form class="fsp_content" action="" method="POST">
      <h6>Create Account</h6>

      <div>
        <label for="signup_number"><small>Mobile Number</small></label>
        <div class="base_input_icon">
          <div class="icon">
            <span>
              <i class="fa-solid fa-phone"></i>
            </span>
          </div>
          <input name="phone" type="text" placeholder="Phone" id="signup_number" required />
        </div>
      </div>

      <div>
        <label for="signup_password"><small>Password</small></label>
        <div class="base_input_icon">
          <div class="icon">
            <span>
              <i class="fa-solid fa-lock"></i>
            </span>
          </div>
          <input name="pass" type="password" placeholder="Password" id="signup_password" required />
        </div>
      </div>

      <div>
        <label for="confirm_password"><small>Confirm Password</small></label>
        <div class="base_input_icon">
          <div class="icon">
            <span>
              <i class="fa-solid fa-lock"></i>
            </span>
          </div>
          <input name="cpass" type="password" placeholder="Password" id="confirm_password" required />
        </div>
      </div>

      <input type="submit" name="sign_up" class="base_btn" value="Signup" />
    </form>
  </div>
  <!-- All Popups -->

  <script src="js/main.js"></script>
</body>

</html>
