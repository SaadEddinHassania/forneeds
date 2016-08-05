<table class="table table-responsive" id="sectors-table">
    <thead>
        <th>Name</th>
        <th>Deleted At</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($sectors as $sector)
        <tr>
            <td>{!! $sector->name !!}</td>
            <td>{!! $sector->deleted_at !!}</td>
            <td>{!! $sector->created_at !!}</td>
            <td>{!! $sector->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['sectors.destroy', $sector->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sectors.show', [$sector->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sectors.edit', [$sector->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>