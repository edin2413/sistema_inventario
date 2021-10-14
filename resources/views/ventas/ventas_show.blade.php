@extends("maestra")
@section("titulo", "Detalle de venta ")
@section("contenido")

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h3>
                                    {{ __('Detalle de Venta: ') }} #{{$venta->id}}
                                </h3>
                            </span>

                            
                            <h3>Cliente: <small>{{$venta->cliente->nombre}}</small></h3>

                            <div class="float-right">
                                <a href="{{ route('ventas.index') }}" class="btn btn-success btn"  data-placement="left"><i class="fa fa-fw fa-plus"></i>
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    {{ __('Atras') }}
                                </a>
                                <a class="btn btn-info disabled" href="{{route("ventas.ticket", ["id" => $venta->id])}}">
                                    <i class="fa fa-print"></i>&nbsp;Ticket
                                </a>
                            </div>
            
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="detalles_venta" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
                                <thead class="bg-primary text-white">
                                <tr>
                                    <th>Descripción</th>
                                    <th>Código de barras</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($venta->productos as $producto)
                                    <tr>
                                        <td>{{$producto->descripcion}}</td>
                                        <td>{{$producto->codigo_barras}}</td>
                                        <td>${{number_format($producto->precio, 2)}}</td>
                                        <td>{{$producto->cantidad}}</td>
                                        <td>${{number_format($producto->cantidad * $producto->precio, 2)}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="3"></td>
                                    <td><strong>Total</strong></td>
                                    <td>${{number_format($total, 2)}}</td>
                                </tr>
                                </tfoot>
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
            $('#detalles_venta').DataTable({
                "lenthMenu": [[5,10, 50, -1], [5,10, 50, "All"]],
                language: {
                    url: 'public/lib/datatables.1.10.25/plug-ins/1.10.15/i18n/Spanish.json'
                    //url: 'https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                },
            });
        } );
    </script>
@endsection
