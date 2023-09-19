@extends('plantilla.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Ventas</h1>
        <a class="btn btn-secondary float-right mb-2" style="float:right" href="{{ route('ventas.create') }}">Crear
            venta</a>
    </div>

    @if (session('info'))
        <div class="alert alert-success mt-4">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger mt-4">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif
    <div class="card-body">
        @if (count($ventas) > 0)

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Fecha</th>
                </tr>
            </thead>

            <tbody>

                    @foreach ($ventas as $venta)
                        <tr>
                            <td>{{ $venta->id }}</td>
                            <td>{{ $venta->productos->nombre_producto }}</td>
                            <td>{{ $venta->cantidad }}</td>
                            <td>$ {{ $venta->precio_total }}</td>
                            <td>{{ $venta->created_at }}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">No existen ventas registradas actualmente</h3>
     @endif

        <tfoot>
            {{ $ventas->links('pagination::bootstrap-4') }}
        </tfoot>
    </div>

</div>
                        

    </div>
@endsection
