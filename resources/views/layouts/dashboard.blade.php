<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BlogEchoMind Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo.png') }}">
</head>
<body>
    <div class="d-flex">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; min-height:100vh;"> 
            <a href="{{ route('layouts.dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> 
                <svg class="bi pe-none me-2" width="40" height="32" aria-hidden="true"><use xlink:href="#bootstrap"></use></svg> <span class="fs-4">BlogEchoMind Dashboard</span> 
            </a> 
            <hr> 
            <ul class="nav nav-pills flex-column mb-auto"> 
                <li class="nav-item"> 
                    <a href="{{ route('layouts.dashboard') }}" class="nav-link active" aria-current="page"> 
                        <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
                            <use xlink:href="#home"></use>
                        </svg>
                        Dashboard
                    </a> 
                </li> 
                <li> 
                    <a href="{{ route('posts.index') }}" class="nav-link text-white"> 
                        <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true"><use xlink:href="#table"></use></svg>
                        My Writings
                    </a> 
                </li> 
            </ul> 
            <hr> 
            <div class="dropdown"> 
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> 
                    <img src="{{ auth()->user()->getAvatarUrlAttribute()}}" alt="Profile Photo" width="32" height="32" class="rounded-circle me-2">
                    <strong>{{ auth()->user()->name }} {{ auth()->user()->lastname }}</strong> 
                </a> 
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow"> 
                    <li>
                        <a class="dropdown-item" href="{{route('users.edit', auth()->user()->id)}}">Profile</a>
                    </li> 
                    <li>
                        <hr class="dropdown-divider">
                    </li> 
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Sign out</button>
                        </form>
                    </li> 
                </ul> 
            </div> 
        </div>


        <main class="flex-grow-1 p-4">
           <div class="container">
                @if(request()->routeIs('layouts.dashboard'))
                    <h1 class="mb-4">Hello, {{ auth()->user()->name }}</h1>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">+ New Write</a>
                    <h2>My Writings</h2>
                
                    @if(isset($posts) && $posts->count())
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>İmage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->created_at->format('d.m.Y H:i') }}</td>
                                    <td>
                                        @if($post->getFirstMediaUrl('images'))
                                            <img src="{{ $post->getFirstMediaUrl('images') }}" width="50" alt="{{ $post->title }}">
                                        @else
                                            <span>No Image</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $posts->links() }}
                    @else
                        <p>You don't have any posts yet.</p>
                    @endif
                @endif    
            </div>
            @yield('content') 
        </main>
    </div>    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
