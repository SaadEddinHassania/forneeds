@extends('admin.layouts.app')

@section('content')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-red-sunglo"></i>
            <span class="caption-subject font-red-sunglo bold uppercase">ServiceProviderType</span>
        </div>
    </div>
    <div>
        @include('metronic-templates::common.errors')
    </div>
    <div class="portlet-body form">
        <div class="row">
           {!! Form::model($serviceProviderType, ['route' => ['serviceProviderTypes.update', $serviceProviderType->id], 'method' => 'patch']) !!}

            @include('admin.serviceProviderTypes.fields')

           {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection