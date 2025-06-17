<nav class="bg-primary text-white py-3 shadow-lg">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center space-x-3">
            <div class="w-16 h-16 lex items-center justify-center">
                <a href="{{route('home')}}">
                    <img src="{{asset('/static/logo_light.svg')}}" alt="Tabularium">
                </a>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="flex-1 max-w-md">
            <div class="relative">
                <label for="search-bar" class="sr-only">Búsqueda</label>
                <input
                    data-route="{{route('game.find-or-import')}}"
                    id="search-bar"
                    type="text"
                    placeholder="Buscar videojuegos..."
                    class="w-full px-4 py-2 pl-10 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent"
                >
                <svg class="absolute left-3 top-2.5 h-5 w-5 text-white/70" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <div id="search-result" class="absolute left-0 right-0 mt-2 bg-primary border border-secondary/40 text-white rounded-lg shadow-lg z-10 hidden"></div>
            </div>
        </div>


        @auth
            <div>
                <x-main-button>
                    <x-slot:additionalClasses>px-4 py-2</x-slot:additionalClasses>
                    <x-slot:hasIcon></x-slot:hasIcon>
                    <x-slot:data>
                        data-modal-target="create-log-modal"
                        data-modal-toggle="create-log-modal"
                    </x-slot:data>
                    Crear registro
                </x-main-button>
            </div>

            <!-- Profile Icon -->
            <div class="relative" id="userMenuWrapper">
                <!-- Botón -->
                <button id="userMenuButton"
                        class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-white/20 transition-colors cursor-pointer">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </button>

                <!-- Menú desplegable -->
                <div id="userMenuDropdown"
                     class="space-y-3 absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-lg shadow-lg transform opacity-0 scale-95 pointer-events-none transition-all duration-200 origin-top-right z-50">
                    <a href="{{route('profile.index')}}"
                       class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg cursor-pointer transition-colors">Perfil</a>
                    <a href="{{ route('logout') }}"
                       class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg cursor-pointer transition-colors">Cerrar sesión</a>
                </div>
            </div>

        @endauth
        @guest
            <div>
                <a class="font-medium" href="{{route('auth.view')}}">Inciar sesión</a>
            </div>
        @endguest
    </div>
</nav>
