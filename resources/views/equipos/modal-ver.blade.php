<div id="info-modal-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

<div id="info-main-modal" class="main-modal hidden fixed inset-0 z-50 flex items-center justify-center">
    <div class="modal-container w-full py-2 bg-white cursor-default pointer-events-auto relative rounded-xl mx-auto max-w-xl border-x-8 border-gray-700">
        <div class="modal-close cursor-pointer z-50">
            <button type="button" class="absolute top-2 right-2 rtl:right-auto rtl:left-2" onclick="closeInfoModal()">
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
                <h2 class="text-3xl font-bold tracking-tight" id="page-action-heading">Información del Equipo</h2>
            </div>
        </div>

        <div class="space-y-2">
            <div aria-hidden="true" class="border-t border-gray-700 px-2"></div>

            <div class="grid grid-cols-1 px-4 py-2">
                <!-- Campos para mostrar la información del equipo -->
                <p class="text-xl"><strong>Nombre: </strong><span id='modal-nombre'></span></p>
                <p class="text-xl"><strong>Activo: </strong> <span id="modal-activo"></span></p>
                <p class="text-xl"><strong>Biomédica: </strong> <span id="modal-biomedica"></span></p>
                <p class="text-xl"><strong>Modelo: </strong> <span id="modal-modelo"></span></p>
                <p class="text-xl"><strong>Serie: </strong> <span id="modal-serie"></span></p>
                <p class="text-xl"><strong>Servicio: </strong> <span id="modal-servicio"></span></p>
                <p class="text-xl"><strong>Dependencia: </strong> <span id="modal-dependencia"></span></p>
                <p class="text-xl"><strong>Marca: </strong> <span id="modal-marca"></span></p>
                <p class="text-xl"><strong>Categoría: </strong> <span id="modal-categoria"></span></p>
                <p class="text-xl"><strong>Empresa Proveedor: </strong> <span id="modal-empresa"></span></p>
                <p class="text-xl"><strong>Encargado Proveedor: </strong> <span id="modal-proveedor"></span></p>
                <p class="text-xl"><strong>Fecha Adquisicion: </strong> <span id="modal-adqui"></span></p>
                <p class="text-xl"><strong>Fecha Funcionamiento: </strong> <span id="modal-fun"></span></p>
                <p class="text-xl"><strong>Frecuencia Uso: </strong> <span id="modal-uso"></span></p>
                <p class="text-xl"><strong>Frecuencia Mantenimiento: </strong> <span id="modal-man"></span></p>
                <p class="text-xl"><strong>Estado del Equipo: </strong> <span id="modal-estado"></span></p>
                <p class="text-xl"><strong>Garantia del Equipo: </strong> <span id="modal-garantia"></span></p>
                <p class="text-xl"><strong>Descripción: </strong> <span id="modal-descripcion"></span></p>
                <p class="text-xl"><strong>Observaciones: </strong> <span id="modal-obs"></span></p>

            </div>
        </div>
    </div>
</div>

<script>
    const infoModal = document.getElementById('info-main-modal');
    const infoOverlay = document.getElementById('info-modal-overlay');
    
    const openInfoModal = (button) => {
        // Obtener los atributos `data-*` del botón
        const id = button.getAttribute('data-id');
        const nombre = button.getAttribute('data-nombre');
        const activo = button.getAttribute('data-activo');
        const biomedica = button.getAttribute('data-biomedica');
        const modelo = button.getAttribute('data-modelo');
        const serie = button.getAttribute('data-serie');
        const servicio = button.getAttribute('data-servicio');
        const dependencia = button.getAttribute('data-dependencia');
        const marca = button.getAttribute('data-marca');
        const categoria = button.getAttribute('data-categoria');
        const proveedor = button.getAttribute('data-proveedor');
        const empresa = button.getAttribute('data-empresa');
        const descripcion = button.getAttribute('data-descripcion');
        const adquisicion = button.getAttribute('data-adqui');
        const funcionamiento = button.getAttribute('data-func');
        const uso = button.getAttribute('data-uso');
        const mantenimiento = button.getAttribute('data-mante');
        const estado = button.getAttribute('data-estado');
        const garantia = button.getAttribute('data-garantia');
        const obs = button.getAttribute('data-obs');

        // Asignar los valores a los elementos del modal
        document.getElementById('modal-activo').textContent = activo;
        document.getElementById('modal-nombre').textContent = nombre;
        document.getElementById('modal-biomedica').textContent = biomedica;
        document.getElementById('modal-modelo').textContent = modelo;
        document.getElementById('modal-serie').textContent = serie;
        document.getElementById('modal-servicio').textContent = servicio;
        document.getElementById('modal-dependencia').textContent = dependencia;
        document.getElementById('modal-marca').textContent = marca;
        document.getElementById('modal-categoria').textContent = categoria;
        document.getElementById('modal-proveedor').textContent = proveedor;
        document.getElementById('modal-empresa').textContent = empresa;
        document.getElementById('modal-descripcion').textContent = descripcion;
        document.getElementById('modal-adqui').textContent = adquisicion;
        document.getElementById('modal-fun').textContent = funcionamiento;
        document.getElementById('modal-uso').textContent = uso;
        document.getElementById('modal-man').textContent = mantenimiento;
        document.getElementById('modal-estado').textContent = estado;
        document.getElementById('modal-garantia').textContent = garantia;
        document.getElementById('modal-obs').textContent = obs;

        // Mostrar el modal
        infoModal.classList.remove('hidden');
        infoOverlay.classList.remove('hidden');
    }

    const closeInfoModal = () => {
        infoModal.classList.add('hidden');
        infoOverlay.classList.add('hidden');
    }

    // Cerrar el modal si se hace clic fuera de él
    window.onclick = function(event) {
        if (event.target === infoOverlay) {
            closeInfoModal();
        }
    }
</script>
