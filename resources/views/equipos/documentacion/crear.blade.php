<div class="px-8 mb-5 ml-10 inline-flex space-x-4">
    <x-add-button onclick="openModal()">
        Agregar Documentacion
    </x-add-button>

    <a href="{{route('equipos.index')}}" class="hover:text-white text-white px-6 py-2 min-w-[120px] text-center bg-[#0C969C] border border-[#268085] rounded active:text-violet-500 hover:bg-[#4cc0dd] focus:outline-none focus:ring inline-flex justify-center items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 48 48">
            <path fill="currentColor" fill-rule="evenodd" stroke="currentColor" stroke-linejoin="round" stroke-width="4" d="M44 40.836q-7.34-8.96-13.036-10.168t-10.846-.365V41L4 23.545L20.118 7v10.167q9.523.075 16.192 6.833q6.668 6.758 7.69 16.836Z" clip-rule="evenodd"/>
        </svg>
        <span>Volver Página Anterior</span>
        
    </a>

    <div id="modal-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

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
                    <h2 class="text-xl font-bold tracking-tight" id="page-action.heading">Agregar Documentacion</h2>
                </div>
            </div>
    
            <div class="space-y-1">
                <div aria-hidden="true" class="border-t border-gray-700 px-2"></div>
    
                <div class="grid grid-cols-1 place-items-center px-4 py-2">
                    <form action="{{ route('equipos.documentacion.store', ['id_equipo' => $equipo->id_equipo]) }}" method="POST" enctype="multipart/form-data" class="space-y-2">
                        @csrf
                        <div>
                            <label for="nombre_documento" class="mb-2 text-gray-400 text-lg">NOMBRE DEL DOCUMENTO
                                <span class="text-red-600 inline-block p-1 text-sm">*</span>
                            </label>
                            <input
                                id="nombre_documento"
                                name="nombre_documento"
                                class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg w-full mb-5"
                                type="text"
                                placeholder="Nombre documento"
                                required
                            />

                            <label for="tipo_documento" class="mb-2 text-gray-400 text-lg mt-4">TIPO DOCUMENTO <span class="text-red-600">*</span></label>
                            <select name="tipo_documento" class="relative w-full bg-white border border-gray-800 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-12 text-lg mb-5">
                                <option value="" class="text-lg">Seleccionar Tipo Documento</option>
                                    <option class="text-lg" value="MANUAL DE OPERACION">Manual de Operacion</option>
                                    <option class="text-lg" value="MANUAL TECNICO">Manual Tecnico</option>
                                    <option class="text-lg" value="OTROS">Otros</option>
                            </select>
    
    
                            <label for="feature_pdf" class="mb-5 text-gray-400 text-lg mt-4 ">PDF DEL DOCUMENTO <span class="text-red-600">*</span></label>
                            <input 
                                type="file"
                                id="feature_pdf"
                                name="feature_pdf"
                                class="border p-3 shadow-md border-gray-700 rounded-lg w-full mb-3"
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
</div>

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