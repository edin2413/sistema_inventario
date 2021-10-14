@extends("maestra")
@section("titulo", "Editar usuario")
@section("contenido")
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Modelo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route("usuarios.update", [$usuario])}}">
                            @method("PUT")
                            @csrf
                            <div class="form-group">
                                <label class="label">Nombre</label>
                                <input required value="{{$usuario->name}}" autocomplete="off" name="name" class="form-control"
                                    type="text" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label class="label">Correo electrónico</label>
                                <input required value="{{$usuario->email}}" autocomplete="off" name="email" class="form-control"
                                    type="email" placeholder="Correo electrónico">
                            </div>
                            <div class="form-group">
                                <label class="label">Contraseña</label>
                                <input required value="{{$usuario->password}}" autocomplete="off" name="password"
                                    class="form-control"
                                    type="password" placeholder="Contraseña">
                            </div>

                            @include("notificacion")
                            <button class="btn btn-success">Guardar</button>
                            <a class="btn btn-primary" href="{{route("usuarios.index")}}">Volver</a>
                        </form>
                    </div>
            </div>
        </div>
    </section>
@endsection
