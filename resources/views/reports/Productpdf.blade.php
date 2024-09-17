<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Productos</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #333;
            line-height: 1.4;
            font-size: 14px;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 15px 0;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin: 0;
            font-size: 1.8em;
        }

        main {
            padding: 20px;
            max-width: 900px;
            margin: 0 auto;
        }

        #currentDateTime {
            text-align: center;
            font-size: 1em;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: white;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #3498db;
            color: white;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            text-transform: uppercase;
            font-weight: bold;
            font-size: 0.9em;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #e8f4f8;
            transition: background-color 0.3s ease;
        }

        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
            font-size: 0.9em;
        }

        @media screen and (max-width: 600px) {
            body {
                font-size: 12px;
            }

            th,
            td {
                padding: 7px;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Reporte de Productos</h1>
    </header>
    <main>
        <div id="currentDateTime"></div>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2024 Reporte de Productos. Todos los derechos reservados.</p>
    </footer>
    @push('js')
        <script>
            function updateDateTime() {
                var now = new Date();
                var options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: true
                };
                var formattedDateTime = now.toLocaleDateString('es-ES', options);
                document.getElementById('currentDateTime').textContent = formattedDateTime;
            }

            updateDateTime();
            setInterval(updateDateTime, 1000);
        </script>
    @endpush
</body>

</html>
