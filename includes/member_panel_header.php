<html lang="en">
<head>
  <meta charset="utf-8">
  <link href="otherstyle.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/theme.css" rel="stylesheet" />
  <link href="css/bootstrap-theme.min.css" rel="stylesheet">
  <link href="css/jumbotron.css" rel="stylesheet">
  <link href="css/memberStyles.css" rel="stylesheet"/>
  <title><?php echo $page_title; ?></title>
</head>

<body role="document">
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="index.php">CS-319 Group 5 Library Management System</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <!-- link to books.php -->
            <li><a href="books.php"><span class="glyphicon glyphicon-book"></span>&nbsp; Books Catalog</a></li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp; My Cart</a></li>
      <?php
      if (!isset($_SESSION['user_id'])) {
        echo '<li><a href="register.php">Register</a></li> ';
        echo '<li><a href="login.php">Sign In</a></li>';
        echo '<li><a href="admin.php">Admin</a></li>';
      }
      else
      {
        if ($_SESSION['user_type_id'] == 3) {
          echo '<li><a href="view_users.php">View Users</a></li>';
        }
        echo '<li><a href="memberPanel.php">Member Panel</a></li>';
        echo '<li><a href="logout.php">Log Out</a></li>';
      }
      ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
