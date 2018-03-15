@extends('Layouts.template')
@section('title')
    Advertise
@endsection
@section('content')

    <div class="col-md-8 post">
        <h3>Advertise</h3>
        @isset($errors)
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger"> {{ $error }} </div>
                @endforeach
            @endif
        @endisset


        <form action="{{ asset('/advertise') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label>Banner:</label>
                <input type="file" name="banner" class="form-control"  />
            </div>
            <div class="form-group">
                <label>Url:</label>
                <input type="text" name="url" class="form-control" value=""/>
            </div>
            <div class="form-group">
                <input type="submit" name="addBanner" value="Add banner" class="btn btn-default" />
            </div>
        </form>

    </div>
    <!--// Sadrzaj -->
@endsection
