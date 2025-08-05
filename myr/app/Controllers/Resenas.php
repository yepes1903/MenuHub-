<?php

namespace App\Controllers;

class Resenas extends BaseController
{
    public function index()
{
    // Verificar sesión (el filtro ya lo hace, pero es buena práctica)
    if (!session()->get('logged_in')) {
        return redirect()->to('/login');
    }
     return view('Resenas/resenas');
}

}
