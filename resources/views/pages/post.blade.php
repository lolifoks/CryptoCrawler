@extends('layouts.template')
@section('title')
    Read
@endsection
@section('content')

    @isset($singlePost)

        <div class="card mb-4 post" id="load" style="position: relative;">

            <h1 class="mt-4">{{ $singlePost->title }}</h1>

            <!-- Author -->
            <p class="lead">
                by
                <a href="#">{{ $singlePost->postUser }}</a>
            </p>

            <hr>

            <!-- Date/Time -->


            <hr>

            <!-- Preview Image -->
            <img class="img-responsive rounded" src="{{ asset('/'.$singlePost->link)}}" alt="{{ $singlePost->alt }}">

            <hr>

            <!-- Post Content -->
            <p> {{ $singlePost->content }}</p>

            <hr>

            <!-- Comments Form -->
            @component("post.comments", [
                    'comments' => $singlePost->comments
                ])@endcomponent

            @if (Auth::check())
            @include('post.comment_form')



            @else
                <h4>In order to comment, you must <a href="{{ route('login') }}">login</a> first.</h4>
        @endif
            <!--// Comments Form -->
            <br>
        </div>
    @endisset
@endsection
