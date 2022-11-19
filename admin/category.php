<?php include('common/header.php');?>
<?php 

if(isset($_GET['msg'])){
  $msg = $_GET['msg'];
}


if(isset($_POST['add_category'])){
  $category =$_POST['category'];
  $category_des =$_POST['category_des'];
      $row = mysqli_query($conn,"INSERT INTO category(category,category_des) VALUE('$category','$category_des')");
      if($row){
        $msg = "Successfully Create Category";
        header("location:category.php?msg=$msg");
      }else{
        echo "Something error!";  
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
                        <form action="" method="POST">
                            <div class="dc_box">
                                <div class="dc_box_header">
                                    <div class="dc_box_container">
                                        <h6>

                                            <span class="icon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <span class="text"> Category </span>
                                        </h6>
                                        <?php if(isset($msg)){ ?><div class="alert_info">
                                            <?php if(isset($msg)){echo $msg;}?>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>

                                <div class="dc_box_container">
                                    <div class="input_area">
                                        <label for="current_p">New Category</label>
                                        <input required name="category" type="text" class="base_input" />
                                    </div>
                                    <br />

                                    <div class="input_area">
                                        <label for="new_p">Category Description</label>
                                        <input required name="category_des" type="text" class="base_input" />
                                    </div>
                                    <br />
                                    <input name="add_category" type="submit" class="base_btn" value="Save" />

                                </div>
                            </div>
                        </form>
                        <!-- ---------------------display box----------------- -->
                        <div class="dc_box">
                            <div class="dc_box_header">
                                <div class="dc_box_container">
                                    <h6>

                                        <span class="icon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <span class="text">All Category </span>
                                    </h6>
                                </div>
                            </div>

                            <div class="dc_box_container">
                                <div class="input_area">
                                    <table class="table table-dark">
                                        <thead>
                                            <tr>
                                                <th>Sl.</th>
                                                <th>Category</th>
                                                <th>Category Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $showRecordPerPage = 10;
                                            if(isset($_GET['page']) && !empty($_GET['page'])){
                                                $currentPage = $_GET['page'];
                                            }else{
                                                $currentPage = 1;
                                            }
                                            $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
                                            $totalEmpSQL = "SELECT * FROM category ORDER BY id DESC";
                                            $allEmpResult = mysqli_query($conn, $totalEmpSQL);
                                            $totalEmployee = mysqli_num_rows($allEmpResult);
                                            $lastPage = ceil($totalEmployee/$showRecordPerPage);
                                            $firstPage = 1;
                                            $nextPage = $currentPage + 1;
                                            $previousPage = $currentPage - 1;
                                            $empSQL = "SELECT * FROM category ORDER BY id DESC LIMIT $startFrom, $showRecordPerPage";
                                            $query = mysqli_query($conn, $empSQL);
                                            $i = 0;
                                            while($row = mysqli_fetch_assoc($query)){ $i++;?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['category'];?></td>
                                                <td><?php echo $row['category_des'];?></td>
                                                <td>

                                                <?php if($show['role']=='Moderator'){ ?>
                                                     <a onclick="alert('Moderator can not delete')" class="btn btn-danger" href="#!">Delete</a>
                                                      <?php  }else{ ?>
                                                     <a class="btn btn-danger" href="category-delete.php?id=<?php echo $row['id'];?>">Delete</a>
                                                    <?php }?>
                                                    
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="pagi" style="display: flex; justify-content: space-between;">

                            <nav>
                                <ul class="">

                                    <?php if($currentPage >= 2) { ?>
                                    <li class="pagination"><a class="page-link"
                                            href="?page=<?php echo $previousPage ?>">Previws</a>
                                    </li>
                                    <?php } ?>
                                    <?php if($currentPage != $firstPage) { ?>
                                    <li class="pagination">
                                        <a class="page-link" href="?page=<?php echo $firstPage ?>">
                                            <span class="page-link" aria-hidden="true">1</span>
                                        </a>
                                    </li>
                                    <?php } ?>

                                    <li class="pagination active"><a class="page-link active"
                                            href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a>
                                    </li>

                                    <?php if($currentPage < $lastPage) { ?>
                                    <li class="pagination "><a class="page-link"
                                            href="?page=<?php echo $currentPage+1 ?>"><?php echo $currentPage+1 ?></a>
                                    </li>
                                    <?php } ?>

                                    <?php if($currentPage < $lastPage) { ?>
                                    <li class="pagination "><a class="page-link"
                                            href="?page=<?php echo $currentPage+1+1 ?>"><?php echo $currentPage+1+1 ?></a>
                                    </li>
                                    <?php } ?>

                                    <?php if($currentPage < $lastPage) { ?>
                                    <li class="pagination "><a class="page-link"
                                            href="?page=<?php echo $currentPage+1+1+1 ?>"><?php echo $currentPage+1+1+1 ?></a>
                                    </li>
                                    <?php } ?>

                                    <?php if($currentPage < $lastPage) { ?>
                                    <li class="pagination"><a class="page-link"
                                            href="?page=<?php echo $nextPage ?>"><?php //echo $nextPage  ?>Next
                                            >></a></li>
                                    <?php } ?>

                                    <li class="pagination">
                                        <a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
                                            <span aria-hidden="true">Last</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="pagi_page">Page <?php echo $currentPage ?> of <?php echo $lastPage ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php include('common/footer.php');?>