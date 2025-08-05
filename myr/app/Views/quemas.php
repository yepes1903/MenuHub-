<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio - MenuHub</title>
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
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        
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
        
        .product-card {
            transition: all 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .badge {
            top: 10px;
            right: 10px;
        }
        
        .payment-method {
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .payment-method:hover {
            transform: translateY(-5px);
            border-color: #3b82f6;
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.1);
        }
        
        .payment-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-800 shadow-md fixed w-full z-50">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="#" class="flex items-center space-x-3">
                        <span class="ml-64 text-xl font-bold text-primary-800 dark:text-white">
                            <?= esc(session('username')) ?>, bienvenid@ a Menu<span class="text-accent-600">Hub</span>
                        </span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-10">
                    <a href="<?= base_url('quemas') ?>" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">
                        Inicio
                        <style>
                            .nav-link[href='<?= base_url('quemas') ?>']::after {
                                width: 100% !important;
                                background-color: #2563eb;
                            }
                        </style>
                    </a>
                    <a href="<?= base_url('producticos') ?>" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">Productos</a>
                    <a href="" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">Locales</a>
                    <a href="<?= base_url('resenas') ?>" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">Reseñas</a>
                    <a href="<?= base_url('logout') ?>"
                        class="block w-full text-center px-6 py-3 bg-accent-600 text-white rounded-full 
                             hover:bg-accent-700 transform hover:scale-105 transition duration-300 ease-in-out" id="btn-logout">
                        Cerrar sesión
                    </a>
                    <a href="<?= base_url('profile/edit') ?>" class="px-6 py-3 rounded-full border-2 border-accent-600 text-accent-600 hover:bg-accent-50 transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        Perfil
                    </a>
                    <?php if (session('role') === 'admin'): ?>
                    <a href="<?= base_url('admin') ?>" class="px-6 py-3 rounded-full bg-accent-600 text-white hover:bg-accent-700 transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        Panel
                    </a>
                    <?php endif; ?>
                </div>
                <a href="<?= base_url('carrito') ?>" class="ml-16 flex items-center justify-center text-accent-600 hover:text-accent-800 relative" title="Carrito de compras">
                        <i class="fas fa-shopping-cart text-2xl"></i>
                    </a>
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
    <!-- Productos Section -->
<section id="products" class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mt-20 mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-primary-800 dark:text-white mb-4">Algunos de los productos disponibles</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($products as $product): ?>
            <div class="product-card bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-md relative">
                <?php if($product['categoria'] == 'Nuevo'): ?>
                <span class="badge absolute bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">Nuevo</span>
                <?php elseif($product['categoria'] == 'Popular'): ?>
                <span class="badge absolute bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full">Popular</span>
                <?php endif; ?>
                
                <img src="<?= base_url('uploads/' . esc($product['imagen'])) ?>" alt="<?= esc($product['nombre']) ?>" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white"><?= esc($product['nombre']) ?></h3>
                        <span class="text-lg font-bold text-accent-600">$<?= number_format($product['precio'], 2) ?></span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 mb-4"><?= esc($product['descripcion']) ?></p>
                    <div class="flex justify-between items-center">
                        <button class="btn-comprar bg-accent-600 hover:bg-accent-700 text-white font-medium py-2 px-4 rounded-full transition duration-300">
                            <i class="fas fa-shopping-cart mr-2"></i>Añadir
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Métodos de Pago Section -->
<section id="payment-methods" class="py-16 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-primary-800 dark:text-white mb-4">Métodos de Pago</h2>
            <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Ofrecemos múltiples opciones de pago seguras y convenientes para tu comodidad.
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Tarjeta de Crédito/Débito -->
            <div class="payment-method bg-gray-50 dark:bg-gray-700 rounded-xl p-6 text-center">
                <div class="payment-icon text-blue-500">
                    <i class="fas fa-credit-card"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Tarjetas</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">
                    Aceptamos todas las tarjetas principales (Visa, MasterCard, American Express)
                </p>
            </div>
            
            <!-- PayPal -->
            <div class="payment-method bg-gray-50 dark:bg-gray-700 rounded-xl p-6 text-center">
                <div class="payment-icon text-blue-400">
                    <i class="fab fa-paypal"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">PayPal</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">
                    Paga de forma segura con tu cuenta PayPal o tarjeta vinculada
                </p>
            </div>
            
            <!-- Transferencia Bancaria -->
            <div class="payment-method bg-gray-50 dark:bg-gray-700 rounded-xl p-6 text-center">
                <div class="payment-icon text-green-500">
                    <i class="fas fa-university"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Transferencia</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">
                    Transferencia bancaria directa a nuestra cuenta
                </p>
            </div>
            
            <!-- Efectivo -->
            <div class="payment-method bg-gray-50 dark:bg-gray-700 rounded-xl p-6 text-center">
                <div class="payment-icon text-green-600">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Efectivo</h3>
                <p class="text-gray-600 dark:text-gray-300 text-sm">
                    Pago en efectivo al momento de la entrega (solo en locales físicos)
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Sección "Cómo Comprar" -->
<section id="how-to-buy" class="py-16 bg-gray-50 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-primary-800 dark:text-white mb-4">Cómo Comprar en MenuHub</h2>
            <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Solo necesitas 3 pasos para recibir tus productos favoritos.
            </p>
            <div class="mt-4 flex justify-center space-x-2">
  <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">Pago seguro</span>
  <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">Envío garantizado</span>
    </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Paso 1 -->
            <div class="step-card bg-white dark:bg-gray-700 rounded-xl p-8 text-center hover:shadow-lg transition-all duration-300">
                <div class="step-icon bg-accent-100 dark:bg-accent-900 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-search text-accent-600 dark:text-accent-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">1. Elige</h3>
                <p class="text-gray-600 dark:text-gray-300">
                    Explora nuestro catálogo y selecciona tus productos favoritos.
                </p>
            </div>
            
            <!-- Paso 2 -->
            <div class="step-card bg-white dark:bg-gray-700 rounded-xl p-8 text-center hover:shadow-lg transition-all duration-300">
                <div class="step-icon bg-accent-100 dark:bg-accent-900 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-shopping-cart text-accent-600 dark:text-accent-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">2. Añade</h3>
                <p class="text-gray-600 dark:text-gray-300">
                    Agrega los productos a tu carrito y revisa tu pedido.
                </p>
            </div>
            
            <!-- Paso 3 -->
            <div class="step-card bg-white dark:bg-gray-700 rounded-xl p-8 text-center hover:shadow-lg transition-all duration-300">
                <div class="step-icon bg-accent-100 dark:bg-accent-900 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-truck text-accent-600 dark:text-accent-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">3. Recibe</h3>
                <p class="text-gray-600 dark:text-gray-300">
                    ¡Listo! Tu pedido estara en el tiempo estimado.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Sección de Categorías Mejorada para Supermercado -->
<section class="py-16 bg-gray-50 dark:bg-gray-800">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Encabezado con navegación -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-12">
      <div class="text-center md:text-left">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-2">Explora Nuestras Categorías</h2>
        <p class="text-lg text-gray-600 dark:text-gray-300">Todo lo que necesitas en un solo lugar</p>
      </div>
      <div class="mt-4 md:mt-0">
        <a href="#" class="inline-flex items-center text-accent-600 dark:text-accent-400 font-medium">
          Ver todas las categorías <i class="fas fa-chevron-right ml-2"></i>
        </a>
      </div>
    </div>

    <!-- Grid de Categorías Mejorado -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
      <!-- Categoría 1 - Con contador de productos -->
      <a href="#" class="category-card group bg-white dark:bg-gray-700 rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 dark:border-gray-600 hover:border-accent-300">
        <div class="relative">
          <div class="w-20 h-20 mx-auto mb-4 bg-blue-50 dark:bg-blue-900/30 rounded-full flex items-center justify-center group-hover:bg-blue-100 transition">
            <i class="fas fa-utensils text-3xl text-blue-500 dark:text-blue-400"></i>
          </div>
        </div>
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white text-center mb-1">Alimentos</h3>
        <p class="text-xs text-gray-500 dark:text-gray-400 text-center">Frescos y envasados</p>
      </a>

      <!-- Categoría 2 - Con oferta destacada -->
      <a href="#" class="category-card group bg-white dark:bg-gray-700 rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 dark:border-gray-600 hover:border-green-300 relative overflow-hidden">
        <div class="w-20 h-20 mx-auto mb-4 bg-green-50 dark:bg-green-900/30 rounded-full flex items-center justify-center group-hover:bg-green-100 transition">
          <i class="fas fa-wine-bottle text-3xl text-green-500 dark:text-green-400"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white text-center mb-1">Bebidas</h3>
        <p class="text-xs text-gray-500 dark:text-gray-400 text-center">+50 marcas</p>
      </a>

      <!-- Categoría 3 - Con imagen de producto -->
      <a href="#" class="category-card group bg-white dark:bg-gray-700 rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 dark:border-gray-600 hover:border-pink-300">
        <div class="w-20 h-20 mx-auto mb-4 bg-pink-50 dark:bg-pink-900/30 rounded-full flex items-center justify-center group-hover:bg-pink-100 transition">
          <i class="fas fa-ice-cream text-4xl text-pink-700"></i>
          <div class="absolute inset-0 bg-pink-400/10 rounded-full group-hover:bg-transparent transition"></div>
        </div>
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white text-center mb-1">Lácteos</h3>
        <p class="text-xs text-gray-500 dark:text-gray-400 text-center">Leche, quesos, yogures</p>
      </a>

      <!-- Categoría 4 - Con temporada destacada -->
      <a href="#" class="category-card group bg-white dark:bg-gray-700 rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 dark:border-gray-600 hover:border-red-300 relative">
        <div class="w-20 h-20 mx-auto mb-4 bg-red-50 dark:bg-red-900/30 rounded-full flex items-center justify-center group-hover:bg-red-100 transition">
          <i class="fas fa-drumstick-bite text-3xl text-red-500 dark:text-red-400"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white text-center mb-1">Carnicería</h3>
        <p class="text-xs text-gray-500 dark:text-gray-400 text-center">Cortes premium</p>
        <div class="absolute bottom-2 left-0 right-0">
        </div>
      </a>

      <!-- Categoría 5 - Con sello de calidad -->
      <a href="#" class="category-card group bg-white dark:bg-gray-700 rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 dark:border-gray-600 hover:border-purple-300">
        <div class="w-20 h-20 mx-auto mb-4 bg-purple-50 dark:bg-purple-900/30 rounded-full flex items-center justify-center group-hover:bg-purple-100 transition">
          <i class="fas fa-leaf text-3xl text-purple-500 dark:text-purple-400"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white text-center mb-1">Orgánicos</h3>
        <p class="text-xs text-gray-500 dark:text-gray-400 text-center">Certificado ECO</p>
        <div class="mt-2 flex justify-center">
          <span class="text-xs bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-2 py-1 rounded flex items-center">
          </span>
        </div>
      </a>

      <!-- Categoría 6 - Con botón rápido -->
      <a href="#" class="category-card group bg-white dark:bg-gray-700 rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 dark:border-gray-600 hover:border-orange-300 flex flex-col">
        <div class="w-20 h-20 mx-auto mb-4 bg-orange-50 dark:bg-orange-900/30 rounded-full flex items-center justify-center group-hover:bg-orange-100 transition">
          <i class="fas fa-broom text-3xl text-orange-500 dark:text-orange-400"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white text-center mb-1">Limpieza</h3>
        <p class="text-xs text-gray-500 dark:text-gray-400 text-center mb-4">Hogar y cocina</p>
      </a>
    </div>
  </div>
</section>

<section class="py-16 mt-16 mb-32 bg-gradient-to-br from-accent-600 to-accent-800" id="juegos">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  
    <div class="text-center mb-12">
      <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
        <i class="fas fa-gamepad mr-3"></i> ¿Te gustan los juegos?
      </h2>
      <p class="text-xl text-accent-100 max-w-2xl mx-auto">
        Diviértete con nuestros juegos exclusivos mientras decides que comprar
      </p>
    </div>


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-12">

      <a href="<?= base_url('juegos/1.html') ?>" 
         class="game-card bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center border-2 border-white/20 hover:border-white/40 transition-all duration-300 transform hover:scale-[1.03] hover:shadow-lg overflow-hidden relative group">
        <div class="w-20 h-20 mx-auto mb-4 bg-white/10 rounded-full flex items-center justify-center text-white text-3xl">
          <i class="fas fa-puzzle-piece"></i>
        </div>
        <h3 class="text-xl font-bold text-white mb-2">Juego de memoria</h3>
        <p class="text-accent-100 text-sm mb-4">Pongamos a prueba que tan bueno eres recordando</p>
        <div class="absolute inset-0 bg-white/0 group-hover:bg-white/5 transition"></div>
      </a>


      <a href="<?= base_url('juegos/2.html') ?>" 
         class="game-card bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center border-2 border-white/20 hover:border-white/40 transition-all duration-300 transform hover:scale-[1.03] hover:shadow-lg overflow-hidden relative group">
        <div class="w-20 h-20 mx-auto mb-4 bg-white/10 rounded-full flex items-center justify-center text-white text-3xl">
          <i class="fas fa-trophy"></i>
        </div>
        <h3 class="text-xl font-bold text-white mb-2">Juego de la serpiente</h3>
        <p class="text-accent-100 text-sm mb-4">A ver que tan bueno la mueves</p>
        <div class="absolute inset-0 bg-white/0 group-hover:bg-white/5 transition"></div>
      </a>

      <a href="<?= base_url('juegos/3.html') ?>" 
         class="game-card bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center border-2 border-white/20 hover:border-white/40 transition-all duration-300 transform hover:scale-[1.03] hover:shadow-lg overflow-hidden relative group">
        <div class="w-20 h-20 mx-auto mb-4 bg-white/10 rounded-full flex items-center justify-center text-white text-3xl">
          <i class="fas fa-shopping-basket"></i>
        </div>
        <h3 class="text-xl font-bold text-white mb-2">Golpea el topo</h3>
        <p class="text-accent-100 text-sm mb-4">Si consigues golpearlo ganaras</p>
        <div class="absolute inset-0 bg-white/0 group-hover:bg-white/5 transition"></div>
      </a>


      <a href="<?= base_url('juegos/4.html') ?>" 
         class="game-card bg-white/10 backdrop-blur-sm rounded-xl p-6 text-center border-2 border-white/20 hover:border-white/40 transition-all duration-300 transform hover:scale-[1.03] hover:shadow-lg overflow-hidden relative group">
        <div class="w-20 h-20 mx-auto mb-4 bg-white/10 rounded-full flex items-center justify-center text-white text-3xl">
          <i class="fas fa-stopwatch"></i>
        </div>
        <h3 class="text-xl font-bold text-white mb-2">Adivina el numero</h3>
        <p class="text-accent-100 text-sm mb-4">Veamos si tienes suerte y le pegas (yo haria el chance si le tengo fe al numero)</p>
        <div class="absolute inset-0 bg-white/0 group-hover:bg-white/5 transition mb-12"></div>
      </a>
    </div>
  </div>
</section>


    <footer class="bg-primary-900 text-white pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <div class="space-y-6">
                    <div class="flex items-center space-x-3">
                        <span class="text-2xl font-bold">Menu<span class="text-accent-400">Hub</span></span>
                    </div>
                    <p class="text-gray-400">
                        Tu plataforma de confianza para ordenar comida de los mejores restaurantes locales.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6">Informacion</h4>
                    <ul class="space-y-4">
                        <li><a href="#about" class="text-gray-400 hover:text-accent-400 transition duration-300">Sobre Nosotros</a></li>
                        <li>
                        <a href="https://wa.me/573006518829" target="_blank" class="text-gray-400 hover:text-accent-400 transition duration-300">
                                Whatsapp
                                </a>
                                </li>

                        <li><a href="<?= base_url('instructivo') ?>" class="text-gray-400 hover:text-accent-400 transition duration-300">¿Como pedir?</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-accent-400 transition duration-300">Contacto</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6">Servicios</h4>
                    <ul class="space-y-4">
                        <li><a href="restaurant.php" class="text-gray-400 hover:text-accent-400 transition duration-300">Pedidos Online</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-accent-400 transition duration-300">Vista de menus</a></li>
                        <li><a href="hola.php" class="text-gray-400 hover:text-accent-400 transition duration-300">Deja tu testimonio</a></li>
                        <li><a href="testimonios.html" class="text-gray-400 hover:text-accent-400 transition duration-300">Testimonios</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6">Juegos</h4>
                    <ul class="space-y-4">
                 <li><a href="<?= base_url('login?aviso=requiere_login') ?>" class="text-gray-400 hover:text-accent-400 transition duration-300">Memoria</a></li>
               <li><a href="<?= base_url('login?aviso=requiere_login') ?>" class="text-gray-400 hover:text-accent-400 transition duration-300">Serpiente</a></li>
                    <li><a href="<?= base_url('login?aviso=requiere_login') ?>" class="text-gray-400 hover:text-accent-400 transition duration-300">El topo</a></li>
                <li><a href="<?= base_url('login?aviso=requiere_login') ?>" class="text-gray-400 hover:text-accent-400 transition duration-300">Adivina el número</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-primary-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">
                        &copy; 2025 MenuHub. Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    
<style>
 
  .category-card {
    position: relative;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  
  .category-card:hover {
    transform: translateY(-5px);
  }
  
  .ribbon {
    position: absolute;
    right: -5px; top: -5px;
    z-index: 1;
    overflow: hidden;
    width: 75px; height: 75px;
    text-align: right;
  }
  
  .ribbon span {
    font-size: 10px;
    font-weight: bold;
    color: #FFF;
    text-transform: uppercase;
    text-align: center;
    line-height: 20px;
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    width: 100px;
    display: block;
    background: #F44336;
    box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
    position: absolute;
    top: 19px; right: -21px;
  }
  
  .ribbon span::before {
    content: "";
    position: absolute; left: 0px; top: 100%;
    z-index: -1;
    border-left: 3px solid #D32F2F;
    border-right: 3px solid transparent;
    border-bottom: 3px solid transparent;
    border-top: 3px solid #D32F2F;
  }
  
  .ribbon span::after {
    content: "";
    position: absolute; right: 0px; top: 100%;
    z-index: -1;
    border-left: 3px solid transparent;
    border-right: 3px solid #D32F2F;
    border-bottom: 3px solid transparent;
    border-top: 3px solid #D32F2F;
  }
</style>

<script>
  // Efecto hover para móviles
  document.querySelectorAll('.category-card').forEach(card => {
    card.addEventListener('touchstart', function() {
      this.classList.add('hover:shadow-md', 'hover:border-accent-300');
    });
  });
</script>


     
    <?php if (session()->getFlashdata('success')): ?>
<style>
  .swal2-confirm {
    border-radius: 9999px !important;
    padding: 0.75rem 1.5rem !important;
    font-weight: 600;
    font-size: 1rem;
  }
</style>

<script>
Swal.fire({
  title: '¡Bienvenido!',
  text: 'Nos alegra tenerte en nuestra pagina.',
  icon: 'success',
  background: '#FFFFFF',
  color: '#1e3a8a',
  iconColor: '#2563eb',
  confirmButtonText: 'Explorar',
  confirmButtonColor: '#2563eb',
  customClass: {
    popup: 'rounded-xl shadow-lg border border-blue-200',
    confirmButton: 'swal2-confirm'
  },
  showClass: {
    popup: 'animate__animated animate__fadeInDown'
  },
  hideClass: {
    popup: 'animate__animated animate__fadeOutUp'
  }
});
</script>
<?php endif; ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-comprar').forEach(button => {
        button.addEventListener('click', function() {
            const productName = this.getAttribute('data-nombre');
            
            Swal.fire({
                title: '¡Agregado!',
                html: `<p style="font-size: 14px;">${productName} se añadió al carrito</p>`,
                icon: 'success',
                background: '#f0fdf4',
                iconColor: '#0032FF',
                confirmButtonColor: '#16a34a',
                customClass: {
                    title: 'text-xl', 
                    htmlContainer: 'text-lg'  
                },
                showConfirmButton: false,
                timer: 1500
            });
        });
    });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const logoutBtn = document.getElementById("btn-logout");

  if (logoutBtn) {
    logoutBtn.addEventListener("click", function (e) {
      e.preventDefault(); // Evita salir de una vez

      Swal.fire({
        title: 'Cerrando sesión...',
        text: 'Estamos finalizando tu sesión.',
        icon: 'success',
        background: '#FFFFFF', // Azul claro
        color: '#1e3a8a',      // Texto azul oscuro
        iconColor: '#2563eb',  // Ícono azul
        showConfirmButton: false,
        timer: 2000,
        customClass: {
          popup: 'rounded-xl shadow-lg border border-blue-200',
        },
        showClass: {
          popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
          popup: 'animate__animated animate__fadeOutUp'
        }
      });

      // Redirige después de 2 segundos
      setTimeout(() => {
        window.location.href = this.href;
      }, 2000);
    });
  }
});
</script>


    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
        
        // Initialize AOS animation library
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>
</body>
</html>