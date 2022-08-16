<?php
require 'config.php'; // Database connection
require 'dao/UsuarioDaoMysql.php'; // Mysql user DAO class

$usuarioDao = new UsuarioDaoMysql($pdo); // New user instance

$usuario = false;
$id = filter_input(INPUT_GET, 'id');

if($id){
    $usuario = $usuarioDao -> findById($id);
}
if($usuario === false) {
    header('Location: index.php');
    exit;
}

?>

<h1>Editar Usuário</h1>

<form action="editar_action.php" method="POST">
    <!-- Input oculto -->
    <input type="hidden" name="id" value="<?=$usuario->getId();?>" />

    <label for="">
        Nome: <br />
        <input type="text" name="name" value="<?=$usuario->getNome();?>"> <br /> <br />
    </label>

    <label for="">
        Email: <br />
        <input type="email" name="email" value="<?=$usuario->getEmail();?>"> <br /> <br />
    </label>

    <input type="submit" value="Salvar">
</form>