<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $question->id !!}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    <p>{!! $question->body !!}</p>
</div>

<!-- Survey Id Field -->
<div class="form-group">
    {!! Form::label('survey_id', 'Survey Id:') !!}
    <p>{!! $question->survey_id !!}</p>
</div>

<!-- Step Field -->
<div class="form-group">
    {!! Form::label('step', 'Step:') !!}
    <p>{!! $question->step !!}</p>
</div>

<!-- Rule Field -->
<div class="form-group">
    {!! Form::label('rule', 'Rule:') !!}
    <p>{!! $question->rule !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $question->deleted_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $question->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $question->updated_at !!}</p>
</div>

