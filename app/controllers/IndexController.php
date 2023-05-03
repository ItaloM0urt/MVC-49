<?php

namespace App\controllers;

use Core\controller\Action;

use App\models\infoModel;

class IndexController extends Action
{
    
    public function index()
    {
        

        //após realziar a instancia de produto passando a conexão ($conn)
        //podemos a partir da intancia desse objeto riar métodos que irão
        //manipular o dados no banco de dados
        //para iso vou criar a chamada para um método chamado getProdutos()
        //esse método sera criado em Produto mais tarde.

        
        $this->render("index", "template_front1");
    }

    
    public function contato()
    {
        $this->render('contato', "template_front2");
    }

    public function login()
    {  
        $this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
        $this->render('login', "template_front2");
    }

    
}



// IndexController


