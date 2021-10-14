@extends('maestra')

@section('titulo')
    Actualizar Modelo
@endsection

@section('contenido')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Modelo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('modelos.update', $modelo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('modelo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
