<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::number('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

<!-- Survey Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('survey_id', 'Survey Id:') !!}
    {!! Form::number('survey_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Step Field -->
<div class="form-group col-sm-6">
    {!! Form::label('step', 'Step:') !!}
    {!! Form::number('step', null, ['class' => 'form-control']) !!}
</div>

<!-- Rule Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rule', 'Rule:') !!}
    {!! Form::text('rule', null, ['class' => 'form-control']) !!}
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
            <a href="{!! route('admin.questions.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
