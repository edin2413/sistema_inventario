@extends('maestra')

@section('titulo')
    Crear Modelo
@endsection

@section('contenido')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Modelo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('modelos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('modelo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
