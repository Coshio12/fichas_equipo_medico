<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Técnica del Equipo: {{$equipo->nombre_equipo}}</title>
    <style>
        
        .container {
            max-width: 900px;
            margin: auto;
            background-color: white;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 5px;
            color: #2c3e50;
        }
        .grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #009688;
            color: white;
            padding: 4px;
            text-align: center;
            border: 1px solid #ccc;
        }
        td {
            padding: 7px;
            border: 1px solid #ccc;
        }
        .image-container img {
            width: 150px;
            height: auto;
            max-height: 250px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #ccc;
            text-align: center;
            
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>FICHA TÉCNICA</h1>
        <table >
            <tr >
                <th style="width: 70%;">1. Datos del Equipo</th>
                <th style="width: 30%;">2. Fotografía del Equipo</th>
            </tr>
            <tr>
                <td>
                    <strong>Código Activo:</strong> {{ $equipo->codigo_activo }}<br>
                    <strong>Código Biomédica:</strong> {{ $equipo->codigo_biomedica }}<br>
                    <strong>Servicio:</strong> {{ $equipo->servicio_equipo }}<br>
                    <strong>Dependencia:</strong> {{ $equipo->dependencia_equipo }}<br>
                    <strong>Nombre del Equipo:</strong> {{ $equipo->nombre_equipo }}<br>
                    <strong>Marca:</strong> {{ $equipo->marca_equipo }}<br>
                    <strong>Modelo:</strong> {{ $equipo->modelo_equipo }}<br>
                    <strong>Número de Serie:</strong> {{ $equipo->numero_serie }}<br>
                    <strong>Categoria: </strong>{{$equipo->categoria->nombre_categoria}}
                </td>
                <td class="image-container">
                    @if ($equipo->feature)
                        <img src="{{ public_path($equipo->feature) }}" alt="Fotografía del Equipo" >
                    @endif
                </td>
            </tr>
        </table>
        

        <table>
            <tr>
                <th style="width: 50%;" class="section-title" >3. Descripción</th>
                <th style="width: 50%;" class="section-title">4. Observaciones</th>
            </tr>
            <tr>
                <td >{{ $equipo->descripcion_equipo }}</td>
                <td >{{$equipo->observacion_equipo}}</td>
            </tr>
        </table>

        <table>
            <tr>
                <th style="width: 33.33%;">5.1 Frecuencia de Uso</th>
                <th style="width: 33.33%;">5.2 Estado del Equipo</th>
                <th style="width: 33.33%;">5.3 Frecuencia de Mantenimiento</th>
            </tr>
            <tr>
                <td style="text-align: center">{{ $equipo->frecuencia_uso }}</td>
                <td style="text-align: center">{{ $equipo->estado_equipo }}</td>
                <td style="text-align: center">{{ $equipo->frecuencia_mantenimiento }}</td>
            </tr>
        </table>

        <table>
            <tr>
                <th style="width: 50%;">5.4 Datos tecnicos</th>
                <th style="width: 50%;">5.5 Documentación</th>
            </tr>
            <tr>
                <td style="width: 50%;">
                    <ul>
                        @if ($equipo->datos_tecnicos->isEmpty())
                            No hay datos tecnicos
                        @endif
                        @foreach ($equipo->datos_tecnicos as $data)
                            <li><strong>{{$data->atributo}}: </strong>{{$data->valor}}</li>
                        @endforeach
                    </ul>
                </td>
                <td style="width: 50%;">
                    <ul>
                        @if ($equipo->documentacion->isEmpty())
                            No hay documentación registrada.
                        @endif
                            
                        @foreach ($equipo->documentacion as $doc)
                                <li>{{ $doc->nombre_documento }}</li>
                        @endforeach
                            
                        
                    </ul>
                    
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <th style="width: 50%;">6.1 Condiciones de Compra</th>
                <th style="width: 50%;">6.2 Datos del Proveedor</th>
            </tr>
            <tr>
                <td style="width: 50%;">
                    <strong>Fecha de Recepción:</strong> {{ $equipo->fecha_adquisicion }}<br>
                    <strong>Fecha Puesto en Marcha:</strong> {{$equipo->fecha_funcionamiento}} <br>
                    <strong>Estado:</strong> {{ $equipo->estado_equipo }}
                </td>
                <td style="width: 50%;">
                    <strong>Empresa:</strong> {{ $equipo->proveedor->nombre_empresa ?? 'N/A' }}<br>
                    <strong>Encargado:</strong> {{ $equipo->proveedor->nombre_proveedor ?? 'N/A' }}<br>
                    <strong>Dirección:</strong> {{ $equipo->proveedor->direccion_proveedor ?? 'N/A' }} <br>
                    <strong>Telefono:</strong> {{ $equipo->proveedor->contacto_proveedor ?? 'N/A' }} <br>
                    <strong>Garantía</strong> {{$equipo->garantia_equipo}} Meses

                </td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">7. Actividades a controlar tras la puesta en servicio:</th>
            </tr>
            <tr>
                <td style="width: 33.33%;">
                    <strong>Calibración</strong>
                    
                </td>
                <td style="width: 33.33%;">
                    <strong>Verificación</strong>
                </td>
                <td style="width: 33.33%;">
                    <strong>Mantenimiento</strong>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 50%;">
                    <br>
                    <br>
                    <br>
                    <hr>
                    <p style="text-align: center">Soporte Tecnico</p>
                </td>   
                <td style="width: 50%;">
                    <br>
                    <br>
                    <br>
                    <hr>
                    <p style="text-align: center; " >Encargado de Servicio</p>
                </td>   
            </tr>
        </table>
    </div>
</body>
</html>
