<?php

namespace App\Controller;

use App\Controller;

class ClassController extends Controller
{
    public function index()
    {
        $this->render('Class/index', [
            'controller' => 'Class'
        ]);
    }
}