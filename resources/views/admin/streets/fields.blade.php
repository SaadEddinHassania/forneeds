
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
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


<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', 'District Id:') !!}
    {!! Form::select('district_id', $districts,null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('admin.streets.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
