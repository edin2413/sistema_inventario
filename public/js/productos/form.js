$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
 
    $('#marca_id').on('change',function(e) {
        //alert("marca_id")
     
     var marca_id = e.target.value;
     $.ajax({
           
           url:"{{ route('search.buscar_modelo') }}",
           type:"POST",
           data: {
               marca_id: marca_id
            },
          
           success:function (data) {
            $('#modelo_id').empty();
            $.each(data.modelos[0].modelos,function(index,subcategory){
                
                $('#modelo_id').append('<option value="'+modelos.id+'">'+modelos.descripcion_modelo+'</option>');
            })
           }
       })
    });
});


function verificarExistencia(){

    //alert("ww")
    cantidad_base=$("#cantidad_base").val();
    existencia_agregar=$("#existencia_agregar").val();
    existencia_actual=$("#existencia_actual").val();
   
    if(cantidad_base!="" && existencia_actual!=""){
        $("#existencia_agregar").val('');
        $("#existencia_agregar").removeAttr('disabled');
        $("#cantidad_base").attr('disabled','disabled');
        
        //existencia_actual=eval(existencia_actual+existencia_agregar);
    }
}
$(function(){
    $("#cantidad_base").on('keyup',function(){
        cantidad_base=$("#cantidad_base").val();
        existencia_agregar=$("#existencia_agregar").val();
        existencia_actual=$("#existencia_actual").val();

        if(cantidad_base!="" && cantidad_base>0){
            $("#cantidad_base").val(cantidad_base);
            $("#existencia_agregar").val(cantidad_base);
            $("#existencia_actual").val(cantidad_base);
            $("#existencia_agregar_").val(cantidad_base);
            $("#existencia_actual_").val(cantidad_base);
        }
        else if(cantidad_base=="" || cantidad_base==0){
            $("#existencia_agregar").val(0);
            $("#existencia_actual").val(0);
            $("#existencia_agregar_").val(0);
            $("#existencia_actual_").val(0);
        }
        
    });

    $("#existencia_agregar").on('keyup',function(){
        
        cantidad=$("#cantidad").val();//valores iniciales del producto a editar
        cantidad_base_=$("#cantidad_base_").val();
        existencia_agregar=$("#existencia_agregar").val();
        //existencia_agregar_=$("#existencia_agregar_").val();
        existencia=$("#existencia").val();//valores iniciales del producto a editar
        existencia_actual_=$("#existencia_actual_").val();
        //existencia_actual=$("#existencia_actual").val();
        
        if(existencia_agregar!="" && existencia_agregar>0){
            
            cantidad_base = parseInt(cantidad_base_)+parseInt(existencia_agregar);
            existencia_actual = parseInt(existencia_actual_)+parseInt(existencia_agregar);
            
            $("#cantidad_base").val(cantidad_base);
            $("#existencia_actual").val(existencia_actual);
            $("#cantidad_base_").val(cantidad_base);//son los q se guardan
            $("#existencia_actual_").val(existencia_actual);//son los q se guardan
        }
        else if(existencia_agregar=="" || existencia_agregar==0){
            $("#cantidad_base").val(cantidad);//se coloca el valor original de la cantidad_base
            //$("#cantidad_base").val(cantidad_base_);
            $("#existencia_actual").val(existencia);
            $("#cantidad_base_").val(cantidad);
            $("#existencia_actual_").val(existencia);
        }
        
    });
    
    $("#marca_id").on('change', function() {
      var marca_id = $(this).val();
      //alert(marca_id)

      $.ajax({
        /*url: "{{ route('search.subcategorias') }}",
        data: {
            categoria_id: $(this).val()
        },*/
        url: 'modelosPorMarca',
        type: 'get',
        dataType: 'json',
        data: {
            //_token: "{{ csrf_token() }}",
            text: marca_id 
        },
        success: function (data) {
            $modelo_id.html('<option value="" selected>Seleccione..</option>');
            $.each(data, function (id, value) {
                $modelo_id.append('<option value="' + id + '">' + value + '</option>');
            });
        }
    });

      //$.post('modelosPorMarca/'+marca_id, function(data){
    //esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
        //console.log(data);
        //modelo_id.html('<option value="" selected>Seleccione..</option>');
        // $.each(data, function (id, value) {
        //     $sub_categoria_id.append('<option value="' + id + '">' + value + '</option>');
        // });
          //var modelo_select = 'Seleccione Modelo'
            //for (var i=0; i''">'+data[i].descripcion_modelo+'';

            //$("#modelo_id").html(modelo_select);

     // });
    });
});

$(function () {

    
    $("#categoria_id").on('change', function() {
        var sub_categoria_id = $('#sub_categoria_id');
        var categoria_id = $(this).val()
        alert(categoria_id)
        
        $.ajax({
            /*url: "{{ route('search.subcategorias') }}",
            data: {
                categoria_id: $(this).val()
            },*/
            url: "buscarSubCategorias",
            type: "get",
            dataType: "json",
            data: {
                //_token: "{{ csrf_token() }}",
                text: categoria_id 
            },
            success: function (data) {
                $sub_categoria_id.html('<option value="" selected>Seleccione..</option>');
                $.each(data, function (id, value) {
                    $sub_categoria_id.append('<option value="' + id + '">' + value + '</option>');
                });
            }
        });

        
        $('#sub_cate').removeClass('d-none');

    });

  
    

    $("#search").on('keyup', function() {
        var myText = $(this).val();
        $.ajax({
            url: "buscadorSubCategorias",
            type: "post",
            dataType: "json",
            data: {_token: "{{ csrf_token() }}", text: myText },
            success: function (response) {
               $("#table-body").html(response);
            }
        })
    })

    
    // $('select[name="search"]').select2({
    //     theme: "bootstrap4",
    //     language: 'es',
    //     allowClear: true,
    //     ajax: {
    //         url: 'search',
    //         dataType: 'json',
    //         delay: 250,
    //         processResults: function (data) {
    //             return {
    //                 results: $.map(data, function (item) {
    //                     return {
    //                         text: item.descripcion_sub_categoria,
    //                         id: item.id
                            
    //                     }
    //                 })
    //             };
                
    //         },
    //         cache: true
    //     }
    // })

    // $('select[name="categoria_id"]').select2({
    //     theme: "bootstrap4",
    //     language: 'es',
    //     allowClear: true,
    //     ajax: {
    //         url: 'categorias',
    //         dataType: 'json',
    //         delay: 250,
    //         processResults: function (data) {
    //             return {
    //                 results: $.map(data, function (item) {
    //                     return {
    //                         text: item.descripcion_categoria,
    //                         id: item.id
                            
    //                     }
    //                 })
    //             };
                
    //         },
    //         cache: true
    //     }
    // })



        /*$('.dynamic').change(function(){
            
         if($(this).val() != '')
         {
            
          var select = $(this).attr("id");
          var value = $(this).val();
          var dependent = $(this).data('dependent');
          var _token = $('input[name="_token"]').val();
          $.ajax({
            type: "POST",
            url: "subcategorias.fetch",
            data: '{"select":"' + select+'"}',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(data) {
                alert(data.d);
            },
            error: function(data){
                alert(data);
            }
          });*/
          /*$.ajax({
            //url:'subcategorias.fetch',
            url:"{{ route('fetch') }}",
            method:"POST",
            data:{
                select: select,
                value: value,
                _token: _token,
                dependent: dependent
            },
            success:function(result)
            {
                $('#'+dependent).html(result);
            }
       
          })
         }*/
        
       
        
});   
    
