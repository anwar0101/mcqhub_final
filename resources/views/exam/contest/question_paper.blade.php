@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top:80px;">
            <div class="row">
                <div class="text-center">
                  <h4>Contest #{{ $subject->id }}</h4>
                  <h5>Subject: {{ $subject->name }} Marks: {{ $subject->id }}</h5>
                  <h5>Time : {{ $subject->id }}</h5>
                </div>
            </div>
            <div class="row w3-margin">
                @foreach ($questions as $question)
                    {{-- <h3>{{ $loop->iteration }}. {{ $question->question }}</h3> --}}
                    <div class="w3-row-padding w3-margin" id="{{ $loop->iteration }}">
                      <mcq name="{{ $question->id }}" model="{{ $question->id }}"
                      :answered={{ $question->answered() ? 'true' : 'false' }}
                      tag1="{{ $question->option1 }}" tag2="{{ $question->option2 }}"
                      tag3="{{ $question->option3 }}" tag4="{{ $question->option4 }}"
                      question="{{ $question->question }}" correct="{{ $question->answer }}" path="practise/"></mcq>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="w3-bottom w3-margin">
        <div class="w3-bar" style="margin-bottom:10px;">
            @foreach ($questions as $question)
              <a href="#{{ $loop->iteration }}"><button class="w3-btn w3-white w3-border w3-border-blue w3-round">{{ $loop->iteration }}</button></a>
            @endforeach
        </div>
    </div>
@endsection

@section('more')
    @if(Auth::guest())
        <script src="js/collapse-header.js"></script>
    @endif
@endsection
