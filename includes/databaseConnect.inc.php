<?php
require_once './classes/DatabaseConnect.class.php';

$host = 'localhost';
$username = 'root';
$password = '15261343Azerty';
$dbname = 'gestionDesEtudiants';

$database = new DatabaseConnect($host, $username, $password, $dbname);
$pdo = $database->connect();