
<?php
?>
<!doctype html>
<html>
<head>
<title>MVC Framework</title>


<style >
.tblone{
	width: 100%; border: 1px solid #fff;
}
.tblone td{
	padding: 5px 10px; text-align: center;
}
table.tblone tr:nth-child(2n+1){background: #fff; height: 30px;}
table.tblone tr:nth-child(2n){background: #f1f1f1; height: 30px;}
input[type="text"],.cat{border: 1px solid #ddd; margin-bottom: 5px; padding: 5px; width: 500px; font-size: 16px;}
input[type="submit"]{cursor: pointer;}
.adminLeft{border-right:1px solid #ddd; margin-right: 10px; padding-right: 10px;
	width: 250px; float: left;}
.widget{margin-bottom: 20px;
}
.widget h3{background: #ddd none repeat scroll 0 0;
border-bottom: 2px solid gray; color: #000; margin: 0 0 2px; padding: 5px; text-shadow: 0 1px 1px #fff;}
.widget ul{
margin: 0; padding:  0; list-style: none;
}
.widget ul li{
display: block;
}
.widget ul li a{background: #fafafa none repeat scroll 0 0;
border-bottom: 1px solid #fff; color: #000;display: block; padding: 5px 10px; text-decoration: none; }
.widget ul li a:hover{color: #ddd ;}
.adminright{width: 850px; float: right; padding: 5px 10px; background: #fafafa}
.adminright h2{border-bottom: 2px dashed #666 ; color: #666; margin: 0 0 10px; padding-bottom: 10px;}
</style>

</head>


<body>

	<div class= "container" >
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class ="navbar-brand" href="index.php"><strong>MVC Framework</strong></a>
			</div>
		</div>
	</nav>
<div class="panel-body">
<h1>Admin Panel</h1><hr/>