<?php
	// the shopping cart needs sessions, to start one
	/*
		Array of session(
			cart => array (
				book_isbn (get from $_GET['book_isbn']) => number of books
			),
			items => 0,
			total_price => '0.00'
		)
	*/
	session_start();
	require_once "./functions/database_functions.php";
	// print out header here
	$title = "Issue Book";
	require "./includes/header.php";

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
?>
	<table class="table">
		<tr>
			<th>Item</th>
	    	<th>Quantity</th>
	    </tr>
	    	<?php
			    foreach($_SESSION['cart'] as $isbn => $qty){
					$conn = db_connect();
					$book = mysqli_fetch_assoc(getBookByIsbn($conn, $isbn));
			?>
		<tr>
			<td><?php echo $book['book_title'] . " by " . $book['book_author']; ?></td>
			<td><?php echo $qty; ?></td>
		</tr>
		<?php } ?>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	</table>
    <form method="post" action="purchase.php" class="form-horizontal">
    <?php if(isset($_SESSION['err']) && $_SESSION['err'] == 1){ ?>
    <p class="text-danger">All fields have to be filled</p>
    <?php } ?>
    <div class="form-group">
    <input type="submit" name="submit" value="Confirm" class="btn btn-primary">
    </div>
    </form>
	<p class="lead">Please press Confim to confirm your issue.</p>
<?php
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./includes/footer.php";
?>
