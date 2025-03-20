<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-center">
            {{ __('DASHBOARD') }}
        </h2>
    </x-slot>

    <div class="bg-whitew-full max-h-full rounded-3xl pl-6 pt-6 pb-10">
        <!-- Contenedor de las Tarjetas -->
        <div class="grid grid-cols-1 gap-4 px-4 mt-8 sm:grid-cols-4 sm:px-8 ">
            <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow border-gray-900">
                <div class="p-4 bg-green-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="3rem" height="3rem" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-width="4"><path stroke-linecap="round" stroke-linejoin="round" d="M23 42H9a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h28a2 2 0 0 1 2 2v11.5"/><path stroke-linejoin="round" d="M36.636 27C39.046 27 41 28.88 41 31.2c0 3.02-2.91 5.6-4.364 7Q35.182 39.6 33 41q-2.182-1.4-3.636-2.8C27.909 36.8 25 34.22 25 31.2c0-2.32 1.954-4.2 4.364-4.2c1.517 0 2.854.746 3.636 1.878A4.4 4.4 0 0 1 36.636 27Z"/><path stroke-linecap="round" d="M15 14h16"/></g></svg>
                </div>
                <div class="px-4 text-gray-700">
                    <h3 class="text-sm tracking-wider">EQUIPOS REGISTRADOS</h3>
                    <p class="text-3xl">{{$countEquipos}}</p>
                </div>
            </div>
            <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow  border-gray-900">
                <div class="p-4 bg-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 64 64"><path fill="#fffcfc" d="M55.104 54.644a7.6 7.6 0 0 0 1.267-7.436l-.868-2.398h5.268V.396H3.63V44.81h30.728l3.352 9.195a7.6 7.6 0 0 0 5.751 4.876l1.575 4.767l13.185.002zm-4.793-23.996a5.433 5.433 0 0 0-3.244 6.963l2.032 5.544H5.283V2.052h53.836v41.104H54.89l-4.58-12.507z"/><path fill="#fffcfc" d="M34.66 25.794v3.17h9.263c.387 0 .952.346.952.952c0 5.397-.678 7.948-3.522 7.948c-2.955 0-3.561-6.399-6.692-6.817v6.117h-4.953v-6.125c-3.288.247-3.817 6.825-6.887 6.825c-2.844 0-3.369-2.551-3.369-7.948c0-.606.564-.952.954-.952h9.302v-3.17h-9.633a1.004 1.004 0 0 1-1.006-1.002c0-.553.451-1 1.006-1h9.633V20.62H18.866a1.003 1.003 0 0 1 0-2.006h10.842v-3.17H19.531a1.004 1.004 0 0 1 0-2.008h10.177v-3.17h-7.97a1.004 1.004 0 1 1 0-2.008h7.97V6.506h4.953v1.752h7.97a1.004 1.004 0 0 1 0 2.008h-7.97v3.17h10.206a1.004 1.004 0 1 1 0 2.008H34.661v3.17h10.873a1.004 1.004 0 0 1 0 2.006H34.661v3.172h9.633a1 1 0 1 1 0 2.002h-9.633z"/></svg>
                </div>
                <div class="px-4 text-gray-700">
                    <h3 class="text-sm tracking-wider">CATEGORIAS REGISTRADAS</h3>
                    <p class="text-3xl">{{$countCategorias}}</p>
                </div>
            </div>
            <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow  border-gray-900">
                <div class="p-4 bg-indigo-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 16 16"><g fill="#fffcfc"><path d="M4 16s-1 0-1-1s1-4 5-4s5 3 5 4s-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5a2.5 2.5 0 0 0 0 5"/><path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z"/></g></svg>
                </div>
                <div class="px-4 text-gray-700">
                    <h3 class="text-sm tracking-wider">PROVEEDORES REGISTRADOS</h3>
                    <p class="text-3xl">{{$countProveedor}}</p>
                </div>
            </div>
            <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow  border-gray-900">
                <div class="p-4 bg-indigo-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 640 512"><path fill="#fffcfc" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m32 32h-64c-17.6 0-33.5 7.1-45.1 18.6c40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64m-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32S208 82.1 208 144s50.1 112 112 112m76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2m-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4"/></svg>
                </div>
                <div class="px-4 text-gray-700">
                    <h3 class="text-sm tracking-wider">USUARIOS ACEPTADOS</h3>
                    <p class="text-3xl">{{$countUsers}}</p>
                </div>
            </div>
        </div>

        <!-- Timeline debajo de las tarjetas -->
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Timeline para Equipos -->
            <div class="w-full lg:w-1/2 px-6 sm:px-6 lg:px-8 flex flex-col bg-white rounded-3xl mt-10 mb-1 ml-8 border border-gray-900">
                <div class="text-center">
                    <h3 class="text-3xl sm:text-4xl leading-normal font-extrabold tracking-tight text-gray-900 mt-5">
                        Registros de <span class="text-indigo-600">Equipos</span>
                    </h3>
                </div>
                <hr class="mt-9 text-gray-800 bg-black border border-gray-800">
                <div class="mt-10">
                    <ul>
                        @forelse ($timelineEquipos as $index => $entry)
                            <li class="text-left mb-10">
                                <div class="flex flex-row items-start">
                                    <div class="flex flex-col items-center justify-center mr-5 ">
                                        <div class="flex items-center justify-center h-20 w-20 rounded-full bg-indigo-500 text-white border-4 border-white text-xl font-semibold">
                                            {{ $index + 1 }}
                                        </div>
                                        <span class="text-gray-500">Registro</span>
                                    </div>
                                    <div class="bg-gray-300 p-5 pb-10 rounded-3xl">
                                        <h4 class="text-lg leading-6 font-semibold text-gray-900">
                                            {{ $entry['nombre'] }}
                                        </h4>
                                        <p class="mt-2 text-base leading-6 text-gray-500">
                                            <strong>Base de datos de:</strong> {{ ucfirst($entry['table']) }} <br>
                                            <strong>Creado por:</strong> {{ $entry['created_by'] }} <br>
                                            <strong>Fecha de creación:</strong> {{ $entry['created_at'] }} <br>
                                            @if ($entry['updated_at'])
                                                <strong>Actualizado por:</strong> {{ $entry['updated_by'] }} <br>
                                                <strong>Fecha de actualización:</strong> {{ $entry['updated_at'] }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="text-left mb-10"> 
                                <div class="flex flex-row items-start">
                                    <div class="flex flex-col items-center justify-center mr-5">
                                        <div class="flex items-center justify-center h-20 w-20 rounded-full bg-gray-300 text-gray-900 border-4 border-white text-xl font-semibold">
                                            *
                                        </div>
                                        <span class="text-gray-500">Sin Registros</span>
                                    </div>
                                    <div class="bg-gray-100 p-5 pb-10">
                                        <h4 class="text-lg leading-6 font-semibold text-gray-900">Nada que mostrar.</h4>
                                        <p class="mt-2 text-base leading-6 text-gray-500">No hay registros recientes disponibles en este momento.</p>
                                    </div>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        
            <!-- Timeline para Proveedores -->
            <div class="w-full lg:w-1/2 px-6 sm:px-6 lg:px-8 flex flex-col bg-white rounded-3xl mt-10 mb-1 mr-8 border border-gray-900">
                <div class="text-center">
                    <h3 class="text-3xl sm:text-4xl leading-normal font-extrabold tracking-tight text-gray-900 mt-5">
                        Registros de <span class="text-indigo-600">Proveedores</span>
                    </h3>
                </div>
                <hr class="mt-9 text-gray-800 bg-black border border-gray-800">
                <div class="mt-10">
                    <ul>
                        @forelse ($timelineProveedores as $index => $entry)
                            <li class="text-left mb-10">
                                <div class="flex flex-row items-start">
                                    <div class="flex flex-col items-center justify-center mr-5">
                                        <div class="flex items-center justify-center h-20 w-20 rounded-full bg-indigo-500 text-white border-4 border-white text-xl font-semibold">
                                            {{ $index + 1 }}
                                        </div>
                                        <span class="text-gray-500">Registro</span>
                                    </div>
                                    <div class="bg-gray-300 p-5 pb-10 rounded-3xl">
                                        <h4 class="text-lg leading-6 font-semibold text-gray-900">
                                            {{ $entry['nombre'] }}
                                        </h4>
                                        <p class="mt-2 text-base leading-6 text-gray-500">
                                            <strong>Base de datos de:</strong> {{ ucfirst($entry['table']) }} <br>
                                            <strong>Creado por:</strong> {{ $entry['created_by'] }} <br>
                                            <strong>Fecha de creación:</strong> {{ $entry['created_at'] }} <br>
                                            @if ($entry['updated_at'])
                                                <strong>Actualizado por:</strong> {{ $entry['updated_by'] }} <br>
                                                <strong>Fecha de actualización:</strong> {{ $entry['updated_at'] }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="text-left mb-10">
                                <div class="flex flex-row items-start">
                                    <div class="flex flex-col items-center justify-center mr-5">
                                        <div class="flex items-center justify-center h-20 w-20 rounded-full bg-gray-300 text-gray-900 border-4 border-white text-xl font-semibold">
                                            *
                                        </div>
                                        <span class="text-gray-500">Sin Registros</span>
                                    </div>
                                    <div class="bg-gray-100 p-5 pb-10">
                                        <h4 class="text-lg leading-6 font-semibold text-gray-900">Nada que mostrar.</h4>
                                        <p class="mt-2 text-base leading-6 text-gray-500">No hay registros recientes disponibles en este momento.</p>
                                    </div>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
