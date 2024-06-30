<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<?php 
  $host = 'localhost';
  $db = 'presensi_online';
  $user = 'root';
  $pass = '';
  $charset='utf8mb4';

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

  $opt = [
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES=>false,
  ];

  $dbh =  new PDO($dsn,$user,$pass,$opt);

?>