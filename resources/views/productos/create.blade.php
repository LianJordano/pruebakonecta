@extends('plantilla.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Crear producto</h1>
        </div>

        <div class="card-body">
            <form class="mt-5" method="POST" action="{{ route('productos.store') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 col-lg-6">
                        <label for="nombre_producto">Nombre de producto</label>
                        <input type="text" class="form-control" name="nombre_producto" placeholder="Nombre del producto">
                        @if ($errors->has('nombre_producto'))
                            <div class="alert alert-danger">
                                {{ $errors->first('nombre_producto') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-6 col-lg-6">
                        <label for="referencia">Referencia</label>
                        <input type="text" class="form-control" name="referencia" placeholder="Referencia del producto">
                        @if ($errors->has('referencia'))
                        <div class="alert alert-danger">
                            {{ $errors->first('referencia') }}
                        </div>
                    @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-lg-6">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" name="precio" placeholder="Precio del producto">
                        @if ($errors->has('precio'))
                        <div class="alert alert-danger">
                            {{ $errors->first('precio') }}
                        </div>
                    @endif
                    </div>
                    <div class="form-group col-md-6 col-lg-6">
                        <label for="peso">Peso</label>
                        <input type="text" class="form-control" name="peso" placeholder="Peso del producto">
                        @if ($errors->has('peso'))
                        <div class="alert alert-danger">
                            {{ $errors->first('peso') }}
                        </div>
                    @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-lg-6">
                        <label for="categoria">Categoría</label>
                        <select name="categoria" class="form-control">
                            <option disabled selected>Seleccione...</option>
                            <option value="cat 1">cat 1</option>
                            <option value="cat 2">cat 2</option>
                            <option value="cat 3">cat 3</option>
                            <option value="cat 4">cat 4</option>
                        </select>
                        @if ($errors->has('categoria'))
                        <div class="alert alert-danger">
                            {{ $errors->first('categoria') }}
                        </div>
                    @endif
                    </div>

                    <div class="form-group col-md-6 col-lg-6">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="stock">
                        @if ($errors->has('stock'))
                        <div class="alert alert-danger">
                            {{ $errors->first('stock') }}
                        </div>
                    @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-lg-6">
                        <label for="fecha_creacion">Fecha</label>
                        <input type="date" class="form-control" name="fecha_creacion" >
                        @if ($errors->has('fecha_creacion'))
                        <div class="alert alert-danger">
                            {{ $errors->first('fecha_creacion') }}
                        </div>
                    @endif
                    </div>
                </div>

                <button type="submit" style="float: right" class="btn btn-primary mt-3">Crear producto</button>
            </form>
        </div>

    </div>
@endsection
