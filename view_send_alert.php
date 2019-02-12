<?php
  	session_start();
	require_once "./functions/database_functions.php";
  	$conn = db_connect();

	$query = 'Select u.first_name, u.last_name, u.username, u.email, u.book_limit From users u ORDER BY u.first_name ASC';

	$results = mysqli_query($conn, $query);

	if(!$results){
	    echo "Can't retrieve data " . mysqli_error($conn);
	    exit;
	}
	$row_cnt = $results->num_rows;

	if($row_cnt < 1){
		echo "<h1>No users found!</h1>";
	}
	else{
		echo '<table class="table table-striped" id="tabletest">';
	          echo '<thead>';
	            echo '<tr>';
	              echo '<th></th>';
	              echo '<th>First Name</th>';
	              echo '<th>Last Name</th>';
	              echo '<th>username</th>';
	              echo '<th>E-mail</th>';
	              echo '<th>Book Limit</th>';
	            echo '</tr>';
	          echo '</thead>';
	          echo '<tbody id="displayTable">';

	          echo '<form class="form-inline" action="/action_page.php">';
		while($row = mysqli_fetch_row($results)){
			echo '<tr>';
			echo '<td><div class="radio"><label><input type="radio" name="optradio" ></label></div></td>';

			echo "<td>{$row[0]}</td>" . "<td>{$row[1]}</td>" . "<td>{$row[2]}</td>" . "<td>{$row[3]}</td>";
			echo "<td>{$row[4]}</td>";
			echo '</tr>';
		}

	    echo '</tbody>';
	    echo '</table>';
	    echo '<div class="container">';

  		echo '<button type="button" class="btn btn-danger btn-lg">';
  		echo '<span aria-hidden="true"></span> Send Alert</button>';
  		echo '</div>';
    }
		mysqli_close($conn);
?>