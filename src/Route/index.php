<?php

use App\Controller\HomeController;
use App\Controller\StudentController;
use App\Controller\EnrollmentController;
use App\Controller\ClassController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');

$router->get('/alunos', StudentController::class, 'index');
$router->get('/alunos/adicionar', StudentController::class, 'add');
$router->post('/alunos/adicionar', StudentController::class, 'add');
$router->get('/alunos/editar', StudentController::class, 'edit');
$router->post('/alunos/editar', StudentController::class, 'edit');
$router->get('/alunos/excluir', StudentController::class, 'remove');

$router->get('/turmas', ClassController::class, 'index');
$router->get('/turmas/adicionar', ClassController::class, 'add');
$router->post('/turmas/adicionar', ClassController::class, 'add');
$router->get('/turmas/editar', ClassController::class, 'edit');
$router->post('/turmas/editar', ClassController::class, 'edit');
$router->get('/turmas/excluir', ClassController::class, 'remove');

$router->get('/matriculas', EnrollmentController::class, 'index');
$router->get('/matriculas/adicionar', EnrollmentController::class, 'add');
$router->post('/matriculas/adicionar', EnrollmentController::class, 'add');
$router->get('/matriculas/editar', EnrollmentController::class, 'edit');
$router->post('/matriculas/editar', EnrollmentController::class, 'edit');
$router->get('/matriculas/excluir', EnrollmentController::class, 'remove');

$router->dispatch();