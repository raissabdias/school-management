<?php

namespace App\Controller;

use App\Controller;

class StudentController extends Controller
{
    public function index()
    {
        $this->render('Student/index', [
            'controller' => 'Student'
        ]);
    }
}