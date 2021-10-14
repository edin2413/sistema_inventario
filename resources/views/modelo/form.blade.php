<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <label class="label">Marcas</label>
            <select required name="marca_id" id="marca_id" class="form-control selectpicker" data-live-search="true">
                <option value="">Seleccione</option>
                @foreach ($marcas as $marca)
                    <option value="{{$marca->id}}">{{$marca->descripcion_marca}}</option>
                @endforeach
            </select>
            {!! $errors->first('marca_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion_modelo') }}
            {{ Form::text('descripcion_modelo', $modelo->descripcion_modelo, ['class' => 'form-control' . ($errors->has('descripcion_modelo') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Modelo']) }}
            {!! $errors->first('descripcion_modelo', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <a class="btn btn-success" href="{{ route('modelos.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</a>
        <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-save"></i>Guardar</button>
    </div>
</div>