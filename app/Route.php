<?php
    //utilizamos a notação namespace em toda classe que vamos criar daqui pra frente
    //dessa forma o autoload do composer conseguirá identificar o local da classe
    //e a partir disso podemos importar a classe em qualquer local do nosso projeto
    namespace App;

    //importação da classe Bootstrap seguindo o padrão PSR-4
    use Core\init\Bootstrap;

    //usamos o termo extends para informar que a classe Route irá herdar tudo 
    //tudo que a classe Bootstrap possui
    //dessa forma podemos utilizar os métodos da classe bootstrap
    class Route extends Bootstrap{
       
        //array no qual iremos definir as rotas da nossa aplicação
        //toda rota dever ser inserida aqui
        protected function initRoutes() {

            //rotas das IndexController
            $routes['home'] =  array('route'=>'/','controller'=>'indexController','action'=>'index');
            $routes['contato'] =  array('route'=>'/contato','controller'=>'indexController','action'=>'contato');
            $routes['login'] = array('route'=>'/login', 'controller' => 'IndexController', 'action' => 'login');

            //rotas do ErrorController

            //rotas do AuthController
            $routes['autenticar'] = array('route'=>'/autenticar', 'controller' => 'AuthController', 'action' => 'autenticar');

            $routes['sair'] = array('route'=>'/sair', 'controller' => 'AuthController', 'action' => 'sair');

            //rotas do AdminController
            $routes['admin'] =  array('route'=>'/admin','controller'=>'adminController','action'=>'index');
            

            //rotas do UsuarioController
            $routes['usuario_novo'] =  array('route'=>'/usuario_novo','controller'=>'usuarioController','action'=>'cadastrar');

            $routes['salvar_usuario'] =  array('route'=>'/salvar_usuario','controller'=>'usuarioController','action'=>'salvar_usuario');
            

            $this->setRoutes($routes);
        }

        
    }

?>