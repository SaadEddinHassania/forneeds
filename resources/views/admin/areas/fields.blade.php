

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div  class="form-group col-sm-8">
    <!-- Lat Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('lat', 'Lat:') !!}
        {!! Form::text('lat', null, ['class' => 'form-control','readonly']) !!}
    </div>

    <!-- Lng Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('lng', 'Lng:') !!}
        {!! Form::text('lng', null, ['class' => 'form-control','readonly']) !!}
    </div>

    <div style="width:100%;height:300px;" class="form-group col-sm-6">
        {!! Mapper::render() !!}

    </div>


</div>





<!-- Population Field -->
<div class="form-group col-sm-6">
    {!! Form::label('population', 'Population:') !!}
    {!! Form::selectRange('population', 1,100,null, ['class' => 'form-control']) !!}
</div>

<!-- Unemployment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unemployment', 'Unemployment:') !!}
    {!! Form::selectRange('unemployment',1,100, null, ['class' => 'form-control']) !!}
</div>

<!-- Poverty Lvl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('poverty_lvl', 'Poverty Lvl:') !!}
    {!! Form::selectRange('poverty_lvl', 1,10,null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->

<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('admin.areas.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
