<?php
// Connect to the Database Server
$db_name = 'test';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass); // name, id, password from database