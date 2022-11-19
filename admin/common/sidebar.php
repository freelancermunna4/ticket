<div class="dashboard_sidebar">
              <div class="dashboard_sidebar_item">
                <h6 class="ds_title" data-ref="my-profile">
                  <span class="text"> FUNCTIONS </span>
                  <span class="icon"><i class="fa-solid fa-chevron-down"></i></span>
                </h6>
                <ul class="ds_ul" data-ref="my-profile">
                  <li>
                    <a href="index.php">  
                      <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
                    </a>
                  </li>                  
                  <li>
                    <a href="category.php">
                    <i class="fa-solid fa-map"></i>
                      <span>CATEGORY</span>
                    </a>
                  </li>
                  <li>
                  <a href="tickets.php" class="show_fsp" data-ref="login">
                      <i class="fa fa-support"></i>
                      <span>PENDING TICKETS</span>
                    </a>
                  </li>
                  <li>
                  <a href="solved-tickets.php" class="show_fsp" data-ref="login">
                      <i class="fa fa-support"></i>
                      <span>SOLVED TICKETS</span>
                    </a>
                  </li>
                  <li>
                    <a href="all-user.php">
                    <i class="fa-solid fa-users"></i>
                      <span>All User</span>
                    </a>
                  </li>
                </ul>
              </div>

              <div class="dashboard_sidebar_item">
                <h6 class="ds_title" data-ref="verification">
                  <span class="text"> VERIFICATION </span>
                  <span class="icon"><i class="fa-solid fa-chevron-down"></i></span>
                </h6>
                <ul class="ds_ul" data-ref="verification">                   
                <li>
                    <a href="verify-apply.php">
                    <i class="fa-solid fa-certificate"></i> <span>Pendign Verify</span>
                    </a>
                  </li>
                  <li>
                    <a href="Verified.php">
                    <i class="fa-solid fa-circle-check"></i> <span>Success Verify</span>
                    </a>
                  </li>
                </ul>
              </div>

              <div class="dashboard_sidebar_item">
                <h6 class="ds_title" data-ref="setting">
                  <span class="text"> SETTING </span>
                  <span class="icon"><i class="fa-solid fa-chevron-down"></i></span>
                </h6>
                <ul class="ds_ul" data-ref="setting">

                <?php if($show['role']=='Moderator'){ ?>
                  <li>
                    <a href="activities.php">
                      <i class="fa-solid fa-chart-line"></i>
                      <span>ACTIVITIES</span>
                    </a>
                  </li>
                <?php  }else{ ?>               
                              
                  <li>
                    <a href="profile.php">
                      <i class="fa fa-user"></i> <span>Admin</span>
                    </a>
                  </li>
                  <li>
                    <a href="moderator.php">
                    <i class="fa fa-user"></i> <span>Moderator</span>
                    </a>
                  </li>
                  <li>
                    <a href="website.php">
                    <i class="fa-solid fa-network-wired"></i> <span>WEBSITE</span>
                    </a>
                  </li>
                  <li>
                    <a href="mail.php">
                    <i class="fa-solid fa-network-wired"></i> <span>MAIL</span>
                    </a>
                  </li>
                  <li>
                    <a href="security.php">
                      <i class="fa fa-shield"></i> <span>SECURITY</span>
                    </a>
                  </li>                  
                  <li>
                    <a href="activities.php">
                      <i class="fa-solid fa-chart-line"></i>
                      <span>ACTIVITIES</span>
                    </a>
                  </li>
                  <?php }?>
                </ul>
              </div>

            </div>



          