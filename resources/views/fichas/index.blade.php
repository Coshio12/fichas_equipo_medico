<x-app-layout>
    <x-slot name='header'>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-center">
            {{__('FICHAS TECNICAS DE LOS EQUIPOS')}}
        </h2>
    </x-slot>


    <div class="bg-gray-200 rounded-3xl p-4 max-h-full">
        <h2 class="my-8 text-2xl font-bold text-gray-400 md:text-4xl">Equipos registrados hasta el momento</h2>
        <div class="inline-flex ml-0 content-center mb-5 space-x-3">
            <form method="GET" action="{{ route('fichas.index') }}" class="flex items-center space-x-3 ">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Buscar equipo" 
                    class="border rounded-lg focus:ring focus:ring-[#0C969C] focus:outline-none text-gray-700 w-64 h-12"
                />
                <button 
                    type="submit" 
                    class="text-center flex bg-[#0C969C] rounded-xl hover:rounded-3xl hover:bg-[#4cc0dd] transition-all duration-300 text-white items-center justify-center w-12 h-12 text-xl mx-3"
                >
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path fill="currentColor" fill-opacity="0" stroke-dasharray="40" stroke-dashoffset="40" d="M10.76 13.24c-2.34 -2.34 -2.34 -6.14 0 -8.49c2.34 -2.34 6.14 -2.34 8.49 0c2.34 2.34 2.34 6.14 0 8.49c-2.34 2.34 -6.14 2.34 -8.49 0Z"><animate fill="freeze" attributeName="fill-opacity" begin="0.7s" dur="0.5s" values="0;1"/><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.5s" values="40;0"/></path><path stroke-dasharray="12" stroke-dashoffset="12" d="M10.5 13.5l-7.5 7.5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.5s" dur="0.2s" values="12;0"/></path></g></svg>
                </button>
            </form>
            <a href="{{ route('fichas.index') }}" class="text-center flex p-2.5 bg-gray-500 rounded-xl hover:rounded-3xl hover:bg-gray-600 transition-all duration-300 text-white items-center justify-center w-16 h-12">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="currentColor" d="m14.03 1.889l9.657 9.657l-8.345 8.345l-.27.27H20v2H6.747l-3.666-3.666a4 4 0 0 1 0-5.657zm-8.242 11.07l-1.293 1.294a2 2 0 0 0 0 2.828l3.08 3.08h4.68l.366-.368z"/></svg>
            </a>
        </div>
        @if ($equipos->isEmpty())
            <div class="py-6">
                <div class="bg-white overflow-hidden sm:rounded-lg min-w-full">
                    <div class="p-6 text-gray-900 text-lg text-center">
                        <strong>{{ __("No se registraron equipos") }}</strong>
                    </div>
                </div>
            </div>
        @endif
        @foreach ($equipos as $e)
        <div class="flex items-center justify-center mb-5">
                
            
            <div class="bg-[#2ea8bb] rounded-3xl p-4 max-h-full flex w-8/12 border border-gray-900 ">
                <div class="relative py-5 p-6 space-y-5 flex flex-col w-full">
                    <div class="inline-flex space-x-6 items-start">
                        <!-- Imagen del equipo -->
                        @if ($e->feature)
                            <img src="{{ asset($e->feature) }}" loading="lazy" class="w-64 h-64 rounded-3xl object-cover" alt="Imagen equipo">
                        @else
                            <img src="https://www.svgrepo.com/show/164986/logo.svg" loading="lazy" width="200" height="200" class="w-24 h-24 rounded-full">
                        @endif 
            
                        <!-- Contenedor para los textos -->
                        <div class="flex flex-col text-xl text-white space-y-2">
                            <p class="text-xl"><strong>Nombre del equipo: {{$e->nombre_equipo}}</strong></p>
                            <p class="text-xl"><strong>Fecha de Adquisicion: {{$e->fecha_adquisicion}}</strong></p>
                            <p class="text-xl"><strong>Fecha de Funcionamiento: {{$e->fecha_funcionamiento}}</strong></p>
                            <p class="text-xl"><strong>Frecuencia de Uso: {{$e->frecuencia_uso}}</strong></p>
                            <p class="text-xl"><strong>Estado del Equipo: {{$e->estado_equipo}}</strong></p>

                            <hr>

                            <div class=" inline-flex space-x-5 mt-2">
                                    
                                <a href="{{route('fichas.pdf', $e->id_equipo)}}" target="_blink" class="px-6 py-2 bg-gray-400 transition ease-in duration-200  rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none text-black flex items-center"><svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><g fill="none" fill-rule="evenodd"><path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="M15.586 2A2 2 0 0 1 17 2.586L20.414 6A2 2 0 0 1 21 7.414V16a2 2 0 0 1-2 2h-2v2a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h2V4a2 2 0 0 1 2-2zM8 8H6v12h9v-2h-5a2 2 0 0 1-2-2zm6-4h-4v12h9V9h-3.5a1.5 1.5 0 0 1-1.493-1.356L14 7.5zm2 .414V7h2.586z"/></g></svg>Ficha tecnica</a>

                                <a href="{{route('fichas.pdf_mantenimiento', $e->id_equipo)}}" target="_blink" class="px-6 py-2 bg-gray-400 transition ease-in duration-200  rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none text-black flex items-center "><svg xmlns="http://www.w3.org/2000/svg" class="mx-2 text-black" width="30" height="30" viewBox="0 0 2048 2048"><path fill="#fffcfc" d="M1930 220q26 45 47 86t38 83t24 87t9 100q0 79-20 152t-58 138t-91 117t-117 90t-137 58t-153 21q-23 0-46-2t-47-6l-806 806q-48 48-109 73t-129 25q-69 0-130-26t-106-72t-72-107t-27-130q0-67 25-128t73-110l806-806q-4-23-6-46t-2-47q0-79 20-152t58-138t91-117t117-90t137-58t153-21q54 0 99 8t88 25t83 37t86 48l-394 394l102 102zm-458 804q93 0 174-35t142-96t96-142t36-175q0-73-24-141l-360 359l-282-282l359-360q-68-24-141-24q-93 0-174 35t-142 96t-96 142t-36 175q0 35 6 68t14 66l-855 856q-29 29-45 67t-16 80t16 80t45 66t66 44t80 17q42 0 80-16t67-45l856-855q33 8 66 14t68 6"/></svg>Mantenimiento</a>
                                
                            </div>
                        </div>
                            
                           

                    </div>
                </div>
            </div>
            
            
            
        </div>
        @endforeach
        
    </div>
</x-app-layout>