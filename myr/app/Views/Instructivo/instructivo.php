<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Instructivo para Comprar en Línea vía WhatsApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e40af ',
                        secondary: '#1e40af ',
                        accent: '#ff6b35',
                    },
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    animation: {
                        'gradient-x': 'gradient-x 15s ease infinite',
                        'gradient-y': 'gradient-y 20s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        'gradient-x': {
                            '0%, 100%': { 'background-position': '0% 50%' },
                            '50%': { 'background-position': '100% 50%' },
                        },
                        'gradient-y': {
                            '0%, 100%': { 'background-position': '50% 0%' },
                            '50%': { 'background-position': '50% 100%' },
                        },
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            .bg-gradient-animated {
                background: linear-gradient(135deg, #1e40af , #1e40af ,rgb(255, 255, 255));
                background-size: 200% 200%;
                animation: gradient-x 15s ease infinite;
            }
            .text-gradient {
                background: linear-gradient(135deg, #1e40af ,rgb(0, 0, 0));
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 md:p-6 font-poppins bg-gradient-to-br from-amber-100 to-orange-400 overflow-hidden">
    <!-- Background Animation -->
    <div class="fixed inset-0 bg-gradient-animated z-[-1] opacity-90">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_70%,rgba(255,255,255,0.3)_0%,transparent_50%)] opacity-50 animate-[gradient-y_15s_ease_infinite]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_30%,rgba(255,255,255,0.2)_0%,transparent_60%)] opacity-50 animate-[gradient-x_20s_ease-in-out_infinite_alternate]"></div>
    </div>

    <!-- Main Container -->
    <div class="w-full max-w-2xl bg-white/90 backdrop-blur-md rounded-2xl shadow-xl p-6 md:p-10 border border-white/20 transition-all duration-300 hover:shadow-2xl hover:translate-y-[-5px]">
        <div class="text-center mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-gradient mb-4">Cómo Comprar en Línea vía WhatsApp</h1>
            <p class="text-lg text-gray-600">
                Sigue estos sencillos pasos para realizar tu compra en línea de manera rápida y segura
            </p>
        </div>

        <ol class="space-y-4 mb-10 text-gray-700">
            <li class="flex items-start">
                <span class="flex items-center justify-center w-8 h-8 bg-primary rounded-full text-white font-bold mr-4 flex-shrink-0">1</span>
                <span class="text-lg">Abre la aplicación de WhatsApp en tu teléfono o computadora</span>
            </li>
            <li class="flex items-start">
                <span class="flex items-center justify-center w-8 h-8 bg-primary rounded-full text-white font-bold mr-4 flex-shrink-0">2</span>
                <span class="text-lg">Agrega nuestro número <strong class="text-primary">+123 456 7890</strong> a tu lista de contactos</span>
            </li>
            <li class="flex items-start">
                <span class="flex items-center justify-center w-8 h-8 bg-primary rounded-full text-white font-bold mr-4 flex-shrink-0">3</span>
                <span class="text-lg">Envía un mensaje con el nombre del producto que deseas comprar</span>
            </li>
            <li class="flex items-start">
                <span class="flex items-center justify-center w-8 h-8 bg-primary rounded-full text-white font-bold mr-4 flex-shrink-0">4</span>
                <span class="text-lg">Recibirás confirmación de disponibilidad y precio</span>
            </li>
            <li class="flex items-start">
                <span class="flex items-center justify-center w-8 h-8 bg-primary rounded-full text-white font-bold mr-4 flex-shrink-0">5</span>
                <span class="text-lg">Confirma tu pedido con tus datos de envío y forma de pago</span>
            </li>
            <li class="flex items-start">
                <span class="flex items-center justify-center w-8 h-8 bg-primary rounded-full text-white font-bold mr-4 flex-shrink-0">6</span>
                <span class="text-lg">Recibe la confirmación final y tiempo estimado de entrega</span>
            </li>
            <li class="flex items-start">
                <span class="flex items-center justify-center w-8 h-8 bg-primary rounded-full text-white font-bold mr-4 flex-shrink-0">7</span>
                <span class="text-lg">Realiza el pago según las instrucciones</span>
            </li>
            <li class="flex items-start">
                <span class="flex items-center justify-center w-8 h-8 bg-primary rounded-full text-white font-bold mr-4 flex-shrink-0">8</span>
                <span class="text-lg">Espera la entrega en la dirección indicada</span>
            </li>
        </ol>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/1234567890" target="_blank" class="px-8 py-3 bg-green-500 hover:bg-green-600 text-white font-medium rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                <i class="fab fa-whatsapp text-xl"></i>
                Contactar por WhatsApp
            </a>
            <a href="index.php" class="px-8 py-3 bg-primary hover:bg-secondary text-white font-medium rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                <i class="fas fa-arrow-left"></i>
                Volver al Inicio
            </a>
        </div>
    </div>

    <!-- WhatsApp Floating Button for Mobile -->
    <a href="https://wa.me/1234567890" target="_blank" class="fixed bottom-6 right-6 sm:hidden w-14 h-14 bg-green-500 rounded-full flex items-center justify-center text-white text-2xl shadow-xl hover:bg-green-600 transition-all z-50">
        <i class="fab fa-whatsapp"></i>
    </a>
</body>
</html>