<html><head>
<title>Centered Fixed 3-Column Layout</title>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

<style>
body {font-family: arial;}

h1 {margin-left: 20px;}
.copy {
	margin-left: 20px; 
	margin-right: 10px;
}
footer { 
 width: 1200px; 
 height: 75px; 
 clear: both; 
 border: solid thin; 
 margin-left: 10px; 
 margin-bottom: 10px; 
 background-color: #efdfec; 
} 
.title {margin-left: 20px;}
#wrapper { width: 1220px;  
margin-right: auto; 
margin-left: auto; 
border: thin solid;  
background-color: #ffc;  
} 
  aside { 
 width: 200px; 
 height: 600px; 
 float: right; 
 margin: 20px 8px 0px 0px; 
 border: solid thin; 
 background-color: #c6d9f1; 
} 
  header { width: 1200px; 
 height: 100px; 
 margin-top: 10px; 
 margin-left: 10px; 
 border: thin solid;  
background-color: #e5dfec; 
 } 
nav { 
 width: 200px; 
 height: 600px; 
 float: left; 
 margin: 20px 14px 0px 10px; 
 text-align: center; 
 border: thin solid; 
 background-color: #fabf8f; 
}
  article { 
width: 770px; 
float: left; 
margin: 20px 0px 20px 0px; 
border: thin solid; 
background-color: #fff; 
} 
</style>

</head>
<body>
<div id="wrapper">

<header><h1>Using CSS for Page Layouts</h1>  <div align="right"> 
<?php
$email = $_REQUEST['email']; 
if ($email != "") {
echo 'Hello '.$email;
}
?>
</div></header>
<nav><h2>Learn More</h2>
<p><a href="url">article link</a></p>
<p><a href="url">article link</a></p>
<p><a href="url">article link</a></p>
<p><a href="url">article link</a></p>
<p><a href="url">article link</a></p>
</nav>

<article>
<h2 class="title">Products</h2>
<p class="copy">
<?php
require('items.php');
?>
</p>
</article>
<aside><h2 class="title">Aside</h2></aside>
<footer><h2 class="title">Footer</h2></footer>


</div>

</body></html>