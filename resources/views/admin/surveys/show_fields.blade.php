<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $survey->id !!}</p>
</div>

<!-- Subject Field -->
<div class="form-group">
    {!! Form::label('subject', 'Subject:') !!}
    <p>{!! $survey->subject !!}</p>
</div>

<!-- Expires At Field -->
<div class="form-group">
    {!! Form::label('expires_at', 'Expires At:') !!}
    <p>{!! $survey->expires_at !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $survey->description !!}</p>
</div>

<!-- Project Id Field -->
<div class="form-group">
    {!! Form::label('project_id', 'Project Id:') !!}
    <p>{!! $survey->project_id !!}</p>
</div>

<!-- Survey Meta Id Field -->
<div class="form-group">
    {!! Form::label('survey_meta_id', 'Survey Meta Id:') !!}
    <p>{!! $survey->survey_meta_id !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $survey->deleted_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $survey->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $survey->updated_at !!}</p>
</div>

