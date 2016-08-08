<table class="table table-responsive" id="serviceRequests-table">
    <thead>
        <th>User Id</th>
        <th>Service Type Id</th>
        <th>Location Meta Id</th>
        <th>State</th>
        <th>Deleted At</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($serviceRequests as $serviceRequests)
        <tr>
            <td>{!! $serviceRequests->user_id !!}</td>
            <td>{!! $serviceRequests->service_type_id !!}</td>
            <td>{!! $serviceRequests->location_meta_id !!}</td>
            <td>{!! $serviceRequests->state !!}</td>
            <td>{!! $serviceRequests->deleted_at !!}</td>
            <td>{!! $serviceRequests->created_at !!}</td>
            <td>{!! $serviceRequests->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['serviceRequests.destroy', $serviceRequests->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('serviceRequests.show', [$serviceRequests->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('serviceRequests.edit', [$serviceRequests->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>