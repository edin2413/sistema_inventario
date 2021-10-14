@extends('maestra')

@section('titulo')
    {{ $marca->name ?? 'Ver Marca' }}
@endsection

@section('contenido')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Marca</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-success" href="{{ route('marcas.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion Marca:</strong>
                            {{ $marca->descripcion_marca }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
