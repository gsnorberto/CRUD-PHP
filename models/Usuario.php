<?php

class Usuario {
    private $id;
    private $nome = '';
    private $email = '';

    public function getId (){
        return $this->id;
    }
    public function setId($id) {
        $this->id = trim($id); // remove empty string
    }

    public function getNome (){
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = ucwords(trim($nome)); // Every First Letter is Capitalized 
    }

    public function getEmail (){
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = strtolower(trim($email)); // remove empty string
        
    }
}

interface UsuarioDAO {
    public function add(Usuario $u);
    public function findAll();
    public function findById($id);
    public function findByEmail($email);
    public function update(Usuario $u);
    public function delete($id);
}