@extends('layouts.home')

@section('content')

    <div class="container py-5 px-4">
        <h1 class="text-center mb-5">{{ $category->name }} Articles in Category</h1>

        <div class="row g-4 justify-content-center">
            @forelse($posts as $post)
                <div class="col-md-6 col-lg-5 d-flex">
                    <div class="card shadow-sm d-flex flex-column h-100 w-100">

                        <!-- Görsel -->
                        @if($post->hasMedia('images'))
                            <img src="{{ $post->getFirstMediaUrl('images') }}" 
                                 class="card-img-top object-fit-cover" 
                                 style="height: 200px;" 
                                 alt="{{ $post->title }}">
                        @else
                            <!-- Görsel Yoksa Default Thumbnail -->
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice">
                                <rect width="100%" height="100%" fill="#55595c"></rect>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em" text-anchor="middle">Thumbnail</text>
                            </svg>
                        @endif

                        <!-- İçerik -->
                        <div class="card-body d-flex flex-column flex-grow-1">
                            <h5 class="card-title mb-2 text-truncate">{{ $post->title }}</h5>

                            <p class="card-text mb-3" 
                               style="flex-grow:1; overflow:hidden; text-overflow:ellipsis; max-height:4.5em; line-height:1.5em;">
                                {{ Str::limit($post->content, 100) }}
                            </p>

                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                <small class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small>
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <p class="text-center">There are no articles in this category yet.</p>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('homes.category') }}" class="btn btn-outline-secondary">← Return to Categories</a>
        </div>
    </div>
    <div style="height: 240px;"></div>
@endsection
