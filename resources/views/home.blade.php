<x-layout>
    <x-slot:title>Home</x-slot:title>
    <main class="bg-primary text-white min-h-screen flex flex-col items-center py-10 px-4">
        <!-- Header -->
        <h1 class="text-4xl font-bold mb-10">{{$userName}}</h1>

        <!-- Top Grid -->
        <div class="grid md:grid-cols-3 gap-6 w-full max-w-6xl">

            <!-- Stats -->
            <div class="bg-secondary text-black p-6 rounded-2xl shadow-lg text-center">
                <h2 class="text-lg font-semibold mb-4">Estadísticas del perfil</h2>
                <div class="grid grid-cols-3 gap-4 text-sm font-medium">
                    <div><p class="text-xl font-bold">3</p>
                        <p>Jugando</p></div>
                    <div><p class="text-xl font-bold">41</p>
                        <p>Jugados</p></div>
                    <div><p class="text-xl font-bold">64</p>
                        <p>Backlog</p></div>
                    <div><p class="text-xl font-bold">22</p>
                        <p>Wishlist</p></div>
                    <div><p class="text-xl font-bold">4</p>
                        <p>Abandonados</p></div>
                    <div><p class="text-xl font-bold">37</p>
                        <p>Completados</p></div>
                </div>
            </div>

            <!-- Ratings -->
            <div class="bg-secondary text-black p-6 rounded-2xl shadow-lg text-center">
                <h2 class="text-lg font-semibold mb-4">Tus puntajes</h2>
                <!-- Placeholder de gráfico -->
                <canvas
                    class="chartjs"
                    data-type="bar"
                    data-labels='{{$chartLabel}}'
                    data-datasets='{{$chartsDataSets}}'
                    data-options='{{$chartsOptions}}'
                    height="200"
                ></canvas>
            </div>

            <!-- Quick log -->
            <div class="bg-secondary text-black p-6 rounded-2xl shadow-lg">
                <h2 class="text-lg font-semibold mb-4 text-center">Log rápido</h2>
                <form class="space-y-3">
                    <input type="text" placeholder="Juego" name="game" id="quick_game" class="w-full p-2 rounded bg-white border text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <select class="w-full p-2 rounded bg-white border text-sm">
                        <option>Plataforma</option>
                    </select>
                    <select class="w-full p-2 rounded bg-white border text-sm">
                        <option>Estado</option>
                    </select>
                    <input type="number" min="1" max="100" step="1" class="w-full p-2 rounded bg-white border text-sm text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Puntaje"/>
                    <button
                        class="w-full bg-[#D99111] hover:bg-[#c77f0f] text-white py-2 rounded font-semibold transition">
                        Log game
                    </button>
                </form>
            </div>
        </div>

        <!-- Most logged -->
        <h2 class="text-2xl font-bold mt-16 mb-6">Más loggeados</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6 w-full max-w-6xl">
            <!-- Repetí esto para cada juego -->
            <div
                class="bg-secondary text-black h-72 flex items-center justify-center rounded-2xl shadow-md text-sm font-semibold p-2">
                <img src="{{asset('gamecovertest/tombraider.jpg')}}" alt="watch dogs" class="w-full h-full object-contain" />
            </div>
            <div
                class="bg-secondary text-black h-72 flex items-center justify-center rounded-2xl shadow-md text-sm font-semibold p-2">
                <img src="{{asset('gamecovertest/deadspace.jpg')}}" alt="watch dogs" class="w-full h-full object-contain" />
            </div>
            <div
                class="bg-secondary text-black h-72 flex items-center justify-center rounded-2xl shadow-md text-sm font-semibold p-2">
                <img src="{{asset('gamecovertest/crisis.jpg')}}" alt="watch dogs" class="w-full h-full object-contain" />
            </div>
            <div
                class="bg-secondary text-black h-72 flex items-center justify-center rounded-2xl shadow-md text-sm font-semibold p-2">
                <img src="{{asset('gamecovertest/watch-dogs-ubisoft-cover-art.jpg')}}" alt="watch dogs" class="w-full h-full object-contain" />
            </div>
        </div>
    </main>
    @vite('resources/js/home.js')
</x-layout>
