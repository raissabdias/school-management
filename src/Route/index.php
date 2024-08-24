<?php

use App\Controller\HomeController;
use App\Controller\StudentController;
use App\Controller\EnrollmentController;
use App\Controller\ClassController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');
$router->get('/alunos', StudentController::class, 'index');
$router->get('/turmas', ClassController::class, 'index');
$router->get('/matriculas', EnrollmentController::class, 'index');

$router->dispatch();