<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MenuHub</title>
    <link rel="icon" type="image/png" href="<?= base_url('images/Menu.png') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            background: var(--gray-50);
        }
        
        .success-message {
            text-align: center;
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid #28a745;
            
        }

        .login-container {
            width: 100%;
            max-width: 500px;
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

        .remember {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 20px;
            color: var(--light-text);
        }

        .remember .check {
            margin-right: 10px;
            accent-color: var(--accent-color);
        }

        .remember a {
            color: var(--accent-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .remember a:hover {
            color: var(--primary-color);
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

        @media (max-width: 600px) {
            .login-wrapper {
                padding: 20px;
            }

            .login-header h1 {
                font-size: 24px;
            }
        }
          .notyf__toast {
    border-radius: 12px !important; /* Cambia el valor según el nivel de redondez que quieras */
  }
    </style>
</head>
<body>
    <div class="background-animation"></div>
    <div class="login-container">
        <div class="login-wrapper">
            <div class="login-header">
                <h1>¡Bienvenido a <span style="color: var(--accent-color);">MenuHub</span>!</h1>
                <p>Inicia sesión para continuar</p>
            </div>
          
            <!-- Mensajes de éxito/error -->
            <?php if (!empty($success)): ?>
                <div class="success-message">
                    <?= esc($success) ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($error)): ?>
                <div class="message" style="background-color: #f8d7da; color: #721c24; border-left-color: #721c24;">
                    <?= esc($error) ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($errors) && is_array($errors)): ?>
                <?php foreach ($errors as $err): ?>
                    <div class="message" style="background-color: #f8d7da; color: #721c24; border-left-color: #721c24;">
                        <?= esc($err) ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <form method="post" action="<?= base_url('/loginValidar') ?>" id="login-form">
                <?= csrf_field() ?>
                <div class="input-container">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <input 
                        class="input-field" 
                        type="text" 
                        placeholder="Nombre de Usuario (Ej: Kanye Rojas)" 
                        name="username" 
                        value="<?= old('username') ?>"
                        required
                    >
                </div>
                
                <div class="input-container">
                    <div class="icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input 
                        class="input-field password" 
                        type="password" 
                        placeholder="Contraseña" 
                        name="password" 
                        required
                    >
                    <div class="icon" style="border-radius: 0 10px 10px 0; cursor: pointer;">
                        <i class="fas fa-eye-slash toggle"></i>
                    </div>
                </div>

                <div class="remember">
                    <div>
                        <input type="checkbox" class="check" name="remember_me">
                        <label>Recuérdame</label>
                    </div>
                   <a href="" id="link-recover">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="submit" class="btn" id="btn-login" >
                    Iniciar Sesión
                </button>

                <div class="links">
                    ¿No tienes una cuenta? <a href="<?= base_url('registro') ?>">Regístrate</a>
                </div> <br>
                <div class="links">
                    O si quieres seguir viendo la pagina puedes <a href="<?= base_url() ?>">Volver</a>
                </div>
            </form>
        </div>
    </div>
    



    <script>
  const notyf = new Notyf({
    duration: 3000,
    ripple: true,
    position: { x: 'right', y: 'top' }
  });

  document.getElementById("login-form").addEventListener("submit", function(e) {
    e.preventDefault(); // Detenemos el envío inmediato

    // Mostramos la notificación
    notyf.success('Iniciando sesión...');


    setTimeout(() => {
      this.submit();
    }, 2000);
  });
</script>

    <script>
        const toggle = document.querySelector(".toggle");
        const input = document.querySelector(".password");
        
        toggle.addEventListener("click", () => {
            if (input.type === "password") {
                input.type = "text";
                toggle.classList.replace("fa-eye-slash", "fa-eye");
            } else {
                input.type = "password";
                toggle.classList.replace("fa-eye", "fa-eye-slash");
            }
        });
    </script>
</body>

</html>