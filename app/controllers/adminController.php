<?php

namespace App\controllers;

use Core\controller\Action;

use App\models\infoModel;

class adminController extends Action
{
    public function index()
    {
        AuthController::validaAutenticacao();
        $this->render("index", "template_admin");
    }    
}



// IndexController


