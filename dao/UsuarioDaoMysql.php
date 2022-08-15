<?php

require_once 'models/Usuario.php';

class UsuarioDaoMysql implements UsuarioDAO{
    private $pdo;

    public function __construct(PDO $driver) {
        $this -> pdo = $driver;
    }

    // Add a new user to the database
    public function add(Usuario $u) {
        $sql = $this -> pdo -> prepare("INSERT INTO usuarios VALUES (nome, email) VALUES (:nome, :email)");
        $sql -> bindValue(':nome', $u->getNome());
        $sql -> bindValue(':email', $u->getEmail());
        $sql -> execute();

        $u -> setId($this -> pdo -> lastInsertId());
        return $u;
    }

    // Find all users in the MySQL database
    public function findAll() {
        $array = [];
        $sql = $this -> pdo -> query("SELECT * FROM usuarios"); // database query

        if($sql -> rowCount() > 0) {
            $data = $sql -> fetchAll();

            foreach($data as $item) {
                $u = new Usuario();
                $u -> setId($item['id']);
                $u -> setNome($item['nome']);
                $u -> setEmail($item['email']);

                $array[] = $u;
            }
        }

        return $array;
    }

    public function findById($id) {

    }

    // Find a User by email. Returns a user or a False;
    public function findByEmail($email) {
        $sql = $this -> pdo -> prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql -> bindValue(':email', $email);
        $sql -> execute();

        if($sql -> rowCount() > 0) {
            $data = $sql -> fetch();

            $u = new Usuario();
            $u -> setId($data['id']);
            $u -> setNome($data['nome']);
            $u -> setEmail($data['email']);

            return $u;
        } else {
            return false;
        }
    }

    public function update(Usuario $u) {

    }

    public function delete($id){
        
    }
}