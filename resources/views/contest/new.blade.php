@extends('layouts.app')

@section('title', 'Practise')

@section('content')

    <div class="row">
        <div class="col-md-5">
            <h3>Contest</h3>
        </div>
        <div class="col-md-7 page-action text-right">
            <a href="{{ route('contests.index') }}" class="btn btn-default btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            @foreach ($questions as $question)
              <mcq name="{{ $question->id }}" model="{{ $question->id }}"
              :answered={{ $question->answered() ? 'true' : 'false' }}
              tag1="{{ $question->option1 }}" tag2="{{ $question->option2 }}"
              tag3="{{ $question->option3 }}" tag4="{{ $question->option4 }}"
              question="{{ $question->question }}" correct="{{ $question->answer }}" path="test/"></mcq>
            @endforeach
        </div>
    </div>
@endsection
