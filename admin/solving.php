<?php include('common/header.php');?>
<?php 

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $refarence = $_GET['refarence'];
}

$ticket = "UPDATE ticket SET solved='true' WHERE refarence=$refarence"; 
$ticket = mysqli_query($conn,$ticket);
if($ticket){
    $msg = 'This ticket is solved';
    header("location:tickets.php?msg=$msg");
}

?>
