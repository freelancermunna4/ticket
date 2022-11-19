<?php include('../include/functions.php'); ?>
<?php 

if(!session_start()){session_start();}  
if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
  if($id>0){
    header('location:home.php');
  }
} 
if(isset($_COOKIE['admin_id'])){
  $id = $_COOKIE['admin_id'];
  if($id>0){
    header('location:home.php');
  }
}

if(isset($_POST['login'])){
  $phone =$_POST['phone'];
  $pass = md5($_POST['pass']); 
  $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE phone='$phone' AND pass='$pass'"));
  if($row>0){
      $id = $row['id'];
      $_SESSION['admin_id'] = $id;
      setcookie('admin_id', $id , time()+86000);
      header('location:home.php');
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
  <link rel="shortcut icon" href="../upload/<?php echo $website['logo']?>" type="image/x-icon" />

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
          <span>Dashboard</span>
        </a>
      </div>

      <ul class="header_right">
        <li class="deposit_btn">
          <a href="#" class="show_fsp" data-ref="login">
            <span class="icon"> <i class="fa-solid fa-wallet"></i> </span>
            <span>Deposit</span>
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
          <!-- Login Popup -->
  <div class="full_screen_popup" ">
    <div class="fsp_overlay"></div>
    <form class="fsp_content" action="" method="POST">
      <h6>Login</h6>

      <div>
        <label for="number"><small>Mobile Number</small></label>
        <div class="base_input_icon">
          <div class="icon">
            <span>
              <i class="fa-solid fa-phone"></i>
            </span>
          </div>
          <input name="phone" type="text" placeholder="Number" id="number" required />
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
      <input type="submit" name="login" class="base_btn" value="Login" />
    </form>
  </div>  


      </div>

      <footer class="main_footer">
        <div class="footer_container">
          <div class="footer_left">
            ©Jobless Inc.. 2019 All rights reserved.
          </div>
          <ul class="footer_right">
            <li>
              <a href="#" style="color: blueviolet">
                <i class="fab fa-facebook"></i>
              </a>
            </li>
            <li>
              <a href="#" style="color: blueviolet">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li>
              <a href="#" style="color: red">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
            <li>
              <a href="#" style="color: blueviolet">
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
  <div class="full_screen_popup" data-ref="login">
    <div class="fsp_overlay"></div>
    <form class="fsp_content" action="" method="POST">
      <h6>Login</h6>

      <div>
        <label for="number"><small>Mobile Number</small></label>
        <div class="base_input_icon">
          <div class="icon">
            <span>
              <i class="fa-solid fa-phone"></i>
            </span>
          </div>
          <input name="phone" type="text" placeholder="Number" id="number" required />
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
      <input type="submit" name="login" class="base_btn" value="Login" />
    </form>
  </div>  
 
  <!-- All Popups -->

  <script src="js/main.js"></script>
</body>

</html>