<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- <link href="otherstyle.css" rel="stylesheet"/> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.0/css/mdb.min.css" rel="stylesheet">
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.0/js/mdb.min.js"></script>
	  <link href="css/memberStyles.css" rel="stylesheet"/>
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"/> -->

  <title><?php echo $page_title; ?></title>
</head>

<body role="document">
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark primary-color-dark scrolling-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php"><strong>Library Management System</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="books.php">Catalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">My Cart</a>
          </li>
      	</ul>
          <?php
	          if (!isset($_SESSION['user_id'])) {
	          	echo '<ul class="navbar-nav ">';
	            echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li> ';
	            echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
	            echo '<li class="nav-item"><a class="nav-link" href="admin.php"><span class="glyphicon glyphicon-book"></span>&nbsp; Admin</a></li>';
	            echo '</ul>';
	          }
	          else
	          {
	          	echo '<ul class="navbar-nav">';
	            echo '<li class="nav-item"><a class="nav-link" href="memberPanel.php">Member Panel</a></li>';
	            echo '<li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>';
	            echo '</ul>';
	          }
          ?>
      </div>
    </div>
  </nav>
    <?php
      if (!isset($_SESSION['user_id'])){
      echo '<div class="container rounded mt-5 pt-4">';
      echo  '<div class="carousel slide carousel-fade" data-ride="carousel">';
      echo    '<div class="carousel-inner rounded" role="listbox">';
      echo      '<div class="carousel-item active">';
      echo        '<img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(35).jpg">';
      echo          '<div class="mask rgba-black-strong">';
      echo            '<div class="carousel-caption">';
      echo              '<h1 class="h1-responsive">';
      echo              '<strong>Explore Endless Books</strong>';
      echo              '</h1>';
      echo            '</div>';
      echo          '</div>';
      echo      '</div>';
      echo      '<div class="carousel-item">';
      echo        '<img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(33).jpg">';
      echo      '</div>';
      echo      '<div class="carousel-item">';
      echo        '<img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(31).jpg">';
      echo      '</div>';
      echo    '</div>';
      echo  '</div>';
      echo  '</div>';
    }

    ?>