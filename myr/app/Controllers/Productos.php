<?php

namespace App\Controllers;

class Productos extends BaseController
{
    public function index()
{
  
    if (!session()->get('logged_in')) {
        return redirect()->to('/login');
    }
       $productModel = new \App\Models\ProductModel();
        $products = $productModel->findAll();
    
     return view('productos', [
            'products' => $products
        ]);
}

}
