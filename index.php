<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/autoload.php';

// Carreguem el .env a $_ENV abans d'inicialitzar l'aplicació.
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require __DIR__.'/App/config/init.php';

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\LoginController;

$router = new Router();

//**
//** RUTES
//

//ruta arrel
$router->get('/', [HomeController::class, 'index']);

//rutes Crud productes, protegides
$router->get('/products', [ProductController::class, 'index']); //lista productes
$router->get('/products/create',[ProductController::class,'create']);//mostra form per crear products
$router->get('/products/{id}', [ProductController::class, 'show']); //mostra producte per id
$router->post('/products', [ProductController::class, 'store']);//desa producte
$router->get('/products/{id}/edit', [ProductController::class, 'edit']);//mostra producte per id per actualitzar
$router->put('/products/{id}', [ProductController::class, 'update']);//actualitza producte per id
$router->delete('/products/{id}', [ProductController::class, 'destroy']);//elimina producte per id
//Rutes de autenticació publiques
$router->get('/login', [LoginController::class, 'index']); //mostrar el formulari
$router->post('/login', [LoginController::class, 'authenticate']); //fa la logia del logica
//Rutes autenticacio privades


$method = $_SERVER['REQUEST_METHOD'];
//strtoupper --> converteix a majuscules
if ($method === 'POST' && 
    isset($_POST['_method']) && 
    in_array(strtoupper($_POST['_method']), ['PUT', 'DELETE'], true)) {
    $method = strtoupper($_POST['_method']);
}
$router->dispatch($method, parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
