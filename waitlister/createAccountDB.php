<?php
    $conn = new PDO("mysql:dbname=heidem57;host=localhost", "heidem57", "elastic302");

    $sql = "INSERT INTO users VALUES (?, ?, ?, ?, ?, ?)";
    $statement = $conn->prepare($sql);
    $params = [$_POST["username"], $_POST["password"], $_POST["name"], $_POST["phone"], $_POST["email"], $_POST["income"]];
    $statement->execute($params);

    $conn = null;

    header("location: ./login.php");
?>