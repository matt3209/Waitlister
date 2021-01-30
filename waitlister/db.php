<?php 
try {
  $db = new PDO("mysql:dbname=heidem57;host=localhost", "heidem57", "elastic302");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);	
} catch (PDOException $e) {
  echo "Connection failed : ". $e->getMessage();
}
?>