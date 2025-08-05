<?php

namespace App\Controllers;

class Quemas extends BaseController
{
    public function index()
{
    // Verificar sesión (el filtro ya lo hace, pero es buena práctica)
    if (!session()->get('logged_in')) {
        return redirect()->to('/login');
    }
       $productModel = new \App\Models\ProductModel();
        $products = $productModel->findAll(3);
    
     return view('quemas', [
            'products' => $products
        ]);
}

}
