<?php

$senha = '1234';
$hash = password_hash($senha, PASSWORD_DEFAULT);

if(password_verify($senha, $hash)){
    echo "Senha correta";
} else {
    echo "Senha errada!";
}

echo "SENHA ORIGINAL: ".$senha;
echo "</br>";
echo "HASH: ".$hash;