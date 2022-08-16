<?php
require 'config.php'; // Database connection
require 'dao/UsuarioDaoMysql.php'; // Mysql user DAO class

$usuarioDao = new UsuarioDaoMysql($pdo); // New user instance

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($id && $name && $email) {
    $usuario = new Usuario();
    
    $usuario->setId($id);
    $usuario->setNome($name);
    $usuario->setEmail($email);

    $usuarioDao->update($usuario);

    header("Location: index.php");
    exit;
} else {
    header("Location: editar.php?=" . $id);
    exit;
}
