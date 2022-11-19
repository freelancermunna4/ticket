<?php include('common/header.php');?>
<?php 
if(isset($_GET['id'])){
 $user_id = $_GET['id'];
}
  $sql = "UPDATE user_info SET nid_verify='Verified' WHERE id=$user_id";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully verifiyed this your Profile";
    header("location:verify-apply.php?msg=$msg");
  }else{
    echo "somethings";  
  }

?>