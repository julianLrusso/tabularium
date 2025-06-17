<x-layout>
    <x-slot:title>Perfil</x-slot:title>
    <div class="bg-primary">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header del perfil -->
            <div class="bg-primary text-white rounded-3xl p-8 sm:p-12 mb-8">
                <!-- Header con avatar y info del usuario -->
                <div class="flex flex-col sm:flex-row items-start gap-8 mb-12">
                    <!-- Avatar -->
                    <div class="relative">
                        <div
                            class="w-32 h-32 bg-white/20 rounded-3xl flex items-center justify-center border border-white/20 backdrop-blur-sm shadow-2xl">
                            <svg class="w-16 h-16 text-white/80" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Info del usuario -->
                    <div class="flex-1 space-y-4">
                        <div>
                            <h1 class="text-4xl font-bold text-white mb-2">{{$name}}</h1>
                        </div>
                        <div
                            class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-4 text-white/90 shadow-lg">
                            <p class="text-sm leading-relaxed">{{$bio ?? 'Editar biografía...'}}</p>
                        </div>
                    </div>
                </div>

                <!-- Navegación de pestañas -->
                <div
                    class="bg-white/10 backdrop-blur-md rounded-2xl p-2 inline-flex gap-1 border border-white/20 shadow-lg">
                    <button
                        class="px-6 py-3 text-sm font-medium text-white/70 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 cursor-pointer">
                        Registros
                    </button>
                    <button
                        class="px-6 py-3 text-sm font-medium bg-white text-primary rounded-xl shadow-lg transition-all duration-200">
                        Listas
                    </button>
                    <button
                        class="px-6 py-3 text-sm font-medium text-white/70 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 cursor-pointer">
                        Amigos
                    </button>
                    <button
                        class="px-6 py-3 text-sm font-medium text-white/70 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 cursor-pointer">
                        Wishlist
                    </button>
                    <button
                        class="px-6 py-3 text-sm font-medium text-white/70 hover:bg-white/10 hover:text-white rounded-xl transition-all duration-200 cursor-pointer">
                        Backlog
                    </button>
                </div>
            </div>

            <!-- Contenido principal -->
            <div class="space-y-8 bg-secondary p-8 rounded-3xl sm:p-12 mb-8 shadow-xl">
                <!-- Botón crear lista -->
                <div>
                    <x-main-button>
                        <x-slot:id>create-list</x-slot:id>
                        <x-slot:additionalClasses>px-8 py-4</x-slot:additionalClasses>
                        <x-slot:hasIcon></x-slot:hasIcon>
                        Crear lista nueva
                    </x-main-button>
                </div>

                <!-- Grid de listas -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-6">
                    <!-- Lista 1 -->
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all
                        duration-300 transform hover:-translate-y-2 border border-white/50 cursor-pointer">
                        <div
                            class="h-40 bg-secondary flex items-center justify-center text-slate-500 text-sm relative overflow-hidden">
                            <div
                                class="absolute inset-0 bg-accent/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <span class="relative z-10">Imagen</span>
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-semibold text-slate-900 group-hover:text-accent transition-colors duration-200">
                                Nombre de la lista</h3>
                            <p class="text-xs text-slate-500 mt-1">3 juegos</p>
                        </div>
                    </div>

                    <!-- Lista 2 -->
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300
                        transform hover:-translate-y-2 border border-white/50 cursor-pointer">
                        <div
                            class="h-40 bg-secondary flex items-center justify-center text-slate-500 text-sm relative overflow-hidden">
                            <div
                                class="absolute inset-0 bg-accent/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <span class="relative z-10">Imagen</span>
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-semibold text-slate-900 group-hover:text-accent transition-colors duration-200">
                                Nombre de la lista</h3>
                            <p class="text-xs text-slate-500 mt-1">7 juegos</p>
                        </div>
                    </div>

                    <!-- Lista 3 -->
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all
                        duration-300 transform hover:-translate-y-2 border border-white/50 cursor-pointer">
                        <div
                            class="h-40 bg-secondary flex items-center justify-center text-slate-500 text-sm relative overflow-hidden">
                            <div
                                class="absolute inset-0 bg-accent/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <span class="relative z-10">Imagen</span>
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-semibold text-slate-900 group-hover:text-accent transition-colors duration-200">
                                Nombre de la lista</h3>
                            <p class="text-xs text-slate-500 mt-1">12 juegos</p>
                        </div>
                    </div>

                    <!-- Lista 4 -->
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all
                        duration-300 transform hover:-translate-y-2 border border-white/50 cursor-pointer">
                        <div
                            class="h-40 bg-secondary flex items-center justify-center text-slate-500 text-sm relative overflow-hidden">
                            <div
                                class="absolute inset-0 bg-accent/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <span class="relative z-10">Imagen</span>
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-semibold text-slate-900 group-hover:text-accent transition-colors duration-200">
                                Nombre de la lista</h3>
                            <p class="text-xs text-slate-500 mt-1">5 juegos</p>
                        </div>
                    </div>

                    <!-- Lista 5 -->
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all
                        duration-300 transform hover:-translate-y-2 border border-white/50 cursor-pointer">
                        <div
                            class="h-40 bg-secondary flex items-center justify-center text-slate-500 text-sm relative overflow-hidden">
                            <div
                                class="absolute inset-0 bg-accent/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <span class="relative z-10">Imagen</span>
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-semibold text-slate-900 group-hover:text-accent transition-colors duration-200">
                                Nombre de la lista</h3>
                            <p class="text-xs text-slate-500 mt-1">8 juegos</p>
                        </div>
                    </div>

                    <!-- Lista 6 -->
                    <div
                        class="group bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all
                        duration-300 transform hover:-translate-y-2 border border-white/50 cursor-pointer">
                        <div
                            class="h-40 bg-secondary flex items-center justify-center text-slate-500 text-sm relative overflow-hidden">
                            <div
                                class="absolute inset-0 bg-accent/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <span class="relative z-10">Imagen</span>
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-semibold text-slate-900 group-hover:text-accent transition-colors duration-200">
                                Nombre de la lista</h3>
                            <p class="text-xs text-slate-500 mt-1">15 juegos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
