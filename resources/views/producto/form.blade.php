<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="row">
            <div class="form-group col-md-4">
                <label class="label">Articulos</label>
                <select required name="articulo_id" id="articulo_id" class="form-control selectpicker" data-live-search="true">
                    <option value="">Seleccione</option>
                    @foreach ($articulos as $articulo)
                        <option value="{{$articulo->id}}">{{$articulo->descripcion_articulo}}</option>
                    @endforeach
                </select>
                {!! $errors->first('marca_id', '<div class="invalid-feedback">:message</p>') !!}
            </div>
            <div class="form-group col-md-4">
                <label class="label">Marcas</label>
                <select required name="marca_id" id="marca_id" class="form-control selectpicker" data-live-search="true">
                    <option value="">Seleccione</option>
                    @foreach ($marcas as $marca)
                        <option value="{{$marca->id}}">{{$marca->descripcion_marca}}</option>
                    @endforeach
                </select>
                {!! $errors->first('marca_id', '<div class="invalid-feedback">:message</p>') !!}
            </div>
            <div class="form-group col-md-4">
                <label class="label">Modelo</label>
                <select required name="modelo_id" id="modelo_id" class="form-control selectpicker" data-live-search="true">
                    <option value="">Seleccione</option>
                    @foreach ($modelos as $modelo)
                        <option value="{{$modelo->id}}">{{$modelo->descripcion_modelo}}</option>
                    @endforeach
                </select>
                {!! $errors->first('marca_id', '<div class="invalid-feedback">:message</p>') !!}
            </div>
        </div>

        
                

        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $producto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_compra') }}
            {{ Form::text('precio_compra', $producto->precio_compra, ['class' => 'form-control' . ($errors->has('precio_compra') ? ' is-invalid' : ''), 'placeholder' => 'Precio Compra']) }}
            {!! $errors->first('precio_compra', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_venta') }}
            {{ Form::text('precio_venta', $producto->precio_venta, ['class' => 'form-control' . ($errors->has('precio_venta') ? ' is-invalid' : ''), 'placeholder' => 'Precio Venta']) }}
            {!! $errors->first('precio_venta', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            <input required value="{{$producto->cantidad_base}}" autocomplete="off" id="cantidad_base" name="cantidad_base" class="form-control" type="number" placeholder="0">
            <input value="{{$producto->cantidad_base}}" autocomplete="off" id="cantidad_base_" name="cantidad_base_" class="form-control" type="hidden" placeholder="0">
            
            <input value="{{$producto->cantidad_base}}" autocomplete="off" id="cantidad" name="cantidad" class="form-control" type="hidden" placeholder="0">
            

            {!! $errors->first('cantidad_base', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('Entrada') }}
            <input disabled="disabled" required value="{{$producto->existencia_agregar}}" autocomplete="off" id="existencia_agregar" name="existencia_agregar" class="form-control" type="number" placeholder="0">
            <input value="{{$producto->existencia_agregar}}" autocomplete="off" id="existencia_agregar_" name="existencia_agregar_" class="form-control" type="hidden" placeholder="0">

            {!! $errors->first('existencia', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('existencia actual') }}
            <input disabled="disabled" value="{{$producto->existencia_actual}}" autocomplete="off" id="existencia_actual" name="existencia_actual" class="form-control" type="number" placeholder="0">
            <input  value="{{$producto->existencia_actual}}" autocomplete="off" id="existencia_actual_" name="existencia_actual_" class="form-control" type="hidden" placeholder="0">
            
            <input  value="{{$producto->existencia_actual}}" autocomplete="off" id="existencia" name="existencia" class="form-control" type="hidden" placeholder="0">

            {!! $errors->first('existencia', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <a class="btn btn-success" href="{{ route('productos.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
        <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-save"></i>Guardar</button>
    </div>
</div>
