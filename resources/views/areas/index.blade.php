<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-center">
                {{ __('AREAS DE LOS EQUIPOS') }}
            </h2>
        </x-slot>

        <div>
            @include('areas.crear')
        </div>

        <div>
            @include('areas.edit')
        </div>

        <div>
            @include('areas.delete')
        </div>

        <div>
            @include('areas.check')
        </div>
        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-200 max-h-fulls p-6 rounded-3xl">
                <div class="inline-flex ml-0 content-center space-x-3">
                    <form method="GET" action="{{ route('areas.index') }}" class="flex items-center space-x-3">
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}" 
                            placeholder="Buscar area" 
                            class="border rounded-lg focus:ring focus:ring-[#0C969C] focus:outline-none text-gray-700 w-64 h-12"
                        />
                        <button 
                            type="submit" 
                            class="text-center flex bg-[#0C969C] rounded-xl hover:rounded-3xl hover:bg-[#4cc0dd] transition-all duration-300 text-white items-center justify-center w-12 h-12 text-xl"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" stroke-dasharray="40" stroke-dashoffset="40" d="M10.76 13.24c-2.34 -2.34 -2.34 -6.14 0 -8.49c2.34 -2.34 6.14 -2.34 8.49 0c2.34 2.34 2.34 6.14 0 8.49c-2.34 2.34 -6.14 2.34 -8.49 0Z"><animate fill="freeze" attributeName="fill-opacity" begin="0.7s" dur="0.5s" values="0;1"/><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.5s" values="40;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M10.5 13.5l-7.5 7.5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.5s" dur="0.2s" values="12;0"/></path></g></svg>
                        </button>
                    </form>
                    <a href="{{ route('areas.index') }}" class="text-center flex  bg-gray-500 rounded-xl hover:rounded-3xl hover:bg-gray-600 transition-all duration-300 text-white items-center justify-center w-16 h-12">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="m14.03 1.889l9.657 9.657l-8.345 8.345l-.27.27H20v2H6.747l-3.666-3.666a4 4 0 0 1 0-5.657zm-8.242 11.07l-1.293 1.294a2 2 0 0 0 0 2.828l3.08 3.08h4.68l.366-.368z"/></svg>
                    </a>
                </div>
                <div class="bg-white overflow-x-auto shadow-sm sm:rounded-3xl border border-gray-900">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr class="bg-[#34bcb0] text-center text-lg md:text-lg font-thin text-white">
                                <th scope="col" class="py-5 border-r border-gray-300 ">AREA</th>
                                <th scope="col" class="py-5 border-r border-gray-300 ">CATEGORIA DEL AREA</th>
                                <th scope="col" class="py-5 border-r border-gray-300 ">ASIGNAR CATEGORIAS</th>
                                <th scope="col" class="py-5 border-r ">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($areas->isEmpty())
                            <tr class="text-center">
                                <td colspan="4" class="py-4 border-b border-gray-300 text-gray-500">
                                    No se registró ningún area.
                                </td>
                            </tr>
                            @endif
                            @foreach ($areas as $area)
                                <tr class="bg-white border-b hover:bg-gray-100">
                                    <td class="px-6 py-4 text-lg font-medium text-gray-900 text-center align-middle">{{ $area->nombre_area }}</td>
                        
                                    <td class="px-6 py-4 text-lg font-medium text-gray-900 text-center align-middle">
                                        @if ($area->categorias->isNotEmpty())
                                            <ul class="list-disc list-inside mt-3 flex flex-col space-y-2">
                                                @foreach ($area->categorias as $categoria)
                                                    
                                                    <li class="flex"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" aria-hidden="true" class="mr-2 h-auto w-6 text-green-600 sm:w-7">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z">
                                                        </path>
                                                </svg>{{ $categoria->nombre_categoria }}</li>
                                                    
                                                @endforeach
                                            </ul>
                                        @else
                                            No agregadas
                                        @endif
                                    </td>
                        
                                    <td class="px-6 py-4 text-center align-middle">
                                        <button type="button" class="p-2.5 bg-sky-500 rounded-xl hover:rounded-3xl hover:bg-sky-600 transition-all duration-300 text-white w-full h-12 flex items-center justify-center mx-auto" onclick="openCheckModal(this)" data-id="{{ $area->id_area }}">
                                            Asignar/Renover
                                        </button>
                                    </td>
                        
                                    <td class="px-6 py-4 text-center align-middle">
                                        <div class="flex space-x-2 justify-center">
                                            <button type="button" 
                                                class="p-2.5 bg-amber-500 rounded-xl hover:rounded-3xl hover:bg-amber-600 transition-all duration-300 text-white w-16 h-12 flex items-center justify-center" 
                                                data-id="{{ $area->id_area }}"
                                                data-area="{{ $area->nombre_area }}"
                                                onclick="openEditModal(this)">
                                                &#9998;
                                            </button>
                        
                                            <button type="button" class="p-2.5 bg-red-500 rounded-xl hover:rounded-3xl hover:bg-red-600 transition-all duration-300 text-white w-16 h-12 flex items-center justify-center" data-id="{{ $area->id_area }}" onclick="openDeleteModal(this)">
                                                &#128465;
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>