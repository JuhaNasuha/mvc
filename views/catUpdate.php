

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
<h3> Update Category </h3><hr/>
<?php
if (isset($msg)) {
	echo "<span style='color:blue;font-weight:bold'>".$msg."</span>";
} 


?>

<form action="http://localhost/mvc/Category/updateCat" method="post">
	<table>
		<?php
		if (isset($catbyid)) {
			 
		foreach ($catbyid as $value) {
		?>
        <input type="hidden" name="id" value="<?php echo $value['id']?>"/>

		<tr>
			<td> Category Name</td>
			<td><input type="text" name="name" required="1" value="<?php echo $value['name']?>"/> </td>
		</tr>
		<tr>
			<td> Category Title</td>
			<td><input type="text" name="title" required="1"value="<?php echo $value['title']?>"/> </td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Update"/></td>

		</tr>
		<?php }} ?>
	</table>

</form>

</div>
<div class="well">
	<h4><a href="">Privacy Policy</a><span class="pull-right"><a href="">Terms and Conditions</a></span></h2>

</div>
</div>


</body>

</html>


