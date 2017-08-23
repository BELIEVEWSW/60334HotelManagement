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
	<script>
        function showUser() {
            var xmlhttp;
			var uname = document.getElementById('uname').value;
            if (uname== '') {
                document.getElementById("userResult").innerHTML = "";
                return;
            }
            xmlhttp = new XMLHttpRequest();
           
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var msgUser  = xmlhttp.responseText;
                    document.getElementById("userResult").innerHTML = xmlhttp.responseText;
                document.getElementById("signalUser").value = "red";
				if (msgUser=="ok")
				{
				document.getElementById("signalUser").value = "green";
				}
				}
            }
            xmlhttp.open("GET", "getinfo1.php?uname=" + uname, true);
            xmlhttp.send();
        }

        function showEmail() {
            var xmlhttp;
			var email = document.getElementById("email") .value;
            if (email == '') {
                document.getElementById("emailResult").innerHTML = "";
                return;
            }
			xmlhttp = new XMLHttpRequest();
            
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var msgEmail  = xmlhttp.responseText;
                    document.getElementById("emailResult").innerHTML = xmlhttp.responseText;
					document.getElementById("signalEmail").value = "red";
					if (msgEmail=="ok")
					{
						document.getElementById("signalEmail").value = "green";
					}
				}
            }
            xmlhttp.open("GET", "getinfo2.php?email=" + email, true);
            xmlhttp.send();
        }
		function validate_password(){
		var p1 = document.getElementById("pwd").value;
		var p2 = document.getElementById("cpwd").value;
		if (p1 =="" || p2=="")
		{
		alert("password or confirm password field is not entered");
		return false;
		}
		if (p1 == p2){
	
		}else
		{
		alert("password and confirm password fields are mismatch");
		return false;
		}

		if (document.getElementById("signalUser").value == "green"&& document.getElementById("SignalEmail").value == "green")
		{
		return true;
		}
		else
		{
		//event.preventDefault() in onsubmit event very important to turn on "return false;" for some browsers
		alert("Please enter new username or email");
		event.preventDefault();
		return false;
		}
		}		
		
</script>
<style>
	.h1:{
		font-size:25px;
		color:#4c8fbd;
		float:middle;
		text-align: center;
	}
input[type=text], input[type=password], input[type=email] {
	margin: auto;
    width: 50%;
    padding: 12px 20px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
</style>
</head>

<body>
<div class="navbar navbar-default" id="navbar">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>

    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>
                    <i class="icon-leaf"></i>
                    Hotel Booking		
                </small>
            </a><!-- /.brand -->
        </div><!-- /.navbar-header -->

        <div class="navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">


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



        <div class="main-content" style='margin-left:0;'>
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                </script>

                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home home-icon"></i>
                        <a href="login.php">Login Page</a>
                    </li>

                    <li class="active">
                        <a href="profiles_form.php">Sign Up Page</a>
                    </li>
                </ul><!-- .breadcrumb -->
            </div>

            <div class="page-content">


                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->



                        <div class="row">
                            <div class="col-xs-12">
                                <h3 class="header smaller lighter blue">Sign Up Here</h3>
                                <div class="table-header">
                                    Sign Up Form
                                </div>
								<form action="insert_into_profiles.php" onsubmit="return validate_password()" method="post" enctype="multipart/form-data">
									<!-- get has to be capital GET , you can change to POST Capital too-->
									<div>
									<label class="h1" for="uname" >User Name</label> <br>
									 <input type="text"   name="uname" id="uname" onkeyup="showUser()"><br>
									 <p><span id="userResult"></span></p>
									</div>  
									
									<div>
										<label class="h1"for="email">Email</label><br>
									<input  type="email" name="email" id="email" onkeyup="showEmail()">
									<p><span id="emailResult"></span></p>
									</div>
									<div>
										<label for="pwd" class="h1">Password</label><br>
									<input type="password"  id="pwd" name="pwd">

									</div>
									<p><span></span></p>
									<div>
										<label for="cpwd" class="h1">Confirm password</label><br>
									<input type="password" id="cpwd"  name="cpwd">

									</div>
<br>
									  <input type="submit" value="Submit" >

										<input type="hidden" name="signalUser" id="signalUser">
										<input type="hidden" name="signalEmail" id="signalEmail">

									</form>
									</div>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div><!-- /.main-content -->

    </div><!-- /.main-container-inner -->

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>
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

</body>
</html>

