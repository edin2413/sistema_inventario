@extends("maestra")
@section("titulo", "Agregar usuario")
@section("contenido")
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Agregar usuario</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route("usuarios.store")}}">
                        @csrf
                        <div class="form-group">
                            <label class="label">Nombre</label>
                            <input required autocomplete="off" name="name" class="form-control"
                                type="text" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label class="label">Correo electrónico</label>
                            <input required autocomplete="off" name="email" class="form-control"
                                type="email" placeholder="Correo electrónico">
                        </div>
                        <div class="form-group">
                            <label class="label">Contraseña</label>
                            <input required autocomplete="off" name="password" class="form-control"
                                type="password" placeholder="Contraseña">
                        </div>

                        @include("notificacion")
                        <div class="box-footer mt20">
                            <a class="btn btn-success" href="{{ route('usuarios.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
                            <button type="submit" class="btn btn-success"> <i class="fa fa-fw fa-save"></i> Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
