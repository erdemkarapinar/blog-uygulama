@extends('layouts.home')
@section('content')

    <div class="text-center mb-5">
          <img src="{{ $user->avatar_url }}" 
               alt="{{ $user->name }}" 
               class="rounded-circle mb-3 shadow-sm"
               width="150" height="150" 
               style="object-fit: cover;">
          <h2 class="fw-bold">{{ $user->name }} {{ $user->lastname }}</h2>
          <p class="text-muted">{{ $user->bio ?? 'This author has not added a biography yet.' }}</p>
    </div>
    <div class="container px-4">
        <h3 class="mb-4 text-center">{{ $user->name }} {{ $user->lastname }}'s Articles</h3>
        <div class="row g-4 justify-content-center">
            @forelse($posts as $post)
                <div class="col-md-6 col-lg-5 d-flex">
                    <div class="card shadow-sm d-flex flex-column h-100 w-100">
                        @if($post->hasMedia('images'))
                            <img src="{{ $post->getFirstMediaUrl('images') }}" 
                                 class="card-img-top object-fit-cover" 
                                 style="height: 200px;" 
                                 alt="{{ $post->title }}">
                        @else
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img">
                                <rect width="100%" height="100%" fill="#55595c"></rect>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em" text-anchor="middle">Thumbnail</text>
                            </svg>
                        @endif

                        <div class="card-body d-flex flex-column flex-grow-1">
                            <h5 class="card-title mb-2 text-truncate">{{ $post->title }}</h5>
                            <p class="card-text mb-3" style="flex-grow:1; overflow:hidden; text-overflow:ellipsis; max-height:4.5em; line-height:1.5em;">
                                {{ Str::limit($post->content, 150) }}
                            </p>

                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                                <small class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">This author has no posts yet.</p>
            @endforelse
        </div>
    </div>
    <div style="margin-top: 170px;"></div>
@endsection    