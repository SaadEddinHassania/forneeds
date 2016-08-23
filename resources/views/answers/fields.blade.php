
<!-- Survey Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('surveys-drop-down', 'Survey Id:') !!}
    {!! Form::select('survey_id',array(null=>"Please select a survey")+$surveys ,null, ['class' => 'form-control','id'=>"surveys-drop-down"]) !!}
</div>

<!-- Question Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('questions-drop-down', 'Question Id:') !!}
    {!! Form::select('question_id', array(null=>"Please select a survey"),null, ['class' => 'form-control',"id"=>"questions-drop-down"]) !!}
</div>

<!-- Answer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('answer', 'Answer:') !!}
    {!! Form::text('answer', null, ['class' => 'form-control']) !!}
</div>

<!-- Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order', 'Order:') !!}
    {!! Form::selectRange('order',1,100,1, ['class' => 'form-control']) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('answers.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
@push('scripts')
<script src="/assets/ajax_dynamic_forms.js" type="text/javascript"></script>
@endpush