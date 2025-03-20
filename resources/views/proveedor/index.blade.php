<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-center">
                {{ __('PROVEEDORES DE LOS EQUIPOS') }}
            </h2>
        </x-slot>

        <div>
            @include('proveedor.crear')
        </div>

        <div>
            @include('proveedor.edit')
        </div>

        <div class="p-6">
            @include('proveedor.delete')
        </div>

        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-200 max-h-full p-6 rounded-3xl">
                <div class="inline-flex ml-0 content-center space-x-3">
                    <form method="GET" action="{{ route('proveedor.index') }}" class="flex items-center space-x-3">
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}" 
                            placeholder="Buscar proveedor" 
                            class="border rounded-lg focus:ring focus:ring-[#0C969C] focus:outline-none text-gray-700 w-64 h-12"
                        />
                        <button 
                            type="submit" 
                            class="text-center flex bg-[#0C969C] rounded-xl hover:rounded-3xl hover:bg-[#4cc0dd] transition-all duration-300 text-white items-center justify-center w-12 h-12 text-xl"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" stroke-dasharray="40" stroke-dashoffset="40" d="M10.76 13.24c-2.34 -2.34 -2.34 -6.14 0 -8.49c2.34 -2.34 6.14 -2.34 8.49 0c2.34 2.34 2.34 6.14 0 8.49c-2.34 2.34 -6.14 2.34 -8.49 0Z"><animate fill="freeze" attributeName="fill-opacity" begin="0.7s" dur="0.5s" values="0;1"/><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.5s" values="40;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M10.5 13.5l-7.5 7.5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.5s" dur="0.2s" values="12;0"/></path></g></svg>
                        </button>
                    </form>
                    <a href="{{ route('proveedor.index') }}" class="text-center flex p-2.5 bg-gray-500 rounded-xl hover:rounded-3xl hover:bg-gray-600 transition-all duration-300 text-white items-center justify-center w-16 h-12">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="m14.03 1.889l9.657 9.657l-8.345 8.345l-.27.27H20v2H6.747l-3.666-3.666a4 4 0 0 1 0-5.657zm-8.242 11.07l-1.293 1.294a2 2 0 0 0 0 2.828l3.08 3.08h4.68l.366-.368z"/></svg>
                    </a>
                </div>
                <div class="bg-white overflow-x-auto shadow-sm sm:rounded-3xl border border-gray-900">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr class="bg-[#34bcb0] text-center text-lg md:text-lg font-thin text-white">
                                <th scope="col" class="py-5 border-r border-gray-300">EMPRESA</th>
                                <th scope="col" class="py-5 border-r border-gray-300 ">PROVEEDOR</th>
                                <th scope="col" class="py-5 border-r border-gray-300 ">DIRECCION</th>
                                <th scope="col" class="py-5 border-r border-gray-300 ">CONTACTO</th>
                                <th scope="col" class="py-5 border-r border-gray-300 ">CORREO</th>
                                <th scope="col" class="py-5 border-r  ">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($proveedor->isEmpty())
                            <tr class="text-center">
                                <td colspan="5" class="py-4 border-b border-gray-300 text-gray-500">
                                    No se registró ningún proveedor.
                                </td>
                            </tr>
                            @endif
                            @foreach ($proveedor as $proveedor)
                                <tr class="bg-white border-b space-x-1 hover:bg-gray-100">
                                    <td class="px-6 py-4 whitespace-nowrap text-lg text-center font-medium text-gray-900">{{$proveedor->nombre_empresa}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-lg text-center font-medium text-gray-900">{{ $proveedor->nombre_proveedor }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-lg text-center font-medium text-gray-900">{{ $proveedor->direccion_proveedor }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-lg text-center font-medium text-gray-900">{{ $proveedor->contacto_proveedor }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-lg text-center font-medium text-gray-900">{{ $proveedor->email_proveedor }}</td>

                                    <td class="bg-white p-2 space-x-1 hover:bg-gray-100 flex items-center justify-center ">
                                        <button type="button" 
                                            class="text-center flex p-2.5 bg-amber-500 rounded-xl hover:rounded-3xl hover:bg-amber-600 transition-all duration-300 text-white items-center justify-center w-16 h-12" 
                                            data-id="{{ $proveedor->id_proveedor }}"
                                            data-empresa="{{$proveedor->nombre_empresa}}"
                                            data-proveedor="{{ $proveedor->nombre_proveedor }}"
                                            data-direccion="{{ $proveedor->direccion_proveedor}}"
                                            data-contacto="{{$proveedor->contacto_proveedor}}"
                                            data-email ="{{ $proveedor->email_proveedor}}"
                                            onclick="openEditModal(this)">
                                            &#9998;
                                        </button>

                                        <button type="button" class="text-center flex p-2.5 bg-red-500 rounded-xl hover:rounded-3xl hover:bg-red-600 transition-all duration-300 text-white items-center justify-center w-16 h-12" data-id="{{$proveedor->id_proveedor}}" onclick="openDeleteModal(this)">&#128465;</button>
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