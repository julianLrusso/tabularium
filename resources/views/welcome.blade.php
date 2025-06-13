<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Registry - Login/Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2C3E50',
                        secondary: '#E5ECF4'
                    },
                    fontFamily: {
                        'ibm': ['IBM Plex Sans', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>
<body class="font-ibm bg-secondary min-h-screen">
<!-- Navbar -->
<x-navbar></x-navbar>

<!-- Main Content -->
<div class="flex-1 flex items-center justify-center py-12 px-4">
    <div class="max-w-md w-full">
        <!-- Auth Container -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-primary mb-2" id="authTitle">Iniciar Sesión</h2>
                <p class="text-gray-600" id="authSubtitle">Accede a tu registro de videojuegos</p>
            </div>

            <!-- Auth Form -->
            <form id="authForm" class="space-y-6">
                <!-- Email Field -->
                <div>
                    <label class="block text-sm font-medium text-primary mb-2">
                        Correo electrónico
                    </label>
                    <input
                        type="email"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                        placeholder="tu@email.com"
                    >
                </div>

                <!-- Password Field -->
                <div>
                    <label class="block text-sm font-medium text-primary mb-2">
                        Contraseña
                    </label>
                    <input
                        type="password"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                        placeholder="••••••••"
                    >
                </div>

                <!-- Confirm Password Field (Hidden by default) -->
                <div id="confirmPasswordField" class="hidden">
                    <label class="block text-sm font-medium text-primary mb-2">
                        Confirmar contraseña
                    </label>
                    <input
                        type="password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                        placeholder="••••••••"
                    >
                </div>

                <!-- Username Field (Hidden by default) -->
                <div id="usernameField" class="hidden">
                    <label class="block text-sm font-medium text-primary mb-2">
                        Nombre de usuario
                    </label>
                    <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                        placeholder="tu_usuario"
                    >
                </div>

                <!-- Remember Me / Terms (Login/Register specific) -->
                <div id="loginExtras" class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" class="rounded border-gray-300 text-primary focus:ring-primary">
                        <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                    </label>
                    <a href="#" class="text-sm text-primary hover:underline">¿Olvidaste tu contraseña?</a>
                </div>

                <div id="registerExtras" class="hidden">
                    <label class="flex items-start">
                        <input type="checkbox" class="mt-1 rounded border-gray-300 text-primary focus:ring-primary" required>
                        <span class="ml-2 text-sm text-gray-600">
                                Acepto los <a href="#" class="text-primary hover:underline">términos de servicio</a>
                                y la <a href="#" class="text-primary hover:underline">política de privacidad</a>
                            </span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full bg-primary text-white py-3 px-4 rounded-lg font-medium hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-colors"
                    id="submitBtn"
                >
                    Iniciar Sesión
                </button>
            </form>

            <!-- Toggle Auth Mode -->
            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    <span id="toggleText">¿No tienes cuenta?</span>
                    <button
                        id="toggleBtn"
                        class="text-primary font-medium hover:underline ml-1"
                    >
                        Crear cuenta
                    </button>
                </p>
            </div>

            <!-- Social Login -->
            <div class="mt-8">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">O continúa con</span>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-3">
                    <button class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors">
                        <svg class="w-5 h-5" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="currentColor" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="currentColor" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="currentColor" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        <span class="ml-2">Google</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle between login and register forms
    let isLogin = true;

    const authTitle = document.getElementById('authTitle');
    const authSubtitle = document.getElementById('authSubtitle');
    const submitBtn = document.getElementById('submitBtn');
    const toggleText = document.getElementById('toggleText');
    const toggleBtn = document.getElementById('toggleBtn');
    const confirmPasswordField = document.getElementById('confirmPasswordField');
    const usernameField = document.getElementById('usernameField');
    const loginExtras = document.getElementById('loginExtras');
    const registerExtras = document.getElementById('registerExtras');

    toggleBtn.addEventListener('click', () => {
        isLogin = !isLogin;

        if (isLogin) {
            // Switch to login
            authTitle.textContent = 'Iniciar Sesión';
            authSubtitle.textContent = 'Accede a tu registro de videojuegos';
            submitBtn.textContent = 'Iniciar Sesión';
            toggleText.textContent = '¿No tienes cuenta?';
            toggleBtn.textContent = 'Crear cuenta';
            confirmPasswordField.classList.add('hidden');
            usernameField.classList.add('hidden');
            loginExtras.classList.remove('hidden');
            registerExtras.classList.add('hidden');
        } else {
            // Switch to register
            authTitle.textContent = 'Crear Cuenta';
            authSubtitle.textContent = 'Únete a la comunidad de gamers';
            submitBtn.textContent = 'Crear Cuenta';
            toggleText.textContent = '¿Ya tienes cuenta?';
            toggleBtn.textContent = 'Iniciar sesión';
            confirmPasswordField.classList.remove('hidden');
            usernameField.classList.remove('hidden');
            loginExtras.classList.add('hidden');
            registerExtras.classList.remove('hidden');
        }
    });

    // Form submission handler
    document.getElementById('authForm').addEventListener('submit', (e) => {
        e.preventDefault();
        if (isLogin) {
            alert('Funcionalidad de login - aquí conectarías con tu API');
        } else {
            alert('Funcionalidad de registro - aquí conectarías con tu API');
        }
    });
</script>
</body>
</html>
