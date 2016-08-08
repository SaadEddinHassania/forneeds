<table class="table table-responsive" id="surveys-table">
    <thead>
        <th>Subject</th>
        <th>Expires At</th>
        <th>Description</th>
        <th>Project Id</th>
        <th>Survey Meta Id</th>
        <th>Deleted At</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($surveys as $survey)
        <tr>
            <td>{!! $survey->subject !!}</td>
            <td>{!! $survey->expires_at !!}</td>
            <td>{!! $survey->description !!}</td>
            <td>{!! $survey->project_id !!}</td>
            <td>{!! $survey->survey_meta_id !!}</td>
            <td>{!! $survey->deleted_at !!}</td>
            <td>{!! $survey->created_at !!}</td>
            <td>{!! $survey->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['surveys.destroy', $survey->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('surveys.show', [$survey->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('surveys.edit', [$survey->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>