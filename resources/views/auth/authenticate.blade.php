<x-layout>
    <x-slot:title>Login</x-slot:title>
    <main class="flex-1 flex items-center justify-center py-12 px-4"
          data-form-type="{{session()->has('form_type') ? session('form_type') : 'login'}}">
        <div class="max-w-md w-full">

            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-primary mb-2" id="authTitle">Iniciar Sesión</h2>
                    <p class="text-gray-600" id="authSubtitle">Tus registros te esperan.</p>
                </div>

                <x-alert/>

                <form action="{{route('login')}}" id="loginForm" class="space-y-6" method="post"
                      enctype="application/x-www-form-urlencoded">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-primary mb-2" for="user_email">
                            Correo electrónico
                        </label>
                        <input
                            name="user_email"
                            id="user_email"
                            type="email"
                            value="{{old('user_email')}}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-primary mb-2" for="user_password">
                            Contraseña
                        </label>
                        <input
                            required
                            name="user_password"
                            id="user_password"
                            type="password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                        >
                    </div>

                    <div id="loginExtras" class="flex items-center justify-between">
                        <a href="#" class="text-sm text-primary hover:underline cursor-pointer">¿Olvidaste tu
                            contraseña?</a>
                    </div>


                    <button
                        type="submit"
                        class="w-full bg-primary text-white py-3 px-4 rounded-lg font-medium hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-colors cursor-pointer"
                        id="submitLoginBtn"
                    >
                        Iniciar Sesión
                    </button>
                </form>

                <form action="{{route('register')}}" id="registerForm" class="hidden space-y-6" method="post"
                      enctype="application/x-www-form-urlencoded">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-primary mb-2" for="email">
                            Correo electrónico
                        </label>
                        <input
                            name="email"
                            id="email"
                            type="email"
                            value="{{old('email')}}"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                        >
                        @error('email')
                        <span class="text-red-700">El email ya está en uso.</span>
                        @enderror
                    </div>
                    <div id="usernameField">
                        <label class="block text-sm font-medium text-primary mb-2" for="name">
                            Nombre de usuario
                        </label>
                        <input
                            required
                            name="name"
                            id="name"
                            type="text"
                            value="{{old('name')}}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                        >
                        @error('username')
                        <span class="text-red-700">El nombre de usuario ya está en uso.</span>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-primary mb-2" for="password">
                            Contraseña
                        </label>
                        <input
                            required
                            name="password"
                            id="password"
                            type="password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                        >
                        @error('password')
                        <span class="text-red-700">La contraseña debe contener al menos 6 caracteres.</span>
                        @enderror
                        @error('password_confirmation')
                        <span class="text-red-700">Las contraseñas no coinciden.</span>
                        @enderror
                    </div>
                    <div id="confirmPasswordField">
                        <label class="block text-sm font-medium text-primary mb-2" for="password_confirmation">
                            Confirmar contraseña
                        </label>
                        <input
                            required
                            name="password_confirmation"
                            id="password_confirmation"
                            type="password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-colors"
                        >
                    </div>

                    <div id="registerExtras">
                        <label class="flex items-start cursor-pointer">
                            <input type="checkbox" class="mt-1 rounded border-gray-300 text-primary focus:ring-primary"
                                   required name="accept_policy" id="accept_policy">
                            <span class="ml-2 text-sm text-gray-600">
                                    Acepto los <a href="#" class="text-primary hover:underline">términos de servicio</a>
                                    y la <a href="#" class="text-primary hover:underline">política de privacidad</a>
                                </span>
                        </label>
                        @error('accept_policy')
                        <span class="text-red-700">Debe aceptar los términos y condiciones.</span>
                        @enderror
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-primary text-white py-3 px-4 rounded-lg font-medium hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-colors cursor-pointer"
                        id="submitRegisterBtn"
                    >
                        Registrarse
                    </button>
                </form>
                <div class="mt-6 text-center">
                    <p class="text-gray-600">
                        <span id="toggleText">¿No tienes cuenta?</span>
                        <button
                            id="toggleBtn"
                            class="text-primary font-medium hover:underline cursor-pointer ml-1"
                        >
                            Crear cuenta
                        </button>
                    </p>
                </div>

                {{--                <div class="mt-8">--}}
                {{--                    <div class="relative">--}}
                {{--                        <div class="absolute inset-0 flex items-center">--}}
                {{--                            <div class="w-full border-t border-gray-300"></div>--}}
                {{--                        </div>--}}
                {{--                        <div class="relative flex justify-center text-sm">--}}
                {{--                            <span class="px-2 bg-white text-gray-500">O continúa con</span>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}

                {{--                    <div class="mt-6 grid grid-cols-2 gap-3">--}}
                {{--                        <button--}}
                {{--                            class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors">--}}
                {{--                            <svg class="w-5 h-5" viewBox="0 0 24 24">--}}
                {{--                                <path fill="currentColor"--}}
                {{--                                      d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>--}}
                {{--                                <path fill="currentColor"--}}
                {{--                                      d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>--}}
                {{--                                <path fill="currentColor"--}}
                {{--                                      d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>--}}
                {{--                                <path fill="currentColor"--}}
                {{--                                      d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>--}}
                {{--                            </svg>--}}
                {{--                            <span class="ml-2">Google</span>--}}
                {{--                        </button>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </main>

    @vite('resources/js/auth.js')

</x-layout>

