<div id="check-modal-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>


<div id="check-main-modal" class="main-modal hidden fixed inset-0 z-50 flex items-center justify-center">
    <div class="modal-container w-full py-2 bg-white cursor-default pointer-events-auto relative rounded-xl mx-auto max-w-sm border-x-8   border-gray-700">
        <div class="modal-close cursor-pointer z-50">
            <button type="button" class="absolute top-2 right-2 rtl:right-auto rtl:left-2" onclick="closeCheckModal()">
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
                <h2 class="text-xl font-bold tracking-tight" id="page-action.heading">Asignar Categorias</h2>
            </div>
        </div>

        <div class="space-y-2">
            <div aria-hidden="true" class="border-t border-gray-700 px-2"></div>

            <div class="grid grid-cols-1  px-4 py-2">
                <!-- Formulario para mostrar las categorías con checkboxes -->
                <form action="{{ route('areas.asignarCategorias') }}" method="POST" id="form-asignar-categorias">
                    @csrf
                    <input type="hidden" name="id_area" id="id_area">
                    <div id="check-modal-content">
                        <!-- Aquí se llenarán los checkboxes dinámicamente -->
                    </div>
                    <div aria-hidden="true" class="border-t border-gray-700 px-2"></div>
                    <div class="flex items-center justify-center mt-3">
                        <x-add-button>
                            Asignar Categorias
                        </x-add-button>
                    </div>

                </form>
                
            </div>
            
                
            
            
        </div>
    </div>
</div>


<script>
    const checkModal = document.getElementById('check-main-modal');
    const checkOverlay = document.getElementById('check-modal-overlay');
    
    

    // Función para abrir el modal y cargar los datos
    function openCheckModal(button) {
    const areaId = button.getAttribute('data-id');

    // Realizar una solicitud AJAX para obtener las categorías asignadas
    fetch(`/areas/${areaId}/categorias`)
        .then(response => response.json())
        .then(data => {
            const modalContent = document.getElementById('check-modal-content');
            modalContent.innerHTML = ''; // Limpiar contenido previo

            data.todasCategorias.forEach(categoria => {
                const isChecked = data.categoriasAsignadas.includes(categoria.id_categoria);

                modalContent.innerHTML += `
                    <label class="flex py-2 text-gray-700">
                        <input type="checkbox" name="categorias[]" value="${categoria.id_categoria}" class="form-checkbox h-5 w-5 text-indigo-600" ${isChecked ? 'checked' : ''}>
                        <span class="ml-2 text-gray-700">${categoria.nombre_categoria}</span>
                    </label>
                `;
            });

            document.getElementById('id_area').value = areaId;

            checkModal.classList.remove('hidden');
            checkOverlay.classList.remove('hidden');
        });
}




    const closeCheckModal = () => {
        checkModal.classList.add('hidden');
        checkOverlay.classList.add('hidden');
    }

    window.onclick = function(event) {
        if (event.target === checkOverlay) {
            closeCheckModal();
        }
    }
</script>