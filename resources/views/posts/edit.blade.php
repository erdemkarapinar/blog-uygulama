@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Post</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                       class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="content" class="form-label">Contents</label>
                <textarea name="content" id="content" rows="6" class="form-control" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label">Categories</label>
                <select name="categories[]" multiple class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                            @if(in_array($category->id, old('categories', $post->categories->pluck('id')->toArray()))) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4 form-check">
                <input type="checkbox" class="form-check-input" name="publish" id="publish" value="1"
                    {{ old('publish', $post->published_at ? 1 : 0) ? 'checked' : '' }}>
                <label class="form-check-label" for="publish">Publish</label>
            </div>

            @if($post->getFirstMediaUrl('images'))
                <div class="mb-4">
                    <label class="form-label">Current Image</label><br>
                    <img src="{{ $post->getFirstMediaUrl('images') }}" alt="{{ $post->title }}" width="150">
                </div>
            @endif

            <div class="mb-4">
                <label for="image" class="form-label">Upload New Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Update Post</button>
            <a href="{{ route('layouts.dashboard') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
