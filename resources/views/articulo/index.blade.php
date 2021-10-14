@extends('maestra')

@section('titulo')
    Articulo
@endsection

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Articulo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('articulos.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
                                    <i class="fa fa-fw fa-plus"></i>
                                  {{ __('Crear Articulo') }}
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
                            <table id="articulos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Descripcion Articulo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articulos as $articulo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $articulo->descripcion_articulo }}</td>

                                            <td>
                                                <form action="{{ route('articulos.destroy',$articulo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('articulos.show',$articulo->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('articulos.edit',$articulo->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    {{--  @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>  --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{--  {!! $articulos->links() !!}  --}}
            </div>
        </div>
    </div>
    @section('js')
    <script src="{{ asset('public/lib/jquery-3.5.1/jquery-3.5.1.js') }}"></script> 
    <script src="{{ asset('public/lib/datatables.1.10.25/js/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ asset('public/lib/datatables.1.10.25/js/dataTables.bootstrap5.min.js') }}"></script>     
    <script>
        $(document).ready(function() {
            $('#articulos').DataTable({
                "lenthMenu": [[5,10, 50, -1], [5,10, 50, "All"]],
                language: {
                    url: 'public/lib/datatables.1.10.25/plug-ins/1.10.15/i18n/Spanish.json'
                    //url: 'https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                },
            });
        } );
    </script>
@endsection
