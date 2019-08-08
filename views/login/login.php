<?php	
?>
<!doctype html>
<html>
<head>
<title>MVC Framework</title>

<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.min.css"/>
<style>
 input[type="text"],input[type="password"]{border: 1px solid #ddd; margin-bottom: 5px; padding: 5px; width: 340px; font-size: 16px;}
 input[type="submit"]{cursor: pointer;}
.loginform{width: 520px; margin: 50px auto; border: 1px solid #ddd; border-radius:5px; box-shadow: 5px 5px 5px #ddd; padding: 20px;}
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
<h1>Login</h1><hr/>

	<div class="loginform">
		<form action="<?php echo BASE_URL;?>/Login/loginAuth" method="post">
			<table>
				<tr>
					<td>User Name</td>
					<td><input type= "text" name="username" placeholder="Username..."/></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type= "password" name="password" placeholder="Password..."/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type= "submit" name="submit" value="login "/></td>
				</tr>
			</table>
		</form>

	</div>


</div>
<div class="well">
	<h4><a href="">Privacy Policy</a><span class="pull-right"><a href="">Terms and Conditions</a></span></h2>

</div>
</div>


</body>

</html>


