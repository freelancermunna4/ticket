<?php include('common/header.php');?>
<?php 
$user_id = $show['id'];

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
                                <div class="dc_box_container">
                                    <h6>
                                        <span class="icon">
                                            <i class="fa fa-support"></i>
                                        </span>
                                        <span class="text"> Pending Tickets </span>
                                    </h6>

                                    <a href="new-ticket.php">SUBMIT A TICKET</a>
                                </div>
                            </div>

                            <div class="dc_box_container">
                                <div class="table_wrapper">
                                    <div class="table" style="width: 100%">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="col">User Name</th>
                                                    <th class="col">Category</th>
                                                    <th class="col">Subject</th>
                                                    <th class="col">Date</th>
                                                    <th class="col">status</th>
                                                    <th class="col">Actions</th>
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
                                                    $totalEmpSQL = "SELECT * FROM ticket WHERE user_id='$user_id' AND refarence !='' AND solved='' ORDER BY id DESC";
                                                    $allEmpResult = mysqli_query($conn, $totalEmpSQL);
                                                    $totalEmployee = mysqli_num_rows($allEmpResult);
                                                    $lastPage = ceil($totalEmployee/$showRecordPerPage);
                                                    $firstPage = 1;
                                                    $nextPage = $currentPage + 1;
                                                    $previousPage = $currentPage - 1;
                                                    $empSQL = "SELECT * FROM ticket WHERE user_id='$user_id' AND refarence !='' AND solved='' ORDER BY id DESC LIMIT $startFrom, $showRecordPerPage";
                                                    $query = mysqli_query($conn, $empSQL);
                                                    $i = 0;
                                                    while($row = mysqli_fetch_assoc($query)){ $i++; ?>
                                                <tr>                                                   
                                                    <td>
                                                        <p><?php echo $row['user_name'];?></p>
                                                    </td>                                                 
                                                    <td>
                                                        <p><?php echo $row['option'];?></p>
                                                    </td>
                                                    <td>    
                                                        <p><?php echo $row['subject'];?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo date('Y/m/d', $row['time']);?></p>
                                                    </td>
                                                    <?php if($row['status']=='Pending'){?>
                                                    <td class="status">
                                                        <p style="color:red;"><?php echo $row['status'];?></p>
                                                    </td>
                                                    <?php }else{ ?>
                                                        <td class="status">
                                                        <p style="color:greem;"><?php echo $row['status'];?></p>
                                                        </td>
                                                     <?php } ?>

                                                    <td class="status">
                                                        <?php if(empty($row['solved'])){ ?>
                                                        <p><a href="ticket-view.php?ticket_id=<?php echo $row['ticket_id'];?>">Open</a></p>
                                                        <?php }else{?>
                                                            <p><a href="ticket-view.php?id=<?php echo $user_id;?>&&sub=<?php echo $row['subject'];?>">Closed</a></p>
                                                        <?php }?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
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
                                                <a class="page-link" href="?page=<?php echo $lastPage ?>"
                                                    aria-label="Next">
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
            </div>
        </div>

        <?php include('common/footer.php');?>