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
    {!! Form::label('sectors-drop-down', 'Sector :') !!}
    {!! Form::select('sectors-drop-down',array(null=>"Please select one option")+ $sectors, null, ['class' => 'form-control']) !!}
</div>

<!-- Service Provider Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_provider_id', 'Service Provider Id:') !!}
    {!! Form::select('service_provider_id',array(null=>"Please select one option")+$serviceProviders, null, ['class' => 'form-control']) !!}
</div>

<!-- Marginalized Situation Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marginalized_situation_id', 'Marginalized Situation Id:') !!}
    {!! Form::select('marginalized_situation_id',array(null=>"Please select one option")+$marginalizedSituations ,null, ['class' => 'form-control']) !!}
</div>

@include('formsComponents.location',$areas)


<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('admin.projects.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
