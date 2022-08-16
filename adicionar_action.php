<?php
require 'config.php'; // Database connection
require 'dao/UsuarioDaoMysql.php'; // Mysql user DAO class

$usuarioDao = new UsuarioDaoMysql($pdo); // New user instance

// data received from adicionar.php
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($name && $email) {
    if(($usuarioDao -> findByEmail($email)) === false){
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($name);
        $novoUsuario->setEmail($email);

        $usuarioDao -> add($novoUsuario); // Add to the user database

        header("Location: index.php");
        exit;
    } else {
        echo 'aqui 1';
        header("Location: adicionar.php");
        exit;
    }
} else {
    echo 'aqui 2';
    header("Location: adicionar.php"); 
    exit;
}
