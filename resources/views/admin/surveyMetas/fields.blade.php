

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Questions Count Field -->
<div class="form-group col-sm-6">
    {!! Form::label('questions_count', 'Questions Count:') !!}
    {!! Form::text('questions_count', null, ['class' => 'form-control']) !!}
</div>

<!-- Rule Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rule', 'Rule:') !!}
    {!! Form::text('rule', null, ['class' => 'form-control']) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('admin.surveyMetas.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
