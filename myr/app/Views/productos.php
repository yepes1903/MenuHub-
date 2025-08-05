<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - MenuHub</title>
    <link rel="icon" type="image/png" href="<?= base_url('images/Menu.png') ?>">
    <!-- Tailwind CSS -->
    <link rel="icon" type="image/png" href="<?= base_url('images/Menu.png') ?>">
    <!-- Tailwind CSS -->
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
                <div class="hidden md:flex items-center space-x-8 mr-62">
                    <a href="<?= base_url('quemas') ?>" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">Inicio</a>
                    <a href="<?= base_url('producticos') ?>" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">Productos
                         <style>
                            .nav-link[href='<?= base_url('producticos') ?>']::after {
                                width: 100% !important;
                                background-color: #2563eb;
                            }
                        </style>
                    </a>
                    <a href="#team" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">Locales</a>
                    <a href="<?= base_url('resenas') ?>" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">Reseñas
                    </a>
                    <a href="<?= base_url('quemas') ?>" class="px-6 py-3 rounded-full bg-accent-600 text-white hover:bg-accent-700 transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        Volver
                    </a>
                    <a href="<?= base_url('profile/edit') ?>" class="px-6 py-3 rounded-full border-2 border-accent-600 text-accent-600 hover:bg-accent-50 transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        Perfil
                    </a>
                </div>
                <a href="<?= base_url('carrito') ?>" class="ml-16 flex items-center justify-center text-accent-600 hover:text-accent-800 relative" title="Carrito de compras">
                        <i class="fas fa-shopping-cart text-2xl"></i>
                    </a>
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-primary-600 hover:text-primary-800 focus:outline-none">
                        <i class="fas fa-bars text-2xl"><?= base_url('carrito') ?></i>
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
                <a href="producticos" class="block py-2 text-primary-600 hover:text-primary-800 dark:text-white">Productos</a>
                <a href="<?= base_url('reseñas') ?>" class="block py-2 text-primary-600 hover:text-primary-800 dark:text-white">Reseñas</a>
                <div class="space-y-2 pt-2">
                    <a href="<?= base_url('login') ?>" class="block w-full text-center px-4 py-2 bg-accent-600 text-white rounded-full hover:bg-accent-700">
                        Iniciar Sesión
                    </a>
                    <a href="<?= base_url('signup') ?>" class="block w-full text-center px-4 py-2 border-2 border-accent-600 text-accent-600 rounded-full hover:bg-accent-50">
                        Registrarse
                    </a>
                </div>
                <a href="myboy.html" class="ml-16 flex items-center justify-center text-accent-600 hover:text-accent-800 relative" title="Carrito de compras">
                        <i class="fas fa-shopping-cart text-2xl"></i>
                    </a>
            </div>
        </div>
    </nav>
</div>

<section class="py-16 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16">
        </div>

        
        <div class="flex flex-wrap justify-center gap-4 mb-8">
            <button class="px-4 py-2 rounded-full bg-accent-600 text-white hover:bg-accent-700 transition-all">
                Todos
            </button>
            <button class="px-4 py-2 rounded-full border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all">
               Bebidas
            </button>
            <button class="px-4 py-2 rounded-full border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all">
                Lacteos y huevos
            </button>
            <button class="px-4 py-2 rounded-full border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all">
                Frutas y verduras
            </button>
            <button class="px-4 py-2 rounded-full border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all">
                Panaderia
            </button>
            <button class="px-4 py-2 rounded-full border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all">
                Granos y cereales
            </button>
            <button class="px-4 py-2 rounded-full border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all">
                Frutas y verduras
            </button>
            <button class="px-4 py-2 rounded-full border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all">
                Licores
            </button>

        </div>

<section id="products" class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mt-20 mx-auto px-4 sm:px-6 lg:px-8">
        
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
                            <button class="btn-comprar" 
        data-id="<?= $product['id'] ?>" 
        data-nombre="<?= esc($product['nombre']) ?>"
        data-precio="<?= number_format($product['precio'], 2) ?>">
    <i class="fas fa-shopping-cart mr-2"></i>Comprar
</button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

    

    <button id="back-to-top" class="fixed bottom-8 right-8 bg-accent-600 text-white p-4 rounded-full shadow-lg hidden hover:bg-accent-700 transition duration-300 transform hover:scale-110">
        <i class="fas fa-arrow-up"></i>
    </button>

    
    <script>
    
        AOS.init({
            duration: 1000,
            once: true
        });

       
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Back to top button
        const backToTopButton = document.getElementById('back-to-top');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('hidden');
            } else {
                backToTopButton.classList.add('hidden');
            }
        });

        backToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
       
    </script>

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
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Actualizar contador del carrito al cargar la página
    updateCartCounter();
    
    // Manejar clic en botones "Comprar"
    document.querySelectorAll('.btn-comprar').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const productId = this.getAttribute('data-id');
            const productName = this.getAttribute('data-nombre');
            const productPrice = this.getAttribute('data-precio');
            
            // Mostrar confirmación con SweetAlert2
            Swal.fire({
                title: '¿Agregar al carrito?',
                html: `<p class="text-sm">${productName} - $${productPrice}</p>`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Agregar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#2563eb',
                customClass: {
                    popup: 'rounded-xl',
                    title: 'text-lg',
                    htmlContainer: 'text-sm'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    agregarAlCarrito(productId, productName);
                }
            });
        });
    });
    
    // Función para agregar producto al carrito
    function agregarAlCarrito(productId, productName) {
        fetch('<?= base_url('carrito/agregar') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
            },
            body: JSON.stringify({
                producto_id: productId,
                cantidad: 1
            })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                Swal.fire({
                    title: '¡Agregado!',
                    html: `<p class="text-sm">${productName} se añadió al carrito</p>`,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: {
                        popup: 'rounded-xl',
                        title: 'text-lg',
                        htmlContainer: 'text-sm'
                    }
                });
                updateCartCounter();
            } else {
                Swal.fire('Error', data.error || 'Ocurrió un error', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire('Error', 'No se pudo agregar el producto', 'error');
        });
    }
    
    // Función para actualizar el contador del carrito
    function updateCartCounter() {
        fetch('<?= base_url('carrito/count') ?>')
        .then(response => response.json())
        .then(data => {
            const counter = document.getElementById('cart-counter');
            if(counter) {
                counter.textContent = data.count;
                counter.classList.toggle('hidden', data.count === 0);
            }
        });
    }
});
</script>
</body>
</html>
