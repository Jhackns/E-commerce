<div>
<form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-4xl mx-auto">
  <h2 class="text-2xl font-bold mb-6 text-gray-800">Información del Cliente</h2>
  <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
      <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre_cliente">
        Nombre del Cliente:
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre_cliente" type="text" placeholder="Nombre completo">
    </div>
    <div>
      <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
        Correo Electrónico:
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="correo@ejemplo.com">
    </div>
    <div>
      <label class="block text-gray-700 text-sm font-bold mb-2" for="telefono">
        Teléfono:
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="telefono" type="tel" placeholder="+51-987 613 542">
    </div>
    <div>
      <label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">
        Dirección:
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="direccion" type="text" placeholder="Calle, Ciudad, País">
    </div>
    <div>
      <label class="block text-gray-700 text-sm font-bold mb-2" for="id_cliente">
        Número de Identificación del Cliente:
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="id_cliente" type="text" placeholder="DNI/RUC">
    </div>
  </div>

  <h2 class="text-2xl font-bold mb-6 mt-8 text-gray-800">Información de la Venta</h2>
  <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
      <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_venta">
        Fecha de la Venta:
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fecha_venta" type="date">
    </div>
    <div>
      <label class="block text-gray-700 text-sm font-bold mb-2" for="numero_factura">
        Número de Factura:
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="numero_factura" type="text" placeholder="FAC-001">
    </div>
    <div>
      <label class="block text-gray-700 text-sm font-bold mb-2" for="metodo_pago">
        Método de Pago:
      </label>
      <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="metodo_pago">
        <option>Tarjeta de Crédito</option>
        <option>Tarjeta de Débito</option>
        <option>PayPal</option>
        <option>Efectivo</option>
        <option>Transferencia Bancaria</option>
      </select>
    </div>
    <div>
      <label class="block text-gray-700 text-sm font-bold mb-2" for="descuento">
        Descuento:
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="descuento" type="number" step="0.01" min="0" placeholder="0.00">
    </div>
  </div>

  <h2 class="text-2xl font-bold mb-6 mt-8 text-gray-800">Información del Producto</h2>
  <div id="productos" class="mb-4">
    <div class="grid grid-cols-5 gap-2 mb-2">
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Código del Producto">
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Nombre del Producto">
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" placeholder="Cantidad" min="1">
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" placeholder="Precio Unitario" step="0.01" min="0">
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" placeholder="Total Parcial" step="0.01" min="0" readonly>
    </div>
  </div>
  <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-4" onclick="agregarProducto()">
    Agregar Producto
  </button>

  <h2 class="text-2xl font-bold mb-6 mt-8 text-gray-800">Totales</h2>
  <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
      <label class="block text-gray-700 text-sm font-bold mb-2" for="total_descuentos">
        Total de Descuentos:
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="total_descuentos" type="number" step="0.01" min="0" readonly>
    </div>
    
    <div>
      <label class="block text-gray-700 text-sm font-bold mb-2" for="total_general">
        Total General:
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="total_general" type="number" step="0.01" min="0" readonly>
    </div>
  </div>

  <div class="flex items-center justify-between">
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
      Registrar Venta
    </button>
    <div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
      Generar Boleta
    </button>
    </div>
    
  </div>
</form>

<script>
function agregarProducto() {
  const productosDiv = document.getElementById('productos');
  const nuevoProducto = document.createElement('div');
  nuevoProducto.className = 'grid grid-cols-5 gap-2 mb-2';
  nuevoProducto.innerHTML = `
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Código del Producto">
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Nombre del Producto">
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" placeholder="Cantidad" min="1">
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" placeholder="Precio Unitario" step="0.01" min="0">
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" placeholder="Total Parcial" step="0.01" min="0" readonly>
  `;
  productosDiv.appendChild(nuevoProducto);
}
</script>
</div>
