<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $serviceRequests->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $serviceRequests->user_id !!}</p>
</div>

<!-- Service Type Id Field -->
<div class="form-group">
    {!! Form::label('service_type_id', 'Service Type Id:') !!}
    <p>{!! $serviceRequests->service_type_id !!}</p>
</div>

<!-- Location Meta Id Field -->
<div class="form-group">
    {!! Form::label('location_meta_id', 'Location Meta Id:') !!}
    <p>{!! $serviceRequests->location_meta_id !!}</p>
</div>

<!-- State Field -->
<div class="form-group">
    {!! Form::label('state', 'State:') !!}
    <p>{!! $serviceRequests->state !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $serviceRequests->deleted_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $serviceRequests->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $serviceRequests->updated_at !!}</p>
</div>

