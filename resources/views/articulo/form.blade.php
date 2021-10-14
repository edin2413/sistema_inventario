<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('descripcion_articulo') }}
            {{ Form::text('descripcion_articulo', $articulo->descripcion_articulo, ['class' => 'form-control' . ($errors->has('descripcion_articulo') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Articulo']) }}
            {!! $errors->first('descripcion_articulo', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        
        <a class="btn btn-success" href="{{ route('articulos.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
        
        <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-save"></i> Guardar</button>
    </div>
</div>