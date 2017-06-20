@extends('layouts.user')

@section('content')

@if(Auth::guest())
  @include('layouts.partials.guest')
@endif


@if(!Auth::guest())
    <div class="w3-content w3-display-container" style="width:95%;margin-top:75px;">
      <img class="mySlides" src="img/img_nature_wide.jpg" style="width:100%">
      <img class="mySlides" src="img/img_fjords_wide.jpg" style="width:100%">
      <img class="mySlides" src="img/img_mountains_wide.jpg" style="width:100%">
      <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
        <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
        <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
        <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
      </div>
    </div>
@endif

<div class="w3-container" id="mainData">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div id="exam" class="w3-row-padding w3-margin">

                @forelse ($categories as $cat)
                  <div class="w3-col s4 w3-center" style="margin-top:5px; margin-bottom:5px;">
                    <a href="{{ route('select.subjects', $cat->id) }}">
                        <div class="w3-display-container w3-green w3-hover-shadow w3-center w3-round" style="height:150px;max-width:250px;">
                          <div class="w3-display-middle"><h2>{{ $cat->name }}</h2></div>
                        </div>
                    </a>
                  </div>
                @empty
                  <div> No Category added yet</div>
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

    <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
          showDivs(slideIndex += n);
        }

        function currentDiv(n) {
          showDivs(slideIndex = n);
        }

        function showDivs(n) {
          var i;
          var x = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("demo");
          if (n > x.length) {slideIndex = 1}
          if (n < 1) {slideIndex = x.length}
          for (i = 0; i < x.length; i++) {
             x[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
             dots[i].className = dots[i].className.replace(" w3-white", "");
          }
          x[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " w3-white";
        }
    </script>
@endsection
