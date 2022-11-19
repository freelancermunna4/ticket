<?php include('common/header.php');?>
<?php 

if(isset($_GET['user_id'])){
  echo  $user_id = $_GET['user_id'];
  echo  $ticket_id = $_GET['ticket_id'];
}
$ticket = "DELETE FROM ticket WHERE ticket_id ='$ticket_id'";
$ticket = mysqli_query($conn,$ticket);
if($ticket){
    $msg = "Ticket has been deleted!";
    header("location:tickets.php?msg=$msg");
}

?>