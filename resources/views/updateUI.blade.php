@extends('master');

@section('content')

<div class="container">
    <a href="{{ route('updateDataPage', $post['id']) }}" class=" text-decoration-none fs-5">
        <i class="fa-solid fa-arrow-left"></i>   Back
    </a>
    <div class="row">
        <div class="col-6 offset-3">
            <form action="{{ route('updateDataRoute') }}" method="POST" class="p-3 form-group">
                @csrf
                <input type="hidden" value="{{ $post['id'] }}" name="UpdateId">
                <label for="" class="form-label">Post Title</label>
                <input type="text" class="form-control mb-4" name="postTitle" value="{{ $post['post_title'] }}">
                <label for="" class=" form-label">Post Description</label>
                <textarea name="postDesc" id="" class="form-control mb-4">{{ $post['post_desc'] }}</textarea>
                <input type="submit" value="Update Post" class="btn btn-info" name="">
            </form>
        </div>
    </div>
</div>

@endsection