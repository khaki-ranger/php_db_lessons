<?php

define('DB_DATABASE', 'dotinstall_db');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORd', 'kiheitai79');
define('PDO_DSN', 'mysql:host=localhost;dbname=' . DB_DATABASE);

try {
  // connect
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORd);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // insert
  $stmt = $db->prepare("insert into users (name, score) values (?, ?)");
  
  $name = 'taguchi';
  $stmt->bindValue(1, $name, PDO::PARAM_STR);
  $score = 23;
  $stmt->bindValue(2, $score, PDO::PARAM_INT);
  $stmt->execute();
  $score = 44;
  $stmt->bindValue(2, $score, PDO::PARAM_INT);
  $stmt->execute();

  echo "inserted: " . $db->lastInsertId();

  // disconnect
  $db = null;

} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}