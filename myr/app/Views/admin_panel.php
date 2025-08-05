<!DOCTYPE html>
<html lang="es">
<head>
    <title>Usuarios - Admin | MenuHub</title>
    <link rel="icon" type="image/png" href="<?= base_url('images/Menu.png') ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        },
                        accent: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
        }

        .nav-link {
            position: relative;
            font-weight: 500;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #2563eb;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

          .nav-link[href='usuarios']::after {
            width: 100% !important;
            background-color: #2563eb;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-800 shadow-md fixed w-full z-50">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 mr-64">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="#" class="flex items-center space-x-3">
                        <span class="ml-64 text-xl font-bold text-primary-800 dark:text-white">
                            Panel de<span class="text-accent-600"> administrador</span>
                        </span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-10">
                    <a href="usuarios" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">
                        Usuarios
                    </a>
                    <a href="<?= base_url('productos') ?>" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">Productos</a>
                    <a href="#products" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">Locales</a>
                    <a href="<?= base_url('resenas') ?>" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">Reseñas</a>
                                        <a href="#" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">Pedidos</a>
                    <a href="<?= base_url('quemas') ?>"
                        class="block w-full text-center px-6 py-3 bg-accent-600 text-white rounded-full 
                             hover:bg-accent-700 transform hover:scale-105 transition duration-300 ease-in-out" id="btn-logout">
                        Volver
                    </a>
                </div>
                
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-primary-600 hover:text-primary-800 focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-gray-800 border-t border-gray-200">
            <div class="px-4 py-2 space-y-3">
                <a href="<?= base_url('quemas') ?>" class="block py-2 text-primary-600 hover:text-primary-800 dark:text-white">Inicio</a>
                <a href="#about" class="block py-2 text-primary-600 hover:text-primary-800 dark:text-white">Nosotros</a>
                <a href="#team" class="block py-2 text-primary-600 hover:text-primary-800 dark:text-white">Equipo</a>
                <a href="#products" class="block py-2 text-primary-600 hover:text-primary-800 dark:text-white">Productos</a>
                <a href="<?= base_url('resenas') ?>" class="block py-2 text-primary-600 hover:text-primary-800 dark:text-white">Reseñas</a>
            </div>
        </div>
    </nav>

    <!-- Separador visual para evitar que el panel se fusione con el navbar -->
    <div class="h-24 md:h-44"></div>

    <section>

    <div class="max-w-7xl mx-auto mb-10 p-8 bg-white dark:bg-gray-800 rounded-xl shadow-lg">
        <?php if (session()->getFlashdata('success')): ?>
            <div style="font-size:0.95rem; display:inline-block; margin-bottom:16px; padding:6px 18px; background:#d1fae5; color:#065f46; border-radius:12px; border:1px solid #34d399;">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div style="font-size:0.95rem; display:inline-block; margin-bottom:12px; padding:6px 18px; background:#fee2e2; color:#991b1b; border-radius:12px; border:1px solid #f87171;">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>
        <h2 class="text-2xl font-bold mb-6 text-primary-800 dark:text-white">Gestión de Usuarios</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-primary-100 dark:bg-primary-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-primary-800 dark:text-white uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-primary-800 dark:text-white uppercase tracking-wider">Usuario</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-primary-800 dark:text-white uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-primary-800 dark:text-white uppercase tracking-wider">Dirección</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-primary-800 dark:text-white uppercase tracking-wider">Teléfono</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-primary-800 dark:text-white uppercase tracking-wider">Rol</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-primary-800 dark:text-white uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    <?php if (isset($users) && count($users) > 0): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"><?= esc($user['id']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"><?= esc($user['username']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"><?= esc($user['email']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"><?= esc($user['adress']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"><?= esc($user['phone']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white"><?= esc($user['role']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white flex gap-2">
                                    <button type="button" class="inline-block px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition" title="Editar" onclick="openEditModal(<?= $user['id'] ?>, '<?= esc($user['username'], 'js') ?>', '<?= esc($user['email'], 'js') ?>', '<?= esc($user['adress'], 'js') ?>', '<?= esc($user['phone'], 'js') ?>')"><i class="fas fa-edit"></i></button>
                                    <form action="<?= base_url('admin/eliminarUsuario/' . $user['id']) ?>" method="post" style="display:inline;">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="inline-block px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition" title="Eliminar" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');"><i class="fas fa-trash"></i></button>
                                    </form>
                                    <form action="<?= base_url('admin/cambiarRol/' . $user['id']) ?>" method="post" style="display:inline;">
                                        <?= csrf_field() ?>
                                        <select name="role" class="inline-block px-2 py-1 rounded border border-gray-300 text-gray-700" onchange="this.form.submit()">
                                            <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                                            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                                        </select>
                                    </form>
                                </td>
<!-- Modal flotante para editar usuario -->
<div id="editUserModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 w-full max-w-lg relative animate-fade-in">
        <button onclick="closeEditModal()" class="absolute top-2 right-2 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>
        <h2 class="text-2xl font-bold mb-6 text-primary-800 dark:text-white">Editar Usuario</h2>
        <form id="editUserForm" method="post" action="<?= base_url('admin/actualizar_user') ?>" class="space-y-4">
            <input type="hidden" name="id" id="editUserId">
            <?= csrf_field() ?>
            <div>
                <label class="block text-gray-700 dark:text-gray-200 mb-2 text-sm">Usuario</label>
                <input type="text" name="username" id="editUsername" class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent-600 text-sm">
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-200 mb-2 text-sm">Email</label>
                <input type="email" name="email" id="editEmail" class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent-600 text-sm">
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-200 mb-2 text-sm">Dirección</label>
                <input type="text" name="adress" id="editAdress" class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent-600 text-sm">
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-200 mb-2 text-sm">Teléfono</label>
                <input type="text" name="phone" id="editPhone" class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent-600 text-sm">
            </div>
            <div class="relative">
    <label class="block text-gray-700 dark:text-gray-200 mb-2 text-sm">Contraseña<span class="text-xs text-gray-400">(solo si cambias la contraseña)</span></label>
    <div class="relative">
        <input type="password" name="password" id="editPassword" 
               class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent-600 text-sm pr-10" 
               autocomplete="new-password">
        <button type="button" onclick="togglePasswordVisibility('editPassword', this)" 
                class="absolute inset-y-0 mb-5 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 mt-5">
            <i class="far fa-eye"></i>
        </button>
    </div>
</div>
            <div class="flex justify-end gap-4 mt-4">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-400 text-white rounded-full hover:bg-gray-500 transition">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-accent-600 text-white rounded-full hover:bg-accent-700 transition">Guardar</button>
            </div>
        </form>
    </div>
</div>

<script>
function togglePasswordVisibility(inputId, button) {
    const passwordInput = document.getElementById(inputId);
    const icon = button.querySelector('i');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}
</script>

<script>
function openEditModal(id, username, email, adress, phone, password) {
    document.getElementById('editUserId').value = id;
    document.getElementById('editUsername').value = username;
    document.getElementById('editEmail').value = email;
    document.getElementById('editAdress').value = adress;
    document.getElementById('editPhone').value = phone;
    document.getElementById('editPassword').value = password;
    document.getElementById('editUserModal').classList.remove('hidden');
}
function closeEditModal() {
    document.getElementById('editUserModal').classList.add('hidden');
}
document.getElementById('editUserForm').onsubmit = function(e) {
    
};
</script>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300">No hay usuarios registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>