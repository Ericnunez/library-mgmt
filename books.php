<?php
  session_start();
  $count = 0;
  // connec to database
  require_once "./functions/database_functions.php";
  require_once "./includes/session.php";
  $conn = db_connect();

  $query = "SELECT book_isbn, book_image FROM books";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $title = "Full Catalogs of Books";
  require_once "./includes/header.php";
?>
<?php
  if(!isset($_SESSION['user_id']))
  {
    echo '<h2 class="h2-responsive text-center">Full Catalogs of Books</h2>';
    echo '<hr>';
  }
  else
  {
    echo '<h2 class="h2-responsive text-center pt-5 mt-5">Full Catalogs of Books</h2>';
    echo '<hr>';
  }
?>

    <div class="container">
      <?php 
        for($i = 0; $i < mysqli_num_rows($result) /4; $i++){ ?>
          <div class="row">
            <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
              <div class="col-md-3">
                <a href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>">
                <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $query_row['book_image']; ?>"></a>
              </div>
              <?php
                $count++;
                if($count >= 4){
                  $count = 0;
                  break;
                }
          } ?> 
          </div>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
  echo '</div>';
  require_once "./includes/footer.html";
?>

