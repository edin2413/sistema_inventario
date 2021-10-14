
$(function () {

    verificarCliente();

    $('select[name="search"]').select2({
        theme: "bootstrap4",
        language: 'es',
        allowClear: true,
        ajax: {
            url: 'searchP',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.descripcion,
                            id: item.codigo_barras
                            
                        }
                    })
                };
                
            },
            cache: true
        }
    }).on('select2:select', function (e) {
        //var data = e.params.data;
        //alert(a)
        add();
        //$(this).val('').trigger('change.select2');
    });

    


    function add() {

        search=$('.select2').val();
        //search=$('select[name="search"]').val();
        //alert(search)
        $('#codigo_barras').val(search);
        verificarCliente();
        //$('#descripcion').val(search);
        //producto_id=$('#producto_id').val();
        
    }

    
    function verificarCliente(){
        id_cliente=$("#id_cliente").val();
        //alert(id_cliente)
    
        if(id_cliente!=""){
            $("#cliente").val(id_cliente);
        }
    }       
    

    $('#search2').on('keyup',function(){
        //$value=$(this).val();
        
        /*$.ajax({
            type : 'get',
            url : "{{URL::to('search')}}",
            dataType:{
                'search':$value
            },
            success:function(data){
                $('tbody').html(data);
            }
        })*/
    })

    // $("#bt_add#").click(function(){
    //     agregar();
    // });

    /*var cont=0;
        total_registro=0;
        numero_fila=0;
        subtotal=[];*/

    /*function agregar(){
            producto_id=$("#producto_id").val();
            //categoria_id=$("#categoria_id").val();
            //cantidad=$("#cantidad").val();
            descripcion=$("#descripcion").val();
            //precio=$("#precio").val();
            //total=$("#total").val();
            
            if (producto_id!=""){
            //if (producto_id!="" && categoria_id!="" && cantidad!="" && descripcion!="" && precio!=""){
                subtotal[cont]=(cantidad*precio);
                total_registro=total_registro+subtotal[cont];

                var fila='<tr class="selected" id="fila'+cont+'">'+
                            '<td>'+parseInt( eval(cont+1) )+' <input type="hidden" name="numero_fila_" value="'+parseInt( eval(cont+1) )+'"></td>'+
                            '<td><input type="hidden" name="descripcion_[]" value="'+descripcion+'">'+descripcion+'</td>'+
                            //'<td><input type="hidden" name="descripcion_[]" value="'+descripcion+'">'+descripcion+'</td>'+
                            //'<td><input type="hidden" name="cantidad_[]" value="'+cantidad+'">'+cantidad+'</td>'+
                            //'<td><input type="hidden" name="precio_[]" value="'+precio+'">'+precio+'</td>'+
                            //'<td><input type="hidden" name="subtotal_[]" value="'+subtotal[cont]+'"> '+subtotal[cont]+'</td>'+
                            //'<td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+')"><i class="fa fa-fw fa-trash"></i></button></td>'+
                         '</tr>';
                         cont++;

                         //alert(cont++);
                         limpiar();
                         $('#total_registro').html("$. "+ total_registro);
                         $('#total_').val(parseFloat(total_registro).toFixed(2));
                         //valor= parseFloat(total).toFixed(2);
                         evaluar();
                         $('#detalles_asiento').append(fila);
            }
            else{
                alert("Faltan campos por llenar");
            }
    }*/



    



});
    
    


