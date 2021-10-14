@extends("maestra")
@section("titulo", "Agregar cliente")
@section("contenido")
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Agregar Cliente</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route("clientes.store")}}">
                        @csrf
                        <div class="form-group">
                            <label class="label">Nombre</label>
                            <input required autocomplete="off" name="nombre" class="form-control"
                                type="text" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label class="label">Teléfono</label>
                            <input required autocomplete="off" name="telefono" class="form-control"
                                type="text" placeholder="Teléfono">
                        </div>

                        @include("notificacion")
                        <div class="box-footer mt20">
                            <a class="btn btn-success" href="{{ route('clientes.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
                            <button type="submit" class="btn btn-success"> <i class="fa fa-fw fa-save"></i> Guardar</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
