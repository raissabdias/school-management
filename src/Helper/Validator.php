<?php

namespace App\Helper;

use App\Model\Enrollments;
use DateTime;

class Validator
{
    /**
     * Validar objeto Aluno
     * @param array $data
     * @return array
     */
    public static function student($data)
    {
        $valid = true;
        $messages = [];

        if (!$data) {
            $valid = false;
            $messages[] = 'Formulário vazio, preencha novamente';
            goto output;
        }

        /**
         * Nome é obrigatório, e precisa ter entre 3 e 150 caracteres
         */
        $name = $data['name'] ?? null;
        if (!$name || strlen($name) < 3 || strlen($name) > 150) {
            $valid = false;
            $messages[] = 'O nome do aluno deve ter mínimo 3 caracteres e no máximo 150 caracteres';
        }

        /**
         * Data de nascimento precisa ser válida
         */
        $birth_date = $data['birth_date'] ?? null;
        DateTime::createFromFormat('Y-m-d', $birth_date);
        $check = DateTime::getLastErrors() ? DateTime::getLastErrors()['warning_count'] + DateTime::getLastErrors()['error_count'] : null;
        if ($check) {
            $valid = false;
            $messages[] = 'Data de nascimento inválida';
        }

        /**
         * Nome de usuário não pode ter espaços e caracteres especiais
         */
        $username = $data['username'] ?? null;
        if (preg_match('/[^A-Za-z0-9\.]/', $username) || substr_count($username, '.') > 1) {
            $valid = false;
            $messages[] = 'Nome de usuário inválido (apenas letras, números e 1 (um) . são aceitos';
        }

        output:
        return [
            'valid' => $valid,
            'messages' => $messages
        ];
    }
        
    /**
     * Validar objeto Turma
     * @param array $data
     * @return array
     */
    public static function class($data)
    {
        $valid = true;
        $messages = [];

        if (!$data) {
            $valid = false;
            $messages[] = 'Formulário vazio, preencha novamente';
            goto output;
        }

        /**
         * Nome é obrigatório, e precisa ter entre 3 e 150 caracteres
         */
        $name = $data['name'] ?? null;
        if (!$name || strlen($name) < 3 || strlen($name) > 150) {
            $valid = false;
            $messages[] = 'O nome da turma deve ter mínimo 3 caracteres e no máximo 150 caracteres';
        }

        /**
         * Descrição é obrigatório, e precisa ter entre 1 e 65,535 caracteres
         */
        $description = $data['description'] ?? null;
        if (!$description || strlen($description) < 1 || strlen($description) > 65535) {
            $valid = false;
            $messages[] = 'A descrição da turma deve ter mínimo 1 caracter e no máximo 65,535 caracteres';
        }
        
        /**
         * Tipo é obrigatório, e precisa ter entre 1 e 50 caracteres
         */
        $type = $data['type'] ?? null;
        if (!$type || strlen($type) < 1 || strlen($type) > 50) {
            $valid = false;
            $messages[] = 'o tipo de turma deve ter mínimo 1 caracter e no máximo 50 caracteres';
        }

        output:
        return [
            'valid' => $valid,
            'messages' => $messages
        ];
    }

    public static function enrollment($data, $id = null)
    {
        $valid = true;
        $messages = [];

        if (!$data) {
            $valid = false;
            $messages[] = 'Formulário vazio, preencha novamente';
            goto output;
        }

        /**
         * Estudante é obrigatório, e precisa ser inteiro
         */
        $student = $data['student_id'] ?? null;
        if (!$student || !is_numeric($student)) {
            $valid = false;
            $messages[] = 'O estudante é obrigatório';
        }

        /**
         * Turma é obrigatório, e precisa ser inteiro
         */
        $class = $data['class_id'] ?? null;
        if (!$class || !is_numeric($class)) {
            $valid = false;
            $messages[] = 'A turma é obrigatória';
        }

        /**
         * Verificar se o aluno já tem matrícula nessa turma
         */
        $enrollments = new Enrollments();
        $has_enrollment = $enrollments->checkEnrollment($data['student_id'], $data['class_id'], $id);
        if ($has_enrollment) {
            $valid = false;
            $messages[] = 'Aluno já matriculado nessa turma';
        }
        
        output:
        return [
            'valid' => $valid,
            'messages' => $messages
        ];
    }

    public static function login($data)
    {
        $valid = true;
        $messages = [];

        if (!$data) {
            $valid = false;
            $messages[] = 'Formulário vazio, preencha novamente';
            goto output;
        }

        /**
         * Email é obrigatório
         */
        $email = $data['email'] ?? null;
        if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $valid = false;
            $messages[] = 'Email inválido';
        }
        
        /**
         * Senha é obrigatória
         */
        $password = $data['password'] ?? null;
        if (!$password) {
            $valid = false;
            $messages[] = 'Senha é obrigatória';
        }
        
        output:
        return [
            'valid' => $valid,
            'messages' => $messages
        ];
    }
}