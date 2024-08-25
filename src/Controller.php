<?php

namespace App;

class Controller
{
    protected $message;

    public function __construct()
    {
        session_start();

        /**
         * Validar se há mensagens na sessão, atribuir e remover da sessão
         */
        if (isset($_SESSION['flash_message']) && $_SESSION['flash_message']) {
            $this->message = [
                'text' => $_SESSION['flash_message'],
                'type' => $_SESSION['flash_message_type'] ?? 'success'
            ];
            $this->setMessage(null);
        }

        /**
         * Verificar se o usuário está logado
         */
        if ((!isset($_SESSION['auth']) || !$_SESSION['auth']) && $_SERVER['REQUEST_URI'] != '/login') {
            $this->redirect('/login');
        }
    }

    /**
     * Chama o arquivo que renderizará a view
     * @param $view
     * @param array $data
     */
    protected function render($view, $data = [])
    {
        extract($data);

        include "View/$view.php";
    }

    /**
     * Informa se o método da requisição é POST
     * @return bool
     */
    public function isPost()
    {
        return ($_SERVER['REQUEST_METHOD'] == 'POST') ? true : false;
    }

    /**
     * Redirecionar para página
     * @param string $url
     */
    public function redirect($url)
    {
        header('location: ' . $url, true, 302);
        die;
    }

    /**
     * Salvar mensagem na sessão
     * @param string $url
     */
    public function setMessage($message, $type = 'success')
    {
        $_SESSION['flash_message'] = $message;
        $_SESSION['flash_message_type'] = $type;
        return true;
    }
}