<?php 

if(isset($_COOKIE['user_id'])){
    setcookie('user_id','', time() - 86000);
}

if(!session_start()){session_start();}
if(isset($_SESSION['user_id'])){
    unset($_SESSION['user_id']);
    session_destroy();
    header('location:index.php');
}
    header('location:index.php');
 

?>
 
