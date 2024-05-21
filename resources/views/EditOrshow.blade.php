@extends('master');

@section('content')

<div class="container">
    <a href="{{ Route('postRoute') }}" class=" text-decoration-none fs-5">
        <i class="fa-solid fa-arrow-left"></i>   Back
    </a>
    <div class="row">
        <div class="col-6 offset-3">
            <div class="shadow-sm p-4 mb-4 rounded" style="background-color: rgb(192, 192, 192)">
                <div class="mb-3">
                    <span class="h2 mb-3">{{ $post['post_title'] }}</span>
                    <span class="float-end"></span>
                </div>
                <div class=" mb-3">
                    <small class="text-muted">{{ $post['post_desc'] }}</small>
                </div>
                <div class=" mb-3">
                    <small>{{ $post->created_at->format('d-m-Y') }}</small>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5 offset-8">
            <a href="{{ route('UpdatePostEdit', $post['id']) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>


@endsection