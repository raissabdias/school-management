<?php

namespace App\Controller;

use App\Controller;

class EnrollmentController extends Controller
{
    public function index()
    {
        $this->render('Enrollment/index', [
            'controller' => 'Enrollment'
        ]);
    }
}