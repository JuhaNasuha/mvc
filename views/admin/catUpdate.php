<head>
<link rel="stylesheet" type="text/css" href="../../includes/css/bootstrap.min.css"/>
</head>
<h3> Update Category </h3><hr/>
<?php
	foreach ($catbyid as $key => $value) {
?>

<form action="<?php echo BASE_URL; ?>/Admin/updateCat/<?php echo $value['id']?>" method="post">
	<table class="tblone">
		<tr>
			<td> Category Name</td>

			<td><input type="text" name="name" required="1" value="<?php echo $value['name']; ?>"/> </td>
		</tr>
		<tr>
			<td> Category Title</td>
			<td><input type="text" name="title" required="1" value="<?php echo $value['title']; ?>"/> </td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Update"/></td>

		</tr>
	</table>

</form>
<?php  } ?>