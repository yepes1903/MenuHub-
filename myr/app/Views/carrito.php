<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carro de compras - MenuHub</title>
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
                            Carro de compras de <span class="text-accent-600"><?= esc(session('username')) ?></span>
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

<!-- Agrega esto en tu <head> -->
<style>
    .cart-item {
        transition: all 0.3s ease;
    }
    .cart-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .quantity-btn {
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<!-- Contenido principal -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-32">
        <h2 class="text-3xl font-bold text-primary-800 dark:text-white mb-8">Tu Carrito de Compras</h2>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Lista de productos -->
            <div class="lg:col-span-2 space-y-4">
                <?php if (empty($items)): ?>
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-md">
                    <p class="text-gray-600 dark:text-gray-300">Tu carrito está vacío</p>
                    <a href="<?= base_url('productos') ?>" class="mt-4 inline-block px-6 py-2 bg-accent-600 text-white rounded-full hover:bg-accent-700 transition">
                        Ver productos
                    </a>
                </div>
                <?php else: ?>
                    <?php foreach ($items as $item): ?>
                    <div class="cart-item bg-white dark:bg-gray-800 rounded-lg p-4 shadow-md flex items-center">
                        <img src="<?= base_url('uploads/' . $item['imagen']) ?>" alt="<?= esc($item['nombre']) ?>" class="w-20 h-20 object-cover rounded-lg">
                        
                        <div class="ml-4 flex-grow">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white"><?= esc($item['nombre']) ?></h3>
                            <p class="text-accent-600 font-bold">$<?= number_format($item['precio'], 2) ?></p>
                            
                            <div class="flex items-center mt-2">
                                <button class="quantity-btn bg-gray-200 dark:bg-gray-700 rounded-l-full" 
                                        onclick="updateQuantity(<?= $item['id'] ?>, -1)">
                                    -
                                </button>
                                <span class="px-4 bg-gray-100 dark:bg-gray-600"><?= $item['cantidad'] ?></span>
                                <button class="quantity-btn bg-gray-200 dark:bg-gray-700 rounded-r-full" 
                                        onclick="updateQuantity(<?= $item['id'] ?>, 1)">
                                    +
                                </button>
                                
                                <button onclick="removeItem(<?= $item['id'] ?>)" 
                                        class="ml-4 text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <!-- Resumen del pedido -->
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-md h-fit sticky top-4">
                <h3 class="text-xl font-bold text-primary-800 dark:text-white mb-4">Resumen del Pedido</h3>
                
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-300">Subtotal</span>
                        <span class="font-medium">$<?= number_format($total, 2) ?></span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-300">Envío</span>
                        <span class="font-medium">$0.00</span>
                    </div>
                    
                    <div class="border-t border-gray-200 dark:border-gray-700 my-3"></div>
                    
                    <div class="flex justify-between text-lg font-bold">
                        <span>Total</span>
                        <span class="text-accent-600">$<?= number_format($total, 2) ?></span>
                    </div>
                    
                    <button class="w-full mt-6 px-6 py-3 bg-accent-600 text-white rounded-full hover:bg-accent-700 transition font-medium">
                        Proceder al Pago
                    </button>
                    
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-4 text-center">
                        <i class="fas fa-lock mr-1"></i> Pago seguro con encriptación SSL
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Manejar cambios de cantidad
    document.querySelectorAll('.quantity-btn').forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.getAttribute('data-item-id');
            const change = parseInt(this.getAttribute('data-change'));
            actualizarCantidad(itemId, change);
        });
    });
    
    // Manejar eliminación de items
    document.querySelectorAll('.btn-eliminar').forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.getAttribute('data-item-id');
            const productName = this.getAttribute('data-product-name');
            eliminarItem(itemId, productName);
        });
    });
    
    // Función para actualizar cantidad
    function actualizarCantidad(itemId, change) {
        fetch('<?= base_url('carrito/actualizar') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
            },
            body: JSON.stringify({
                item_id: itemId,
                change: change
            })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                // Actualizar la vista sin recargar
                const quantityElement = document.querySelector(`.quantity-value[data-item-id="${itemId}"]`);
                const priceElement = document.querySelector(`.item-price[data-item-id="${itemId}"]`);
                const subtotalElement = document.getElementById('subtotal');
                const totalElement = document.getElementById('total');
                
                if(quantityElement) quantityElement.textContent = data.newQuantity;
                if(priceElement) priceElement.textContent = `$${data.newPrice.toFixed(2)}`;
                if(subtotalElement) subtotalElement.textContent = `$${data.newSubtotal.toFixed(2)}`;
                if(totalElement) totalElement.textContent = `$${data.newTotal.toFixed(2)}`;
            } else {
                Swal.fire('Error', data.error || 'Error al actualizar', 'error');
            }
        });
    }
    
    // Función para eliminar item
    function eliminarItem(itemId, productName) {
        Swal.fire({
            title: '¿Eliminar producto?',
            html: `<p class="text-sm">¿Quieres eliminar <strong>${productName}</strong> de tu carrito?</p>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            customClass: {
                popup: 'rounded-xl',
                title: 'text-lg',
                htmlContainer: 'text-sm'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('<?= base_url('carrito/eliminar') ?>/' + itemId, {
                    method: 'DELETE',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        // Eliminar el elemento del DOM
                        const itemElement = document.querySelector(`.cart-item[data-item-id="${itemId}"]`);
                        if(itemElement) itemElement.remove();
                        
                        // Actualizar totales
                        document.getElementById('subtotal').textContent = `$${data.newSubtotal.toFixed(2)}`;
                        document.getElementById('total').textContent = `$${data.newTotal.toFixed(2)}`;
                        
                        // Actualizar contador en navbar
                        const counter = document.getElementById('cart-counter');
                        if(counter) {
                            counter.textContent = data.newCount;
                            counter.classList.toggle('hidden', data.newCount === 0);
                        }
                        
                        // Mostrar mensaje de éxito
                        Swal.fire({
                            title: '¡Eliminado!',
                            text: 'El producto ha sido removido de tu carrito.',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false,
                            customClass: {
                                popup: 'rounded-xl'
                            }
                        });
                        
                        // Si el carrito queda vacío, mostrar mensaje
                        if(data.newCount === 0) {
                            document.querySelector('.cart-items-container').innerHTML = `
                                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-md text-center">
                                    <p class="text-gray-600 dark:text-gray-300 mb-4">Tu carrito está vacío</p>
                                    <a href="<?= base_url('productos') ?>" class="px-6 py-2 bg-accent-600 text-white rounded-full hover:bg-accent-700 transition">
                                        Ver productos
                                    </a>
                                </div>
                            `;
                        }
                    }
                });
            }
        });
    }
    
    // Manejar el botón de pagar
    document.getElementById('btn-pagar')?.addEventListener('click', function() {
        if(document.querySelectorAll('.cart-item').length === 0) {
            Swal.fire({
                title: 'Carrito vacío',
                text: 'Agrega productos antes de pagar',
                icon: 'warning',
                confirmButtonColor: '#2563eb'
            });
            return;
        }
        
        Swal.fire({
            title: '¿Proceder al pago?',
            html: `<p class="text-sm">Total: <strong>$${document.getElementById('total').textContent}</strong></p>`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Continuar',
            cancelButtonText: 'Seguir comprando',
            confirmButtonColor: '#2563eb',
            customClass: {
                popup: 'rounded-xl',
                title: 'text-lg',
                htmlContainer: 'text-sm'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Aquí puedes redirigir al proceso de pago
                window.location.href = '<?= base_url('checkout') ?>';
            }
        });
    });
});
</script>

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
    </script>
</div>

</body>
</html>
