<table class="table table-responsive" id="districts-table">
    <thead>
        <th>Name</th>
        <th>Lat</th>
        <th>Lng</th>
        <th>Shape Id</th>
        <th>City Id</th>
        <th>Location Meta Id</th>
        <th>Deleted At</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($districts as $district)
        <tr>
            <td>{!! $district->name !!}</td>
            <td>{!! $district->lat !!}</td>
            <td>{!! $district->lng !!}</td>
            <td>{!! $district->shape_id !!}</td>
            <td>{!! $district->city_id !!}</td>
            <td>{!! $district->location_meta_id !!}</td>
            <td>{!! $district->deleted_at !!}</td>
            <td>{!! $district->created_at !!}</td>
            <td>{!! $district->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['districts.destroy', $district->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('districts.show', [$district->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('districts.edit', [$district->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>