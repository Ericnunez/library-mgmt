<?php # Script 11.11 - logout.php #2
// This page lets the user logout.

session_start(); // Access the existing session.

// If no session variable exists, redirect the user:
if (!isset($_SESSION['user_id'])) {

    require_once ('login_functions.inc.php');
	$url = absolute_url();
	header("Location: $url");
	exit();

} else { // Cancel the session.

	$_SESSION = array(); // Clear the variables.
	session_destroy(); // Destroy the session itself.
	setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.

}

// Set the page title and include the HTML header:
$page_title = 'Logged Out!';
include ('includes/header.php');

// Print a customized message:
echo '<div class="container mt-5 pt-5">';
echo 	'<div class="alert alert-success" role="alert">';
echo 		'<h2 class="alert-heading">You are now Logged out!</h2>';
echo 		'<hr>';
echo 		'<p>Please come back soon.</p>';
echo 	'</div>';
echo '</div>';

include ('includes/footer.html');
?>

