<?php
session_start();

if (isset($_SESSION["username"])) {
  header("location:dashboard.php");
}
?>
<!DOCTYPE html>
<html lang=en>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="main.css">
  <!-- Custom styles -->

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>
  <title>FastApp</title>
</head>


<div class="root">

  <body>
    <header>
      <?php
      if (isset($_SESSION['username'])) {
        // Grab user data from the database using the user_id
        // Let them access the "logged in only" pages
        echo '<div class = "root">
      <nav class="navbar navbar-expand-lg navbar-mainbg">
      <a class="navbar-brand navbar-logo" href="index.php">S42</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li>
            <a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
          </li>
          <li>
            <a class="nav-link" href="documents.php"><i class="far fa-clone"></i>Pending Documents</a>
          </li>
          <li>
            <a class="nav-link" href="logout.php"><i class="fas fa-power-off"></i>Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    </div>';
      } else {
        // shows nav page
        echo '<div class = "root">
    <nav class="navbar navbar-expand-lg navbar-mainbg">
      <a class="navbar-brand navbar-logo" href="index.php">S42</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li>
            <a class="nav-link" href="login.php"><i class="far fa-user-circle"></i>Login</a>
          </li>
          <li>
            <a class="nav-link" href="createAccount.php"><i class="far fa-user-circle"></i>Create Account</a>
          </li>
        </ul>
      </div>
    </nav>
    </div>';
      }
      ?>
    </header>

    <div class="center">
      <p>In the world of Low Income Housing, the Application process is a long and tedious one.This sites goal is to
        make
        low income housing easily available to the million of Americans that are in
        desperate need of it. Our goal is to connect the family or individual with housing they can afford, and make the
        process fast and easy.</p>
      <br>
      <p>Please create an account below to get started.</p>
      <br>
      <a href="login.php" class="btn btn-dark" role="button">Login</a>
      <a href="createAccount.php" class="btn btn-dark" role="button">Create Account</a>
    </div>

    <!-- Footer -->
    <footer class="page-footer">

      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">
        <a> Disclaimer: This site does not approve or guarentee you approval or an apartment.</a>
        <p><a href="http://validator.w3.org/check/referer" referrerpolicy="unsafe-url">Validate Me</a></p>
      </div>
      <!-- Copyrightyo -->


    </footer>
    <!-- Footer -->

  </body>
</div>

</html>