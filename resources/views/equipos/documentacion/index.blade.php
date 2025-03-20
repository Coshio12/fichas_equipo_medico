<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-self-center">
                {{__('DOCUMENTOS PARA: ')}}{{$equipo->nombre_equipo}}
            </h2>
        </x-slot>

        <div>
            @include('equipos.documentacion.crear')
            @include('equipos.documentacion.edit')
            @include('equipos.documentacion.delete')
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-3xl border border-gray-900">
                <table class="min-w-full bg-white">
                    <tr class="bg-[#34bcb0] text-center text-lg md:text-lg font-thin text-white">
                        <th scope="col" class="py-5 border-r border-gray-300">NOMBRE DOCUMENTO</th>
                        <th scope="col" class="py-5 border-r border-gray-300">TIPO DOCUMENTO</th>
                        <th scope="col" class="py-5 border-r border-gray-300">DOCUMENTO</th>
                        <th scope="col" class="py-5">ACCIONES</th>
                    </tr>
                    <tbody>
                        @if ($documentacion->isEmpty())
                            <tr class="text-center">
                                <td colspan="4" class="py-4 border-b border-gray-300 text-gray-500">
                                    NO SE REGISTRO NINGUNA DOCUMENTACION
                                </td>
                            </tr>
                        @endif
                        @foreach ($documentacion as $doc)
                            <tr class="text-center">
                                <td class="py-4 border-b border-gray-300">{{$doc->nombre_documento}}</td>
                                <td class="py-4 border-b border-gray-300">{{$doc->tipo_documento}}</td>
                                <td class="py-4 border-b border-gray-300"><a href="{{ asset($doc->feature_pdf) }}" target="_blank" class="text-blue-600 hover:underline">
                                    Ver PDF
                                </a></td>

                                <td class="py-4 border-b">
                                    <div class="flex space-x-2 justify-center">
                                        {{-- Boton editar --}}
                                        <button type="button"
                                        class="p-2.5 bg-amber-500 rounded-xl hover:rounded-3xl hover:bg-amber-600 transition-all duration-300 text-white w-16 h-12 flex items-center justify-center"
                                        data-id="{{$doc->id_documentacion}}"
                                        data-nombre="{{$doc->nombre_documento}}"
                                        data-tipo="{{$doc->tipo_documento}}"
                                        data-pdf="{{asset($doc->feature_pdf)}}"
                                        onclick="openEditModal(this)">
                                            &#9998;
                                        </button>
                                        {{-- boton eliminar --}}
                                        <button type="button" class="p-2.5 bg-red-500 rounded-xl hover:rounded-3xl hover:bg-red-600 transition-all duration-300 text-white w-16 h-12 flex items-center justify-center" 
                                                data-id="{{$doc->id_documentacion}}" 
                                                data-feature="{{asset($doc->feature_pdf)}}"
                                                onclick="openDeleteModal(this)">
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