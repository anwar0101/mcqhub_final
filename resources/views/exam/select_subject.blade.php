@extends('layouts.user')

@section('content')
    <div class="w3-container" id="mainData" style="margin-top:80px">
      Choose Subject
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="exam" class="w3-row-padding w3-margin">

                    @forelse ($subjects as $sub)
                      <div class="w3-col s4 w3-center" style="margin-top:5px; margin-bottom:5px;">
                        <a href="{{ route('start.practise', $sub->id) }}">
                            <div class="w3-display-container w3-green w3-hover-shadow w3-center w3-round" style="height:150px;max-width:250px;">
                              <div class="w3-display-middle"><h2>{{ $sub->name }}</h2></div>
                            </div>
                        </a>
                      </div>
                    @empty
                      <div> No Subject in this category</div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
@endsection

@section('more')
    @if(Auth::guest())
        <script src="js/collapse-header.js"></script>
    @endif
@endsection
