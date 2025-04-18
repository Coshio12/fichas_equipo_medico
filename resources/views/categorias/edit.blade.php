<div id="edit-modal-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

<!-- Modal -->
<div id="edit-main-modal" class="main-modal hidden fixed inset-0 z-50 flex items-center justify-center">
    <div class="modal-container w-full py-2 bg-white cursor-default pointer-events-auto relative rounded-xl mx-auto max-w-sm border-x-8 border-gray-700">
        <div class="modal-close cursor-pointer z-50">
            <button type="button" class="absolute top-2 right-2 rtl:right-auto rtl:left-2" onclick="closeEditModal()">
                <svg class="h-4 w-4 hover:rotate-180 transition-all ease-in-out duration-500 cursor-pointer text-gray-400"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close</span>
            </button>
        </div>
        <div class="space-y-2 p-2">
            <div class="p-2 space-y-2 text-center">
                <h2 class="text-xl font-bold tracking-tight" id="page-action.heading">Actualizar Categoría</h2>
            </div>
        </div>

        <div class="space-y-2">
            <div aria-hidden="true" class="border-t border-gray-700 px-2"></div>

            <div class="grid grid-cols-1 place-items-center px-4 py-2">
                <!-- Formulario para editar categoría -->
                <form id="edit-form" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT') <!-- Este método se usa para indicar que es una actualización -->

                    <div>
                        <label for="nombre" class="mb-2 text-gray-400 text-lg">Nombre de la Categoría 
                            <span class="text-red-600 inline-block p-1 text-sm">*</span>
                        </label>
                        <!-- Input de nombre de la categoría, se llenará dinámicamente -->
                        <input
                            id="edit-nombre-categoria"
                            name="nombre_categoria"
                            class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg w-full"
                            type="text"
                            placeholder="Nombre de la Categoría"
                            required
                        />
                    </div>

                    <div aria-hidden="true" class="border-b border-gray-700 px-2"></div>

                    <div class="px-6 py-2">
                        <div class="grid gap-2 grid-cols-[repeat(auto-fit,minmax(0,1fr))]">
                            
                            <x-cancel-button onclick="closeEditModal()">
                                Cancelar
                            </x-cancel-button>
                            <x-add-button>
                                Actualizar
                            </x-add-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const editModal = document.getElementById('edit-main-modal');
    const editOverlay = document.getElementById('edit-modal-overlay');
    const editForm = document.getElementById('edit-form');
    const inputEditNombre = document.getElementById('edit-nombre-categoria');

    // Función para abrir el modal y cargar los datos
    const openEditModal = (button) => {
        const id = button.getAttribute('data-id');
        const nombre = button.getAttribute('data-nombre');

        // Asignar el valor del nombre al input
        inputEditNombre.value = nombre;

        // Cambiar la acción del formulario para que apunte a la ruta de actualización correcta
        editForm.action = `/categorias/${id}`;

        // Mostrar el modal
        editModal.classList.remove('hidden');
        editOverlay.classList.remove('hidden');
    }

    const closeEditModal = () => {
        editModal.classList.add('hidden');
        editOverlay.classList.add('hidden');
    }

    window.onclick = function(event) {
        if (event.target === editOverlay) {
            closeEditModal();
        }
    }
</script>
