@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top:80px;">
            <div class="row">
                <div class="text-center">
                    <h4>JSC Model Test</h4>
                    <h5>Total Marks: 50 Time: 50 minutes</h5>
                </div>
            </div>
            <div class="row">
                @foreach ($questions as $question)
                    <h3>{{ $loop->iteration }}. {{ $question->question }}</h3>
                    <div class="w3-row-padding w3-margin">
                        <div class="w3-third">
                            <p>
                                <input class="w3-radio" type="radio" name="q{{ $question->id }}" value="a">
                                <label>{{ $question->option_a }}</label>
                            </p>
                            <p>
                                <input class="w3-radio" type="radio" name="q{{ $question->id }}" value="a" >
                                <label>{{ $question->option_c }}</label>
                            </p>
                        </div>

                        <div class="w3-third">
                            <p>
                                <input class="w3-radio" type="radio" name="q{{ $question->id }}" value="a" >
                                <label>{{ $question->option_b }}</label>
                            </p>
                            <p>
                                <input class="w3-radio" type="radio" name="q{{ $question->id }}" value="a" >
                                <label>{{ $question->option_d }}</label>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="w3-bottom w3-margin">
        <div class="w3-bar" style="margin-bottom:10px;">
            @for ($i = 0; $i < 25; $i++)
                <button class="w3-btn w3-white w3-border w3-border-blue w3-round">{{ $i+1 }}</button>
            @endfor
        </div>
    </div>
@endsection

@section('more')
    @if(Auth::guest())
        <script src="js/collapse-header.js"></script>
    @endif
@endsection
