<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        //A traves del model PRODUCT aconseguim tot els productes
        $p = new Product();
        $products = $p->getAll();
        //els passem a la vista amb el render
        $this->render('products/index', [
            'title' => 'Productes',
            'products' => $products
        ]);
    }
    public function store()
    {
        //Recepció via POST
        $data = [
            'name' => $_POST['name'] ?? '',
            'price' => $_POST['price'] ?? '',
            'category' => $_POST['category'] ?? ''
        ];
        //Validacions
        if (
            $data['name'] === '' ||
            $data['category'] === '' ||
            !is_numeric($data['price']) ||
            $data['price'] < 0
        ) {
            http_response_code(422);
            //Eviem error a la vista
            $this->render('products/create', [
                'title' => 'Crear producte',
                'error' => 'Les dades del producte no són vàlides'
            ]);

            return;
        }

        //Si arribem aqui ja podem crear el producte amb el MODEL PRODUCT
        $model = new Product();
        $model->create($data);
        $data="";

        //Si actualitzem el navagadro torna a crear el producte
        $this->redirect('/products');
    }
    public function update($id)
    {
        //A traves del model recuperem el producte que te el id
        //que s'ha passat com a parametre
        $model = new Product();
        $product = $model->getById($id);
        //si no troba el producte mostrem error
        if ($product === null) {
            $n = new HomeController();
            $n->notFound();
            return;
        }
        //Desem info que rebem via POST
        $data = [
            'name' => $_POST['name'] ?? '',
            'price' => $_POST['price'] ?? '',
            'category' => $_POST['category'] ?? ''
        ];
        //Validacions
        if (
            $data['name'] === '' ||
            $data['category'] === '' ||
            !is_numeric($data['price']) ||
            $data['price'] < 0
        ) {
            //Si no passa les validacions mostrem error
            http_response_code(422);
            $this->render('products/edit', [
                'title' => 'Editar producte',
                'product' => array_merge($product, $data),
                'error' => 'Les dades del producte no són vàlides'
            ]);

            return;
        }


        $model->update($id, $data);

        $this->index();
    }
    public function destroy($id)
    {

        //Esborrem fent servir el model
        $model = new Product();
        $deleted = $model->delete($id);

        if (!$deleted) {
            $n = new HomeController();
            $n->notFound();
            return;
        }

        $this->index();
    }
    public function show($id)
    {
        //A traves del model recuperem el producte que te el id
        //que s'ha passat com a parametre
        $p = new Product();
        $product = $p->getById($id);
        //Enviem el productee a la vista a través del render
        if ($product) {
            $this->render('products/show', [
                'title' => 'detalls de producte',
                'product' => $product
            ]);
            return;
        }
        //si arribem fins aqui vol dir que no s'ha trobat el producte
        $n = new HomeController();
        $n->notFound();
    }

    public function create()
    {
        //Genera la vista de creació de productes
        $this->render('products/create', [
            'title' => 'Crear producte'
        ]);
    }

    public function edit($id)
    {
        //A traves del model recuperem el producte que te el id
        //que s'ha passat com a parametre
        $model = new Product();
        $product = $model->getById($id);
        //Si no troba el producte mostrem error
        if ($product === null) {
            $hc = new HomeController;
            $hc->notFound();
            return;
        }
        //Mostrem vista per editar producte
        $this->render('products/edit', [
            'title' => 'Editar producte',
            'product' => $product
        ]);
    }
}
