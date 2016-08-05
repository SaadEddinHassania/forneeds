<table class="table table-responsive" id="areas-table">
    <thead>
        <th>Name</th>
        <th>Lat</th>
        <th>Lng</th>
        <th>Shape Id</th>
        <th>Location Meta Id</th>
        <th>Deleted At</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($areas as $area)
        <tr>
            <td>{!! $area->name !!}</td>
            <td>{!! $area->lat !!}</td>
            <td>{!! $area->lng !!}</td>
            <td>{!! $area->shape_id !!}</td>
            <td>{!! $area->location_meta_id !!}</td>
            <td>{!! $area->deleted_at !!}</td>
            <td>{!! $area->created_at !!}</td>
            <td>{!! $area->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['areas.destroy', $area->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('areas.show', [$area->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('areas.edit', [$area->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>