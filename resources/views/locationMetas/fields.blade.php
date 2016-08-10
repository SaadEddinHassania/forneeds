<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::number('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Population Field -->
<div class="form-group col-sm-6">
    {!! Form::label('population', 'Population:') !!}
    {!! Form::number('population', null, ['class' => 'form-control']) !!}
</div>

<!-- Unemployment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unemployment', 'Unemployment:') !!}
    {!! Form::number('unemployment', null, ['class' => 'form-control']) !!}
</div>

<!-- Poverty Lvl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('poverty_lvl', 'Poverty Lvl:') !!}
    {!! Form::number('poverty_lvl', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model', 'Location Type:') !!}
    {!! Form::select('model', ['Area','City','District','Street'],null, ['class' => 'form-control']) !!}
</div>

<!-- Deleted At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    {!! Form::date('deleted_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    {!! Form::date('created_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    {!! Form::date('updated_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('locationMetas.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
