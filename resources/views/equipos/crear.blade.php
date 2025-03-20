<div>
    <x-app-layout>
        <x-slot name='header'>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-center">
                {{ __('AGREGAR EQUIPOS MEDICOS') }}
            </h2>
        </x-slot>
    
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl w-full">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-center">
                            AGREGAR EQUIPO MEDICO
                        </h2>
                    </div>
                    <form action="{{ route('equipos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="p-6 grid grid-cols-2 gap-4">
                        <div>
                            <label for="codigo_activo" class="text-sm">CODIGO ACTIVOS <span class="text-red-600">*</span></label>
                            <input 
                                type="text"
                                id="codigo_activo"
                                name="codigo_activo"
                                class="border p-3 shadow-md border-gray-700 rounded-lg w-full"
                                placeholder="Codigo Activo"
                                required
                            />
                        </div>

                        <div>
                            <label for="codigo_biomedica" class="text-sm">CODIGO BIOMEDICA <span class="text-red-600">*</span></label>
                            <input 
                                type="text"
                                id="codigo_biomedica"
                                name="codigo_biomedica"
                                class="border p-3 shadow-md border-gray-700 rounded-lg w-full"
                                placeholder="Codigo Biomedica"
                                required
                            />
                        </div>

                        <div>
                            <label for="modelo_equipo" class="text-sm">MODELO <span class="text-red-600">*</span></label>
                            <input 
                                type="text"
                                id="modelo_equipo"
                                name="modelo_equipo"
                                class="border p-3 shadow-md border-gray-700 rounded-lg w-full"
                                placeholder="Modelo del equipo"
                                required
                            />
                        </div>

                        <div>
                            <label for="numero_serie" class="text-sm">Nº DE SERIE <span class="text-red-600">*</span></label>
                            <input 
                                type="text"
                                id="numero_serie"
                                name="numero_serie"
                                class="border p-3 shadow-md border-gray-700 rounded-lg w-full"
                                placeholder="Nº Serie del equipo"
                                required
                            />
                        </div>
                    </div>

                    <div class="p-6 grid grid-cols-2 gap-4">
                        <div>
                            <label for="nombre_equipo" class="text-sm">NOMBRE DEL EQUIPO <span class="text-red-600">*</span></label>
                            <input 
                                type="text"
                                id="nombre_equipo"
                                name="nombre_equipo"
                                class="border p-3 shadow-md border-gray-700 rounded-lg w-full"
                                placeholder="Nombre del equipo"
                                required
                            />
                        </div>

                        <div>
                            <label for="servicio_equipo" class="text-sm">SERVICIO <span class="text-red-600">*</span></label>
                            <input 
                                type="text"
                                id="servicio_equipo"
                                name="servicio_equipo"
                                class="border p-3 shadow-md border-gray-700 rounded-lg w-full"
                                placeholder="Servicio"
                                required
                            />
                        </div>

                        <div>
                            <label for="dependencia_equipo" class="text-sm">DEPENDENCIA <span class="text-red-600">*</span></label>
                            <input 
                                type="text"
                                id="dependencia_equipo"
                                name="dependencia_equipo"
                                class="border p-3 shadow-md border-gray-700 rounded-lg w-full"
                                placeholder="Dependencia"
                                required
                            />
                        </div>

                        <div>
                            <label for="marca_equipo" class="text-sm">MARCA <span class="text-red-600">*</span></label>
                            <input 
                                type="text"
                                id="marca_equipo"
                                name="marca_equipo"
                                class="border p-3 shadow-md border-gray-700 rounded-lg w-full"
                                placeholder="Marca"
                                required
                            />
                        </div>
                        
                    </div >
                    {{-- Data Picker Mantenimiento --}}
                    
                    <div class="p-6 grid grid-cols-2 gap-4">
                        <div>
                            <label for="fecha_adquisicion" class="text-base">FECHA DE ADQUISICION <span class="text-red-600">*</span></label>
                            <input 
                                type="date" 
                                id="fecha_adquisicion" 
                                name="fecha_adquisicion"
                                class="p-3 w-full max-w-xs rounded-lg border-2 border-teal-700 bg-gray-100 text-gray-700 text-base focus:outline-none focus:ring-2 focus:ring-teal-400 focus:border-teal-400 transition-shadow"
                            />
                        </div>
                        <div>
                            <label for="fecha_funcionamiento" class="text-base">FECHA DE FUNCIONAMIENTO <span class="text-red-600">*</span></label>
                            <input 
                                type="date" 
                                id="fecha_funcionamiento" 
                                name="fecha_funcionamiento"
                                class="p-3 w-full max-w-xs rounded-lg border-2 border-teal-700 bg-gray-100 text-gray-700 text-base focus:outline-none focus:ring-2 focus:ring-teal-400 focus:border-teal-400 transition-shadow"
                            />
                        </div>
                    </div>
                    <div class="p-6 grid grid-cols-2 gap-4">
                        <div>
                            <label for="frecuencia_uso">FRECUENCIA DE USO <span class="text-red-600">*</span></label>
                            <select name="frecuencia_uso" class="relative w-full bg-white border border-gray-800 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-12 text-lg mb-5">
                                <option value="" class="text-lg">Seleccionar Frecuencia</option>
                                    <option value="DIARIO" class="text-lg">Diario</option>
                                    <option value="MENSUAL" class="text-lg">Mensual</option>
                                    <option value="TRIMESTRAL" class="text-lg">Trimestral</option>
                                    <option value="SEMESTRAL" class="text-lg">Semestral</option>
                                    <option value="ANUAL" class="text-lg">Anual</option>
                            </select>
                        </div>
                        <div>
                            <label for="frecuencia_mantenimiento">FRECUENCIA DE MANTENIMIENTO <span class="text-red-600">*</span></label>
                            <select name="frecuencia_mantenimiento" class="relative w-full bg-white border border-gray-800 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-12 text-lg">
                                <option value="" class="text-lg">Seleccionar Frecuencia</option>
                                    <option value="DIARIO" class="text-lg">Diario</option>
                                    <option value="MENSUAL" class="text-lg">Mensual</option>
                                    <option value="SEMESTRAL" class="text-lg">Semestral</option>
                                    
                            </select>
                        </div>
                    </div>
                    <div class="pL-6 pr-6 grid grid-cols-2 gap-4">
                        <div>
                            <label for="estado_equipo" class="text-base">ESTADO DEL EQUIPO <span class="text-red-600">*</span></label>
                            <select name="estado_equipo" class="relative w-full bg-white border border-gray-800 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-12 text-lg mb-5">
                                <option value="" class="text-lg">Seleccionar Estado</option>
                                    <option value="NUEVO" class="text-lg">Nuevo</option>
                                    <option value="REGULAR" class="text-lg">Regular</option>
                                    <option value="MALO" class="text-lg">Malo</option>
                                    
                            </select>
                        </div>

                        <div>
                            <label for="garantia_equipo" class="text-base">GARANTIA DEL EQUIPO <span class="text-red-600">*</span></label>
                            <select name="garantia_equipo" class="relative w-full bg-white border border-gray-800 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-12 text-lg mb-5">
                                <option value="" class="text-lg">Seleccionar Garantia</option>
                                    <option value="3" class="text-lg">3 MESES</option>
                                    <option value="6" class="text-lg">6 MESES</option>
                                    <option value="12" class="text-lg">12 MESES</option>
                                    
                            </select>
                        </div>
                    </div>
                    {{-- Fin Mantenimiento--}}
                    <div class="pl-6 pr-6">
                        <label for="categoria" class="text-base ">CATEGORIA <span class="text-red-600">*</span></label>
                        <select name="categoria" class="relative w-full bg-white border border-gray-800 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-12 text-lg">
                            <option class="text-lg" value="">Seleccionar Categoria</option>
                            @foreach ($categorias as $categoria)
                                <option class="text-lg" value="{{ $categoria->id_categoria }}" {{ $categoria->id_categoria == ($currentCategorias ?? null) ? 'selected' : '' }}>
                                    {{$categoria->nombre_categoria}}
                                </option>
                            @endforeach
                        </select>
                        
                        
                    </div>

                    <div class="pl-6 pr-6 mt-3">
                        <label for="proveedor" class="text-base">PROVEEDOR <span class="text-red-600">*</span></label>
                        <select name="proveedor" class="relative w-full bg-white border border-gray-800 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm h-12 text-lg">
                            <option class="text-lg" value="">Seleccionar Proveedor</option>
                            @foreach ($proveedor as $proveedor)
                                <option class="text-lg" value="{{ $proveedor->id_proveedor }}" {{ $proveedor->id_proveedor == ($currentProveedor ?? null) ? 'selected' : '' }}>
                                    {{$proveedor->nombre_empresa}}: {{$proveedor->nombre_proveedor}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    
                    
                    <div class="p-6 mt-0">

                        <label for="feature" class="text-sm">FOTO DEL EQUIPO <span class="text-red-600">*</span></label>
                        <input 
                            type="file"
                            id="feature"
                            name="feature"
                            class="border p-3 shadow-md border-gray-700 rounded-lg w-full mb-3"
                            required
                        />

                        <label for="descripcion_equipo" class="">DESCRIPCION DEL EQUIPO<span class="text-red-600 inline-block p-1 text-sm">*</span></label>
                        
                        <textarea id="descripcion_equipo" name="descripcion_equipo" rows="4" cols="50" class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg flex w-full"></textarea>

                        

                        <div class="mt-5">
                            <label for="observacion_equipo" class="">OBSERVACIONES DEL EQUIPO<span class="text-red-600 inline-block p-1 text-sm">*</span></label>
                        <textarea id="observacion_equipo" name="observacion_equipo" rows="4" cols="50" class="border p-3 shadow-md border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg flex w-full"></textarea>
                        </div>

                        <div class="mt-5 inline-flex space-x-5">
                            <x-add-button class="">
                                Agregar equipo
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

