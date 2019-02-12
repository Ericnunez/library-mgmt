<?php
  session_start();

  $title = "Full Catalogs of Books";
  require_once "./includes/header.php";
  require_once "./functions/database_functions.php";
  // $conn = db_connect();
?>
<!-- This is the beginning of the main member panel -->
  <div class="container mt-5 pt-5">
    <div class="row">
      <div class="col-sm-3">
          <div class="sidebar">
            <ul class=" list-group list-group-flush">
              <li class="list-group-item active">
                <?php echo '<span id="user_id" style="display:none;">' . $_SESSION['user_id'] . '</span>';?>
                  <h4 class="h4-responsive"> Welcome, <span id="username"><?php echo $_SESSION['first_name'];?></span></h4>
              </li>
              <li id="view_borrowed_books" class="list-group-item">
                <a href="#"> View All Borrowed Books</a>
              </li>
              <li class="list-group-item">
                <a href="#"> Return Books</a>
              </li>
              <li class="list-group-item">
                <a href="index.php"> Latest Books</a>
              </li>
              <li id="send_alert" class="list-group-item">
                <a href="#"> Send Alert</a>
              </li>
              <?php
                  if($_SESSION['user_type_id'] == 3)
                  {
                    echo '<li id="view_all_users"><a href="#"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> View All Users</a></li>';
                  }
              ?>
            </ul>
        </div>
      </div>
    <div class="col-sm-9">
      <h1 id="h1-responsive">Member Panel</h1>
      <hr>
      <div id="display">
      </div>
    </div>
  </div>
<!-- Script 3.3 - footer.html -->
	<!-- End of the page-specific content. -->
  </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script> 
      $(document).ready(function(){
          $("#view_borrowed_books").click(function(){
              var example = $("#user_id").text();
              $.post("view_borrowed_books.php",{user_id: example}, function(data, status){
                  $("#display").html(data);
              });
          });
          $("#view_all_users").click(function(){
              $.post("view_all_users.php", function(data, status){
                  $("#display").html(data);
              });
          });
          $("#send_alert").click(function(){
              $.post("view_send_alert.php", function(data, status){
                  $("#display").html(data);
              });
          });
          $("#testing").click(function(event){
              event.preventDefault();
              $.post("view_send_alert.php", function(data, status){
                  $("#display").html(data);
              });
          });
      });
    </script>
<?php
include ('./includes/footer.html');
?>
