<?php
session_start();

if(isset($_SESSION["username"])){
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
    <script src="propertyScript.js" defer></script>
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
    <nav class="navbar navbar-expand-lg navbar-mainbg">
        <a class="navbar-brand navbar-logo" href="index.php">S42</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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



    <div class="centerCreate">
            <form action="createAccountDB.php" method="post">
                Username:<br>
                <input type="text" name="username" value="" required>
                <br>
                Password:<br>
                <input type="password" name="password" value="" required>
                <br>
                Name:<br>
                <input type="text" name="name" value="" required>
                <br>
                Phone:<br>
                <input type="text" name="phone" value="" required>
                <br>
                Email:<br>
                <input type="text" name="email" value="" required>
                <br>
                Income:<br>
                <input type="text" name="income" value="" required> 
                <br><br>
                <input type="submit" name="submit" value="Submit">
            </form>
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