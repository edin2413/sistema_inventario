@extends("maestra")
@section("titulo", "Ventas")

@section("contenido")
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h3>
                                    {{ __('Ventas') }}
                                </h3>
                            </span>
                            @include("notificacion")

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="ventas" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
                                <thead class="bg-primary text-white">
                                <tr>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ventas as $venta)
                                    <tr>
                                        <td>{{$venta->created_at}}</td>
                                        <td>{{$venta->cliente->nombre}}</td>
                                        <td>${{number_format($venta->total, 2)}}</td>
                                        <td>
                                            <a class="btn btn-info disabled" title="Imprimir" href="{{route("ventas.ticket", ["id"=>$venta->id])}}">
                                                <i class="fa fa-print">Imprimir</i>
                                            </a>
                                    
                                            <a class="btn btn-success" title="Detalles de Venta" href="{{route("ventas.show", $venta)}}">
                                                <i class="fa fa-info"> Ver</i>
                                            </a>
                                        </td>
                                        
                                        {{--  <td>
                                            <form action="{{route("ventas.destroy", [$venta])}}" method="post">
                                                @method("delete")
                                                @csrf
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>  --}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{--  {!! $modelos->links() !!}  --}}
            </div>
        </div>
    </div>
    
@endsection
@section('js')
    <script src="{{ asset('public/lib/jquery-3.5.1/jquery-3.5.1.js') }}"></script> 
    <script src="{{ asset('public/lib/datatables.1.10.25/js/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ asset('public/lib/datatables.1.10.25/js/dataTables.bootstrap5.min.js') }}"></script>     
    <script>
        $(document).ready(function() {
            $('#ventas').DataTable({
                "lenthMenu": [[5,10, 50, -1], [5,10, 50, "All"]],
                language: {
                    url: 'public/lib/datatables.1.10.25/plug-ins/1.10.15/i18n/Spanish.json'
                    //url: 'https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                },
            });
        } );
    </script>
@endsection
