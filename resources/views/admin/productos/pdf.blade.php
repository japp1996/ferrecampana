<h1>Listado de productos</h1>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Categoría</th>
      <th>Stock</th>
      <th>Unidad</th>
      <th>Precio</th>
    </tr>
  </thead>
  <tbody>
    @foreach($productos as $producto)
      <tr>
        <td>{{ $producto->id }}</td>
        <td>{{ $producto->name }}</td>
        <td>{{ $producto->id_categoria }}</td>
        <td>{{ $producto->stock }}</td>
        <td>{{ $producto->unity }}</td>
        <td>{{ $producto->price }}</td>
      </tr>
    @endforeach
  </tbody>
</table>