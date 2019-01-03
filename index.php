<?php

define('DB_DATABASE', 'dotinstall_db');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORd', 'kiheitai79');
define('PDO_DSN', 'mysql:host=localhost;dbname=' . DB_DATABASE);

class User {
  // public $id;
  // public $name;
  // public $score;

  public function show() {
    echo "$this->name ($this->score)";
  }
}

try {
  // connect
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORd);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // transaction
  $db->beginTransaction();
  $db->exec("update users set score = score - 10 where name = 'taguchi'");
  $db->exec("update users set score = score + 10 where name = 'fkoji'");
  $db->commit();

  // disconnect
  $db = null;

} catch (PDOException $e) {
  $db->rollback();
  echo $e->getMessage();
  exit;
}