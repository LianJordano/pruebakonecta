@extends('plantilla.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Lista de productos</h1>
            <a class="btn btn-secondary float-right mb-2" style="float:right" href="{{ route('productos.create') }}">Crear
                Producto</a>
        </div>

        @if (session('info'))
            <div class="alert alert-success mt-4">
                <strong>{{ session('info') }}</strong>
            </div>
        @endif
        <div class="card-body">
            @if (count($productos) > 0)

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Referencia</th>
                        <th>Precio</th>
                        <th>Peso</th>
                        <th>Categoría</th>
                        <th>Stock</th>
                        <th>Fecha Creación</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                        @foreach ($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->nombre_producto }}</td>
                                <td>{{ $producto->referencia }}</td>
                                <td>$ {{ $producto->precio }}</td>
                                <td>{{ $producto->peso }} Lb</td>
                                <td>{{ $producto->categoria }}</td>
                                <td>{{ $producto->stock }}</td>
                                <td>{{ $producto->fecha_creacion }}</td>
                                <td width="10px">
                                    <a class="btn btn-sm btn-warning"
                                        href="{{ route('productos.edit', $producto) }}">Editar</a>
                                </td>
                                <td width="10px">
                                    <form action="{{ route('productos.destroy', $producto) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
            @else
            <h3 class="text-center">No existen productos registrados actualmente</h3>
         @endif

            <tfoot>
                {{ $productos->links('pagination::bootstrap-4') }}
            </tfoot>
        </div>

    </div>
@endsection
