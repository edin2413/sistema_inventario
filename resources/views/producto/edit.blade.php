@extends('maestra')

@section('titulo')
    Actalizar Producto
@endsection


@section('contenido')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actalizar Producto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('productos.update', $producto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('producto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{ asset('public/lib/jquery-3.5.1/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('public/js/productos/form.js') }}"></script>  

    <script>
            verificarExistencia();
    </script>
@endsection





