<?php
	// the shopping cart needs sessions, to start one
	/*
		Array of session(
			cart => array (
				book_isbn (get from $_POST['book_isbn']) => number of books
			),
			items => 0,
			total_price => '0.00'
		)
	*/
	session_start();
	require_once "./functions/database_functions.php";
	require_once "./functions/cart_functions.php";

	// book_isbn got from form post method, change this place later.
	if(isset($_POST['bookisbn'])){
		$book_isbn = $_POST['bookisbn'];
	}

	if(isset($book_isbn)){
		// new iem selected
		if(!isset($_SESSION['cart'])){
			// $_SESSION['cart'] is associative array that bookisbn => qty
			$_SESSION['cart'] = array();
		}

		if(!isset($_SESSION['cart'][$book_isbn])){
			$_SESSION['cart'][$book_isbn] = 1;
		} elseif(isset($_POST['cart'])){
			$_SESSION['cart'][$book_isbn]++;
			unset($_POST);
		}
	}

	// if save change button is clicked , change the qty of each bookisbn
	if(isset($_POST['save_change'])){
		foreach($_SESSION['cart'] as $isbn =>$qty){
			if($_POST[$isbn] == '0'){
				unset($_SESSION['cart']["$isbn"]);
			} else {
				$_SESSION['cart']["$isbn"] = $_POST["$isbn"];
			}
		}
	}

	// print out header here
	$title = "Member cart";
	require "./includes/header.php";

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
		$_SESSION['total_items'] = total_items($_SESSION['cart']);
?>
<h1 class="h1-responsive mt-5 pt-5 text-center">Shopping Cart</h1>
<div class="container ">
   	<form action="cart.php" method="post">
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
				<td><input type="text" value="<?php echo $qty; ?>" size="2" name="<?php echo $isbn; ?>"></td>
			</tr>
			<?php } ?>
	   	</table>
	   	<input type="submit" class="btn btn-primary" name="save_change" value="Save Changes">
	</form>
	<br/><br/>
	<a href="checkout.php" class="btn btn-primary">Issue Book</a>
	<a href="books.php" class="btn btn-primary">Back to Catalog</a>
</div>
<?php
	} else {
		echo '<div class= "container mt-5 pt-5">';
		echo '<div class="alert alert-warning" role="alert">';
		echo 	'<h4 class="alert-heading">Oops!</h4>';
		echo 	'<p>Your cart is empty! Please make sure you add some books in it!</p>';
		echo '</div>';
		echo '</div>';
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./includes/footer.html";
?>