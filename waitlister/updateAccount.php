<?php

session_start();

if(isset($_SESSION["username"])){
    header("location:dashboard.php");
  }

include("db.php");

try {
    if (isset($_POST['submit'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if ($username != "" && $password != "") {

            $query = "select * from `users` where `username`=:username and `password`=:password";
            $stmt = $db->prepare($query);
            $stmt->execute(
                array(
                    'username' => $_POST["username"],
                    'password' => $_POST["password"]
                )
            );
            $count = $stmt->rowCount();
            if ($count > 0) {
                $_SESSION["username"] = $_POST["username"];
                header("location: dashboard.php");
            } else {
                $message = '<label>Wrong Login</label>';
            }
        }
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
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
            <a class="nav-link" href="contactUs.php"><i class="far fa-comments"></i>Contact</a>
          </li>
          <li>
            <a class="nav-link" href="logout.php"><i class="fas fa-power-off"></i>Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    </div>

    <div class="centerCreate">
        <p>
            <form method="post">
                <input type="text" name="Name" placeholder="Enter your password" required>
                <br>
                <input type="text" name="Email" placeholder="Enter your password" required>
                <br>
                <input type="text" name="Phone" placeholder="Enter your password" required>
                <br>
                <input type="int" name="Income" placeholder="Enter your password" required>
                <br>
                <input type="submit" class="btn btn-dark" name="submit" id="submit" role="button" value="Submit">
                <a href="updateAccountDB.php" class="btn btn-dark" role="button">Update Account</a>
            </form>
        </p>
    </div>

    <?php
    if (isset($message)) {
        echo '<label class="text-danger">' . $message . '</label>';
    }
    ?>
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