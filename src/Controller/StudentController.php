<?php

namespace App\Controller;

use App\Controller;
use App\Helper\Validator;
use App\Model\Students;

class StudentController extends Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();

        $this->model = new Students();
    }

    public function index()
    {
        /**
         * Listagem de estudantes cadastrados
         */
        $students = $this->model->list();

        $this->render('Student/index', [
            'controller' => 'Student',
            'message' => $this->message,
            'students' => $students
        ]);
    }

    public function add()
    {
        /**
         * Dados default para a view
         */
        $data = [
            'controller' => 'Student',
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
                $id = $this->model->add($_POST);
                if ($id) {
                    $this->setMessage("Aluno #$id adicionado com sucesso");
                    $this->redirect('/alunos');
                }

                /**
                 * Erro na inserção, devolver mensagens de erro e campos para edição
                 */
                $data['errors'] = ['Erro ao processar formulário. Tente novamente'];
                $data['form'] = $_POST;
            }
        }

        $this->render('Student/add', $data);
    }

    public function edit()
    {
        $id = $_GET['id'] ?? 0;
        $student = $this->model->get($id);

        /**
         * Aluno não encontrado
         */
        if (!$student) {
            $this->setMessage('Aluno não encontrado. Tente novamente', 'danger');
            $this->redirect('/alunos');
        }

        /**
         * Dados default para a view
         */
        $data = [
            'controller' => 'Student',
            'form' => [],
            'errors' => [],
            'student' => $student
        ];

        if ($this->isPost()) {
            $validation = Validator::student($_POST);
        
            if ($validation['valid'] === false) {
                /**
                 * Formulário inválido, devolver mensagens de erro e campos para edição
                 */
                $data['errors'] = $validation['messages'];
                $data['student'] = $_POST;
            } else {
                $result = $this->model->edit($id, $_POST);
                if ($result) {
                    $this->setMessage("Aluno #$id editado com sucesso");
                    $this->redirect('/alunos');
                }

                /**
                 * Erro na edição, devolver mensagens de erro e campos para edição
                 */
                $data['errors'] = ['Erro ao processar formulário. Tente novamente'];
                $data['student'] = $_POST;
            }
        }

        $this->render('Student/edit', $data);
    }

    public function remove()
    {
        $id = $_GET['id'] ?? 0;
        $student = $this->model->get($id);

        /**
         * Aluno não encontrado
         */
        if (!$student) {
            $this->setMessage('Aluno não encontrado. Tente novamente', 'danger');
            $this->redirect('/alunos');
        }

        $result = $this->model->changeStatus($id);
        if ($result) {
            $this->setMessage("Aluno #$id removido com sucesso");
            $this->redirect('/alunos');
        }

        /**
         * Erro na inserção, devolver mensagens de erro e campos para edição
         */
        $data['errors'] = ['Erro ao remover aluno. Tente novamente'];
        $data['student'] = $_POST;
    }
}