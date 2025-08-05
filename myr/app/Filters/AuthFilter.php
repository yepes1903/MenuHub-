<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Verificar si el usuario está logueado
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Por favor inicia sesión primero');
        }

        // Si se especifican roles en los argumentos
        if (!empty($arguments)) {
            $userRole = session()->get('role');
            
            // Verificar si el usuario tiene alguno de los roles permitidos
            if (!in_array($userRole, $arguments)) {
                return redirect()->back()->with('error', 'No tienes permiso para acceder a esta sección');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No necesitamos hacer nada después de la ejecución del controlador
    }
}