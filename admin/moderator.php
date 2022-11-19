<?php include('common/header.php');?>
<?php 

if(isset($_GET['msg'])){
  $msg = $_GET['msg'];
}

if(isset($_POST['sumbit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $pass = md5($_POST['pass']);
    $role = $_POST['role'];
    $time = time();
  
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"../upload/$file_name");
  
    $sql = "INSERT INTO admin_info(name,phone,pass,role,img,time) VALUES('$name','$phone','$pass','$role','$file_name','$time')";
    $query = mysqli_query($conn,$sql);
    if($query){
      $msg = "Successfully Created Moderator!";
      header("location:moderator.php?msg=$msg");
    }
  }
?>
<main class="content_wrapper">
    <!--===== main page content =====-->
    <div class="content">
        <div class="container">
            <div class="page_content">
                <div class="dashboard_layout">
                    <?php include('common/sidebar.php');?>
                    <div class="dashboard_content">
                        <div class="dc_box">
                            <div class="dc_box_header">
                            <?php if(isset($msg)){ ?><div class="alert_info">
                                          <?php if(isset($msg)){echo $msg;}?>
                                          </div>
                                        <?php }?>
                                <div class="dc_box_container">
                                    <h6>

                                        <span class="icon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <span class="text">All Moderator </span>
                                    </h6>
                                    <form action="" method="POST">
                                      <div class="">
                                        <input class="src" type="search" name="src_text" placeholder="Search Method" />
                                        <input style="cursor:pointer;outline:none;" type="submit" name="search" class="btn" placeholder="Search" />
                                     </div>
                                    </form>
                                </div>
                            </div>

                            <div class="dc_box_container">
                                <div class="input_area">
                                    <table class="table table-dark">
                                        <thead>
                                            <tr>
                                                <th>Sl.</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                         if(isset($_POST['search'])){
                                        $src_text = trim($_POST['src_text']);
                                        $sql = "SELECT * FROM admin_info WHERE (name = '$src_text' OR phone = '$src_text') AND role='Moderator'";
                                        $search_query = mysqli_query($conn,$sql);
                                         }

                                            if(isset($search_query)){
                                            $i = 0; while($row = mysqli_fetch_assoc($search_query)){$i++; ?>
                                               <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['phone'];?></td>
                                                <td><?php echo $row['role'];?></td>
                                                <td>
                                                    <a class="btn btn-danger"href="Moderator-delete.php?id=<?php echo $row['id'];?>">Delete</a>
                                                </td>
                                            </tr>                                      
                                             <?php }}else{
                                            $showRecordPerPage = 10;
                                            if(isset($_GET['page']) && !empty($_GET['page'])){
                                                $currentPage = $_GET['page'];
                                            }else{
                                                $currentPage = 1;
                                            }
                                            $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
                                            $totalEmpSQL = "SELECT * FROM admin_info WHERE role='Moderator' ORDER BY id DESC";
                                            $allEmpResult = mysqli_query($conn, $totalEmpSQL);
                                            $totalEmployee = mysqli_num_rows($allEmpResult);
                                            $lastPage = ceil($totalEmployee/$showRecordPerPage);
                                            $firstPage = 1;
                                            $nextPage = $currentPage + 1;
                                            $previousPage = $currentPage - 1;
                                            $empSQL = "SELECT * FROM admin_info WHERE role='Moderator' OR role='User' ORDER BY id DESC LIMIT $startFrom, $showRecordPerPage";
                                            $query = mysqli_query($conn, $empSQL);
                                            $i = 0;
                                            while($row = mysqli_fetch_assoc($query)){ $i++;?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['phone'];?></td>
                                                <td><?php echo $row['role'];?></td>
                                                <td>
                                                    <a class="btn btn-danger"href="Moderator-delete.php?id=<?php echo $row['id'];?>">Delete</a>
                                                </td>
                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="pagi" style="display: flex; justify-content: space-between;">

                            <nav>
                                <ul class="">

                                    <?php //if($currentPage >= 2) { ?>
                                    <li class="pagination"><a class="page-link"
                                            href="?page=<?php //echo $previousPage ?>">Previws</a>
                                    </li>
                                    <?php //} ?>
                                    <?php //if($currentPage != $firstPage) { ?>
                                    <li class="pagination">
                                        <a class="page-link" href="?page=<?php //echo $firstPage ?>">
                                            <span class="page-link" aria-hidden="true">1</span>
                                        </a>
                                    </li>
                                    <?php //} ?>

                                    <li class="pagination active"><a class="page-link active"
                                            href="?page=<?php //echo $currentPage ?>"><?php //echo $currentPage ?></a>
                                    </li>

                                    <?php //if($currentPage < $lastPage) { ?>
                                    <li class="pagination "><a class="page-link"
                                            href="?page=<?php //echo $currentPage+1 ?>"><?php //echo $currentPage+1 ?></a>
                                    </li>
                                    <?php //} ?>

                                    <?php //if($currentPage < $lastPage) { ?>
                                    <li class="pagination "><a class="page-link"
                                            href="?page=<?php //echo $currentPage+1+1 ?>"><?php //echo $currentPage+1+1 ?></a>
                                    </li>
                                    <?php //} ?>

                                    <?php //if($currentPage < $lastPage) { ?>
                                    <li class="pagination "><a class="page-link"
                                            href="?page=<?php //echo $currentPage+1+1+1 ?>"><?php //echo $currentPage+1+1+1 ?></a>
                                    </li>
                                    <?php //} ?>

                                    <?php //if($currentPage < $lastPage) { ?>
                                    <li class="pagination"><a class="page-link"
                                            href="?page=<?php //echo $nextPage ?>"><?php //echo $nextPage  ?>Next
                                            >></a></li>
                                    <?php //} ?>

                                    <li class="pagination">
                                        <a class="page-link" href="?page=<?php //echo $lastPage ?>" aria-label="Next">
                                            <span aria-hidden="true">Last</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="pagi_page">Page <?php //echo $currentPage ?> of <?php //echo $lastPage ?>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>

        <?php include('common/footer.php');?>