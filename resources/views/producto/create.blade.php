@extends('maestra')

@section('titulo')
    Crear Producto
@endsection

@section('lib')

    
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="{{ asset('public/lib/jquery-3.5.1/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('public/js/productos/form.js') }}"></script>
@endsection

@section('contenido')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Producto</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('productos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('producto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')

    <script type="text/javascript">
        /*$('#marca_id').change(function(){
            var marca_id = $(this).val();  
            if(marca_id){
                $.ajax({
                  type:"post",
                  url:"{{route('buscar_modelos')}}?marca_id="+marca_id,
                  success:function(res){        
                  if(res){
                    $("#modelo_id").empty();
                    $("#modelo_id").append('<option>Select modelo_id</option>');
                    $.each(res,function(key,value){
                      $("#modelo_id").append('<option value="'+key+'">'+value+'</option>');
                    });
                  
                  }else{
                    $("#modelo_id").empty();
                  }
                  }
                });
            }else{
                $("#modelo_id").empty();
                //$("#city").empty();
            }   
        });*/
    </script>

@endsection
