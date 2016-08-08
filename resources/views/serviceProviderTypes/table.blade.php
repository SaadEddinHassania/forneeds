<table class="table table-responsive" id="serviceProviderTypes-table">
    <thead>
        <th>Name</th>
        <th>Count</th>
        <th>Deleted At</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($serviceProviderTypes as $serviceProviderType)
        <tr>
            <td>{!! $serviceProviderType->name !!}</td>
            <td>{!! $serviceProviderType->count !!}</td>
            <td>{!! $serviceProviderType->deleted_at !!}</td>
            <td>{!! $serviceProviderType->created_at !!}</td>
            <td>{!! $serviceProviderType->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['serviceProviderTypes.destroy', $serviceProviderType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('serviceProviderTypes.show', [$serviceProviderType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('serviceProviderTypes.edit', [$serviceProviderType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>