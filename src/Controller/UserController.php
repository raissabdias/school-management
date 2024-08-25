<?php

namespace App\Controller;

use App\Controller;
use App\Helper\Validator;
use App\Model\Users;

class UserController extends Controller
{    
    private $model;

    public function __construct()
    {
        parent::__construct();

        $this->model = new Users();
    }

    public function login()
    {
        /**
         * Dados default para a view
         */
        $data = [
            'controller' => 'User',
            'form' => [],
            'errors' => []
        ];

        if ($this->isPost()) {
            $validation = Validator::login($_POST);
        
            if ($validation['valid'] === false) {
                /**
                 * Formulário inválido, devolver mensagens de erro e campos para edição
                 */
                $data['errors'] = $validation['messages'];
                $data['form'] = $_POST;
            } else {
                $login = $this->model->login($_POST);
                if ($login) {
                    /**
                     * Salvar usuário na sessão e levar pra home
                     */
                    $_SESSION['auth'] = $login;
                    $this->redirect('/');
                }

                /**
                 * Erro login, devolver mensagens de erro e campos para edição
                 */
                $data['errors'] = ['Usuário e/ou senha incorretos'];
                $data['form'] = $_POST;
            }
        }

        $this->render('User/login', $data);
    }

    public function logoff()
    {
        unset($_SESSION['auth']);
        $this->redirect('/login');
    }
}