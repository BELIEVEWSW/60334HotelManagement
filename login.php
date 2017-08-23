<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Hotel Management Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href=" css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href=" css/font-awesome.min.css"/>
    <link rel="stylesheet" href=" css/select2.css"/>
    <!--主框架style-->
    <link rel="stylesheet" href=" css/ace.min.css"/>
    <link rel="stylesheet" href=" css/ace-rtl.min.css"/>
    <script>

        function showHint() {

			var email = document.getElementById("email").value;
			var pwd = document.getElementById("password").value;  
	
			if (pwd != "") {

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

					xmlhttp.open("GET", "getinfo.php?email=" + email+"&pwd="+pwd, true);
					xmlhttp.send();
			  
			}  	
			
			
        }
function validate_matching(){
	
			if (document.getElementById("signal").value == "green")
					{
					return true;
					}
		else
		{
		alert("Wrong username or password");
		event.preventDefault();
		return false;
		}
}
    </script>
</head>
<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-xm-10 col-sm-10 col-md-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <span class="pageTitle">Hotel Booking</span>
                        </h1>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
										Login Here
                                    </h4>

                                    <div class="space-6"></div>
	<form action="successLogin.php" autocomplete="on" method="post" onsubmit=" validate_matching()">

					  <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
		<input type="text" id="email" name="email" class="form-control" placeholder="Email" required="required" />
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
	<input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required" onkeyup="showHint()" />
														</span>
                                            </label>
<p><span id="txtHint"></span></p>

<input type="hidden" name="signal" id="signal" value="black">
                                            <div class="clearfix">
                                                <input type="submit" value="Login" class="width-35 pull-right btn btn-sm btn-primary"/>

                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                    </form>


                                </div><!-- /widget-main -->

                                <div class="toolbar clearfix">
								<form method="post" action="profiles_form.php">
								<div>
								  <input type="submit" value="Signup" \> 
								</div>
								</form>

                                </div>
                            </div><!-- /widget-body -->
                        </div><!-- /login-box -->

                    </div><!-- /position-relative -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div><!-- /.main-container -->


<script type="text/javascript">
    window.jQuery || document.write("<script src=' js/jquery-2.0.3.min.js'>" + "<" + "/script>");
</script>

<script type="text/javascript">
    if ("ontouchend" in document) document.write("<script src=' js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>

<script type="text/javascript">
    function show_box(id) {
        jQuery('.widget-box.visible').removeClass('visible');
        jQuery('#' + id).addClass('visible');
    }
</script>
<div style="display:none"></div>
</body>
</html>
