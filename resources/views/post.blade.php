@extends('master')

@section('content')
    
<div class="container">
    <div class="row mt-5">
        <div class="col">
            @if (session('InsertSuccess'))
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> {{ session('InsertSuccess') }} </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            </div>
            @endif
            <form action="{{ route('postInsert') }}" method="POST" class="p-3 form-group">
                @csrf
                <div class="mb-4">
                    <label for="postTitle" class="form-label text-white">Post Title</label>
                    <input type="text" id="postTitle" class="form-control 
                    @error('postTitle') 
                        is-invalid 
                        @else 
                        @if(old('postTitle')) 
                            is-valid 
                        @endif 
                    @enderror" name="postTitle" value="{{ old('postTitle') }}">
                    
                    @error('postTitle')
                        <small class="text-danger invalid-feedback">{{ $message }}</small>
                    @else
                        @if(old('postTitle'))
                            <small class="text-success">Good Post-Title</small>
                        @endif
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="" class=" form-label text-white">Post Description</label>
                    <textarea name ="postDesc" id="" class="form-control 
                    @error('postDesc') 
                    is-invalid 
                        @else 
                        @if(old('postDesc')) 
                            is-valid 
                        @endif 
                    @enderror">{{ old('postDesc') }}</textarea>
                    @error('postDesc')
                        <small class="text-danger invalid-feedback">{{ $message }}</small>
                    @else
                        @if(old('postDesc'))
                            <small class="text-success">Good Post-Description</small>
                        @endif
                    @enderror
                </div>
                <input type="submit" value="Post" class="btn btn-info" name="" style="font-weight: 700">
            </form>
        </div>
        <div class="col">
            <div class="container-fluid g-0">

               @foreach ($allData as $item)
            <div class="shadow-sm p-4 mb-4 rounded" style="background-color: rgb(192, 192, 192)">
                <div class="mb-3">
                    <span class="h2 mb-3">{{ $item['post_title'] }}</span>
                    <span class="float-end">{{ $item->created_at->format('d-m-Y') }}</span>
                </div>
                <div class=" mb-3">
                    <small class="text-muted">{{Str::words($item['post_desc'], 10, '...')}}</small>
                </div>
                <div class="text-end">
                    <a href="{{ route('deleteData',$item['id'])}}">
                        <span class="fs-4"><i class="fa-solid fa-trash-can p-2 bg-danger text-light"></i></span>
                    </a>
                    <a href="{{ route('updateDataPage',$item['id']) }}">
                        <span class="fs-4"><i class="fa-solid fa-file-lines p-2 bg-info text-light"></i></span>
                    </a>
                </div>
            </div>
               @endforeach
            </div>
            {{ $allData->links()  }}
        </div>
    </div>
</div>
@endsection