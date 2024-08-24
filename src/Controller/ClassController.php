<?php

namespace App\Controller;

use App\Controller;
use App\Helper\Validator;
use App\Model\Classes;

class ClassController extends Controller
{    
    private $model;

    public function __construct()
    {
        parent::__construct();

        $this->model = new Classes();
    }

    public function index()
    {        
        /**
        * Listagem de turmas cadastradas
        */
       $classes = $this->model->list();

        $this->render('Class/index', [
            'controller' => 'Class',
            'message' => $this->message,
            'classes' => $classes
        ]);
    }
    
    public function add()
    {
        /**
         * Dados default para a view
         */
        $data = [
            'controller' => 'Class',
            'form' => [],
            'errors' => []
        ];

        if ($this->isPost()) {
            $validation = Validator::class($_POST);
        
            if ($validation['valid'] === false) {
                /**
                 * Formulário inválido, devolver mensagens de erro e campos para edição
                 */
                $data['errors'] = $validation['messages'];
                $data['form'] = $_POST;
            } else {
                $id = $this->model->add($_POST);
                if ($id) {
                    $this->setMessage("Turma #$id adicionada com sucesso");
                    $this->redirect('/turmas');
                }

                /**
                 * Erro na inserção, devolver mensagens de erro e campos para edição
                 */
                $data['errors'] = ['Erro ao processar formulário. Tente novamente'];
                $data['form'] = $_POST;
            }
        }

        $this->render('Class/add', $data);
    }
    
    public function edit()
    {
        $id = $_GET['id'] ?? 0;
        $class = $this->model->get($id);

        /**
         * Turma não encontrada
         */
        if (!$class) {
            $this->setMessage('Turma não encontrada. Tente novamente', 'danger');
            $this->redirect('/turmas');
        }

        /**
         * Dados default para a view
         */
        $data = [
            'controller' => 'Class',
            'form' => [],
            'errors' => [],
            'class' => $class
        ];

        if ($this->isPost()) {
            $validation = Validator::class($_POST);
        
            if ($validation['valid'] === false) {
                /**
                 * Formulário inválido, devolver mensagens de erro e campos para edição
                 */
                $data['errors'] = $validation['messages'];
                $data['class'] = $_POST;
            } else {
                $result = $this->model->edit($id, $_POST);
                if ($result) {
                    $this->setMessage("Turma #$id editada com sucesso");
                    $this->redirect('/turmas');
                }

                /**
                 * Erro na edição, devolver mensagens de erro e campos para edição
                 */
                $data['errors'] = ['Erro ao processar formulário. Tente novamente'];
                $data['class'] = $_POST;
            }
        }

        $this->render('Class/edit', $data);
    }
    
    public function remove()
    {
        $id = $_GET['id'] ?? 0;
        $class = $this->model->get($id);

        /**
         * Turma não encontrada
         */
        if (!$class) {
            $this->setMessage('Turma não encontrada. Tente novamente', 'danger');
            $this->redirect('/turmas');
        }

        $result = $this->model->changeStatus($id);
        if ($result) {
            $this->setMessage("Turma #$id removida com sucesso");
            $this->redirect('/turmas');
        }

        /**
         * Erro na inserção, devolver mensagens de erro e campos para edição
         */
        $data['errors'] = ['Erro ao remover turma. Tente novamente'];
        $data['class'] = $_POST;
    }
}