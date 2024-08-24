<?php

namespace App;

class Controller
{

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
}