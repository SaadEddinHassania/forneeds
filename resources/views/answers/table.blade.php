<table class="table table-responsive" id="answers-table">
    <thead>
        <th>Question Id</th>
        <th>Answer</th>
        <th>Deleted At</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($answers as $answer)
        <tr>
            <td>{!! $answer->question_id !!}</td>
            <td>{!! $answer->answer !!}</td>
            <td>{!! $answer->deleted_at !!}</td>
            <td>{!! $answer->created_at !!}</td>
            <td>{!! $answer->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['answers.destroy', $answer->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('answers.show', [$answer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('answers.edit', [$answer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>