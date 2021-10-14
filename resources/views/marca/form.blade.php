<div class="box box-info padding-1">
    <div class="box-body">
        
        {{--  <div class="form-group">
            {{ Form::label('articulo_id') }}
            {{ Form::text('articulo_id', $marca->articulo_id, ['class' => 'form-control' . ($errors->has('articulo_id') ? ' is-invalid' : ''), 'placeholder' => 'Articulo Id']) }}
            {!! $errors->first('articulo_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>  --}}
        {{--  <div class="form-group">
            <label class="label">Articulos</label>
            <select name="articulo_id" id="articulo_id" class="form-control selectpicker" data-live-search="true">
                <option value="">Seleccione</option>
                @foreach ($articulos as $articulo)
                    <option value="{{$articulo->id}}">{{$articulo->descripcion_articulo}}</option>
                @endforeach
            </select>
            {!! $errors->first('articulo_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>  --}}
        <div class="form-group">
            {{ Form::label('descripcion_marca') }}
            {{ Form::text('descripcion_marca', $marca->descripcion_marca, ['class' => 'form-control' . ($errors->has('descripcion_marca') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Marca']) }}
            {!! $errors->first('descripcion_marca', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <a class="btn btn-success" href="{{ route('marcas.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
        <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-save"></i>Guardar</button>
    </div>
</div>