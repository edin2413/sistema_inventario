@extends("maestra")
@section("titulo", "Editar cliente")
@section("contenido")
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Editar Cliente</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route("clientes.update", [$cliente])}}">
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label class="label">Nombre</label>
                            <input required value="{{$cliente->nombre}}" autocomplete="off" name="nombre" class="form-control"
                                type="text" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label class="label">Teléfono</label>
                            <input required value="{{$cliente->telefono}}" autocomplete="off" name="telefono"
                                class="form-control"
                                type="text" placeholder="Teléfono">
                        </div>

                        @include("notificacion")
                        <a class="btn btn-success" href="{{route("clientes.index")}}">Atras</a>
                        <button class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
