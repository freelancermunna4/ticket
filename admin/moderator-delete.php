<?php include('common/header.php');?>
<?php 
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
  $delete = mysqli_query($conn,"DELETE FROM admin_info WHERE id=$id");
  if($delete){
    $msg = "Moderator has been deleted!";
    header("location:Moderator.php?msg=$msg");
  }else{
  }

?>