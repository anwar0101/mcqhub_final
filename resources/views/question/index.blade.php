@extends('layouts.app')

@section('title', 'Subjects')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">{{ $result->total() }} {{ str_plural('Question', $result->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <a href="{{ route('questions.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th>Question</th>
                <th>Options</th>
                <th>Answer</th>
                <th>Created_at</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($result as $item)
                <tr>
                    <td>{{ $item->question }}</td>
                    <td>{{ $item->option1 }}/{{ $item->option2 }}/{{ $item->option3 }}/{{ $item->option4 }}</td>
                    <td>{{ $item->answer }}({{ array($item->option1,$item->option2,$item->option3,$item->option4)[$item->answer] }})</td>
                    <td>{{ $item->created_at->toFormattedDateString() }}</td>

                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'questions',
                            'id' => $item->id
                        ])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $result->links() }}
        </div>
    </div>

@endsection
