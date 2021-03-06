@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">{{ $result->total() }} {{ str_plural('Category', $result->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
        </div>
    </div>

    <div class="result-set">
        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Active</th>
                <th>Created At</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($result as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->created_at->toFormattedDateString() }}</td>

                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'categories',
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
