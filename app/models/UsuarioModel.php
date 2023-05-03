<?php

namespace App\Models;

use Core\Model\Model;

use PDO;

class UsuarioModel extends Model
{
    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $senha;
    private $nivel;
    private $ativo;
    private $imagem;
    private $created_at;
    private $update_at;
    private $deleted_at;

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function autenticar(){


        $query = "SELECT id, nome, sobrenome, email,nivel, imagem FROM usuarios 
        WHERE email = :email and senha = :senha and ativo = 1";

        dd($this);
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":email", $this->__get("email"));
        $stmt->bindValue(":senha", $this->__get("senha"));
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario['id'] != '' && $usuario['nome']){
            $this->__set('id', $usuario['id']);
            $this->__set('nome', $usuario['nome']);
            $this->__set('sobrenome', $usuario['sobrenome']);
            $this->__set('email', $usuario['email']);
            $this->__set('ativo', $usuario['ativo']);
            $this->__set('imagem', $usuario['imagem']);

        }
        return $this;
        
        
    }

}

?>