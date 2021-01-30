<?php

// TODO: Fill in db_credentials.php with your credentials
require('db_credentials.php');

/**
 * Connects to the database and returns the pdo
 */
function db_connect() {
  try {
    $dbh = new PDO("mysql:dbname=" . DB_NAME . ";host=" . DB_SERVER,
                   DB_USER,
                   DB_PWD,
                   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

  } catch (PDOException $e) {
    echo "This application exited with failure" .
         "because there was an error when trying to" .
         "connect to its database.";
    exit();
  }
  return $dbh;
}

/**
 * Disconnects from the database
 */
function db_disconnect() {
  global $db;
  $db = null;
}

/**
 * Gets all chats with id greater than the given id
 * so when looking for new chats only, pass the last id
 * the user had in their chat window
 * Returns associative array with chats if successful
 * or error if error occurs
 */
function get_properties($last_id = -1) {
  global $db;
  $result = [];
  try {
    $sql = "SELECT id, name, image, address, city, open,  bedrooms, price FROM properties WHERE id > ? ORDER BY id";
    $statement = $db->prepare($sql);
    $statement->execute([$last_id]);
    $properties = $statement->fetchAll(PDO::FETCH_ASSOC); // puts in associative array (ready for json)
    
    $result["properties"] = $properties;
    $result["status"] = "ok";
  } 
  catch (PDOException $e) {
    $result["status"] = "error";
    $result["error"] = $e;
  }
  return $result;
}

function get_waitlist($last_id = -1) {
  global $db;
  $result = [];
  try {
    $sql = "SELECT * FROM waitlist";
    $statement = $db->prepare($sql);
    $statement->execute([$last_id]);
    $waitlisters = $statement->fetchAll(PDO::FETCH_ASSOC); // puts in associative array (ready for json)
    
    $result["waitlisters"] = $waitlisters;
    $result["status"] = "ok";
  } 
  catch (PDOException $e) {
    $result["status"] = "error";
    $result["error"] = $e;
  }
  return $result;
}

/**
 * Inserts a chat for the given user and message
 * Returns associative array to indicate success or error
 */
function insert_waitlist($id, $username) {
  global $db;
  $result = [];
  try {
    $sql = "INSERT INTO waitlist(property, username) VALUES(?, ?)";
    $statement = $db->prepare($sql);
    $statement->execute([$id, $username]);
    $result["status"] = "ok";
  } 
  catch (PDOException $e) {
    $result["status"] = "error";
    $result["error"] = $e;
  }
  return $result;
}

?>