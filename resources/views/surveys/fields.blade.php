

<!-- Subject Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject', 'Subject:') !!}
    {!! Form::text('subject', null, ['class' => 'form-control']) !!}
</div>

<!-- Expires At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expires_at', 'Expires At:') !!}
    {!! Form::date('expires_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>
<!-- Service Provider Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_provider_id', 'Service Provider Id:') !!}
    {!! Form::select('service_provider_id',array(null=>"Please select one option")+$serviceProviders, null, ['class' => 'form-control']) !!}
</div>
<!-- Project Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_id', 'Project Id:') !!}
    {!! Form::select('project_id',array(null=>"Please select one project")+ $projects, null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('surveys.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
