<div id="delete-modal-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50"></div>

<div id="deleteModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
    const formAction = `/equipos/${id}`;  // Ruta para eliminar la categoría
    
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