<head>
<link rel="stylesheet" type="text/css" href="../includes/css/bootstrap.min.css"/>
</head>
<h1>User list</h1><hr/>
<?php
if (!empty($_GET['msg'])) {
	$msg = unserialize(urldecode($_GET['msg']));
	foreach ($msg as $key => $value) {
		echo "<span style='color:black;font-weight:bold'>".$value."</span>";
	}
}

?>
<table class="tblone">
	<tr>	
		<th width="20%" >Serial</th>
		<th width="30%">Username</th>
		<th width="30%">Level</th>
		<th width="20%">Action</th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $key => $value) {
		$i++;
	?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $value['username']; ?></td>
		<td><?php echo $value['level']; ?></td>
		<td>

			<a onclick ="return confirm('Are you sure to delete');" href="<?php echo BASE_URL; ?>/User/deleteuser/<?php echo $value['id']; ?>">Delete</a>
		</td>
	</tr>
	<?php } ?>

</table>


