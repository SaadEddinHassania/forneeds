<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $service->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $service->name !!}</p>
</div>

<!-- Sector Id Field -->
<div class="form-group">
    {!! Form::label('sector_id', 'Sector Id:') !!}
    <p>{!! $service->sector_id !!}</p>
</div>

<!-- Service Type Id Field -->
<div class="form-group">
    {!! Form::label('service_type_id', 'Service Type Id:') !!}
    <p>{!! $service->service_type_id !!}</p>
</div>

<!-- Location Meta Id Field -->
<div class="form-group">
    {!! Form::label('location_meta_id', 'Location Meta Id:') !!}
    <p>{!! $service->location_meta_id !!}</p>
</div>

<!-- Lat Field -->
<div class="form-group">
    {!! Form::label('lat', 'Lat:') !!}
    <p>{!! $service->lat !!}</p>
</div>

<!-- Lng Field -->
<div class="form-group">
    {!! Form::label('lng', 'Lng:') !!}
    <p>{!! $service->lng !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $service->deleted_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $service->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $service->updated_at !!}</p>
</div>

