<?php include('common/header.php');?>
<?php 
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
  $delete = mysqli_query($conn,"DELETE FROM category WHERE id=$id");
  if($delete){
    $msg = "Category has been deleted!";
    header("location:category.php?msg=$msg");
  }else{
  }

?>