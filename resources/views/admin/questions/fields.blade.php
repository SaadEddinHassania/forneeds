

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

<!-- Service Provider Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service-providers-drop-down', 'Service Provider Id:') !!}
    {!! Form::select('service-providers-drop-down',array(null=>"Please select one option")+$serviceProviders, null, ['class' => 'form-control','id'=>'service-providers-drop-down']) !!}
</div>

<!-- Project Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('projects-drop-down', 'Project Id:') !!}
    {!! Form::select('project_id',array(null=>"Please select a serviceProvider"), null, ['class' => 'form-control','id'=>'projects-drop-down']) !!}
</div>

<!-- Survey Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('surveys-drop-down', 'Survey Id:') !!}
    {!! Form::select('survey_id',array(null=>"Please select a project") ,null, ['class' => 'form-control','id'=>"surveys-drop-down"]) !!}
</div>




<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('admin.questions.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
@push('scripts')
<script src="/assets/ajax_dynamic_forms.js" type="text/javascript"></script>
@endpush