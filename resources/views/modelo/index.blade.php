@extends('maestra')

@section('titulo')
    Modelo
@endsection

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Modelo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('modelos.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
                                    <i class="fa fa-fw fa-plus"></i>
                                    {{ __('Crear Modelo') }}
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
                            <table id="modelos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>No</th>
										<th>Marcas</th>
										<th>Descripcion Modelo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($modelos as $modelo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $modelo->descripcion_marca }}</td>
											<td>{{ $modelo->descripcion_modelo }}</td>

                                            <td>
                                                <form action="{{ route('modelos.destroy',$modelo->modelo_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('modelos.show',$modelo->modelo_id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('modelos.edit',$modelo->modelo_id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    {{--@csrf
                                                      @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button> --}} 
                                                </form>
                                            </td>
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
            $('#modelos').DataTable({
                "lenthMenu": [[5,10, 50, -1], [5,10, 50, "All"]],
                language: {
                    url: 'public/lib/datatables.1.10.25/plug-ins/1.10.15/i18n/Spanish.json'
                    //url: 'https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                },
            });
        } );
    </script>
@endsection
