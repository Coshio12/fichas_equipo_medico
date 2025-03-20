<div id="edit-modal-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

<!-- Modal -->
<div id="edit-main-modal" class="main-modal hidden fixed inset-0 z-50 flex items-center justify-center">
    <div class="modal-container w-full py-2 bg-white cursor-default pointer-events-auto relative rounded-xl mx-auto max-w-sm border-x-8   border-gray-700">
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
                <h2 class="text-xl font-bold tracking-tight" id="page-action.heading">Actualizar Proveedor</h2>
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
                        <label for="nombre_proveedor" class="mb-2 text-gray-400 text-lg">Nombre del Proveedor
                            <span class="text-red-600 inline-block p-1 text-sm">*</span>
                        </label>
                        <!-- Input de nombre de la categoría, se llenará dinámicamente -->
                        <input
                            id="edit-nombre-proveedor"
                            name="nombre_proveedor"
                            class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg w-full"
                            type="text"
                            placeholder="Nombre del Proveedor"
                            required
                        />

                        <label for="nombre_empresa" class="mb-2 text-gray-400 text-lg">Nombre de la Empresa
                            <span class="text-red-600 inline-block p-1 text-sm">*</span>
                        </label>
                        <!-- Input de nombre de la categoría, se llenará dinámicamente -->
                        <input
                            id="edit-nombre-empresa"
                            name="nombre_empresa"
                            class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg w-full"
                            type="text"
                            placeholder="Nombre de la Empresa"
                            required
                        />

                        <label for="direccion_proveedor" class="mb-2 text-gray-400 text-lg mt-3">Direccion del Proveedor
                            <span class="text-red-600 inline-block p-1 text-sm">*</span>
                        </label>
                        <input 
                            id="edit-direccion-proveedor"
                            name="direccion_proveedor"
                            class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg w-full mb-2"
                            type="text"
                            placeholder="Direccion del Proveedor"
                            required
                        />

                        <label for="contacto_proveedor" class="mb-2 text-gray-400 text-lg mt-3">Contacto del Proveedor
                            <span class="text-red-600 inline-block p-1 text-sm">*</span>
                        </label>
                        <input 
                            id="edit-contacto-proveedor"
                            name="contacto_proveedor"
                            class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg w-full mb-2" 
                            type="tel"
                            placeholder="Contacto del Proveedor"
                            required
                        />

                        <label for="email_proveedor" class="mb-2 text-gray-400 text-lg mt-3">Correo del Proveedor
                            <span class="text-red-600 inline-block p-1 text-sm">*</span>
                        </label>
                        <input 
                            id="edit-email-proveedor"
                            name="email_proveedor"
                            class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg w-full mb-2" 
                            type="email"
                            placeholder="Correo del Proveedor"
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
                                Acutalizar
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
    const EditProveedor = document.getElementById('edit-nombre-proveedor');
    const EditDireccion = document.getElementById('edit-direccion-proveedor');
    const EditContacto = document.getElementById('edit-contacto-proveedor');
    const EditEmail = document.getElementById('edit-email-proveedor');
    const EditEmpresa = document.getElementById('edit-nombre-empresa');

    // Función para abrir el modal y cargar los datos
    const openEditModal = (button) => {
        const id = button.getAttribute('data-id');
        const proveedor = button.getAttribute('data-proveedor');
        const direccion = button.getAttribute('data-direccion');
        const contacto = button.getAttribute('data-contacto');
        const email = button.getAttribute('data-email');
        const empresa = button.getAttribute('data-empresa');

        // Asignar el valor del nombre al input
        EditProveedor.value = proveedor;
        EditDireccion.value = direccion;
        EditContacto.value = contacto;
        EditEmail.value = email;
        EditEmpresa.value = empresa;

        // Cambiar la acción del formulario para que apunte a la ruta de actualización correcta
        editForm.action = `/proveedor/${id}`;

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
