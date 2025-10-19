@extends('layouts.dashboard') {{-- Dashboard blade’ini extends alıyoruz --}}

@section('content')
    <div class="container">
        <h1 class="mb-4">Create New Post</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="mb-4"> 
                    <label for="title" class="form-label">Title</label> 
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                           class="form-control" required> 
                    <div class="invalid-feedback">
                        Please enter your title.
                    </div> 
                </div>
                <div class="mb-4">
                    <label for="content" class="form-label">Contents</label>
                    <textarea name="content" id="content" rows="6"
                              class="form-control" required>{{ old('content') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Categories</label>
                    <select name="categories[]" multiple class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if(in_array($category->id, old('categories',[]))) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="image" class="block font-medium">İmages</label>
                    <input type="file" name="image" id="image" class="w-full">
                </div>
                <button class="btn btn-success rounded-pill px-3"  type="submit">Success</button>
            </div>    
        </form>
    </div>    
@endsection
