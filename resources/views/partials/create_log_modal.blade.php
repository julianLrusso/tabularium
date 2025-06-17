<!-- Main modal -->
<div id="create-log-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-primary">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-secondary border-primary">
                <h3 class="text-lg font-semibold text-primary dark:text-secondary">
                    Crear nuevo registro
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="create-log-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Cerrar modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="" method="POST" class="p-4 md:p-5 space-y-4">
                    @csrf

                    <!-- Juego -->
                    <div>
                        <label for="add_log_modal_game_name"
                               class="block text-sm font-medium text-secondary">Juego <span class="text-red-300">*</span></label>
                        <input name="add_log_modal_game_name" id="add_log_modal_game_name" type="text" data-route="{{route('game.find-or-import')}}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"/>
                        <input type="hidden" name="add_log_modal_game_id" id="add_log_modal_game_id">
                        <div id="create_log_result" class="absolute left-0 right-0 mt-2 bg-primary border border-secondary/40 text-white rounded-lg shadow-lg z-10 hidden"></div>
                    </div>

                    <!-- Estado -->
                    <div>
                        <label for="add_log_modal_status_id"
                               class="block text-sm font-medium text-secondary">Estado <span class="text-red-300">*</span></label>
                        <select name="add_log_modal_status_id" id="add_log_modal_status_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach ($logStatuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                        </select>
                    </div>

                    <!-- Fechas -->
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <label for="add_log_modal_started_at" class="block text-sm font-medium text-secondary">Fecha
                                de inicio</label>
                            <input type="date" name="add_log_modal_started_at" id="add_log_modal_started_at"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="flex-1">
                            <label for="add_log_modal_finished_at" class="block text-sm font-medium text-secondary">Fecha
                                de finalización</label>
                            <input type="date" name="add_log_modal_finished_at" id="add_log_modal_finished_at"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                    </div>

                    <!-- Nota -->
                    <div>
                        <label for="add_log_modal_note" class="block text-sm font-medium text-secondary">Nota</label>
                        <textarea name="add_log_modal_note" id="add_log_modal_note" rows="3"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>

                    <!-- Puntaje, Plataforma, Horas jugadas -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="add_log_modal_score"
                                   class="block text-sm font-medium text-secondary">Puntaje</label>
                            <input type="number" name="add_log_modal_score" id="add_log_modal_score" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" step="1" min="1"
                                   max="100">
                        </div>
                        <div>
                            <label for="add_log_modal_platform" class="block text-sm font-medium text-secondary">Plataforma <span class="text-red-300">*</span></label>
                            <select name="add_log_modal_platform" id="add_log_modal_platform"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            </select>
                        </div>
                        <div>
                            <label for="add_log_modal_spent_hours" class="block text-sm font-medium text-secondary">Horas
                                jugadas</label>
                            <input type="number" name="add_log_modal_spent_hours" id="add_log_modal_spent_hours"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                    </div>

                    <!-- Botón de envío -->
                    <div class="text-right">
                        <x-main-button>
                            <x-slot:id>modal_create_log_button</x-slot:id>
                            <x-slot:additionalClasses>px-4 py-3</x-slot:additionalClasses>
                            <x-slot:hasIcon></x-slot:hasIcon>
                            <x-slot:data>type="submit"</x-slot:data>
                            Guardar registro
                        </x-main-button>
                    </div>
            </form>

        </div>
    </div>
</div>
