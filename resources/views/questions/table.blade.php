<table class="table table-responsive" id="questions-table">
    <thead>
        <th>Body</th>
        <th>Survey Id</th>
        <th>Step</th>
        <th>Rule</th>
        <th>Deleted At</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($questions as $question)
        <tr>
            <td>{!! $question->body !!}</td>
            <td>{!! $question->survey_id !!}</td>
            <td>{!! $question->step !!}</td>
            <td>{!! $question->rule !!}</td>
            <td>{!! $question->deleted_at !!}</td>
            <td>{!! $question->created_at !!}</td>
            <td>{!! $question->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['questions.destroy', $question->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('questions.show', [$question->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('questions.edit', [$question->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>