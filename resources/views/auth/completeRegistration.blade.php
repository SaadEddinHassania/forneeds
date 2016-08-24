@extends('auth.layout')

@section('content')
    <div>
        <p>
            <a href="javascript:;" class="btn-primary btn" id="citizen-btn">Citizen</a>
        </p>
    </div>
    <div>
        <p>
            <a href="javascript:;" class="btn-primary btn" id="service-provider-btn">Service Provider</a>
        </p>
    </div>

    <form class="citizen-form" method="post" action="{!! url('/register') !!}">

        {!! csrf_field() !!}
        <div class="form-title">
            <span class="form-title">Citizen form</span>
        </div>
        <p class="hint"> Complete your personal details below: </p>

        <div class="form-group ">
            <input type="text" class="form-control" name="national_id" value="{!! old('national_id') !!}"
                   placeholder="National_id">
        </div>

        <div class="form-group ">
            {{Form::select('gender', ['male', 'female'],'null',['class'=>'form-control'])}}
            {{--            <input type="select" class="form-control" name="gender" value="{!! old('gender') !!}" placeholder="Gender">--}}
        </div>

        <div class="form-group">
            {{--<label class="control-label col-md-3">Disable Past Dates</label>--}}
            {{--<div class="col-md-3">--}}
                <div class="input-group date date-picker" data-date-format="dd-mm-yyyy"
                     data-date-start-date="+0d">
                    <input type="text" class="form-control" readonly>
                    <span class="input-group-btn">
                        <button class="btn default" type="button">
                            <i class="fa fa-calendar"></i>
                        </button>
                    </span>
                {{--</div>--}}
            </div>
        </div>

        <!-- /.col -->
        <div class="form-group ">
            <button type="submit" class="btn btn red btn-block btn-flat">Submit</button>
        </div>
        <!-- /.col -->
    </form>

    <form class="service-provider-form" method="post" action="{!! url('/complete_service_provider_registration') !!}">

        {!! csrf_field() !!}
        <div class="form-title">
            <span class="form-title">Service provider form</span>
        </div>
        <p class="hint"> Enter your personal details below: </p>

        <div class="form-group ">
            <input type="text" class="form-control" name="mission_statement" value="{!! old('mission_statement') !!}"
                   placeholder="Mission Statement">
        </div>

        <div class="form-group ">
            {{Form::select('service_provider_type_id', $types,'null',['class'=>'form-control'])}}
        </div>
        <div class="form-group ">
            {{Form::select('sector_id', $sectors,'null',['class'=>'form-control'])}}
        </div>

        <!-- /.col -->
        <div class="form-group ">
            <button type="submit" class="btn btn red btn-block btn-flat">Submit</button>
        </div>
        <!-- /.col -->
    </form>

@endsection


@push('styles')
<link href="/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet"
      type="text/css"/>
@endpush

@push('scripts')
<script src="/assets/pages/scripts/complete-registration.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"
        type="text/javascript"></script>
<script src="/assets/pages/scripts/components-date-time-pickers.js" type="text/javascript"></script>
@endpush

