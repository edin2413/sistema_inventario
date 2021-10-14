@extends("maestra")
@section("titulo", "Realizar venta")
@section('lib')
    
    <meta name="_token" content="{{ csrf_token() }}">
 
    
    <script src="{{ asset('public/lib/jquery-3.5.1/jquery-3.5.1.js') }}"></script>
    
    <link href="{{ asset('public/lib/select2-4.0.13/css/select2.min.css') }}" rel="stylesheet">  
    <link href="{{ asset('public/lib/select2-4.0.13/css/select2-bootstrap4.min.css') }}" rel="stylesheet">  
    <script src="{{ asset('public/lib/select2-4.0.13/js/select2.min.js') }}"></script> 
    <script src="{{ asset('public/lib/select2-4.0.13/js/i18n/es.js') }}"></script>
    
    <script src="{{ asset('public/js/vender/form.js') }}"></script>

 
@endsection

@section("contenido")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Nueva venta <i class="fa fa-cart-plus"></i></h1>
                @include("notificacion")



                <div class="row">
                    
                    <div class="col-12 col-md-6">
                        <form action="{{route("agregarProductoVenta")}}" method="post" id="form-prod">
                        
                            @csrf

                            <input id="codigo_barras" autocomplete="off" required autofocus name="codigo_barras" type="hidden" class="form-control" placeholder="Código de barras">
                            
                            
                                <label>Buscador de productos:</label>
                                <div class="input-group-append">
                                    <select class="form-control select2" name="search">
                                    </select>
                                
                                    <button type="submit" id="bt_add" class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Agregar</button>
                                </div>
                        </form>
                    </div>
                </div>

                <hr>
                    
                        
                @if(session("productos") !== null)
                    <div class="card card-default">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span class="card-title">
                                    <h3> 
                                    {{ __('Producto Agregados: ') }}
                                    </h3>
                                </span>

                                <div class="float-right">
                                    
                                    <h3> Total:  ${{number_format($total, 2)}} </h3>
                                
                                </div>

                            </div>   
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="productos_agragados" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
                                        <thead class="bg-primary text-white">
                                    <tr>
                                        <th>Articulo</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Descripción</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(session("productos") as $producto)
                                        <tr>
                                            <td>--</td>
                                            <td>--</td>
                                            <td>--</td>
                                            <td>{{$producto->descripcion}}</td>
                                            <td>${{number_format($producto->precio_venta, 2)}}</td>
                                            <td>{{$producto->cantidad}}</td>
                                            <td>
                                                <form action="{{route("quitarProductoDeVenta")}}" method="post">
                                                    @method("delete")
                                                    @csrf
                                                    <input type="hidden" name="indice" value="{{$loop->index}}">
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-trash">Eliminar</i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <form action="{{route("terminarOCancelarVenta")}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="id_cliente">Cliente</label>
                                    <select required class="form-control" name="id_cliente" id="id_cliente">
                                        @foreach($clientes as $cliente)
                                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="cliente" id="cliente">
                                </div>
                                @if(session("productos") !== null)
                                    <div class="form-group">
                                        <button name="accion" value="cancelar" type="submit" class="btn btn-danger">Cancelar
                                            venta
                                        </button>
                                        <button name="accion" value="terminar" type="submit" class="btn btn-success">Terminar
                                            venta
                                        </button>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>

                    

                            

                @else
                    --
                @endif

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('public/lib/datatables.1.10.25/js/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ asset('public/lib/datatables.1.10.25/js/dataTables.bootstrap5.min.js') }}"></script>     
    <script>
        $(document).ready(function() {
            $('#productos_agragados').DataTable({
                "lenthMenu": [[5,10, 50, -1], [5,10, 50, "All"]],
                language: {
                    url: 'public/lib/datatables.1.10.25/plug-ins/1.10.15/i18n/Spanish.json'
                    //url: 'https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                },
            });




        });


    </script>

   
@endsection


