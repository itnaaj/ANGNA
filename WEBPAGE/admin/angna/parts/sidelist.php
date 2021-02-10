 <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Angna Admin Panel</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#"><strong><?php echo $_SESSION['AdminName']?></strong></a>
                        <a class="dropdown-item" href="../../index.php">Go to site</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                           
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading"style="color: red">User Data</div>
                         
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseuser" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseuser" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    
                                    <a class="nav-link" href="usertable.php?id=all">All </a>
                                    <a class="nav-link" href="usertable.php?id=angna">Angna</a>
                                    <a class="nav-link" href="usertable.php?id=google">Google</a>
                                </nav>
                            </div>
                            
                                 <div class="sb-sidenav-menu-heading" style="color: red">Data Insert</div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseupdate" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Insert
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseupdate" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="updateevent.php">Events Data</a>
                                    <a class="nav-link" href="updatenotice.php">Notice Data</a>
                                    <a class="nav-link" href="updategallery.php">Gallery Data</a>
                                            <a class="nav-link" href="updatecontest.php">Contest Data</a>
                                </nav>  
                            </div>


                           
                            <div class="sb-sidenav-menu-heading" style="color: red">Table View</div>

            
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecontest" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Contest
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsecontest" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    
                                    <a class="nav-link" href="livecontesttable.php">Live Contest</a>
                                    <a class="nav-link" href="contestparttable.php">Participants</a>
                                   
                                </nav>
                            </div>



                            <a class="nav-link" href="eventstable.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Events
                            </a>

                            <a class="nav-link" href="noticetable.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Notice
                            </a>

                              <a class="nav-link" href="donation.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Donation
                            </a>

                             <a class="nav-link" href="gallerytable.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Gallery
                            </a>

                            <a class="nav-link" href="feeds.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Feeds
                            </a>
                            <a class="nav-link" href="feedback.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Feedback
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                     <?php echo $_SESSION['AdminName']; ?>
                    </div>
                </nav>
            </div>