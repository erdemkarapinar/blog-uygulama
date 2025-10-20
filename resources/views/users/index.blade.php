@extends('homes.index')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-5 fw-bold">All Profiles</h2>

        <div class="row g-4 justify-content-center">
            @forelse($users as $user)
                @if($user->name)
                    <div class="col-md-4 col-lg-3 d-flex">
                        <a href="{{ route('users.show', $user->name) }}" class="text-decoration-none text-dark flex-fill">
                            <div class="card h-100 text-center shadow-sm border-0" style="transition: all 0.3s ease;">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <img src="{{ $user->profile_photo }}"
                                         class="rounded-circle mb-3 shadow-sm"
                                         width="120" height="120"
                                         style="object-fit: cover;">
                                    <h5 class="fw-semibold mb-1">{{ $user->name }} {{ $user->lastname }}</h5>
                                    <p class="text-muted mb-3" style="font-size: 0.9rem;">
                                        {{ Str::limit($user->bio ?? 'This author has not added a biography yet.', 70) }}
                                    </p>
                                    <span class="btn btn-outline-primary btn-sm mt-auto">See Profile</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @empty
                <p class="text-center text-muted">There are no registered profiles yet.</p>
            @endforelse
        </div>
    </div>

    <style>
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 19px rgba(0,0,0,0.15);
    }
    body{
        background-color: #d0e7ff;
    }
    </style>
@endsection

