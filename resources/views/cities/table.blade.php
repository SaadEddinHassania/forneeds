<table class="table table-responsive" id="cities-table">
    <thead>
        <th>Name</th>
        <th>Lat</th>
        <th>Lng</th>
        <th>Shape Id</th>
        <th>Area Id</th>
        <th>Location Meta Id</th>
        <th>Deleted At</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($cities as $city)
        <tr>
            <td>{!! $city->name !!}</td>
            <td>{!! $city->lat !!}</td>
            <td>{!! $city->lng !!}</td>
            <td>{!! $city->shape_id !!}</td>
            <td>{!! $city->area_id !!}</td>
            <td>{!! $city->location_meta_id !!}</td>
            <td>{!! $city->deleted_at !!}</td>
            <td>{!! $city->created_at !!}</td>
            <td>{!! $city->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['cities.destroy', $city->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cities.show', [$city->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cities.edit', [$city->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>