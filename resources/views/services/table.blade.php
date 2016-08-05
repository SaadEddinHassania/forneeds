<table class="table table-responsive" id="services-table">
    <thead>
        <th>Name</th>
        <th>Sector Id</th>
        <th>Service Type Id</th>
        <th>Location Meta Id</th>
        <th>Lat</th>
        <th>Lng</th>
        <th>Deleted At</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($services as $service)
        <tr>
            <td>{!! $service->name !!}</td>
            <td>{!! $service->sector_id !!}</td>
            <td>{!! $service->service_type_id !!}</td>
            <td>{!! $service->location_meta_id !!}</td>
            <td>{!! $service->lat !!}</td>
            <td>{!! $service->lng !!}</td>
            <td>{!! $service->deleted_at !!}</td>
            <td>{!! $service->created_at !!}</td>
            <td>{!! $service->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['services.destroy', $service->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('services.show', [$service->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('services.edit', [$service->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>