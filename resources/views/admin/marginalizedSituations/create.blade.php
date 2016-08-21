@extends('admin.layouts.app')

@section('content')
 <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-equalizer font-red-sunglo"></i>
                <span class="caption-subject font-red-sunglo bold uppercase">MarginalizedSituation</span>
            </div>
        </div>
        <div>
            @include('metronic-templates::common.errors')
        </div>
        <div class="portlet-body form">
            <div class="row">
                {!! Form::open(['route' => 'marginalizedSituations.store']) !!}

                    @include('marginalizedSituations.fields')

                 {!! Form::close() !!}
            </div>
        </div>
  </div>
@endsection
