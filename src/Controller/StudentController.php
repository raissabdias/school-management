<?php

namespace App\Controller;

use App\Controller;
use App\Helper\Validator;
use DateTime;

class StudentController extends Controller
{
    public function index()
    {
        $this->render('Student/index', [
            'controller' => 'Student'
        ]);
    }

    public function add()
    {
        /**
         * Dados default para a view
         */
        $data = [
            'controller' => 'Student',
            'message' => null,
            'form' => [],
            'errors' => []
        ];

        if ($this->isPost()) {
            $validation = Validator::student($_POST);

            if ($validation['valid'] === false) {
                /**
                 * Formulário inválido, devolver mensagens de erro e campos para edição
                 */
                $data['errors'] = $validation['messages'];
                $data['form'] = $_POST;
            } else {
                $this->redirect('/alunos');
            }
        }

        $this->render('Student/add', $data);
    }
}