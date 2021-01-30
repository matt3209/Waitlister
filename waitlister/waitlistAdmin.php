<?php

header("Content-Type: application/json; charset=UTF-8");

require('database.php');
$db = db_connect();

if ($_SERVER["REQUEST_METHOD"] === "GET"){
    echo json_encode(get_waitlist(0));
    http_response_code(200);
}
db_disconnect();

?>