@extends('layouts.home')
@section('content')
<div class="container py-5">
        <h1 class="text-center mb-5">All Categories</h1>

        <div class="row g-3 justify-content-center">
            @forelse($categories as $category)
                <div class="col-md-6 col-lg-4 d-flex">
                    <div class="card shadow-sm w-100" style="height: 200px; width: 300px;">
                        <div class="card-body text-center d-flex flex-column justify-content-between">
                            <h5 class="card-title mb-3">{{ $category->name }}</h5>
                            <a href="{{ route('homes.category_posts', $category->slug) }}" class="btn btn-outline-primary mt-auto">View</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">There are no category yet.</p>
            @endforelse
        </div>
    </div>
        <div style="height: 240px;"></div>
@endsection