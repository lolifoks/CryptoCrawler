@extends('Layouts.template');
@section('title')
    Home
    @endsection

<div class="jumbotron text-center">
    <h1>CryptoCrawler</h1>
    @if (Auth::guest())
        <p>Advertise your cryptocurrency business</p>
        <a href="{{ route('login') }}"><button type="button" class="btn log">SIGN IN</button></a>
        <a href="{{ route('register') }}"><button type="button" class="btn reg">SIGN UP</button></a>
    @else
        <p>Welcome, {{ Auth::user()->name }}</p>
        <p><a href="{{route('advertise')}}">Advertise</a> your cryptocurrency business with us</p>
    @endif

    <div class="panel-body">



    </div>
</div>

@section('content')
<div id="about" class="container-fluid">




</div><br/>

@endsection
<div class="row" id="slider" >
    @include('inc.slider')
</div>
