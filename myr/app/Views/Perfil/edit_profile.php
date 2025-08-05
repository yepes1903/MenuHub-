<!DOCTYPE html>
<html lang="es" class="light scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Perfil - MenuHub</title>
    <link rel="icon" type="image/png" href="<?= base_url('images/Menu.png') ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
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
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        .gradient-text {
            background: linear-gradient(45deg, #2563eb, #1d4ed8);
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="background-animation"></div>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8" style="position: relative; z-index: 1;">
        <div class="max-w-md w-full space-y-8 animate-fade-in">
    <style>
        .background-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            overflow: hidden;
            z-index: 0;
        }
        .background-animation::before,
        .background-animation::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.5;
        }
        .background-animation::before {
            background: radial-gradient(circle at 20% 70%, rgba(255,255,255,0.3) 0%, transparent 50%);
            animation: moveGradient 15s ease infinite;
        }
        .background-animation::after {
            background: radial-gradient(circle at 80% 30%, rgba(255,255,255,0.2) 0%, transparent 60%);
            animation: moveGradient 20s ease-in-out infinite alternate;
        }
        @keyframes moveGradient {
            0% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.2) rotate(180deg); }
            100% { transform: scale(1) rotate(360deg); }
        }
        @keyframes particleAnimation {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0.7;
            }
            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }
        .particle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }
    </style>
    <script>
        // Animación de partículas (igual que en login/signup)
        document.addEventListener('DOMContentLoaded', () => {
            const background = document.querySelector('.background-animation');
            function createParticle() {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                const size = Math.random() * 10 + 2;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.background = `rgba(255,255,255,${Math.random() * 0.3 + 0.1})`;
                particle.style.animation = `particleAnimation ${Math.random() * 10 + 5}s linear infinite`;
                background.appendChild(particle);
                setTimeout(() => {
                    particle.remove();
                }, 15000);
            }
            setInterval(createParticle, 200);
        });
    </script>
            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
                    <p><?= session()->getFlashdata('success') ?></p>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded">
                    <p><?= session()->getFlashdata('error') ?></p>
                </div>
            <?php endif; ?>

            <?php if (isset($errors)): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="text-center">
            <h2 class="text-4xl font-extrabold text-white drop-shadow-lg tracking-wide">
                Actualizar Perfil
            </h2>
                <p class="mt-2 text-sm text-white">
                    Modifica tus datos personales
                </p>
            </div>

            <form class="mt-6 space-y-10 animate-slide-up bg-blue-100 border-4 border-blue-400 rounded-2xl shadow-lg p-8" action="<?= base_url('user/updateProfile') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="rounded-md shadow-sm -space-y-px">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input type="text" name="username" value="<?= old('username', $user['username']) ?>" required
                            class="appearance-none rounded-none relative block w-[32rem] max-w-full px-4 py-4 pl-10 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-accent-500 focus:border-accent-500 focus:z-10 sm:text-sm"
                            placeholder="Nombre de Usuario">
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" name="email" value="<?= old('email', $user['email']) ?>" required
                            class="appearance-none rounded-none relative block w-[32rem] max-w-full px-4 py-3 pl-10 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-accent-500 focus:border-accent-500 focus:z-10 sm:text-sm"
                            placeholder="Correo Electrónico">
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-map-marker-alt text-gray-400"></i>
                        </div>
                        <input type="text" name="adress" value="<?= old('adress', $user['adress']) ?>"
                            class="appearance-none rounded-none relative block w-[32rem] max-w-full px-4 py-3 pl-10 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-accent-500 focus:border-accent-500 focus:z-10 sm:text-sm"
                            placeholder="Dirección">
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-phone text-gray-400"></i>
                        </div>
                        <input type="text" name="phone" value="<?= old('phone', $user['phone']) ?>"
                            class="appearance-none rounded-none relative block w-[32rem] max-w-full px-4 py-3 pl-10 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-accent-500 focus:border-accent-500 focus:z-10 sm:text-sm"
                            placeholder="Teléfono">
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" name="new_password"
                            class="password appearance-none rounded-none relative block w-[32rem] max-w-full px-4 py-3 pl-10 pr-10 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-accent-500 focus:border-accent-500 focus:z-10 sm:text-sm"
                            placeholder="Nueva Contraseña (Blanco = No cambio)">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i class="fas fa-eye-slash toggle cursor-pointer text-gray-400 hover:text-gray-600"></i>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <a href="<?= base_url('/quemas') ?>" class="text-sm font-medium text-accent-600 hover:text-accent-500">
                        Volver al Inicio
                    </a>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-accent-600 hover:bg-accent-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-500 transition duration-300 transform hover:scale-105">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="fas fa-save text-accent-300 group-hover:text-accent-200"></i>
                        </span>
                        Actualizar Perfil
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Toggle de contraseña para el campo de nueva contraseña
        document.querySelectorAll('.toggle').forEach(toggle => {
            const input = toggle.closest('.relative').querySelector('input[type="password"]');
            toggle.addEventListener('click', () => {
                if (input.type === "password") {
                    input.type = "text";
                    toggle.classList.replace("fa-eye-slash", "fa-eye");
                } else {
                    input.type = "password";
                    toggle.classList.replace("fa-eye", "fa-eye-slash");
                }
            });
        });
    </script>
</body>
</html>