<div>
    <x-app-layout>
        <x-slot name='header'>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-center">
                {{__('EQUIPOS MEDICOS')}}
            </h2>
        </x-slot>

        <div>
            @include('equipos.delete')
        </div>

        <div>
            @include('equipos.modal-ver')
        </div>

        <div class="bg-gray-200 rounded-3xl p-4 max-h-full">
            <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
              <div class="md:w-2/3 lg:w-1/2 mt-12 text-gray-100">
                <h2 class="my-8 text-2xl font-bold text-gray-400 md:text-4xl">Lista de Equipos agregados</h2>
              </div>
              
            <div class="flex space-x-4 mb-4">
                <div class="">
                    <a href="{{ route('equipos.create') }}" class="hover:text-white text-white px-6 py-2 min-w-[120px] text-center bg-[#0C969C] border border-[#268085] rounded active:text-violet-500 hover:bg-[#4cc0dd] focus:outline-none focus:ring inline-flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="currentColor" d="M18 20v-3h-3v-2h3v-3h2v3h3v2h-3v3zM3 21q-.825 0-1.412-.587T1 19V5q0-.825.588-1.412T3 3h14q.825 0 1.413.588T19 5v5h-2V8H3v11h13v2z" /></svg><span>Agregar Nuevo Equipo </span>
                    </a>
                </div>
                
                <div class="inline-flex ml-0 space-x-3">
                    <form method="GET" action="{{ route('equipos.index') }}" class="flex items-center space-x-3">
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}" 
                            placeholder="Buscar equipo por nombre, código o marca..." 
                            class="border rounded-lg focus:ring focus:ring-[#0C969C] focus:outline-none text-gray-700 w-96 h-12 "
                        />
                        <button 
                            type="submit" 
                            class="text-center flex bg-[#0C969C] rounded-xl hover:rounded-3xl hover:bg-[#4cc0dd] transition-all duration-300 text-white items-center justify-center w-12 h-12 text-xl"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" stroke-dasharray="40" stroke-dashoffset="40" d="M10.76 13.24c-2.34 -2.34 -2.34 -6.14 0 -8.49c2.34 -2.34 6.14 -2.34 8.49 0c2.34 2.34 2.34 6.14 0 8.49c-2.34 2.34 -6.14 2.34 -8.49 0Z"><animate fill="freeze" attributeName="fill-opacity" begin="0.7s" dur="0.5s" values="0;1"/><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.5s" values="40;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M10.5 13.5l-7.5 7.5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.5s" dur="0.2s" values="12;0"/></path></g></svg>
                        </button>
                    </form>
                    <a href="{{ route('equipos.index') }}" class="text-center flex p-2.5 bg-gray-500 rounded-xl hover:rounded-3xl hover:bg-gray-600 transition-all duration-300 text-white items-center justify-center w-16 h-12">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"><path fill="currentColor" d="m14.03 1.889l9.657 9.657l-8.345 8.345l-.27.27H20v2H6.747l-3.666-3.666a4 4 0 0 1 0-5.657zm-8.242 11.07l-1.293 1.294a2 2 0 0 0 0 2.828l3.08 3.08h4.68l.366-.368z"/></svg>
                    </a>
                </div>
            </div>
            @if ($equipo->isEmpty())
                <div class="py-6">
                    <div class="bg-white overflow-hidden sm:rounded-lg min-w-full">
                        <div class="p-6 text-gray-900 text-lg text-center">
                            <strong>{{ __("No se registraron equipos") }}</strong>
                        </div>
                    </div>
                </div>
                @endif
            <div class="mt-10 grid overflow-hidden rounded-3xl border text-gray-600 sm:grid-cols-4 space-x-4 ">
                
                @foreach($equipo as $equipo)
                    <div class="group relative bg-[#2a9992] rounded-3xl overflow-hidden min-h-[400px] flex flex-col max-w-max">

                        <div class="flex flex-col mt-5 mb-2 pl-1 pr-1">
                            <button type="button" class="flex items-center justify-center h-10 bg-blue-500 p-2 text-sm font-bold leading-6 capitalize duration-100 transform border-2 rounded-sm cursor-pointer border-blue-300 focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none hover:shadow-lg hover:-translate-y-1 text-white"
                                        data-id="{{$equipo->id_equipo}}"
                                        data-activo="{{$equipo->codigo_activo}}"
                                        data-biomedica="{{$equipo->codigo_biomedica}}"
                                        data-modelo="{{$equipo->modelo_equipo}}"
                                        data-serie="{{$equipo->numero_serie}}"
                                        data-nombre="{{$equipo->nombre_equipo}}"
                                        data-servicio="{{$equipo->servicio_equipo}}"
                                        data-dependencia="{{$equipo->dependencia_equipo}}"
                                        data-marca="{{$equipo->marca_equipo}}"
                                        data-categoria="{{$equipo->categoria->nombre_categoria}}"
                                        data-proveedor="{{$equipo->proveedor->nombre_proveedor}}"
                                        data-empresa="{{$equipo->proveedor->nombre_empresa}}"
                                        data-descripcion="{{$equipo->descripcion_equipo}}"
                                        data-obs="{{$equipo->observacion_equipo}}"
                                        data-adqui="{{$equipo->fecha_adquisicion}}"
                                        data-func="{{$equipo->fecha_funcionamiento}}"
                                        data-uso="{{$equipo->frecuencia_uso}}"
                                        data-mante="{{$equipo->frecuencia_mantenimiento}}"
                                        data-estado="{{$equipo->estado_equipo}}"
                                        data-garantia="{{$equipo->garantia_equipo}}"
                                        onclick="openInfoModal(this)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="M11 17h2v-6h-2zm1-8q.425 0 .713-.288T13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9m0 13q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg><span>INFORMACION DEL EQUIPO</span>
                                    </button>
                        </div>
                        <div class="border border-t-2 border-white "></div>
                        <div class="relative space-y-8 py-5 p-6">
                            @if($equipo->feature)
                                <img src="{{ asset($equipo->feature) }}" loading="lazy" class="w-full h-44 rounded-3xl object-cover">
                            @else
                                <img src="https://www.svgrepo.com/show/164986/logo.svg" loading="lazy" width="200" height="200" class="w-24 h-24 rounded-full">
                            @endif
                            <div class="space-y-2 ">
                                <h5 class="text-xl font-semibold text-white transition group-hover:text-secondary text-center">{{ $equipo->nombre_equipo }}</h5>
                            </div>
                        </div>                  
                        <div class="border border-t-2 border-white "></div>
                        <div class="flex flex-col items-center space-y-2 mt-2 mb-2">                               
                            <div class="flex justify-center space-x-1">
                                <!-- Edit button -->
                                <a href="{{route('equipos.edit', ['id_equipo' => $equipo->id_equipo])}}" class="flex items-center justify-center w-full h-12 bg-amber-500 p-2 text-sm font-bold leading-6 capitalize duration-100 transform border-2 rounded-sm cursor-pointer border-amber-300 focus:ring-4 focus:ring-amber-500 focus:ring-opacity-50 focus:outline-none hover:shadow-lg hover:-translate-y-1 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M21 12a1 1 0 0 0-1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1m-15 .76V17a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .71-.29l6.92-6.93L21.71 8a1 1 0 0 0 0-1.42l-4.24-4.29a1 1 0 0 0-1.42 0l-2.82 2.83l-6.94 6.93a1 1 0 0 0-.29.71m10.76-8.35l2.83 2.83l-1.42 1.42l-2.83-2.83ZM8 13.17l5.93-5.93l2.83 2.83L10.83 16H8Z"/></svg>
                                </a>
                                <!-- Gold button -->
                                <a href="{{route('equipos.datos_tecnicos.index', ['id_equipo' => $equipo->id_equipo])}}" class="flex items-center justify-center w-full h-12 bg-yellow-500 p-2 text-sm font-bold leading-6 capitalize duration-100 transform border-2 rounded-sm cursor-pointer border-yellow-300 focus:ring-4 focus:ring-yellow-500 focus:ring-opacity-50 focus:outline-none hover:shadow-lg hover:-translate-y-1 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M12 22q-2.075 0-3.9-.788t-3.175-2.15t-2.137-3.187T2 12q0-3.925 2.6-6.75t6.4-3.2v3q-2.575.35-4.288 2.313T5 12q0 2.9 2.05 4.95T12 19q1.65 0 3.088-.7t2.412-1.9l2.6 1.5q-1.35 1.875-3.475 2.988T12 22m-1-6v-3H8v-2h3V8h2v3h3v2h-3v3zm10.15.05l-2.6-1.5q.225-.6.337-1.237T19 12q0-2.675-1.713-4.637T13 5.05v-3q3.8.375 6.4 3.2T22 12q0 1.1-.2 2.125t-.65 1.925"/></svg>
                                </a>
                                <!-- Eliminar button -->
                                <button type="button" class="flex items-center justify-center w-full h-12 bg-red-500 p-2 text-sm font-bold leading-6 capitalize duration-100 transform border-2 rounded-sm cursor-pointer border-red-300 focus:ring-4 focus:ring-red-500 focus:ring-opacity-50 focus:outline-none hover:shadow-lg hover:-translate-y-1 text-white" data-id="{{$equipo->id_equipo}}" onclick="openDeleteModal(this)"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16"><path fill="currentColor" d="M7 3h2a1 1 0 0 0-2 0M6 3a2 2 0 1 1 4 0h4a.5.5 0 0 1 0 1h-.564l-1.205 8.838A2.5 2.5 0 0 1 9.754 15H6.246a2.5 2.5 0 0 1-2.477-2.162L2.564 4H2a.5.5 0 0 1 0-1zm1 3.5a.5.5 0 0 0-1 0v5a.5.5 0 0 0 1 0zM9.5 6a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 1 0v-5a.5.5 0 0 0-.5-.5"/></svg></button>

                                <a href="{{route('equipos.documentacion.index', ['id_equipo' => $equipo->id_equipo])}}" class="flex items-center justify-center w-full h-12 bg-gray-500 p-2 text-sm font-bold leading-6 capitalize duration-100 transform border-2 rounded-sm cursor-pointer border-gray-300 focus:ring-4 focus:ring-gray-500 focus:ring-opacity-50 focus:outline-none hover:shadow-lg hover:-translate-y-1 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="64" stroke-dashoffset="64" d="M13 3l6 6v12h-14v-18h8"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0"/></path><path stroke-dasharray="14" stroke-dashoffset="14" stroke-width="1" d="M12.5 3v5.5h6.5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.2s" values="14;0"/></path></g><path fill="currentColor" fill-opacity="0" d="M5 3H12.5V8.5H19V21H5V3Z"><animate fill="freeze" attributeName="fill-opacity" begin="1s" dur="0.15s" values="0;0.3"/></path></svg>
                                </a>
                            </div>
                        </div>
                        <div class="border border-t-2 border-white "></div>

                            <div class="flex flex-col mt-2 mb-2 pl-2 pr-2">
                                {{-- Agregar   --}}
                                <a href="{{route('equipos.accesorios.index', ['id_equipo' => $equipo->id_equipo])}}" class="flex items-center justify-center h-10 bg-green-500 px-4 py-4 text-sm font-bold leading-6 capitalize duration-100 transform border-2 rounded-sm cursor-pointer border-green-300 focus:ring-4 focus:ring-green-500 focus:ring-opacity-50 focus:outline-none sm:w-auto sm:px-6 border-text  hover:shadow-lg hover:-translate-y-1 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 16 16"><path fill="currentColor" d="M10 5.5a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0m-4-2a.5.5 0 0 0-1 0V5H3.5a.5.5 0 0 0 0 1H5v1.5a.5.5 0 0 0 1 0V6h1.5a.5.5 0 0 0 0-1H6zM5.5 11a5.5 5.5 0 0 0 4.9-8h2.1A2.5 2.5 0 0 1 15 5.5V9h-3a3 3 0 0 0-3 3v3H5.5A2.5 2.5 0 0 1 3 12.5v-2.1c.75.384 1.6.6 2.5.6m4.5 3.985a1.5 1.5 0 0 0 .846-.424l3.715-3.715a1.5 1.5 0 0 0 .424-.846H12a2 2 0 0 0-2 2z"/></svg><span class="ml-1 mr-1 text-base">Agregar Accesorios</span>
                                </a>

                                
                            </div>
                    </div>
                @endforeach
            </div>
            
               
        </div>

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
    </x-app-layout>
</div>