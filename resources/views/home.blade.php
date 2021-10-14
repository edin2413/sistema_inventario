@extends('maestra')
@section("titulo", "Inicio")
@section('contenido')

    <div class="col-12 text-center">
        <h1>Bienvenido, {{Auth::user()->name}}</h1>
    </div>
    <br><br>
    <center>
        <h1>Sistema de Inventario <br>  DIDITAL CELULAR BOLIVAR</h1>
    </center>
    
    {{--  @foreach([
    ["articulos", "marcas", "modelos", "productos", "ventas", "vender", "clientes"],
    ["usuarios"]
    ] as $modulos)
    <div class="container-fluid">
            <div class="row">
                @foreach($modulos as $modulo)
                    <div class="col-12 col-md-2">
                        <div class="card">
                            <img class="card-img-top" src="{{url("public/img/$modulo.png")}}">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{$modulo === "" ? "Inicio" : ucwords($modulo)}}
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach  --}}
@endsection
