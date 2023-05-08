<?php

namespace App\controllers;

use Core\controller\Action;

use Core\model\Container;

use App\models\infoModel;

class usuarioController extends Action
{
    public function cadastrar()
    {
        AuthController::validaAutenticacao();
        $this->render("cadastrar", "template_admin");
    }


    public function salvar_usuario()
    {
        $usuario = Container::getModel("Usuario");

        $usuario->__set('nome', $_POST['nome']);
        $usuario->__set('sobrenome', $_POST['sobrenome']);
        $usuario->__set('email', $_POST['email']);
        $usuario->__set('senha', md5($_POST['senha']));
        $usuario->__set('mivel', isset($_POST["nivel"]) ? 1 : 0);

        if($usuario->validarCadastro()){

            if(count($usuario->getUsuarioPorEmail()) == 0){
                $usuario->salvar();

                //passar informações do cadastro para view
                $this->view->status = array(
                    "status" => "SUCCESS",
                    "msg"    => "Usuário cadastro com sucesso"
                );
                $this->render("cadastrar", "template_admin");
            }else{
                $this->view->status = array(
                    "status" => "ERROR",
                    "msg"    => "Erro ao cadastrar ao usuário, e-mail já cadastro no banco de dados!"

                );
                //salvando os dados que estavam no formulario
                //para coloca-los de novo no form apos atualizar pagina

                $this->view->tempUsuario = array (
                    "nome" => $_POST['nome'],
                    "sobrenome" => $_POST['sobrenome'],
                    "email" => $_POST['email'],
                    "senha" => $_POST['senha'],
                    "nivel" => isset($_POST["nivel"]) ? 1 : 0
                );


                $this->render("cadastrar", "template_admin");
            }
            

        }else{
            echo "Else do validar Cadastro";
        }


    
    }
}

