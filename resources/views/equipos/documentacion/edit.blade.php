<div id="edit-modal-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>
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
                <form id="edit-form"  method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT') <!-- Este método se usa para indicar que es una actualización -->

                    <div>
                        <label for="nombre_documento" class="mb-2 text-gray-400 text-lg">NOMBRE DEL DOCUMENTO
                            <span class="text-red-600 inline-block p-1 text-sm">*</span>
                        </label>
                        <input
                            id="edit-nombre-documento"
                            name="nombre_documento"
                            class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg w-full"
                            type="text"
                            placeholder="Nombre del documento"
                            required
                        />

                        <label for="tipo_documento" class="mb-2 text-gray-400 text-lg">TIPO DEL DOCUMENTO<span class="text-red-600 inline-block p-1 text-sm">*</span>
                        </label>
                        <select name="tipo_documento" id="edit-tipo-documento" class="relative w-full bg-white border border-gray-800 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-12 text-lg mb-5">
                            <option value="" class="text-lg">Seleccionar Tipo Documento</option>
                                <option class="text-lg" value="MANUAL DE OPERACION">Manual de Operacion</option>
                                <option class="text-lg" value="MANUAL TECNICO">Manual Tecnico</option>
                                <option class="text-lg" value="OTROS">Otros</option>
                        </select>

                        <label class="text-gray-600">Imagen:</label>
                            <input type="file" name="feature_pdf" class="w-full px-4 py-2 border rounded-lg" id="edit-pdf">
                            

                        
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

    const editNombre = document.getElementById('edit-nombre-documento');
    const editTipo = document.getElementById('edit-tipo-documento');
    const editPdf = document.getElementById('edit-pdf');

    const openEditModal = (button) => {
        const id_equipo = "{{$equipo->id_equipo}}";
        const id_documentacion = button.getAttribute('data-id');
        const nombre = button.getAttribute('data-nombre');
        const tipo = button.getAttribute('data-tipo');
        const pdf = button.getAttribute('data-pdf');

        editNombre.value = nombre;
        editTipo.value = tipo;
        

        // Generar la URL correctamente
        editForm.action = `/equipos/${id_equipo}/documentacion/update/${id_documentacion}`;


        // Mostrar el modal
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