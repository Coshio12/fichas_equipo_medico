<div id="delete-modal-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

<div id="deleteModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="bg-white p-6 rounded-lg max-w-lg w-full">
        <span id="closeDeleteModal" class="float-right cursor-pointer" onclick="closeDeleteModal()">&times;</span>
        <h2 class="text-2xl font-semibold text-gray-800" id="modal-title">Confirmar Eliminación</h2>
        <p>¿Estás seguro de que deseas eliminar este registro?</p>
        <div class="mt-4 flex justify-end">
            <button id="confirmDeleteButton" class="w-40 bg-red-500 tracking-wide text-white font-bold rounded border-b-2 border-red-700 hover:border-red-900 hover:bg-red-700 shadow-md py-2 px-6 inline-flex items-center text-center justify-center">Eliminar</button>
            <button type="submit" onclick="closeDeleteModal()" class="w-40 bg-white tracking-wide text-gray-800 font-bold rounded border-b-2 border-gray-500 hover:border-gray-600 hover:bg-gray-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center text-center justify-center">Cancelar</button>
        </div>
    </div>
</div>

<div id="toast-success"
    class="hidden fixed bottom-4 right-4 flex items-center w-full max-w-xs p-4 mb-4 text-white bg-red-600 rounded-lg shadow "
    role="alert">
    <div
        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg ">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ml-3 text-sm font-normal" id="toast-message">Categoría eliminada correctamente.</div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 " onclick="closeToast()">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>
@if (session('success'))
    <script>
        window.onload = function() {
            showToast("{{ session('success') }}");  // Mostrar el mensaje del toast
        }
    </script>
@endif


<script>
    function openDeleteModal(button) {
        const id = button.getAttribute('data-id');
        const deleteButton = document.getElementById('confirmDeleteButton');

        // Asigna el ID al botón de confirmación
        deleteButton.setAttribute('data-id', id);
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
document.getElementById('confirmDeleteButton').addEventListener('click', function() {
    const id = this.getAttribute('data-id');
    const formAction = `/proveedor/${id}`;  // Ruta para eliminar la categoría
    
    fetch(formAction, {
        method: 'DELETE',  // Usamos DELETE en lugar de POST
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'  // CSRF token para seguridad
        }
    })
    .then(response => {
        if (response.ok) {
            closeDeleteModal();
            // Recargar la página para reflejar los cambios
            location.reload();
        } else {
            alert('Hubo un problema al eliminar la categoría');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un problema al eliminar la categoría');
    });
});



function showToast(message) {
    const toast = document.getElementById('toast-success');
    const toastMessage = document.getElementById('toast-message');
    toastMessage.textContent = message;  // Establece el mensaje del toast
    toast.classList.remove('hidden');  // Muestra el toast

    // Oculta el toast automáticamente después de 3 segundos
    setTimeout(function() {
        toast.classList.add('hidden');
    }, 3000);
}


function closeToast() {
    const toast = document.getElementById('toast-success');
    toast.classList.add('hidden');  // Oculta el toast
}

</script>