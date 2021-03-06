@extends('maestra')

@section('titulo')
    Actualizar Articulo
@endsection

@section('contenido')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Articulo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('articulos.update', $articulo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('articulo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
