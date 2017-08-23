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

    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>

    <!--[if IE 7]>
    <link rel="stylesheet" href="css/font-awesome-ie7.min.css"/>
    <![endif]-->

    <!-- page specific plugin styles -->

    <link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css"/>
    <link rel="stylesheet" href="css/chosen.css"/>
    <link rel="stylesheet" href="css/datepicker.css"/>
    <link rel="stylesheet" href="css/bootstrap-timepicker.css"/>
    <link rel="stylesheet" href="css/daterangepicker.css"/>
    <link rel="stylesheet" href="css/colorpicker.css"/>
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <!-- ace styles -->

    <link rel="stylesheet" href="css/ace.min.css"/>
    <link rel="stylesheet" href="css/ace-rtl.min.css"/>
    <link rel="stylesheet" href="css/ace-skins.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="css/ace-ie.min.css"/>
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
        try {
            ace.settings.check('navbar', 'fixed')
        } catch (e) {
        }
		
		function showHint() {
			var roomNumber = document.getElementById("roomNum").value;
	
			if (roomNumber != "") {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
									
						var msg = this.responseText;
					document.getElementById("txtHint").innerHTML = msg;
			document.getElementById("signal").value = "red";
			if (msg=="ok")
			{
				
			document.getElementById("signal").value = "green";
			}

			}
					};

					xmlhttp.open("GET", "getRoominfo.php?roomNumber=" + roomNumber, true);
					xmlhttp.send();
			  
			}  	
			
			
        }
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

                        <i class="icon-caret-down"></i>
                    </a>

                </li>
            </ul><!-- /.ace-nav -->
        </div><!-- /.navbar-header -->
    </div><!-- /.container -->
</div>
</div>

<div class="main-container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>

        <div class="sidebar" id="sidebar">
            <script type="text/javascript">
                try {
                    ace.settings.check('sidebar', 'fixed')
                } catch (e) {
                }
            </script>



           
            <ul class="nav nav-list">
                <li class="open active">
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-list"></i>
                        <span class="menu-text"> Room Management </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li class="active">
                            <a href="newRoom.php">
                                <i class="icon-double-angle-right"></i>
                                New Room Publish
                            </a>
                        </li>
                        <li >
                            <a href="roomList.php?tag=1">
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
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left"
                   data-icon2="icon-double-angle-right"></i>
            </div>

            <script type="text/javascript">
                try {
                    ace.settings.check('sidebar', 'collapsed')
                } catch (e) {
                }
            </script>
        </div>

        <div class="main-content">
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try {
                        ace.settings.check('breadcrumbs', 'fixed')
                    } catch (e) {
                    }
                </script>

                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home home-icon"></i>
                        <a href="login.php">Main Page</a>
                    </li>

                    <li class="active">
                        <a href="newRoom.php">Add Room</a>
                    </li>
                </ul><!-- .breadcrumb -->

										<div style = "float:right ;font-size:smaller">	<input type="button" onclick="location.href='http:logout.php';" value="Log out"  style ="color:white;line-height:normal;background-color:#438eb9"/></div>
            
            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        <?php
                            echo $_REQUEST["name"];
                        ?>
                        <small>
                            <i class="icon-double-angle-right"></i>
                            Add Room
                        </small>
                    </h1>
                </div><!-- /.page-header -->
                <div class="row">
                    <div class="col-xs-12">
                        <form class="form-horizontal" role="form" action="addRoom.php" method="post" enctype="multipart/form-data" onsubmit="validate()">

                            <div class="form-group" >
                                <label class="col-sm-3 control-label no-padding-right" for="type">Room Number</label>

                                <div class="col-sm-9">
                                    <input type="text" id="roomNum" name="roomNum"  class="col-xs-10 col-sm-5" onkeyup="showHint()"/>
									<p><span id="txtHint"></span></p>

<input type="hidden" name="signal" id="signal" value="black">
                                </div>
                            </div>

                            <div class="form-group hidden" id="numError">
                                <label class="col-sm-3 control-label no-padding-right"></label>
                                <div class="col-sm-9 error"></div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="znecancelPrice">Room Type</label>

                                <div class="col-sm-9">
                                         <select class="col-xs-10 col-sm-5" id="roomType" name="roomType" >
                                        <option value="Twin" >Twin</option>
                                        <option value="Single">Single</option>
                                        <option value="Double">Double</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group hidden" id="roomTypeError">
                                <label class="col-sm-3 control-label no-padding-right"></label>
                                <div class="col-sm-9 error"></div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="znePrice">Price per Night</label>

                                <div class="col-sm-9">
                                    <input type="text" id="price" name="price"  class="col-xs-10 col-sm-5"/>
                                </div>
                            </div>
                            <div class="form-group hidden" id="priceError">
                                <label class="col-sm-3 control-label no-padding-right"></label>
                                <div class="col-sm-9 error"></div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="delegatecancelPrice">Pet Avalability</label>

                                <div class="col-sm-9">
                                        <select class="col-xs-10 col-sm-5" id="pet" name="pet" >
                                        <option value="true">Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="delegatePrice">Smoke Availability</label>

                                <div class="col-sm-9">
                                   		<select class="col-xs-10 col-sm-5" id="smoke" name="smoke" >
                                        <option value="true">Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>

                            </div>

                            <div class="clearfix ">
                                <div class="col-md-offset-3 col-md-9">
                                    <input type="submit" value="Add" class="btn btn-info"/>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div><!-- /.main-content -->


        </div><!-- /.main-container-inner -->

    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->

    <script src="http://cdn.bootcss.com/jquery/2.0.3/jquery.min.js"></script>

    <!-- <![endif]-->

    <!--[if IE]>
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script><![endif]-->
    <![endif]-->

    <!--[if !IE]> -->

    <script type="text/javascript">
        window.jQuery || document.write("<script src='js/jquery-2.0.3.min.js'>" + "<" + "/script>");
    </script>

    <!-- <![endif]-->

    <!--[if IE]>
    <script type="text/javascript">
        window.jQuery || document.write("<script src='js/jquery-1.10.2.min.js'>" + "<" + "/script>");
    </script>
    <![endif]-->

    <script type="text/javascript">
        if ("ontouchend" in document) document.write("<script src='js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/typeahead-bs2.min.js"></script>

    <!-- page specific plugin scripts -->

    <!--[if lte IE 8]>
    <script src="js/excanvas.min.js"></script>
    <![endif]-->

    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/chosen.jquery.min.js"></script>
    <script src="js/fuelux/fuelux.spinner.min.js"></script>
    <script src="js/date-time/bootstrap-datepicker.min.js"></script>
    <script src="js/date-time/bootstrap-timepicker.min.js"></script>
    <script src="js/date-time/moment.min.js"></script>
    <script src="js/date-time/daterangepicker.min.js"></script>
    <script src="js/bootstrap-colorpicker.min.js"></script>
    <script src="js/jquery.knob.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.inputlimiter.1.3.1.min.js"></script>
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="js/bootstrap-tag.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
    <!-- ace scripts -->

    <script src="js/ace-elements.min.js"></script>
    <script src="js/ace.min.js"></script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
	var light = 'green';
        $("#roomNum").on("blur", function() {
            if ($("#roomNum").val() === "") {
                $("#numError").removeClass("hidden");
                $("#numError>div").text("Please enter room number");
				light = 'red';
            } else{
                $("#numError").addClass("hidden");
				light = 'green';
            }
        });
        $("#price").on("blur", function() {
            if ($("#price").val() === "") {
                $("#priceError").removeClass("hidden");
                $("#priceError>div").text("Please enter room price");
				light = 'red';
            } else{
                $("#priceError").addClass("hidden");
				light = 'green';
            }
        });
       

        function validate(){
		if(light == 'green'&&$("#roomNum").val() !== ""&&$("#price").val() !== ""&&$("#signal").val() == "green"){
			return true;
		}else{
		alert("Please check input");
		event.preventDefault();
		return false;
		}
        }

    </script>
    </div>
</body>
</html>
