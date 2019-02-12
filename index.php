<?php
    session_start();
    $count = 0;
    include ('includes/session.php');
    $title = "Index";
    $page_title = 'Welcome to the site!';
    require_once "./includes/header.php";
    require_once "./functions/database_functions.php";
    $conn = db_connect();
    $row = select4LatestBook($conn);
?>
	<div class="container" id="main">
		<h2 class="h2-responsive text-center">Latest Books</h2>
		<hr>
		<div class="row">
			<?php 
				foreach($row as $book) { ?>
			<div class="col-md-3">
				<a href="book.php?bookisbn=<?php echo $book['book_isbn']; ?>">
				<img class="img-responsive img-thumbnail" src="./images/<?php echo $book['book_image']; ?>"></a>
			</div>
			<?php } ?>
		</div>
	</div>

<?php
include ('./includes/footer.html');
?>
