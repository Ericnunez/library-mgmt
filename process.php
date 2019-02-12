<?php
	session_start();

	$_SESSION['err'] = 1;
	foreach($_POST as $key => $value){
		if(trim($value) == ''){
			$_SESSION['err'] = 0;
		}
		break;
	}

	if($_SESSION['err'] == 0){
		header("Location: purchase.php");
	} else {
		unset($_SESSION['err']);
	}

	require_once "./functions/database_functions.php";
	// print out header here
	$title = "Borrow Process";
	require "./includes/header.php";
	// connect database
	$conn = db_connect();
	extract($_SESSION['ship']);

	foreach($_SESSION['cart'] as $isbn => $qty){
		$bookprice = getbookprice($isbn);
		$query = "INSERT INTO order_items VALUES 
		('$orderid', '$isbn', '$bookprice', '$qty')";
		$result = mysqli_query($conn, $query);
		if(!$result){
            echo "<script type='text/javascript'>alert('Book sucessfully issued!!')</script>";
		}
	}

	session_unset();
?>
	<p class="lead text-success">Book sucessfully issued!Your cart has been empty.</p>

<?php
	if(isset($conn)){
		mysqli_close($conn);
	}
	require_once "./includes/footer.php";
?>
