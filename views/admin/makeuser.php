<head>
<link rel="stylesheet" type="text/css" href="../includes/css/bootstrap.min.css"/>
</head>
	<h3> Make User </h3><hr/>

<form action="http://localhost/mvc/User/addNewUser" method="post">
	<table class="tblone">
		<tr>
			<td> username</td>
			<td><input type="text" name="username" required="1"/> </td>
		</tr>
		<tr>
			<td> password</td>
			<td><input type="text" name="password" required="1"/> </td>
		</tr>
		<tr>
			<td>User Role</td>
			<td>
			<select name="level" class="cat">
				<option>Select User Role</option>
				<option value="2">Author</option>
				<option value="3">Contributor</option>
			</select>
			</td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="make user"/></td>

		</tr>
	</table>

</form>



