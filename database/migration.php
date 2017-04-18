<?php
  $host="localhost";
  $user="root";
  $pass="root";  

  $dbname = "blog-php_7_0";
  $tablename = "crud";
  
  try {
    $db = new PDO("mysql:host=$host", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("CREATE DATABASE IF NOT EXISTS `$dbname`; CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass'; GRANT ALL ON `$dbname`.* TO '$user'@'localhost'; FLUSH PRIVILEGES;") 
    or die(print_r($db->errorInfo(), true));
  } catch(PDOException $e) {
    die("DB ERROR: ". $e->getMessage());
  }

  try {
    $db = new PDO("mysql:dbname=$dbname;host=$host", $user, $pass);
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $db->exec("CREATE TABLE IF NOT EXISTS $tablename(
      id bigint( 20 ) AUTO_INCREMENT PRIMARY KEY,
      name varchar( 50 ) NOT NULL,
      email varchar( 150 ) NOT NULL, 
      address text( 150 ) NOT NULL,
      created_at timestamp NULL,
      updated_at timestamp NULL
    );");
    print("Created $tablename Table success.\n");
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
?>
