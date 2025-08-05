<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Admin extends Controller{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        if (session('role') !== 'admin') {
            return redirect()->to('/quemas')->with('error', 'Acceso denegado: solo para administradores.');
        }
        
        $users = $this->userModel->findAll();
        return view('admin_panel', ['users' => $users]);
    }

    // Método para actualizar usuario (nuevo)
    public function actualizar_user()
    {
        if (session('role') !== 'admin') {
            return redirect()->to('/quemas')->with('error', 'Acceso denegado.');
        }

        $id = $this->request->getPost('id');
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }

        // Reglas de validación
        $rules = [
            'username' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|valid_email',
            'adress' => 'permit_empty|max_length[255]',
            'phone' => 'permit_empty|max_length[20]',
            'current_password' => 'permit_empty|min_length[8]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Preparar datos para actualizar
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'adress' => $this->request->getPost('adress'),
            'phone' => $this->request->getPost('phone')
        ];

        // Actualizar contraseña si se proporcionó
        if ($password = $this->request->getPost('password')) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if ($this->userModel->update($id, $data)) {
            return redirect()->to('/admin')->with('success', 'Usuario actualizado correctamente');
        } else {
            return redirect()->back()->with('error', 'Error al actualizar el usuario');
        }
    }

    public function eliminarUsuario($id)
    {
        if (session('role') !== 'admin') {
            return redirect()->to('/quemas');
        }
        
        if ($this->userModel->delete($id)) {
            return redirect()->to('/admin')->with('success', 'Usuario eliminado correctamente.');
        } else {
            return redirect()->back()->with('error', 'Error al eliminar el usuario');
        }
    }

    public function cambiarRol($id)
    {
        if (session('role') !== 'admin') {
            return redirect()->to('/quemas');
        }
        
        $nuevoRol = $this->request->getPost('role');
        if (in_array($nuevoRol, ['user', 'admin'])) {
            $this->userModel->update($id, ['role' => $nuevoRol]);
            return redirect()->to('/admin')->with('success', 'Rol actualizado correctamente.');
        }
        
        return redirect()->back()->with('error', 'Rol no válido');
    }
    public function productos()
    {
        if (session('role') !== 'admin') {
            return redirect()->to('/quemas')->with('error', 'Acceso denegado: solo para administradores.');
        }

        $productModel = new \App\Models\ProductModel();
        $products = $productModel->findAll();
        return view('Admin/Productos', [
            'products' => $products
        ]);
    }

    public function agregarProducto()
    {
        if (session('role') !== 'admin') {
            return redirect()->to('/quemas')->with('error', 'Acceso denegado.');
        }

        $validation =  \Config\Services::validation();
        $rules = [
            'nombre' => 'required|min_length[2]|max_length[100]',
            'descripcion' => 'required',
            'precio' => 'required|decimal',
            'categoria' => 'required',
            'proveedor' => 'required',
            'imagen' => 'uploaded[imagen]|is_image[imagen]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $img = $this->request->getFile('imagen');
        $imgName = null;
        if ($img && $img->isValid()) {
            $imgName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads', $imgName);
        }

        $productModel = new \App\Models\ProductModel();
        $productModel->insert([
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'categoria' => $this->request->getPost('categoria'),
            'proveedor' => $this->request->getPost('proveedor'),
            'imagen' => $imgName
        ]);

        return redirect()->to('/productos')->with('success', 'Producto añadido correctamente.');
    }

        public function eliminarProducto($id)
    {
        if (session('role') !== 'admin') {
            return redirect()->to('/quemas');
        }
        $productModel = new \App\Models\ProductModel();
        $productModel->delete($id);
        return redirect()->to('/productos')->with('success', 'Producto eliminado.');
    }


    public function editarProducto($id)
    {
        if (session('role') !== 'admin') {
            return redirect()->to('/quemas')->with('error', 'Acceso denegado: solo para administradores.');
        }

        $productModel = new \App\Models\ProductModel();
        $product = $productModel->find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }

        // Reglas de validación (la imagen es opcional al editar)
        $rules = [
            'nombre' => 'required|min_length[2]|max_length[100]',
            'descripcion' => 'required',
            'precio' => 'required|decimal',
            'categoria' => 'required',
            'proveedor' => 'required',
            'imagen' => 'if_exist|is_image[imagen]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Obtener los datos del formulario
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'categoria' => $this->request->getPost('categoria'),
            'proveedor' => $this->request->getPost('proveedor')
        ];

        // Manejar la imagen si se subió una nueva
        $img = $this->request->getFile('imagen');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            // Eliminar la imagen anterior si existe
            if ($product['imagen']) {
                $oldImagePath = ROOTPATH . 'public/uploads/' . $product['imagen'];
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            // Guardar la nueva imagen
            $imgName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads', $imgName);
            $data['imagen'] = $imgName;
        }

        // Actualizar el producto
        if ($productModel->update($id, $data)) {
            return redirect()->to('/productos')->with('success', 'Producto actualizado correctamente');
        } else {
            return redirect()->back()->with('error', 'Error al actualizar el producto');
        }
    }


}