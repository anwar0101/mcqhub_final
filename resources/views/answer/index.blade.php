@extends('layouts.app')

@section('title', 'Answer')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">{{ $result->total() }} {{ str_plural('Answer', $result->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <a href="{{ route('answers.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Start</a>
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th>Question</th>
                <th>Options</th>
                <th>Anwser</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($result as $item)
                <tr>
                    <td>{{ $item->question->question }}</td>
                    <td>{{ $item->question->option1 }}/{{ $item->question->option2 }}/{{ $item->question->option3 }}/{{ $item->question->option4 }}</td>
                    <td>{{ array($item->question->option1,$item->question->option2,$item->question->option3,
                      $item->question->option4)[$item->user_answer] }}({{ array($item->question->option1,$item->question->option2,$item->question->option3,
                        $item->question->option4)[$item->question->answer] }})</td>
                    <td>{{ $item->created_at->toFormattedDateString() }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $result->links() }}
        </div>
    </div>

@endsection
