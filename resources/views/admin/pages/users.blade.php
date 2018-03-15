@extends("layouts.admin")
@section("content")

    @empty($form)
        @include("admin.components.users.table")
    @endempty
@endsection
