<?php

 $link = 'mysql:host=localhost;dbname=yt_colores';
$usuario = 'root';
$pass = 'root';

try {
    $pdo = new PDO($link,$usuario,$pass); 
    foreach($pdo->query('SELECT * FROM colores') as $fila) {
        print_r($fila);}

   /*  echo 'conectado'; */
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
} 
/* $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'yt_colores';
 
  $mysqli = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );
	
  if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }

  echo 'Success: A proper connection to MySQL was made.';
  echo '<br>';
  echo 'Host information: '.$mysqli->host_info;
  echo '<br>';
  echo 'Protocol version: '.$mysqli->protocol_version;

  $mysqli->close();

 */
?>
