@extends('Layouts.template');
@section('title')
    Blog
@endsection
@section('content')
    @isset($posts)
        @foreach($posts as $post)
            <!-- Blog Post -->
            <div class="card mb-4 post" id="load" style="position: relative;">
                <img class="card-img-top" src="{{ asset('/'.$post->link) }}" alt="{{ $post->alt }}">
                <div class="card-body">
                    <h2 class="card-title"><a href="{{ asset('/posts/'.$post->postId )}}">{{ $post->title }}</a></h2>
                    <p class="card-text">
                        {{ str_limit($post->content, 100) }}
                    </p>
                    <a href="{{ asset('/posts/'.$post->postId )}}" class="btn log">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{ date("d.m.Y H:i:s", $post->created_at) }} by
                    <a href="#">{{ $post->name }}</a>
                </div>
            </div>
            <!--// Blog Post -->
        @endforeach
    @endisset
    @endsection