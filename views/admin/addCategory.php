<head>
<link rel="stylesheet" type="text/css" href="../includes/css/bootstrap.min.css"/>
</head>
	<h3> Add Category </h3><hr/>

<form action="http://localhost/mvc/Admin/insertCategory" method="post">
	<table class="tblone">
		<tr>
			<td> Category Name</td>
			<td><input type="text" name="name" required="1"/> </td>
		</tr>
		<tr>
			<td> Category Title</td>
			<td><input type="text" name="title" required="1"/> </td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Save"/></td>

		</tr>
	</table>

</form>



