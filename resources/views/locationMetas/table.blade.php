<table class="table table-responsive" id="locationMetas-table">
    <thead>
        <th>Population</th>
        <th>Unemployment</th>
        <th>Poverty Lvl</th>
        <th>Model</th>
        <th>Deleted At</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($locationMetas as $locationMeta)
        <tr>
            <td>{!! $locationMeta->population !!}</td>
            <td>{!! $locationMeta->unemployment !!}</td>
            <td>{!! $locationMeta->poverty_lvl !!}</td>
            <td>{!! $locationMeta->model !!}</td>
            <td>{!! $locationMeta->deleted_at !!}</td>
            <td>{!! $locationMeta->created_at !!}</td>
            <td>{!! $locationMeta->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['locationMetas.destroy', $locationMeta->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('locationMetas.show', [$locationMeta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('locationMetas.edit', [$locationMeta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>