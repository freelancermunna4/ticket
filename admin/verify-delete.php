<?php include('common/header.php');?>
<?php 

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$ticket = "UPDATE user_info SET nid_type='',nid_number='',nid_info='',nid_front='' WHERE id = $id";
$ticket = mysqli_query($conn,$ticket);
if($ticket){
    $msg = "Verification Detailes has been deleted!";
    header("location:verify-apply.php?msg=$msg");
}else{
    echo "somethings is wrong!";
}
?>