<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" data-spy="affix" data-offset-top="400">
    <div class="navbar-header">
        <a class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars fa-1x"></i></a>
        <a class="navbar-brand sidebar-toggle"><i class="fa fa-bars fa-1x"></i></a>
        <a class="navbar-brand" href="http://forums.techfusionstudio.comm/">Forums</a>
    </div>

    <ul class="nav navbar-top-links navbar-right">
<?php $user = new User(); if($user->isLoggedin()): ?>
        <!-- Messages -->
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i></a>
            <ul class="dropdown-menu dropdown-messages">
                <!-- <li><a href="#">
                    <div>
                        <strong></strong><span class="pull-right text-muted"><em></em></span>
                    </div>
                    <div></div>
                </a></li>

                <div class="divider"></div>

                <li><a href="#">
                    <div>
                        <strong></strong><span class="pull-right text-muted"><em></em></span>
                    </div>
                    <div></div>
                </a></li>

                <div class="divider"></div>

                <li><a href="#">
                    <div>
                        <strong></strong><span class="pull-right text-muted"><em></em></span>
                    </div>
                    <div></div>
                </a></li> -->

                <div class="divider"></div>

                <li><a class="text-center" href="#">
                    <strong>Read All Messages</strong><i class="fa fa-angle-right"></i>
                </a></li>
            </ul>
        </li>

        <!-- Tasks -->
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i></a>
            <ul class="dropdown-menu dropdown-tasks">
                <!--<li><a href="#">
                    <div>
                        <p><strong></strong><span class="pull-right text-muted"></span></p>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                <span class="sr-only"></span>
                            </div>
                        </div>
                    </div>
                </a></li>

                <div class="divider"></div>

                <li><a href="#">
                    <div>
                        <p><strong></strong><span class="pull-right text-muted"></span></p>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                <span class="sr-only"></span>
                            </div>
                        </div>
                    </div>
                </a></li>

                <div class="divider"></div>

                <li><a href="#">
                    <div>
                        <p><strong></strong><span class="pull-right text-muted"></span></p>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                <span class="sr-only"></span>
                            </div>
                        </div>
                    </div>
                </a></li>

                <div class="divider"></div>

                <li><a href="#">
                    <div>
                        <p><strong></strong><span class="pull-right text-muted"></span></p>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                <span class="sr-only"></span>
                            </div>
                        </div>
                    </div>
                </a></li>-->

                <div class="divider"></div>

                <li><a class="text-center" href="#"><strong>See All Tasks</strong><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </li>

        <!-- Notifacations -->
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i></a>
            <ul class="dropdown-menu dropdown-alerts">
                <!--<li><a href="#">
                    <div><i class="fa-fw"></i><span class="pull-right text-muted small"></span></div>
                </a></li>

                <div class="divider"></div>

                <li><a href="#">
                    <div><i class="fa-fw"></i><span class="pull-right text-muted small"></span></div>
                </a></li>

                <div class="divider"></div>

                <li><a href="#">
                    <div><i class="fa-fw"></i><span class="pull-right text-muted small"></span></div>
                </a></li>

                <div class="divider"></div>

                <li><a href="#">
                    <div><i class="fa-fw"></i><span class="pull-right text-muted small"></span></div>
                </a></li>

                <div class="divider"></div>

                <li><a href="#">
                    <div><i class="fa-fw"></i><span class="pull-right text-muted small"></span></div>
                </a></li>-->

                <div class="divider"></div>

                <li><a class="text-center" href="#"><strong>See All Notifactions</strong><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </li>
<?php endif; ?>

        <!-- Users -->
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i></a>
            <ul class="dropdown-menu dropdown-user">
<?php $user = new User(); if($user->isLoggedin()): ?>
                <li><a href="http://forums.techfusionstudio.comm/profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a></li>

                <div class="divider"></div>

                <li><a href="http://forums.techfusionstudio.comm/profile.php?logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
<?php else: ?>
                <li><a href="http://forums.techfusionstudio.comm/profile.php?create-profile"><i class="fa fa-user fa-fw"></i> Create Profile</a></li>

                <div class="divider"></div>

                <li><a href="http://forums.techfusionstudio.comm/profile.php?login"><i class="fa fa-sign-in fa-fw"></i> Login</a></li>
<?php endif; ?>
            </ul>
        </li>

        <!-- <li class="navbar-header float-right"><a class="navbar-brand friends-toggle"><i class="fa fa-bars fa-1x"></i></a></li> -->
    </ul>

    <!-- Sidebar -->
    <div class="navbar-default navbar-collapse collapse sidebar" role="navigation">
        <div class="sidebar-nav">
            <ul class="nav">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
                    </div>
                </li>

                <li><a href="http://techfusionstudio.comm/"><i class="fa fa-home fa-fw"></i> Home</a></li>

                <li><a class="second-level-button"><i class="fa fa-pencil-square-o fa-fw"></i> Forums<i class="fa fa-angle-left float-right"></i></a>
                    <ul class="nav second-level">
                        <li><a class="third-level-button">Tech Fusion Studio<i class="fa fa-angle-left float-right"></i></a>
                            <ul class="nav third-level">
                                <li><a href="?news">News Discussions</a></li>
                                <li><a href="?updates">Update Discussions</a></li>
                                <li><a href="?projects">Project Discussions</a></li>
                                <li><a href="?random">Random Discussions</a></li>
                            </ul>
                        </li>
                        <li><a class="third-level-button">Need Help<i class="fa fa-angle-left float-right"></i></a>
                            <ul class="nav third-level">
                                <li><a href="?websites">Website Discussions</a></li>
                                <li><a href="?pcs">PC Discussions</a></li>
                                <li><a href="?servers">server Discussions</a></li>
                                <li><a href="?networks">Network Discussions</a></li>
                            </ul>
                        </li>
                        <li><a class="third-level-button">General<i class="fa fa-angle-left float-right"></i></a>
                            <ul class="nav third-level">
                                <li><a href="?general">General Discussions</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li><a class="second-level-button"><i class="fa fa-user fa-fw"></i> Profile<i class="fa fa-angle-left float-right"></i></a>
                    <ul class="nav second-level">
<?php if($user->isLoggedin()): ?>
                        <li><a href="http://forums.techfusionstudio.comm/profile.php?profile"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                        <li><a href="http://forums.techfusionstudio.comm/profile.php?logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
<?php else: ?>
                        <li><a href="http://forums.techfusionstudio.comm/profile.php?create-profile"><i class="fa fa-user fa-fw"></i> Create Profile</a></li>
                        <li><a href="http://forums.techfusionstudio.comm/profile.php?login"><i class="fa fa-sign-in fa-fw"></i> Login</a></li>
<?php endif; ?>
                    </ul>
                </li>

                <li><a href="?users"><i class="fa fa-users fa-fw"></i> Users</a></li>

                <li><a href="?stream"><i class="fa fa-exchange fa-fw"></i> Stream</a></li>

                <li><a href="http://store.techfusionstudio.comm/"><i class="fa fa-shopping-cart fa-fw"></i> Store</a></li>
            </ul>
        </div>
    </div>
</nav>
