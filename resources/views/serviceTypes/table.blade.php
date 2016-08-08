<table class="table table-responsive" id="serviceTypes-table">
    <thead>
        <th>Name</th>
        <th>Sector Id</th>
        <th>Deleted At</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($serviceTypes as $serviceType)
        <tr>
            <td>{!! $serviceType->name !!}</td>
            <td>{!! $serviceType->sector_id !!}</td>
            <td>{!! $serviceType->deleted_at !!}</td>
            <td>{!! $serviceType->created_at !!}</td>
            <td>{!! $serviceType->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['serviceTypes.destroy', $serviceType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('serviceTypes.show', [$serviceType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('serviceTypes.edit', [$serviceType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>