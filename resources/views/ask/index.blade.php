@extends('layouts.app')

@section('title', 'Subjects')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h3 class="modal-title">{{ $result->total() }} {{ str_plural('Ask', $result->count()) }} </h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <a href="{{ route('asks.create') }}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-plus-sign"></i> New Ask</a>
        </div>
    </div>

    <div class="result-set">
        @foreach($result as $item)
            <div class="">
              <h4>{{ $item->question }}</h4>
              <comments pid={{ $item->id }}></comments>
            </div>
        @endforeach
        <div class="text-center">
            {{ $result->links() }}
        </div>
    </div>

@endsection
