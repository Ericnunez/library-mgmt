<?php
	session_start();
	require_once "./functions/database_functions.php";
  	$conn = db_connect();
  	if (isset($_POST['user_id'])){

  		$user_id = $_POST['user_id'];

		$query = 'SELECT b.book_isbn, b.book_title, b.book_author, c.date_check_out, c.date_due FROM books b INNER JOIN checked_out_books c ON b.book_isbn = c.book_isbn WHERE c.user_id =' . "$user_id";

		$results = mysqli_query($conn, $query);
	}
		if(!$results){
		    echo "Can't retrieve data " . mysqli_error($conn);
		    exit;
		}

		$row_cnt = $results->num_rows;

		if($row_cnt < 1){
			echo "<h1>No checked out books found!</h1>";
		}
		else{
			echo "<form action=" . 'memberPanel.php'. ' >';
			echo '<table class="table table-striped" id="tabletest">';
		          echo '<thead>';
		            echo '<tr>';
		              echo '<th></th>';
		              echo '<th>Book ISBN</th>';
		              echo '<th>Book Title</th>';
		              echo '<th>Book Author</th>';
		              echo '<th>Check out date</th>';
		              echo '<th>Due date</th>';
		            echo '</tr>';
		          echo '</thead>';
		          echo '<tbody id="displayTable">';

		          

			while($row = mysqli_fetch_assoc($results)){
				echo '<tr>';
				echo '<td><div class="radio"><label><input type="radio" name="optradio" ></label></div></td>';
				foreach ($row as $field) {
					
					echo '<td>' . htmlspecialchars($field) . '</td>';
				}
				echo '</tr>';
			}
		}
			echo '</tbody>';
	    	echo '</table>';

		    echo '<input type="submit" value="Return Book" class="btn btn-primary btn-lg" id="return_book">';
	  		echo '<span aria-hidden="true"></span></input>';

	mysqli_close($conn);
?>