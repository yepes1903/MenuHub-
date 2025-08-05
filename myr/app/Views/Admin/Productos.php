<!DOCTYPE html>
<html lang="es">
<head>
    <title>Productos - Admin | MenuHub</title>
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
        .nav-link[href='productos']::after {
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
                    <a href="<?= base_url('admin') ?>" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">Usuarios</a>
                    <a href="productos" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">Productos</a>
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
    <div class="h-24 md:h-44"></div>
    <section>
        <div class="max-w-7xl mx-auto mb-10 p-8 bg-white dark:bg-gray-800 rounded-xl shadow-lg">
            <?php if (session('success')): ?>
                <div class="mb-4 px-4 py-2 rounded-lg bg-green-100 text-green-800 text-sm text-center animate-fade-in">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>
            <?php if (session('error')): ?>
                <div class="mb-4 px-4 py-2 rounded-lg bg-red-100 text-red-800 text-sm text-center animate-fade-in">
                    <?= session('error') ?>
                </div>
            <?php endif; ?>
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-primary-800 dark:text-white">Gestión de Productos</h2>
                <button onclick="openAddProductModal()" class="px-5 py-2 bg-accent-600 text-white rounded-full hover:bg-accent-700 transition flex items-center gap-2"><i class="fas fa-plus"></i> Añadir producto</button>
            </div>
            <!-- Tabla de productos -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-primary-100 dark:bg-primary-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-primary-800 dark:text-white uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-primary-800 dark:text-white uppercase tracking-wider">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-primary-800 dark:text-white uppercase tracking-wider">Descripción</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-primary-800 dark:text-white uppercase tracking-wider">Precio</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-primary-800 dark:text-white uppercase tracking-wider">Imagen</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-primary-800 dark:text-white uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        <?php if (!empty($products)): ?>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td class="px-6 py-4 text-sm"> <?= esc($product['id']) ?> </td>
                                    <td class="px-6 py-4 text-sm"> <?= esc($product['nombre']) ?> </td>
                                    <td class="px-6 py-4 text-sm"> <?= esc($product['descripcion']) ?> </td>
                                    <td class="px-6 py-4 text-sm"> $<?= esc($product['precio']) ?> </td>
                                    <td class="px-6 py-4 text-sm">
                                        <?php if (!empty($product['imagen'])): ?>
                                            <img src="<?= base_url('uploads/' . $product['imagen']) ?>" alt="Imagen" class="h-12 w-12 object-cover rounded-full mx-auto" />
                                        <?php else: ?>
                                            <span class="text-gray-400">Sin imagen</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <button type="button" class="px-3 py-1 bg-blue-700 text-white rounded-full mr-2" onclick='openEditProductModal(<?= json_encode($product, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>)'>Editar</button>
                                        <form action="<?= base_url('productos/eliminar/' . $product['id']) ?>" method="post" style="display:inline;">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-full" onclick="return confirm('¿Eliminar este producto?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300">No hay productos registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal para editar producto -->
    <div id="editProductModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 w-full max-w-md relative animate-fade-in">
            <button onclick="closeEditProductModal()" class="absolute top-2 right-2 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>
            <h2 class="text-2xl font-bold mb-6 text-primary-800 dark:text-white">Editar Producto</h2>
            <form id="editProductForm" method="post" action="#" enctype="multipart/form-data" class="space-y-4">
                <?= csrf_field() ?>
                <input type="hidden" name="id" id="edit-id">
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 mb-2 text-sm">Nombre</label>
                    <input type="text" name="nombre" id="edit-nombre" class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent-600 text-sm" required>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 mb-2 text-sm">Descripción</label>
                    <textarea name="descripcion" id="edit-descripcion" class="w-full px-4 py-2 rounded-2xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent-600 text-sm" rows="2" required></textarea>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 mb-2 text-sm">Precio</label>
                    <input type="number" name="precio" id="edit-precio" step="0.01" min="0" class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent-600 text-sm" required>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 mb-2 text-sm">Categoría</label>
                    <select name="categoria" id="edit-categoria" class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent-600 text-sm" required>
                        <option value="">Selecciona una categoría</option>
                        <option value="Bebidas">Bebidas</option>
                        <option value="Comida rápida">Comida rápida</option>
                        <option value="Postres">Postres</option>
                        <option value="Snacks">Snacks</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 mb-2 text-sm">Proveedor</label>
                    <select name="proveedor" id="edit-proveedor" class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent-600 text-sm" required>
                        <option value="">Selecciona un proveedor</option>
                        <option value="Proveedor 1">Proveedor 1</option>
                        <option value="Proveedor 2">Proveedor 2</option>
                        <option value="Proveedor 3">Proveedor 3</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 mb-2 text-sm">Imagen (opcional)</label>
                    <input type="file" name="imagen" accept="image/*" class="w-full text-sm">
                </div>
                <div class="flex justify-end gap-4 mt-4">
                    <button type="button" onclick="closeEditProductModal()" class="px-4 py-2 bg-gray-400 text-white rounded-full hover:bg-gray-500 transition">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-accent-600 text-white rounded-full hover:bg-accent-700 transition">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
<script>
    function openEditProductModal(product) {
        document.getElementById('edit-id').value = product.id;
        document.getElementById('edit-nombre').value = product.nombre;
        document.getElementById('edit-descripcion').value = product.descripcion;
        document.getElementById('edit-precio').value = product.precio;
        document.getElementById('edit-categoria').value = product.categoria;
        document.getElementById('edit-proveedor').value = product.proveedor;
        // Cambiar la acción del formulario para enviar al endpoint correcto (URL absoluta)
        document.getElementById('editProductForm').action = '<?= base_url('productos/editar/') ?>' + product.id;
        document.getElementById('editProductModal').classList.remove('hidden');
    }  // <-- Esta llave estaba faltando
    
    function closeEditProductModal() {
        document.getElementById('editProductModal').classList.add('hidden');
    }
</script>
    
    <div id="addProductModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 w-full max-w-md relative animate-fade-in">
            <button onclick="closeAddProductModal()" class="absolute top-2 right-2 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>
            <h2 class="text-2xl font-bold mb-6 text-primary-800 dark:text-white">Añadir Producto</h2>
                    <form id="addProductForm" method="post" action="<?= base_url('productos/agregar') ?>" enctype="multipart/form-data" class="space-y-4">
    <?= csrf_field() ?>
    <div>
        <label class="block text-gray-700 dark:text-gray-200 mb-2 text-sm">Nombre</label>
        <input type="text" name="nombre" class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent-600 text-sm" required>
    </div>
    <div>
        <label class="block text-gray-700 dark:text-gray-200 mb-2 text-sm">Descripción</label>
        <textarea name="descripcion" class="w-full px-4 py-2 rounded-2xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent-600 text-sm" rows="2" required></textarea>
    </div>
    <div>
        <label class="block text-gray-700 dark:text-gray-200 mb-2 text-sm">Precio</label>
        <input type="number" name="precio" step="0.01" min="0" class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent-600 text-sm" required>
    </div>
            <div>
    <label class="block text-gray-700 dark:text-gray-200 mb-2 text-sm">Categoría</label>
    <select name="categoria" class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent-600 text-sm" required>
        <option value="">Selecciona una categoría</option>
        <option value="Bebidas">Bebidas</option>
        <option value="Comida rápida">Comida rápida</option>
        <option value="Postres">Postres</option>
        <option value="Snacks">Snacks</option>
        <!-- Agrega más opciones según tu necesidad -->
    </select>
</div>
<div>
    <label class="block text-gray-700 dark:text-gray-200 mb-2 text-sm">Proveedor</label>
    <select name="proveedor" class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent-600 text-sm" required>
        <option value="">Selecciona un proveedor</option>
        <option value="Proveedor 1">Proveedor 1</option>
        <option value="Proveedor 2">Proveedor 2</option>
        <option value="Proveedor 3">Proveedor 3</option>
        <!-- Agrega más opciones según tu necesidad -->
    </select>
</div>
    <div>
        <label class="block text-gray-700 dark:text-gray-200 mb-2 text-sm">Imagen</label>
        <input type="file" name="imagen" accept="image/*" class="w-full text-sm">
    </div>
    <div class="flex justify-end gap-4 mt-4">
        <button type="button" onclick="closeAddProductModal()" class="px-4 py-2 bg-gray-400 text-white rounded-full hover:bg-gray-500 transition">Cancelar</button>
        <button type="submit" class="px-4 py-2 bg-accent-600 text-white rounded-full hover:bg-accent-700 transition">Guardar</button>
    </div>
</form>
        </div>
    </div>
    <script>
        function openAddProductModal() {
            document.getElementById('addProductModal').classList.remove('hidden');
        }
        function closeAddProductModal() {
            document.getElementById('addProductModal').classList.add('hidden');
        }
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
