<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cronograma de Mantenimiento de: {{$equipo->nombre_equipo}}</title>
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
            font-size: 25px;
            margin-bottom: 5px;
            color: #2c3e50;
            padding: 10px
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
            font-size: 20px;
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
    <table>
        <tr>
            <th colspan="2">Datos Generales del Equipo</th>
        </tr>
        @php
            $datosEquipo = [
                'Nombre del Equipo' => $equipo->nombre_equipo,
                'Marca' => $equipo->marca_equipo,
                'Modelo' => $equipo->modelo_equipo,
                'Número de Serie' => $equipo->numero_serie,
                'Estado' => $equipo->estado_equipo,
                'Fecha de Adquisición' => $equipo->fecha_adquisicion ? \Carbon\Carbon::parse($equipo->fecha_adquisicion)->translatedFormat('d \d\e F \d\e Y') : 'N/A',
            ];
            $datosMantenimiento = [
                'Fecha de Funcionamiento' => $equipo->fecha_funcionamiento ? \Carbon\Carbon::parse($equipo->fecha_adquisicion)->translatedFormat('d \d\e F \d\e Y') : 'N/A',
                'Frecuencia de Mantenimiento' => $equipo->frecuencia_mantenimiento,
                'Garantía (meses)' => $equipo->garantia_equipo,
            ];
            $datosProveedor = [
                'Nombre Proveedor' => $equipo->proveedor->nombre_empresa,
                'Encargado' => $equipo->proveedor->nombre_proveedor,
                'Contacto' => $equipo->proveedor->contacto_proveedor,
                'Direccion' => $equipo->proveedor->direccion_proveedor,
            ];
        @endphp
    
        @foreach ($datosEquipo as $key => $value)
            <tr>
                <th style="width: 50%;">{{ $key }}</th>
                <td style="width: 50%;">{{ $value }}</td>
            </tr>
        @endforeach
    </table>
    <table>
        <thead>
            <tr>
                <th colspan="2">Detalles de Mantenimiento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datosMantenimiento as $key=>$value)
            <tr>
                <th style="width: 50%;">{{$key}}</th>
                <td style="width: 50%;">{{$value }}</td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
    <h2 style="text-align: center">Cronograma de Mantenimiento</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Fecha de Mantenimiento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fechasMantenimiento as $index => $fecha)
                <tr style="text-align: center">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($fecha)->translatedFormat('d \d\e F \d\e Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>
