<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class User extends Controller
{
    public function registro()
    {
        // Cargar la vista de registro
        return view('Perfil/signup');
    }

    public function registroGuardar()
    {
        // Validar los datos del formulario
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $cpass = $this->request->getPost('cpass');
        $adress = $this->request->getPost('adress');
        $phone = $this->request->getPost('phone');

        $data = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'adress' => $adress,
            'phone' => $phone
        ];

        $userModel->save($data);

        
        return redirect()->to('/login')->with('success', 'Usuario registrado correctamente, ya puedes ingresar al sistema.');
    }

    public function login()
    {
        // Mostrar la vista de inicio de sesión con mensajes flash
        return view('Perfil/login', [
            'success' => session()->getFlashdata('success'),
            'error' => session()->getFlashdata('error')
        ]);
        
    }

    public function loginValidar()
    {
        // Validar los datos del formulario de inicio de sesión
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = $userModel->where('username', $username)->first();
        if ($data && password_verify($password, $data['password'])) {
            // Iniciar sesión y redirigir al usuario
            session()->set([
                'id' => $data['id'],
                'username' => $data['username'],
                'email' => $data['email'],
                'adress' => $data['adress'],
                'phone' => $data['phone'],
                'role' => $data['role'],
                'isLoggedIn' => true, // <--- AGREGA ESTA LÍNEA
                'logged_in' => true
            ]);
            return redirect()->to('/quemas')->with('success', 'Inicio de sesión exitoso.');
            
        } else {
            return redirect()->back()->with('error', 'Credenciales incorrectas.')->withInput();
        }
        
    }

    public function logout()
    {
        // Cerrar sesión y redirigir al usuario
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Sesión cerrada correctamente.');
    }

    public function editProfile()
    {
        // Verificar sesión
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión primero.');
        }

        // Obtener datos del usuario
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('id'));

        // Mostrar vista de edición
        return view('Perfil/edit_profile', ['user' => $user]);
    }

    public function updateProfile()
    {
        // Verificar sesión
        if (!session()->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión primero.');
        }

        // Validaciones
        $rules = [
            'username' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|valid_email',
            'adress' => 'permit_empty|max_length[255]',
            'phone' => 'permit_empty|max_length[20]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Verificar unicidad de username y email
        $userModel = new UserModel();
        $userId = session()->get('id');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');

        // Verificar si el username ya existe (para otro usuario)
        $existingUsername = $userModel->where('username', $username)
                                     ->where('id !=', $userId)
                                     ->first();
        if ($existingUsername) {
            return redirect()->back()->withInput()->with('error', 'El nombre de usuario ya está en uso.');
        }

        // Verificar si el email ya existe (para otro usuario)
        $existingEmail = $userModel->where('email', $email)
                                  ->where('id !=', $userId)
                                  ->first();
        if ($existingEmail) {
            return redirect()->back()->withInput()->with('error', 'El correo electrónico ya está en uso.');
        }

        // Preparar datos para actualizar
        $data = [
            'username' => $username,
            'email' => $email,
            'adress' => $this->request->getPost('adress'),
            'phone' => $this->request->getPost('phone')
        ];

        // Manejar cambio de contraseña si se proporcionó
        $newPassword = $this->request->getPost('new_password');
        if (!empty($newPassword)) {
            $data['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        // Actualizar en la base de datos
        $userModel->update($userId, $data);

        // Actualizar datos en la sesión
        session()->set([
            'username' => $username,
            'email' => $email,
            'adress' => $data['adress'],
            'phone' => $data['phone']
        ]);

        return redirect()->to('/user/editProfile')->with('success', 'Perfil actualizado correctamente.');
    }
}