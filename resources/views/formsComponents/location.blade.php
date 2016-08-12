<!-- Area Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('area-drop-down', 'Area') !!}
    {!! Form::select('area_id',array(null => 'Please select one option') +($areas),null, ['class' => 'form-control','place_holder'=>'Area','id'=>'area-drop-down']) !!}
</div>

<!-- City Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city_id', 'City') !!}
    {!! Form::select('city_id',array(null=>"Please select an Area")+ array(),null, ['class' => 'form-control','place_holder'=>'Area','id'=>'city-drop-down']) !!}
</div>
<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', 'District') !!}
    {!! Form::select('district_id',array(null=>"Please select a City")+ array(),null, ['class' => 'form-control','place_holder'=>'Area','id'=>'district-drop-down']) !!}
</div>
<!-- Street Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('street_id', 'Street') !!}
    {!! Form::select('street_id',array(null=>"Please select a District")+ array(),null, ['class' => 'form-control','place_holder'=>'Area','id'=>'street-drop-down']) !!}
</div>
