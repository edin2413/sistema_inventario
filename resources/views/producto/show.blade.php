@extends('maestra')

@section('titulo')
    {{ $producto->name ?? 'Ver Producto' }}
@endsection

@section('contenido')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-success" href="{{ route('productos.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="productos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>No</th>
                                        
                                        <th>Artículo</th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Descripcion</th>
										<th>Precio Compra</th>
										<th>Precio Venta</th>
                                        <th>Total</th>
                                        <th>Entrada</th>
										<th>Existencia</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>{{ $producto->descripcion }}</td>
											<td>{{ $producto->descripcion_marca }}</td>
											<td>{{ $producto->descripcion_modelo }}</td>
											<td>{{ $producto->descripcion }}</td> 
											<td>{{ $producto->precio_compra }}</td>
											<td>{{ $producto->precio_venta }}</td>
                                            <td>{{ $producto->cantidad_base }}</td>
                                            <td>{{ $producto->existencia_agregar }}</td>
											<td>{{ $producto->existencia_actual }}</td>

                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{ asset('public/lib/jquery-3.5.1/jquery-3.5.1.js') }}"></script> 
    <script src="{{ asset('public/lib/datatables.1.10.25/js/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ asset('public/lib/datatables.1.10.25/js/dataTables.bootstrap5.min.js') }}"></script>     
    <script>
        $(document).ready(function() {
            $('#productos').DataTable({
                "lenthMenu": [[5,10, 50, -1], [5,10, 50, "All"]],
                language: {
                    url: 'public/lib/datatables.1.10.25/plug-ins/1.10.15/i18n/Spanish.json'
                    //url: 'https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                },
            });
        } );
    </script>
@endsection
