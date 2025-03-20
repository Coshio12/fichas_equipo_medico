<div id="edit-modal-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

<!-- Modal -->
<div id="edit-main-modal" class="main-modal hidden fixed inset-0 z-50 flex items-center justify-center">
    <div class="modal-container w-full py-2 bg-white cursor-default pointer-events-auto relative rounded-xl mx-auto max-w-sm border-x-8 border-gray-700">
        <div class="modal-close cursor-pointer z-50">
            <button type="button" class="absolute top-2 right-2 rtl:right-auto rtl:left-2" onclick="closeEditModal()">
                <svg class="h-4 w-4 hover:rotate-180 transition-all ease-in-out duration-500 cursor-pointer text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close</span>
            </button>
        </div>
        <div class="space-y-2 p-2">
            <div class="p-2 space-y-2 text-center">
                <h2 class="text-xl font-bold tracking-tight">Actualizar Accesorio</h2>
            </div>
        </div>

        <div class="space-y-2">
            <div aria-hidden="true" class="border-t border-gray-700 px-2"></div>

            <div class="grid grid-cols-1 place-items-center px-4 py-2">
                <!-- Formulario para editar accesorio -->
                <form id="edit-form" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT') <!-- Este método se usa para indicar que es una actualización -->

                    <div>
                        <label for="nombre_accesorio" class="mb-2 text-gray-400 text-lg">Nombre del Accesorio
                            <span class="text-red-600 inline-block p-1 text-sm">*</span>
                        </label>
                        <input
                            id="edit-nombre-accesorio"
                            name="nombre_accesorio"
                            class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg w-full"
                            type="text"
                            placeholder="Nombre del Accesorio"
                            required
                        />

                        <label for="feature" class="mb-2 text-gray-400 text-lg mt-3">Imagen del Accesorio</label>
                        <input
                            id="edit-feature"
                            name="feature"
                            class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg w-full mb-2"
                            type="file"
                            accept="image/*"
                        />

                        <!-- Vista previa de la imagen -->
                        <img id="image-preview" src="" alt="Vista previa de la imagen" class="mt-3 max-h-48 rounded-md border" />

                        <div class="mt-5">
                            <label for="descripcion_accesorio" class="mb-2 text-gray-400 text-lg">DESCRIPCION DEL ACCESORIO <span class="text-red-600">*</span></label>
                            <textarea id="edit-descripcion" name="descripcion_accesorio" rows="4" cols="50"
                            class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg flex w-full"
                            placeholder="Descripcion del Accesorio"></textarea>
    
                        </div>
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
    const editNombreAccesorio = document.getElementById('edit-nombre-accesorio');
    const editFeature = document.getElementById('edit-feature');
    const editDes = document.getElementById('edit-descripcion');
    const imagePreview = document.getElementById('image-preview');

    const openEditModal = (button) => {
        // Obtén los datos desde los atributos del botón
        const equipoId = "{{ $equipo->id_equipo }}"; // Asegúrate de tener esta variable en el contexto de tu plantilla
        const accesorioId = button.getAttribute('data-id');
        const nombreAccesorio = button.getAttribute('data-nombre');
        const feature = button.getAttribute('data-feature'); // URL de la imagen
        const desc = button.getAttribute('data-accessorio');

        // Asigna los valores al formulario
        editNombreAccesorio.value = nombreAccesorio;
        editDes.value = desc;

        // Actualiza la vista previa de la imagen si existe una
        if (feature) {
            imagePreview.src = feature;
            imagePreview.alt = `Vista previa de ${nombreAccesorio}`;
            imagePreview.classList.remove('hidden');
        } else {
            imagePreview.src = '';
            imagePreview.alt = '';
            imagePreview.classList.add('hidden');
        }

        // Actualiza la acción del formulario para enviar la solicitud correcta
        editForm.action = `/equipos/${equipoId}/accesorios/update/${accesorioId}`;

        // Muestra el modal y el overlay
        editModal.classList.remove('hidden');
        editOverlay.classList.remove('hidden');
    };

    const closeEditModal = () => {
        // Oculta el modal y el overlay
        editModal.classList.add('hidden');
        editOverlay.classList.add('hidden');

        // Limpia el formulario (si es necesario)
        editForm.reset();
        imagePreview.src = '';
        imagePreview.alt = '';
        imagePreview.classList.add('hidden');
    };
</script>
