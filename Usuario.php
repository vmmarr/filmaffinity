<?php

class Usuario
{
    const ADMIN = 'admin';

    public $id;
    public $login;
    public $password;

    public function __construct($id) {
        require 'comunes/auxiliar.php';

        $pdo = conectar();
        $usuario = buscarUsuario($pdo, $id);
        $this->id = $id;
        $this->login = $usuario['login'];
        $this->password = $usuario['password'];
    }

    public function __destruct() {
        echo 'Se destruye.';
    }

    public function desloguear() {
        $nombre = $this->login;
        echo "Ya esta deslogueado el usuario $nombre";
    }

    public static function nombreAdmin() {
        return self::ADMIN;
    }
}
?>
