
<!-- User Attr Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_attr_name', 'User Attr Name:') !!}
    {!! Form::select('user_attr_name', $user_attrs, null, ['class' => 'form-control']) !!}
</div>

<!-- Operator Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('operator', 'Operator:') !!}
    {!! Form::select('operator', array(">"=>"Greater Than","<"=>"Less Than",">="=>"Greater Than or Equals","<="=>"Less Than or Equals","=="=>"Equals","!="=>"Not Equal"),null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

<!-- Coefficient Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('coefficient', 'Coefficient:') !!}
    {!! Form::number('coefficient', null, ['class' => 'form-control']) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('configs.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
