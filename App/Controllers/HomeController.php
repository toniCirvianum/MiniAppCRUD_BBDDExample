<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;
use App\Database\Schema;
use App\Database\Seeder;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // La primera visita a / prepara la taula i les dades de prova.
        $database = new Database();
        $schema = new Schema($database);

        if (!$schema->productsTableExists()) {
            $schema->createProductsTable();

            $seeder = new Seeder($database);
            $seeder->insertProducts();
        }

        $this->render('home/index', [
            'title' => 'Llsita de productes',
            'products' => $_SESSION['products']]);
    }
    public function notFound()
    {
        http_response_code(404);
        $this->render('errors/404', ['title' => 'Pàgina no trobada']);
    }


}
