@extends('maestra')

@section('titulo')
    {{ $articulo->name ?? 'Ver Articulo' }}
@endsection

@section('contenido')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Articulo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-success" href="{{ route('articulos.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion Articulo:</strong>
                            {{ $articulo->descripcion_articulo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
