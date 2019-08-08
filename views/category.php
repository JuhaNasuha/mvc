

<?php

	
?>
<!doctype html>
<html>
<head>
<title>MVC Framework</title>

<link rel="stylesheet" type="text/css" href="../includes/css/bootstrap.min.css"/>

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
<h1>Category list</h1><hr/>
<?php
	foreach ($cat as $key => $value) {
		echo $value['name'].'<br/>';
	}

?>
</div>
<div class="well">
	<h4><a href="">Privacy Policy</a><span class="pull-right"><a href="">Terms and Conditions</a></span></h2>

</div>
</div>


</body>

</html>


