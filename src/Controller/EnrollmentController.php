<?php

namespace App\Controller;

use App\Controller;
use App\Helper\Validator;
use App\Model\Classes;
use App\Model\Enrollments;
use App\Model\Students;

class EnrollmentController extends Controller
{
    private $model;
    private $students;
    private $classes;

    public function __construct()
    {
        parent::__construct();

        $this->model = new Enrollments();
        $this->students = new Students();
        $this->classes = new Classes();
    }

    public function index()
    {        
        /**
        * Listagem de matrículas feitas
        */
       $enrollments = $this->model->list();

        $this->render('Enrollment/index', [
            'controller' => 'Enrollment',
            'message' => $this->message,
            'enrollments' => $enrollments
        ]);
    }

    public function add()
    {
        $students = $this->students->list();
        $classes = $this->classes->list();

        /**
         * Dados default para a view
         */
        $data = [
            'controller' => 'Enrollment',
            'form' => [],
            'errors' => [],
            'students' => $students,
            'classes' => $classes
        ];

        
        if ($this->isPost()) {
            $validation = Validator::enrollment($_POST);
        
            if ($validation['valid'] === false) {
                /**
                 * Formulário inválido, devolver mensagens de erro e campos para edição
                 */
                $data['errors'] = $validation['messages'];
                $data['form'] = $_POST;
            } else {
                $id = $this->model->add($_POST);
                if ($id) {
                    $this->setMessage("Matrícula #$id adicionada com sucesso");
                    $this->redirect('/matriculas');
                }

                /**
                 * Erro na inserção, devolver mensagens de erro e campos para edição
                 */
                $data['errors'] = ['Erro ao processar formulário. Tente novamente'];
                $data['form'] = $_POST;
            }
        }
        
        $this->render('Enrollment/add', $data);
    }
    
    public function edit()
    {
        $id = $_GET['id'] ?? 0;
        $enrollment = $this->model->get($id);

        /**
         * Matrícula não encontrada
         */
        if (!$enrollment) {
            $this->setMessage('Matrícula não encontrada. Tente novamente', 'danger');
            $this->redirect('/matriculas');
        }

        $students = $this->students->list();
        $classes = $this->classes->list();

        /**
         * Dados default para a view
         */
        $data = [
            'controller' => 'Enrollment',
            'form' => [],
            'errors' => [],
            'enrollment' => $enrollment,
            'students' => $students,
            'classes' => $classes
        ];

        if ($this->isPost()) {
            $validation = Validator::enrollment($_POST, $id);
        
            if ($validation['valid'] === false) {
                /**
                 * Formulário inválido, devolver mensagens de erro e campos para edição
                 */
                $data['errors'] = $validation['messages'];
                $data['enrollment'] = $_POST;
            } else {
                $result = $this->model->edit($id, $_POST);
                if ($result) {
                    $this->setMessage("Matrícula #$id editada com sucesso");
                    $this->redirect('/matriculas');
                }

                /**
                 * Erro na edição, devolver mensagens de erro e campos para edição
                 */
                $data['errors'] = ['Erro ao processar formulário. Tente novamente'];
                $data['enrollment'] = $_POST;
            }
        }

        $this->render('Enrollment/edit', $data);
    }

    public function remove()
    {
        $id = $_GET['id'] ?? 0;
        $enrollment = $this->model->get($id);

        /**
         * Matrícula não encontrada
         */
        if (!$enrollment) {
            $this->setMessage('Matrícula não encontrada. Tente novamente', 'danger');
            $this->redirect('/matriculas');
        }

        $result = $this->model->changeStatus($id);
        if ($result) {
            $this->setMessage("Matrícula #$id removida com sucesso");
            $this->redirect('/matriculas');
        }

        /**
         * Erro na remoção, devolver mensagens de erro e campos para edição
         */
        $data['errors'] = ['Erro ao remover matrícula. Tente novamente'];
        $data['student'] = $_POST;
    }
}