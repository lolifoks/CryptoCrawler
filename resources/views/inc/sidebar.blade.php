<div id="sidebar">

    <div class="banner">
      @isset($ads)
          @foreach($ads as $ad)
              <a href="{{ $ad -> url }}" target="_blank"><img src="{{ $ad->banner }}" /></a>
              @endforeach
          @endisset
    </div>


</div>