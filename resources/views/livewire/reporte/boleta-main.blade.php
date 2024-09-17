<div>
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleta Electrónica</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4 max-w-2xl">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <!-- Encabezado de la boleta -->
            <div class="bg-blue-600 text-white p-4">
                <h1 class="text-2xl font-bold text-center">Boleta Electrónica</h1>
            </div>
            
            <!-- Información de la empresa -->
            <div class="p-4 border-b">
                <h2 class="text-xl font-semibold mb-2">Empresa XYZ</h2>
                <p class="text-gray-600">RUC: 20123456789</p>
                <p class="text-gray-600">Dirección: Av. Principal 123, Ciudad</p>
                <p class="text-gray-600">Teléfono: (01) 234-5678</p>
            </div>
            
            <!-- Detalles de la venta -->
            <div class="p-4 border-b">
                <p class="font-semibold">Número de Boleta: <span class="font-normal">B001-00001234</span></p>
                <p class="font-semibold">Fecha de Emisión: <span class="font-normal">01/07/2024</span></p>
            </div>
            
            <!-- Información del cliente -->
            <div class="p-4 border-b">
                <h3 class="font-semibold mb-2">Cliente:</h3>
                <p>Nombre: Juan Pérez</p>
                <p>DNI: 12345678</p>
            </div>
            
            <!-- Detalle de productos -->
            <div class="p-4">
                <table class="w-full mb-4">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-2 text-left">Descripción</th>
                            <th class="p-2 text-right">Cantidad</th>
                            <th class="p-2 text-right">P.U.</th>
                            <th class="p-2 text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-2 border-b">Producto A</td>
                            <td class="p-2 border-b text-right">2</td>
                            <td class="p-2 border-b text-right">$10.00</td>
                            <td class="p-2 border-b text-right">$20.00</td>
                        </tr>
                        <tr>
                            <td class="p-2 border-b">Producto B</td>
                            <td class="p-2 border-b text-right">1</td>
                            <td class="p-2 border-b text-right">$15.00</td>
                            <td class="p-2 border-b text-right">$15.00</td>
                        </tr>
                    </tbody>
                </table>
                
                <!-- Totales -->
                <div class="flex justify-end">
                    <div class="w-1/2">
                        <div class="flex justify-between mb-2">
                            <span class="font-semibold">Subtotal:</span>
                            <span>$35.00</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="font-semibold">IGV (18%):</span>
                            <span>$6.30</span>
                        </div>
                        <div class="flex justify-between font-bold">
                            <span>Total:</span>
                            <span>$41.30</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pie de la boleta -->
            <div class="bg-gray-100 p-4 text-center text-sm text-gray-600">
                <p>Gracias por su compra</p>
                <p>Esta es una representación impresa de la Boleta Electrónica</p>
            </div>
        </div>
    </div>
</body>
</html>
</div>
