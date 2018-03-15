<h2></h2>
<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @isset($ads)
            @foreach($ads as $ad)
        <li data-target="#myCarousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        @endisset
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @isset($ads)
            @foreach($ads as $ad)
                <div class="item {{ $loop->first ? ' active' : '' }}">
                    <a href="{{ $ad -> url }}" target="_blank"><img src="{{ $ad->banner }}" /></a>
                </div>

            @endforeach
        @endisset


    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>