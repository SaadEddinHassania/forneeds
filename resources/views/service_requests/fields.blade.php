

<!-- Sector Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sectors-drop-down', 'Sector :') !!}
    {!! Form::select('sectors-drop-down',array(null=>"Please select sector")+ $sectors, null, ['class' => 'form-control']) !!}
</div>
<!-- Service Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service-type-drop-down', 'Service Type Id:') !!}
    {!! Form::select('service_type_id',array(null=>"Please select a sector")+ array(), null, ['class' => 'form-control','id'=>'service-type-drop-down']) !!}
</div>

@include('formsComponents.location',$areas)

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::select('state',array(0=>"Pending",1=>"done"), 0, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('admin.serviceRequests.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>


