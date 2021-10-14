@extends('maestra')

@section('titulo')
    Producto
@endsection

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Producto') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('productos.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left"><i class="fa fa-fw fa-plus"></i>
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    {{ __('Crear Producto') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

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

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>{{ $producto->descripcion_articulo }}</td>
											<td>{{ $producto->descripcion_marca }}</td>
											<td>{{ $producto->descripcion_modelo }}</td>
											<td>{{ $producto->descripcion }}</td>
											<td>{{ $producto->precio_compra }}</td>
											<td>{{ $producto->precio_venta }}</td>
                                            <td>{{ $producto->cantidad_base }}</td>
                                            <td>{{ $producto->existencia_agregar }}</td>
											<td>{{ $producto->existencia_actual }}</td>

                                            <td>
                                                <form action="{{ route('productos.destroy',$producto->producto_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('productos.show',$producto->producto_id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('productos.edit',$producto->producto_id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                      @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{--  {!! $productos->links() !!}  --}}
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
