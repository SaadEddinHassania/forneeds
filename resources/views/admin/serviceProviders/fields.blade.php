

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Mission Statement Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('mission_statement', 'Mission Statement:') !!}
    {!! Form::textarea('mission_statement', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', array(null=>"Please select user") + $users ,null, ['class' => 'form-control']) !!}
</div>

<!-- Service Provider Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_provider_type_id', 'Service Provider Type Id:') !!}
    {!! Form::select('service_provider_type_id',array(null=>"Please select one option") + $serviceProviderTypes , null, ['class' => 'form-control']) !!}
</div>

<!-- Sector Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sectors-drop-down', 'Sector :') !!}
    {!! Form::select('sectors-drop-down',array(null=>"Please select one option")+ $sectors, null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('admin.serviceProviders.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
