@extends("maestra")
@section("titulo", "Usuarios")
@section("contenido")
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Usuarios') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('usuarios.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left"><i class="fa fa-fw fa-plus"></i>
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                    {{ __('Agregar') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @include("notificacion")
                
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="usuarios_" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
                                <thead class="bg-primary text-white">
                                <tr>
                                    <th>Correo electrónico</th>
                                    <th>Nombre</th>
                                    <th colspan="2" style="text-align: center">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td>{{$usuario->email}}</td>
                                        <td>{{$usuario->name}}</td>
                                        <td>
                                            <a class="btn btn-sm btn-success float-right" href="{{route("usuarios.edit",[$usuario])}}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                        </td>
                                        <td>
                                            <form action="{{route("usuarios.destroy", [$usuario])}}" method="post">
                                                @method("delete")
                                                @csrf
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
            $('#usuarios_').DataTable({
                "lenthMenu": [[5,10, 50, -1], [5,10, 50, "All"]],
                language: {
                    url: 'public/lib/datatables.1.10.25/plug-ins/1.10.15/i18n/Spanish.json'
                    //url: 'https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                },
            });
        } );
    </script>
@endsection

