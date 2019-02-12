<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "List book catalog";
	require_once "./includes/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAll($conn);
?>

<div class="container mb-5 pb-5">
	<h1 class="h1-responsive text-center">Edit Book Catalog</h1>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>ISBN</th>
			<th>Title</th>
			<th>Author</th>
			<th>Image</th>
			<th>Description</th>
			<th>Price</th>
			<th>Publisher</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<td><?php echo $row['book_isbn']; ?></td>
			<td><?php echo $row['book_title']; ?></td>
			<td><?php echo $row['book_author']; ?></td>
			<td><?php echo $row['book_image']; ?></td>
			<td><?php echo $row['book_descr']; ?></td>
			<td><?php echo $row['book_price']; ?></td>
			<td><?php echo getPubName($conn, $row['publisherid']); ?></td>
			<td><a href="admin_edit.php?bookisbn=<?php echo $row['book_isbn']; ?>">Edit</a></td>
			<td><a href="admin_delete.php?bookisbn=<?php echo $row['book_isbn']; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
	<a href="admin_add.php" class="btn btn-primary">Add new book</a>
	<a href="admin_signout.php" class="btn btn-primary">Sign out!</a>
	<br>
	<br>
</div>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./includes/footer.html";
?>
