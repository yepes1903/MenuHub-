<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseñas - MenuHub</title>
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
                <div class="hidden md:flex items-center space-x-8 mr-64">
                    <a href="<?= base_url('quemas') ?>" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">Inicio</a>
                    <a href="#about" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">Productos</a>
                    <a href="#team" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">Locales</a>
                    <a href="<?= base_url('resenas') ?>" class="nav-link text-primary-600 hover:text-primary-800 dark:text-white">Reseñas
                        <style>
                            .nav-link[href='<?= base_url('resenas') ?>']::after {
                                width: 100% !important;
                                background-color: #2563eb;
                            }
                        </style>
                    </a>
                    <a href="<?= base_url('quemas') ?>" class="px-6 py-3 rounded-full bg-accent-600 text-white hover:bg-accent-700 transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        Volver
                    </a>
                    <a href="<?= base_url('profile/edit') ?>" class="px-6 py-3 rounded-full border-2 border-accent-600 text-accent-600 hover:bg-accent-50 transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        Perfil
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
                <a href="<?= base_url('/') ?>" class="block py-2 text-primary-600 hover:text-primary-800 dark:text-white">Inicio</a>
                <a href="#about" class="block py-2 text-primary-600 hover:text-primary-800 dark:text-white">Nosotros</a>
                <a href="#team" class="block py-2 text-primary-600 hover:text-primary-800 dark:text-white">Equipo</a>
                <a href="productos.php" class="block py-2 text-primary-600 hover:text-primary-800 dark:text-white">Productos</a>
                <a href="<?= base_url('reseñas') ?>" class="block py-2 text-primary-600 hover:text-primary-800 dark:text-white">Reseñas</a>
                <div class="space-y-2 pt-2">
                    <a href="<?= base_url('login') ?>" class="block w-full text-center px-4 py-2 bg-accent-600 text-white rounded-full hover:bg-accent-700">
                        Iniciar Sesión
                    </a>
                    <a href="<?= base_url('signup') ?>" class="block w-full text-center px-4 py-2 border-2 border-accent-600 text-accent-600 rounded-full hover:bg-accent-50">
                        Registrarse
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sección de Reseñas -->
<section id="reviews" class="py-20 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto mt-20 px-4 sm:px-6 lg:px-8">
        <!-- Encabezado -->
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-primary-800 dark:text-white mb-4">Lo que dicen nuestros usuarios</h2>
            <p class="text-lg text-primary-600 dark:text-gray-300 max-w-2xl mx-auto">
                Descubre las experiencias de quienes ya usan MenuHub
            </p>
        </div>

        <!-- Grid de Reseñas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Reseña 1 -->
            <div class="bg-white mt-20 dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:transform hover:-translate-y-2 border-l-4 border-accent-600" data-aos="fade-up" data-aos-delay="100">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0">
                            <img class="h-12 w-12 rounded-full" src="https://randomuser.me/api/portraits/women/32.jpg" alt="Usuario">
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-primary-800 dark:text-white">María Fernández</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-primary-600 dark:text-gray-300">
                        "MenuHub ha cambiado completamente mi forma de pedir comida. Los tiempos de entrega son increíblemente rápidos y la interfaz es super intuitiva."
                    </p>
                </div>
                <div class="px-6 py-4 bg-gray-100 dark:bg-gray-700">
                    <span class="text-sm text-accent-600 dark:text-accent-400 font-medium">Pedido en: La Pizzeria de Don Carlos</span>
                </div>
            </div>

            <!-- Reseña 2 -->
            <div class="bg-white dark:bg-gray-800 mt-20 rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:transform hover:-translate-y-2 border-l-4 border-accent-600" data-aos="fade-up" data-aos-delay="200">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0">
                            <img class="h-12 w-12 rounded-full" src="https://randomuser.me/api/portraits/men/45.jpg" alt="Usuario">
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-primary-800 dark:text-white">Juan Pérez</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-primary-600 dark:text-gray-300">
                        "Como dueño de restaurante, MenuHub ha aumentado mis ventas un 30%. La plataforma es fácil de usar y los clientes están muy satisfechos con el servicio."
                    </p>
                </div>
                <div class="px-6 py-4 bg-gray-100 dark:bg-gray-700">
                    <span class="text-sm text-accent-600 dark:text-accent-400 font-medium">Dueño de: Sabor Antioqueño</span>
                </div>
            </div>

            <!-- Reseña 3 -->
            <div class="bg-white dark:bg-gray-800 mt-20 rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:transform hover:-translate-y-2 border-l-4 border-accent-600" data-aos="fade-up" data-aos-delay="300">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0">
                            <img class="h-12 w-12 rounded-full" src="https://randomuser.me/api/portraits/women/68.jpg" alt="Usuario">
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-primary-800 dark:text-white">Laura Gómez</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-primary-600 dark:text-gray-300">
                        "Me encanta poder descubrir nuevos lugares en mi ciudad. La variedad de opciones es impresionante y el sistema de pago es muy seguro."
                    </p>
                </div>
                <div class="px-6 py-4 bg-gray-100 dark:bg-gray-700">
                    <span class="text-sm text-accent-600 dark:text-accent-400 font-medium">Pedido en: Arepas La 70</span>
                </div>
            </div>
        </div>

        <!-- Botón para más reseñas -->
        <div class="text-center mt-20" data-aos="fade-up" data-aos-delay="400">
            <a href="#" class="px-8 py-3 rounded-full bg-accent-600 text-white hover:bg-accent-700 transition-all duration-300 transform hover:scale-105 hover:shadow-xl inline-flex items-center font-semibold">
                Ver más reseñas
                <i class="fas fa-chevron-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

    

    
    <!-- Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-8 right-8 bg-accent-600 text-white p-4 rounded-full shadow-lg hidden hover:bg-accent-700 transition duration-300 transform hover:scale-110">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Mobile menu toggle
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

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                    // Close mobile menu if open
                    mobileMenu.classList.add('hidden');
                }
            });
        });

        // Form submission handling with animation
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const button = form.querySelector('button[type="submit"]');
                const originalText = button.innerHTML;
                button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';
                
                // Simulate form submission
                setTimeout(() => {
                    button.innerHTML = '<i class="fas fa-check"></i> ¡Enviado!';
                    form.reset();
                    setTimeout(() => {
                        button.innerHTML = originalText;
                    }, 2000);
                }, 1500);
            });
        });
    </script>
</body>
</html>
