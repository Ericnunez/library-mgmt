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
	              echo '<th>First Name</th>';
	              echo '<th>Last Name</th>';
	              echo '<th>username</th>';
	              echo '<th>E-mail</th>';
	              echo '<th>Book Limit</th>';
	            echo '</tr>';
	          echo '</thead>';
	          echo '<tbody id="displayTable">';

	          echo '<form class="form-inline" action="page.php" method="POST">';
		while($row = mysqli_fetch_row($results)){
			echo '<tr>';
			echo "<td>{$row[0]}</td>" . "<td>{$row[1]}</td>" . "<td>{$row[2]}</td>" . "<td>{$row[3]}</td>";
			$val = $row[4];
			echo '<td><div class="input-group">';
				    echo '<span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>';

				    echo '<input type="text"';
				    echo 'value="'.$row[4].'"';
				    echo 'size="2"name="blimit">';
				  echo '</div></td>';
			echo '</tr>';
		}

	    echo '</tbody>';
	    echo '</table>';
	    echo '<div class="container">';
	    echo '<button type="submit" name="submit" class="btn btn-primary btn-lg" id="edit_limit">';
  		echo '<span aria-hidden="true"></span> Edit Book Limit</button>   ';
  		echo '</form>';
  		echo '</div>';
    }
		mysqli_close($conn);
?>