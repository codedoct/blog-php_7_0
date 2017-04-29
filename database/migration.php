<?php
  $host="localhost";
  $user="root";
  $pass="root";  

  $dbname = "blog_php_7_0";
  $tablename = "crud";
  
  try {
    $db = new PDO("mysql:host=$host;CHARSET=utf8;COLLATE=utf8_unicode_ci", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("CREATE DATABASE IF NOT EXISTS `$dbname`; CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass'; GRANT ALL ON `$dbname`.* TO '$user'@'localhost'; FLUSH PRIVILEGES; DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci") 
    or die(print_r($db->errorInfo(), true));
  } catch(PDOException $e) {
    die("DB ERROR: ". $e->getMessage());
  }

  try {
    $db = new PDO("mysql:dbname=$dbname;host=$host;CHARSET=utf8;COLLATE=utf8_unicode_ci", $user, $pass);
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $db->exec("CREATE TABLE IF NOT EXISTS $tablename(
      id bigint( 20 ) AUTO_INCREMENT PRIMARY KEY,
      name varchar( 50 ) COLLATE utf8_unicode_ci NOT NULL,
      email varchar( 150 ) COLLATE utf8_unicode_ci NOT NULL, 
      address text( 150 ) COLLATE utf8_unicode_ci,
      created_at timestamp NULL,
      updated_at timestamp NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
    print("Created $tablename Table success.\n");
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
?>
