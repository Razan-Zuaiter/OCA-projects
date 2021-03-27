            <?php
            $id=$_SESSION["loginUser"]["id"];
            include ('actions/db_connection.php');
            $conn = OpenCon();
            $sql = "SELECT name, email, img_name FROM users WHERE user_id=$id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $name=$row["name"];
            $email=$row["email"];
            $img_name=$row["img_name"];
            ?>
            <!-- HEADER DESKTOP-->
            <header class="header-desktop desktopHeader">
              <div class="section__content section__content--p30">
                <div class="container-fluid">
                  <div class="header-wrap">
                    <div class="form-header"></div>
                    <div class="header-button">
                      <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                          <div class="image">
                            <img src="../images/<?php echo $img_name?>" alt="John Doe" />
                          </div>
                          <div class="content">
                            <a class="js-acc-btn" href="#"><?php echo $name?></a>
                          </div>
                          <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                              <div class="image">
                                <a href="#">
                                  <img src="../images/<?php echo $img_name?>" alt="John Doe" />
                                </a>
                              </div>
                              <div class="content">
                                <h5 class="name">
                                  <a href="#"><?php echo $name?></a>
                                </h5>
                                <span class="email"><?php echo $email?></span>
                              </div>
                            </div>
                            <div class="account-dropdown__footer">
                              <a href="../logout.php">
                                <i class="zmdi zmdi-power"></i>Logout</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </header>
            <!-- HEADER DESKTOP-->