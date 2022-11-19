<?php 
require_once('common/header.php');?>
<?php
if(isset($_GET['verify'])&&is_numeric($_GET['verify'])){
    $gm_code = $_GET['verify'];  
     $sql = "SELECT* FROM user_info  WHERE verificode=$gm_code";
     $query = mysqli_query($conn,$sql);
    $a=mysqli_num_rows($query);
    if($a>0){
        $query = mysqli_query($conn,"UPDATE user_info SET gmail_verify ='Verified' WHERE  verificode='$gm_code'");
        if($query){
        header('location:verification.php');       
        }else{
            echo "Error";
        }  
       

    }else{
        echo "invalide code";
    }
 

}




?>