@extends('layouts.home')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4" style="margin-top: 100px;">All Users</h2>

    <div class="row g-4 justify-content-center">
        @foreach($users as $user)
            <div class="col-md-4 col-lg-3 text-center">
                <a href="{{ route('homes.user_profile', $user->id) }}" class="text-decoration-none text-dark">
                    <div class="card shadow-sm h-100" style="width: 300px;">
                        <img src="{{ $user->avatar_url }}" 
                             alt="{{ $user->name }}" 
                             class="card-img-top rounded-circle mx-auto mt-3" 
                             style="width:200px; height:300px; object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }} {{ $user->lastname }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($user->bio, 60) }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
<div style="margin-top: 50px;"></div>
@endsection
