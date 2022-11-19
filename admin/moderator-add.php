<?php include('common/header.php');?>
<?php 
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
  
 
  $user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user_info WHERE id='$id'"));
  $name = $user['fname'];
  $phone = $user['phone'];
  $pass = $user['pass'];
  $img = $user['img'];
  $time = time();

  $admin = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE phone='$phone' AND pass='$pass'"));
  if(!$admin['role']=='Moderator'){
  $moderator = mysqli_query($conn,"INSERT INTO admin_info(name,phone,pass,role,img,time) VALUES('$name','$phone','$pass','Moderator','$img','$time')");
  if($moderator){
    $msg = "Make Moderator Successfully!";
    header("location:all-user.php?msg=$msg");
  }
  
}else{
  $msg = "This user already have Moderator!";
  header("location:all-user.php?msg=$msg");
}




?>