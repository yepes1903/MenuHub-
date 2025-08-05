<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - MenuHub</title>
    <link rel="icon" type="image/png" href="<?= base_url('images/Menu.png') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #1e40af;
            --accent-color: #3b82f6;
            --text-color: #1e293b;
            --light-text: #64748b;
            --white: #ffffff;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-400: #94a3b8;
            --gray-800: #1e293b;
            --gray-900: #0f172a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        .background-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            overflow: hidden;
            z-index: -1;
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

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            background: var(--gray-50);
        }

        .login-container {
            width: 100%;
            max-width: 650px;
            z-index: 10;
        }

        .login-wrapper {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 25px 45px rgba(0,0,0,0.1);
            padding: 40px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .login-wrapper:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 50px rgba(0,0,0,0.15);
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h1 {
            color: var(--text-color);
            font-size: 28px;
            margin-bottom: 10px;
        }

        .login-header p {
            color: var(--light-text);
            font-size: 16px;
        }

        .input-container {
            display: flex;
            width: 100%;
            margin-bottom: 20px;
            position: relative;
        }

        .icon {
            padding: 15px;
            background: var(--gray-100);
            color: var(--accent-color);
            min-width: 50px;
            text-align: center;
            border-radius: 10px 0 0 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .input-field {
            width: 100%;
            padding: 15px;
            border: 2px solid var(--gray-200);
            border-left: none;
            border-radius: 0 10px 10px 0;
            font-size: 16px;
            color: var(--text-color);
            transition: all 0.3s ease;
        }

        .input-field:focus {
            outline: none;
            border-color: var(--accent-color);
        }

        .toggle.icon {
            border-radius: 0 10px 10px 0;
            cursor: pointer;
            border-left: none;
        }

        .btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background: var(--accent-color);
            color: var(--white);
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
        }

        .links {
            text-align: center;
            margin-top: 20px;
            color: var(--light-text);
            font-size: 14px;
        }

        .links a {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .links a:hover {
            color: var(--primary-color);
        }

        .message {
            text-align: center;
            background: var(--gray-100);
            color: var(--text-color);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid var(--accent-color);
        }

        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        @media (max-width: 600px) {
            .login-wrapper {
                padding: 20px;
            }

            .login-header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="background-animation"></div>
    <div class="login-container">
        <div class="login-wrapper">
            <div class="login-header">
                <h1>Únete a <span style="color: var(--accent-color);">MenuHub</span></h1>
                <p>Crea una cuenta para continuar</p>
            </div>

    <?php if (isset($message)): ?>
        <div class="message" style="border-left-color: <?= $message['color'] ?>">
            <p><?= $message['text'] ?></p>
        </div>

        <div class="btn-container">
            
            <?php if (isset($showLoginButton)): ?>
                <a href="<?= base_url('login') ?>"><button class="btn">Iniciar sesión</button></a>
            <?php endif; ?>
        </div>
    <?php endif; ?> <br>

            <form action="<?= base_url('/registroGuardar') ?>" method="post">
                <?= csrf_field() ?>

                <div class="input-container">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <input class="input-field" type="text" placeholder="Usuario (Nombre Identificador) Ej: Kanye Rojas" name="username" required>
                </div>

                <div class="input-container">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <input class="input-field" type="email" placeholder="Correo Electrónico" name="email" required>
                </div>

                <div class="input-container">
                    <div class="icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input class="input-field password" type="password" placeholder="Contraseña" name="password" required>
                    <div class="icon toggle">
                        <i class="fas fa-eye-slash"></i>
                    </div>
                </div>

                <div class="input-container">
                    <div class="icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input class="input-field" type="password" placeholder="Confirmar Contraseña" name="cpass" required>
                    <div class="icon toggle">
                        <i class="fas fa-eye-slash"></i>
                    </div>
                </div>

                <div class="input-container">
                    <div class="icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <input class="input-field" type="text" placeholder="Direccion (Ej: Calle 44 #89-32)" name="adress" required>
                </div>

                <div class="input-container">
                    <div class="icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <input class="input-field" type="text" placeholder="Teléfono (Ej: 3001234567)" name="phone" required>
                </div>



                <button type="submit" class="btn">
                    Crear Cuenta
                </button>

                <div class="links">
                ¿Ya tienes una cuenta? <a href="<?= base_url('login') ?>">Inicia Sesión</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Animación de partículas
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

        // Toggle de contraseña
    document.querySelectorAll('.toggle').forEach((toggle, idx) => {
    const input = toggle.parentElement.querySelector('input');
    toggle.addEventListener('click', () => {
        if (input.type === 'password') {
            input.type = 'text';
            toggle.querySelector('i').classList.replace('fa-eye-slash', 'fa-eye');
        } else {
            input.type = 'password';
            toggle.querySelector('i').classList.replace('fa-eye', 'fa-eye-slash');
        }
    });
});

        // Validación JS para el formulario de registro
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const username = form.username.value.trim();
            const email = form.email.value.trim();
            const password = form.password.value;
            const cpass = form.cpass.value;
            const adress = form.adress.value.trim();
            const phone = form.phone.value.trim();
            let error = '';

            if (username.length < 3) {
                error = 'El usuario debe tener al menos 3 caracteres.';
            } else if (!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email)) {
                error = 'Correo electrónico no válido.';
            } else if (password.length < 8) {
                error = 'La contraseña debe tener al menos 8 caracteres.';
            } else if (password !== cpass) {
                error = 'Las contraseñas no coinciden.';
            } else if (adress.length < 5) {
                error = 'La dirección es demasiado corta.';
            } else if (!/^\d{7,}$/.test(phone)) {
                error = 'El teléfono debe tener al menos 7 dígitos.';
            }

            if (error) {
                e.preventDefault();
                alert(error);
            }
        });
    </script>
</body>
</html>
