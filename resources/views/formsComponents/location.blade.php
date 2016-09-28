



<div style="width:100%;height:400px" class="form-group col-sm-6">
    {!! Mapper::render() !!}
</div>
<ul class="nav nav-pills">
<li class="dropdown ">
    <a href="javascript:;"  class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> Dropdown
        <i class="fa fa-angle-down"></i>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
        <li class="dropdown ">
            <a href="javascript:;"  class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> Dropdown
                <i class="fa fa-angle-right"></i>
            </a>
            <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="myTabDrop1">
                <li>
                    <a href="#tab_2_3" tabindex="-1" data-toggle="tab"> Option 1 </a>
                </li>
                <li>
                    <a href="#tab_2_4" tabindex="-1" data-toggle="tab"> Option 2 </a>
                </li>
                <li>
                    <a href="#tab_2_3" tabindex="-1" data-toggle="tab"> Option 3 </a>
                </li>
                <li>
                    <a href="#tab_2_4" tabindex="-1" data-toggle="tab"> Option 4 </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#tab_2_4" tabindex="-1" data-toggle="tab"> Option 2 </a>
        </li>
        <li>
            <a href="#tab_2_3" tabindex="-1" data-toggle="tab"> Option 3 </a>
        </li>
        <li>
            <a href="#tab_2_4" tabindex="-1" data-toggle="tab"> Option 4 </a>
        </li>
    </ul>
</li>
</ul>
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
{{--<!-- Street Id Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('street_id', 'Street') !!}--}}
    {{--{!! Form::select('street_id',array(null=>"Please select a District")+ array(),null, ['class' => 'form-control','place_holder'=>'Area','id'=>'street-drop-down']) !!}--}}
{{--</div>--}}
