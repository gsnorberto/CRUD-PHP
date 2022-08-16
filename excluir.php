<?php
require 'config.php'; // Database connection
require 'dao/UsuarioDaoMysql.php'; // Mysql user DAO class

$usuarioDao = new UsuarioDaoMysql($pdo); // New user instance

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $usuarioDao -> delete($id);
}

header("Location: index.php");
exit;
