<table class="table table-responsive" id="surveyMetas-table">
    <thead>
        <th>Name</th>
        <th>Questions Count</th>
        <th>Rule</th>
        <th>Deleted At</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($surveyMetas as $surveyMetas)
        <tr>
            <td>{!! $surveyMetas->name !!}</td>
            <td>{!! $surveyMetas->questions_count !!}</td>
            <td>{!! $surveyMetas->rule !!}</td>
            <td>{!! $surveyMetas->deleted_at !!}</td>
            <td>{!! $surveyMetas->created_at !!}</td>
            <td>{!! $surveyMetas->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['surveyMetas.destroy', $surveyMetas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('surveyMetas.show', [$surveyMetas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('surveyMetas.edit', [$surveyMetas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>