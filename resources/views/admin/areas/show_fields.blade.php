<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $area->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $area->name !!}</p>
</div>

<!-- Lat Field -->
<div class="form-group">
    {!! Form::label('lat', 'Lat:') !!}
    <p>{!! $area->lat !!}</p>
</div>

<!-- Lng Field -->
<div class="form-group">
    {!! Form::label('lng', 'Lng:') !!}
    <p>{!! $area->lng !!}</p>
</div>

<!-- Shape Id Field -->
<div class="form-group">
    {!! Form::label('shape_id', 'Shape Id:') !!}
    <p>{!! $area->shape_id !!}</p>
</div>

<!-- Location Meta Id Field -->
<div class="form-group">
    {!! Form::label('location_meta_id', 'Location Meta Id:') !!}
    <p>{!! $area->location_meta_id !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $area->deleted_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $area->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $area->updated_at !!}</p>
</div>

