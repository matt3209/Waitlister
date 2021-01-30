<?php

header("Content-Type: application/json; charset=UTF-8");

require('database.php');
$db = db_connect();

if ($_SERVER["REQUEST_METHOD"] === "GET"){
    echo json_encode(get_waitlist(0));
    http_response_code(200);
}
else {
  $_POST = json_decode(file_get_contents('php://input'), true);
  $id = $_POST["id"];
  $username = $_POST["username"];
  echo json_encode(insert_waitlist($id,$username));
  http_response_code(200);
}
db_disconnect();

?>