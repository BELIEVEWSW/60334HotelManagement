<?php
 session_start();
  if (!isset($_SESSION['role'])||$_SESSION['role']!='employee') // check whether logged-in/not
  {    
  header( "Location: login.php" );
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Hotel Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- basic styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />

    <!--[if IE 7]>
    <link rel="stylesheet" href="css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->

    <!-- ace styles -->

    <link rel="stylesheet" href="css/ace.min.css" />
    <link rel="stylesheet" href="css/ace-rtl.min.css" />
    <link rel="stylesheet" href="css/ace-skins.min.css" />

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="js/ace-extra.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="navbar navbar-default" id="navbar">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>

    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="roomList.php" class="navbar-brand">
                <small>
                    <i class="icon-leaf"></i>
                    Hotel Booking
                </small>
            </a><!-- /.brand -->
        </div><!-- /.navbar-header -->

        <div class="navbar-header pull-right" role="navigation">

            <ul class="nav ace-nav">
               

                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<span class="user-info">
								
					<?php


					session_start();
					$email = $_SESSION['email']; 
					if ($email != "") {
					echo 'Hello '.$email;
				
					}

					?>
								</span>

<!-- /.brand -->
                    </a>

                </li>
            </ul><!-- /.ace-nav -->
        </div><!-- /.navbar-header -->
    </div><!-- /.container -->
</div>

<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>

        <div class="sidebar" id="sidebar">
            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
            </script>



         
            <ul class="nav nav-list">
                <li class="open active">
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-list"></i>
                        <span class="menu-text"> Room Management </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li>
                            <a href="newRoom.php?tag=1">
                                <i class="icon-double-angle-right"></i>
                                New Room Publish
                            </a>
                        </li>
                        <li class="active">
                            <a href="roomList.php">
                                <i class="icon-double-angle-right"></i>
                                Room List
                            </a>
                        </li>
                        <li >
                            <a href="updateRoom.php?tag=1">
                                <i class="icon-double-angle-right"></i>
                                Update Room
                            </a>
                        </li>						
                    </ul>
                </li>

            </ul><!-- /.nav-list -->

            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
            </div>

            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
            </script>
        </div>

        <div class="main-content">
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                </script>

                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home home-icon"></i>
                        <a href="login.php">Main Page</a>
                    </li>

                    <li class="active">
                        <a href="roomList.php">Room List</a>
                    </li>
					
                </ul><!-- .breadcrumb -->
													<div style = "float:right ;font-size:smaller">	<input type="button" onclick="location.href='http:logout.php';" value="Log out"  style ="color:white;line-height:normal;background-color:#438eb9"/></div>
            </div>

            <div class="page-content">


                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->



                        <div class="row">
                            <div class="col-xs-5">
</div>
                            <?php
                                echo '<div class="col-xs-2"><a class="btn btn-danger btn-block" href="newRoom.php?';
                                echo 'name='.$_REQUEST["name"].'&id='.$_REQUEST["id"].'&wifi='.$_REQUEST["wifi"].'&equipment='.$_REQUEST["equipment"].'">Add new room</a></div>';
                            ?>
                            <div class="col-xs-5"></div>

                            <div class="col-xs-12">
                                <h3 class="header smaller lighter blue">Room List</h3>
                                <div class="table-header">
                                    <?php
                                        echo $_REQUEST["name"];
                                    ?>
                                </div>

                                <div class="table_ajax" id="table_ajax">
                                    
                                </div>
                            </div>
                        </div>

                        <div id="modal-table" class="modal fade" tabindex="-1">

                        </div><!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div><!-- /.main-content -->
    </div><!-- /.main-container-inner -->

</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->

<script src="http://cdn.bootcss.com/jquery/2.0.3/jquery.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

<!--[if !IE]> -->

<script type="text/javascript">

    window.jQuery || document.write("<script src='js/jquery-2.0.3.min.js'>"+"<"+"script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='js/jquery.mobile.custom.min.js'>"+"<"+"script>");
</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/typeahead-bs2.min.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="js/excanvas.min.js"></script>
<![endif]-->

<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="js/jquery.ui.touch-punch.min.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="js/jquery.easy-pie-chart.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/flot/jquery.flot.min.js"></script>
<script src="js/flot/jquery.flot.pie.min.js"></script>
<script src="js/flot/jquery.flot.resize.min.js"></script>

<!-- ace scripts -->

<script src="js/ace-elements.min.js"></script>
<script src="js/ace.min.js"></script>

<!-- inline scripts related to this page -->


								<script>
								var oldVal;
								

								
								
								function check_all(){
									var rooms = document.forms[0];
									var i;
									if (rooms[0].checked) {
									for (i = 1; i < rooms.length; i++) 
									rooms[i].checked=true;}
									else{
									for (i = 1; i < rooms.length; i++) 
									rooms[i].checked=false;	}
									
								}
								
								$(document).ready(function(){
										var xmlhttp = new XMLHttpRequest();
										xmlhttp.onreadystatechange = function() {
											if (this.readyState == 4 && this.status == 200) {
												var msg = this.responseText;
												document.getElementById("table_ajax").innerHTML = msg;
											  }
										};
										xmlhttp.open("GET", "table_div.php", true);
										xmlhttp.send();  



								
								
								});
								

								</script></body>
</html>

