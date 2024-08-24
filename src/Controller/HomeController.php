<?php

namespace App\Controller;

use App\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->render('index');
    }
}