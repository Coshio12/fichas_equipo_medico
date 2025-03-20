<div>
    <x-app-layout>
        
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl w-full">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-center">
                            Actualizar equipo Medico: {{$equipo->nombre_equipo}}
                        </h2>
                    </div>
                    <form action="{{ route('equipos.update', $equipo->id_equipo) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="p-6 grid grid-cols-2 gap-4">
                        <div>
                            <label for="codigo_activo" class="text-sm">CODIGO ACTIVOS <span class="text-red-600">*</span></label>
                            <input 
                                type="text"
                                name="codigo_activo"
                                class="border p-3 shadow-md border-gray-700 rounded-lg w-full"
                                placeholder="Code Activo"
                                value="{{ $equipo->codigo_activo }}"
                                required
                            />
                        
                        </div>

                        <div>
                            <label for="codigo_biomedica" class="text-sm">CODIGO BIOMEDICA <span class="text-red-600">*</span></label>
                            <input 
                                type="text"
                                name="codigo_biomedica"
                                class="border p-3 shadow-md border-gray-700 rounded-lg w-full"
                                placeholder="Codigo Biomedica"
                                value="{{ $equipo->codigo_biomedica }}"
                                required
                            />
                        </div>

                        <div>
                            <label for="modelo_equipo" class="text-sm">MODELO <span class="text-red-600">*</span></label>
                            <input 
                                type="text"
                                name="modelo_equipo"
                                class="border p-3 shadow-md border-gray-700 rounded-lg w-full"
                                value="{{ $equipo->modelo_equipo }}"
                                required
                            />
                        </div>

                        <div>
                            <label for="numero_serie" class="text-sm">Nº DE SERIE <span class="text-red-600">*</span></label>
                            <input 
                                type="text"
                                name="numero_serie"
                                class="border p-3 shadow-md border-gray-700 rounded-lg w-full"
                                value="{{ $equipo->numero_serie }}"
                                required
                            />
                        </div>
                    </div>

                    <div class="p-6 grid grid-cols-2 gap-4">
                        <div>
                            <label for="nombre_equipo" class="text-sm">NOMBRE DEL EQUIPO <span class="text-red-600">*</span></label>
                            <input type="text" name="nombre_equipo" value="{{ $equipo->nombre_equipo }}" class="border p-3 shadow-md border-gray-700 rounded-lg w-full" required>
                            
                        </div>

                        <div>
                            <label for="servicio_equipo" class="text-sm">SERVICIO <span class="text-red-600">*</span></label>
                            <input 
                                type="text"
                                name="servicio_equipo"
                                class="border p-3 shadow-md border-gray-700 rounded-lg w-full"
                                placeholder="Servicio"
                                value="{{ $equipo->servicio_equipo }}"
                                required
                            />
                        </div>

                        <div>
                            <label for="dependencia_equipo" class="text-sm">DEPENDENCIA <span class="text-red-600">*</span></label>
                            <input 
                                type="text"
                                name="dependencia_equipo"
                                class="border p-3 shadow-md border-gray-700 rounded-lg w-full"
                                placeholder="Dependencia"
                                value="{{ $equipo->dependencia_equipo }}"
                                required
                            />
                        </div>

                        <div>
                            <label for="marca_equipo" class="text-sm">MARCA <span class="text-red-600">*</span></label>
                            <input 
                                type="text"
                                name="marca_equipo"
                                class="border p-3 shadow-md border-gray-700 rounded-lg w-full"
                                placeholder="Marca"
                                value="{{ $equipo->marca_equipo }}"
                                required
                            />
                        </div>
                    </div>
                    {{-- Data picker mantenimiento --}}
                    <div class="p-6 grid grid-cols-2 gap-4">
                        <div>
                            <label for="fecha_adquisicion" class="text-base">FECHA DE ADQUISICION <span class="text-red-600">*</span></label>
                            <input 
                                type="date" 
                                id="fecha_adquisicion" 
                                name="fecha_adquisicion"
                                class="p-3 w-full max-w-xs rounded-lg border-2 border-teal-700 bg-gray-100 text-gray-700 text-base focus:outline-none focus:ring-2 focus:ring-teal-400 focus:border-teal-400 transition-shadow"
                                value="{{$equipo->fecha_adquisicion}}"
                                required
                            />
                        </div>
                        <div>
                            <label for="fecha_funcionamiento" class="text-base">FECHA DE FUNCIONAMIENTO <span class="text-red-600">*</span></label>
                            <input 
                                type="date" 
                                id="fecha_funcionamiento" 
                                name="fecha_funcionamiento"
                                class="p-3 w-full max-w-xs rounded-lg border-2 border-teal-700 bg-gray-100 text-gray-700 text-base focus:outline-none focus:ring-2 focus:ring-teal-400 focus:border-teal-400 transition-shadow"
                                value="{{$equipo->fecha_funcionamiento}}"
                                required
                            />
                        </div>
                    </div>
                    <div class="p-6 grid grid-cols-2 gap-4">
                        <div>
                            <label for="frecuencia_uso">FRECUENCIA DE USO <span class="text-red-600">*</span></label>
                            <select name="frecuencia_uso" class="relative w-full bg-white border border-gray-800 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-12 text-lg mb-5">
                                <option value="" class="text-lg">Seleccionar Frecuencia</option>
                                <option value="DIARIO" class="text-lg" {{ $equipo->frecuencia_uso == 'DIARIO' ? 'selected' : '' }}>Diario</option>
                                <option value="MENSUAL" class="text-lg" {{ $equipo->frecuencia_uso == 'MENSUAL' ? 'selected' : '' }}>Mensual</option>
                                <option value="TRIMESTRAL" class="text-lg" {{ $equipo->frecuencia_uso == 'TRIMESTRAL' ? 'selected' : '' }}>Trimestral</option>
                                <option value="SEMESTRAL" class="text-lg" {{ $equipo->frecuencia_uso == 'SEMESTRAL' ? 'selected' : '' }}>Semestral</option>
                                <option value="ANUAL" class="text-lg" {{ $equipo->frecuencia_uso == 'ANUAL' ? 'selected' : '' }}>Anual</option>
                            </select>
                        </div>
                        <div>
                            <label for="frecuencia_mantenimiento">FRECUENCIA DE MANTENIMIENTO <span class="text-red-600">*</span></label>
                            <select name="frecuencia_mantenimiento" class="relative w-full bg-white border border-gray-800 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-12 text-lg">
                                <option value="" class="text-lg">Seleccionar Frecuencia</option>
                                <option value="DIARIO" class="text-lg" {{ $equipo->frecuencia_mantenimiento == 'DIARIO' ? 'selected' : '' }}>Diario</option>
                                <option value="MENSUAL" class="text-lg" {{ $equipo->frecuencia_mantenimiento == 'MENSUAL' ? 'selected' : '' }}>Mensual</option>
                                <option value="SEMESTRAL" class="text-lg" {{ $equipo->frecuencia_mantenimiento == 'SEMESTRAL' ? 'selected' : '' }}>Semestral</option>
                            </select>
                        </div>
                    </div>
                    <div class="pL-6 pr-6 grid grid-cols-2 gap-4">
                        <div>
                            <label for="estado_equipo" class="text-base">ESTADO DEL EQUIPO <span class="text-red-600">*</span></label>
                            <select name="estado_equipo" class="relative w-full bg-white border border-gray-800 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-12 text-lg mb-5">
                                <option value="" class="text-lg">Seleccionar Estado</option>
                                <option value="NUEVO" class="text-lg" {{ $equipo->estado_equipo == 'NUEVO' ? 'selected' : '' }}>Nuevo</option>
                                <option value="REGULAR" class="text-lg" {{ $equipo->estado_equipo == 'REGULAR' ? 'selected' : '' }}>Regular</option>
                                <option value="MALO" class="text-lg" {{ $equipo->estado_equipo == 'MALO' ? 'selected' : '' }}>Malo</option>
                            </select>
                        </div>

                        <div>
                            <label for="garantia_equipo" class="text-base">GARANTIA DEL EQUIPO <span class="text-red-600">*</span></label>
                            <select name="garantia_equipo" class="relative w-full bg-white border border-gray-800 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-12 text-lg mb-5">
                                <option value="" class="text-lg">Seleccionar Garantía</option>
                                <option value="3" class="text-lg" {{ $equipo->garantia_equipo == 3 ? 'selected' : '' }}>3 MESES</option>
                                <option value="6" class="text-lg" {{ $equipo->garantia_equipo == 6 ? 'selected' : '' }}>6 MESES</option>
                                <option value="12" class="text-lg" {{ $equipo->garantia_equipo == 12 ? 'selected' : '' }}>12 MESES</option>
                            </select>
                        </div>
                    </div>
                    {{-- Fin data picker mantenimiento --}}
                    <div class="p-6">
                        <label for="categoria" class="text-base ">CATEGORIA <span class="text-red-600">*</span></label>
                        <select name="categoria" class="relative w-full bg-white border border-gray-800 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-12 text-lg">
                            <option class="text-lg" value="">Seleccionar Categoria</option>
                            @foreach ($categorias as $categoria)
                                <option class="text-lg" value="{{ $categoria->id_categoria }}" {{ $categoria->id_categoria == $currentCategoriaId ? 'selected' : '' }}>
                                    {{ $categoria->nombre_categoria }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="p-6">
                        <label for="proveedor" class="text-base ">PROVEEDOR <span class="text-red-600">*</span></label>
                        <select name="proveedor" class="relative w-full bg-white border border-gray-800 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-12 text-lg">
                            <option class="text-lg" value="">Seleccionar Proveedor</option>
                            @foreach ($proveedor as $proveedor)
                                <option class="text-lg" value="{{ $proveedor->id_proveedor }}" {{ $proveedor->id_proveedor == $currentProveedorId ? 'selected' : '' }}>
                                    {{$proveedor->nombre_empresa}}: {{ $proveedor->nombre_proveedor }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    

                    <div aria-hidden="true" class="border-b border-gray-200 px-2"></div>
                    <div class="p-6">

                        <label class="text-gray-600">Imagen:</label>
                            <input type="file" name="feature" class="w-full px-4 py-2 border rounded-lg">
                            @if($equipo->feature)
                                <img src="{{ asset($equipo->feature) }}" alt="Imagen actual" class="mt-2 w-32 h-32 object-cover">
                            @endif

                        <label for="descripcion_equipo" class="">DESCRIPCION DEL EQUIPO<span class="text-red-600 inline-block p-1 text-sm">*</span></label>
                        
                        <textarea id="descripcion_equipo" name="descripcion_equipo" rows="4" cols="50" class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg flex w-full">{{$equipo->descripcion_equipo}}</textarea>

                        <div class="mt-5">
                            <label for="observacion_equipo" class="">OBSERVACION DEL EQUIPO<span class="text-red-600 inline-block p-1 text-sm">*</span></label>
                            <textarea id="observacion_equipo" name="observacion_equipo" rows="4" cols="50" class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg flex w-full">{{$equipo->observacion_equipo}}</textarea>
                        </div>  

                        <div class="mt-5 inline-flex space-x-4">
                            <x-add-button class="">
                                Actualizar Informacion del equipo
                            </x-add-button>

                            <a href="{{route('equipos.index')}}" class="hover:text-white text-white px-6 py-2 min-w-[120px] text-center bg-[#0C969C] border border-[#268085] rounded active:text-violet-500 hover:bg-[#4cc0dd] focus:outline-none focus:ring inline-flex justify-center items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 48 48">
                                    <path fill="currentColor" fill-rule="evenodd" stroke="currentColor" stroke-linejoin="round" stroke-width="4" d="M44 40.836q-7.34-8.96-13.036-10.168t-10.846-.365V41L4 23.545L20.118 7v10.167q9.523.075 16.192 6.833q6.668 6.758 7.69 16.836Z" clip-rule="evenodd"/>
                                </svg>
                                <span>Volver Página Anterior</span>
                                
                            </a>

                        </div>
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>

    </x-app-layout>
</div>