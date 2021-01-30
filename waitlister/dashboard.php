<?php
session_start();

if(!isset($_SESSION["username"])){
  header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    <link rel="stylesheet" href="main.css">
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
<body>
<div class = "root">
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
    </div>

  
  <div class="center">
        <a href="documents.php" class="btn btn-dark" role="button">Upload Documents</a>
        <a href="joinWaitlist.php" class="btn btn-dark" role="button">Join a Waitlist</a>
        <a href="updateAccount.php" class="btn btn-dark" role="button">Update Account</a>
        <a href="adminWaitlist.php" 
        <?php if ($_SESSION["username"] != 'admin') { 
          echo "style='display:  none;'";
        }
        ?> 
        class ="btn btn-danger" role="button">Waitlist Viewer</a>
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

</html>