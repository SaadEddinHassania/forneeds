<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::number('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Serialno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('serialno', 'Serialno:') !!}
    {!! Form::text('serialno', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

<!-- Sector Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sector_id', 'Sector Id:') !!}
    {!! Form::number('sector_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Service Provider Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_provider_id', 'Service Provider Id:') !!}
    {!! Form::number('service_provider_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Marginalized Situation Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marginalized_situation_id', 'Marginalized Situation Id:') !!}
    {!! Form::number('marginalized_situation_id', null, ['class' => 'form-control']) !!}
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
            <a href="{!! route('projects.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
