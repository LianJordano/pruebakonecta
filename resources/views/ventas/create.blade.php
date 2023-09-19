@extends('plantilla.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Crear venta</h1>
        </div>

        <div class="card-body">
            <form class="mt-5" method="POST" action="{{ route('ventas.store') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6">
                        <label for="producto_id">Producto</label>
                        <select name="producto_id" class="form-control">
                            <option selected disabled>Seleccione</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}">{{ $producto->nombre_producto }} | Cantidad: {{ $producto->stock }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('producto_id'))
                            <div class="alert alert-danger">
                                {{ $errors->first('producto_id') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-6 col-lg-6">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" placeholder="Cantidad">
                        @if ($errors->has('cantidad'))
                            <div class="alert alert-danger">
                                {{ $errors->first('cantidad') }}
                            </div>
                        @endif
                    </div>
                </div>


                <button type="submit" style="float: right" class="btn btn-primary mt-3">Crear venta</button>
            </form>
        </div>

    </div>
@endsection
