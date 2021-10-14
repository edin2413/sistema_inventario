@extends('maestra')

@section('titulo')
    {{ $modelo->name ?? 'Ver Modelo' }}
@endsection

@section('contenido')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Modelo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-success" href="{{ route('modelos.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Marcas Id:</strong>
                            {{ $modelo->marca_id }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion Modelo:</strong>
                            {{ $modelo->descripcion_modelo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
