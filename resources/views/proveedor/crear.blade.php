<div class="px-8">
     <x-add-button onclick="openModal()">
        Agregar Proveedor
     </x-add-button>

     
</div>



<!-- Modal Overlay -->
<div id="modal-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

<!-- Modal -->
<div id="main-modal" class="main-modal hidden fixed inset-0 z-50 flex items-center justify-center">
    <div class="modal-container w-full py-2 bg-white cursor-default pointer-events-auto relative rounded-xl mx-auto max-w-sm border-x-8   border-gray-700">
        <div class="modal-close cursor-pointer z-50">
            <button type="button" class="absolute top-2 right-2 rtl:right-auto rtl:left-2" onclick="closeModal()">
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
                <h2 class="text-xl font-bold tracking-tight" id="page-action.heading">AGREGAR PROVEEDOR</h2>
            </div>
        </div>

        <div class="space-y-1">
            <div aria-hidden="true" class="border-t border-gray-700 px-2"></div>

            <div class="grid grid-cols-1 place-items-center px-4 py-2">
                <form action="{{ route('proveedor.store') }}"  method="POST" class="space-y-2">
                    @csrf
                    <div>
                        <label for="nombre_proveedor" class="mb-2 text-gray-400 text-lg">NOMBRE DEL PROVEEDOR
                            <span class="text-red-600 inline-block p-1 text-sm">*</span>
                        </label>
                        <input
                            id="nombre_proveedor"
                            name="nombre_proveedor"
                            class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg w-full mb-2"
                            type="text"
                            placeholder="Nombre del Proveedor"
                            required
                        />
                        <label for="nombre_empresa" class="mb-2 text-gray-400 text-lg">NOMBRE DE LA EMPRESA
                            <span class="text-red-600 inline-block p-1 text-sm">*</span>
                        </label>
                        <input
                            id="nombre_empresa"
                            name="nombre_empresa"
                            class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg w-full mb-2"
                            type="text"
                            placeholder="Nombre de la Empresa"
                            required
                        />

                        <label for="direccion_proveedor" class="mb-2 text-gray-400 text-lg mt-3">DIRECCION DEL PROVEEDOR
                            <span class="text-red-600 inline-block p-1 text-sm">*</span>
                        </label>
                        <input 
                            id="direccion_proveedor"
                            name="direccion_proveedor"
                            class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg w-full mb-2"
                            type="text"
                            placeholder="Direccion del Proveedor"
                            required
                        />

                        <label for="contacto_proveedor" class="mb-2 text-gray-400 text-lg mt-3">CONTACTO DEL PROVEEDOR
                            <span class="text-red-600 inline-block p-1 text-sm">*</span>
                        </label>
                        <input 
                            id="contacto_proveedor"
                            name="contacto_proveedor"
                            class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg w-full mb-2" 
                            type="tel"
                            placeholder="Contacto del Proveedor"
                            required
                        />

                        <label for="email_proveedor" class="mb-2 text-gray-400 text-lg mt-3">CORREO DEL PROVEEDOR
                            <span class="text-red-600 inline-block p-1 text-sm">*</span>
                        </label>
                        <input 
                            id="email_proveedor"
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
                            <x-cancel-button onclick="closeModal()">
                                Cancelar
                            </x-cancel-button>
                            <x-add-button>
                                Guardar
                            </x-add-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Toast de éxito -->
@if (session('success'))
    <div id="toast-success"
         class="flex items-center w-full max-w-xs p-4 mb-4 text-white bg-green-600 rounded-lg shadow fixed bottom-5 right-5"
         role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-white bg-green-600 rounded-lg ">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close" onclick="document.getElementById('toast-success').remove();">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>

    <script>
        setTimeout(() => {
            document.getElementById('toast-success').remove();
        }, 3000);
    </script>
@endif


<script>
    const modal = document.getElementById('main-modal');
    const overlay = document.getElementById('modal-overlay');

    const openModal = () => {
        modal.classList.remove('hidden');
        overlay.classList.remove('hidden');
    }

    const closeModal = () => {
        modal.classList.add('hidden');
        overlay.classList.add('hidden');
    }

    window.onclick = function(event) {
        if (event.target === overlay) {
            closeModal();
        }
    }
</script>