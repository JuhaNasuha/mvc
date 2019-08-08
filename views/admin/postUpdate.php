<head>
<link rel="stylesheet" type="text/css" href="../../includes/css/bootstrap.min.css"/>
</head>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<h2>Edit Article</h2>
<?php
	foreach ($postbyid as $key => $value) {


?>

<form action="<?php echo BASE_URL; ?>/Admin/updatePost/<?php echo $value['id']; ?>" method="post">
	<table>
		<tr>
			<td> Title</td>
			<td><input type="text" name="title" value="<?php echo $value['title']; ?>"/> </td>
		</tr>
		<tr>
			<td> Content</td>
			<td>
				<textarea name="content">
					<?php echo $value['content']; ?>
				</textarea>
                <script>
                        CKEDITOR.replace( 'content' );
                </script>
			</td>
			</tr>
			<tr>
			<td> Category</td>
			<td>
				<select name="cat" class="cat">
				<option>select one</option>
				<?php
				foreach ($catlist as $key => $cat) {
				?>
				<option 

				<?php 
				if ($value['cat'] == $cat['id']) { ?>
					selected= "selected"
				<?php }	?>

				value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
				<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			
			<td><input type="submit" name="submit" value="Update Article"/></td>

		</tr>
	</table>

</form>
<?php } ?>