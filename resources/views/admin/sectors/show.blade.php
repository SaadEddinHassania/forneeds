@extends('admin.layouts.app')

@section('content')
     <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-equalizer font-red-sunglo"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">Sector</span>
                </div>
            </div>
            <div>
                @include('metronic-templates::common.errors')
            </div>
            <div class="portlet-body form">
                <div class="row" style="padding-left: 20px">
                   @include('admin.sectors.show_fields')
                   <a href="{!! route('admin.sectors.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
@endsection
