<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BlogEchoMind</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Merriweather:400,400i,700&display=swap" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  
  <style>
    :root {
      --primary-color: #3b82f6; /* Mavi - Tailwind blue-500 */
      --secondary-color: #10b981; /* Yeşil - Tailwind emerald-500 */
      --text-dark: #1f2937;
      --text-light: #4b5563;
      --bg-light: #f9fafb; /* Açık Gri/Beyaz */
      --bg-body: #ffffff;
      --border-color: #e5e7eb;
    }

    body {
      margin: 0;
      font-family: "Montserrat", sans-serif; /* Başlıklar için daha iyi */
      background-color: var(--bg-body);
      color: var(--text-light);
    }
    
    h1, h2, h3, h4, h5, h6 {
      font-family: "Montserrat", sans-serif;
      color: var(--text-dark);
      font-weight: 700;
    }
    
    p, .card-text {
        font-family: "Merriweather", serif; /* İçerikler için daha okunaklı */
    }

    /* --- Header / Navigation --- */
    header {
      background-color: var(--bg-body);
      border-bottom: 1px solid var(--border-color);
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
      padding: 1rem 0;
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    header h1 {
      font-size: 1.5rem;
      margin: 0;
      font-weight: 700;
      color: var(--primary-color);
    }
    .logo-link {
        text-decoration: none; 
        color: inherit;
    }
    nav .nav-link-item {
      color: var(--text-dark);
      margin-left: 1.5rem;
      text-decoration: none;
      font-weight: 600;
      padding-bottom: 5px;
      transition: color 0.2s, border-bottom 0.2s;
    }
    nav .nav-link-item:hover, nav .nav-link-item.active {
      color: var(--primary-color);
      border-bottom: 2px solid var(--primary-color);
    }
    .write-now-btn {
        background-color: var(--secondary-color);
        color: white !important;
        padding: 8px 15px;
        border-radius: 6px;
        margin-left: 20px;
        border-bottom: none !important;
    }
    .write-now-btn:hover {
        background-color: #059669; /* Koyu Yeşil */
    }

    /* --- Hero Section --- */
    .hero-section {
      background-color: #d0e7ff;
      padding: 80px 20px;
      margin-bottom: 40px;
      border-bottom: 1px solid var(--border-color);
    }
    .hero-section h2 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      color: var(--text-dark);
      font-weight: 700;
    }
    .hero-section p.lead {
      font-size: 1.1rem;
      max-width: 700px;
      margin: 0 auto;
      color: var(--text-light);
    }
    .search-bar {
        max-width: 450px;
        margin: 0 auto;
        display: flex;
        gap: 10px;
    }
    .search-bar .form-control {
        border-radius: 6px;
        border-color: var(--border-color);
    }
    .search-bar .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
    .search-bar .btn-primary:hover {
        background-color: #2563eb;
        border-color: #2563eb;
    }

    .card-img-top {
        object-fit: cover;
        border-bottom: 1px solid #ddd;
    }

    .card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    

    /* --- Footer --- */
    footer {
      background-color: var(--text-dark);
      color: #9ca3af;
      text-align: center;
      padding: 3rem 1rem;
      margin-top: 5rem;
      font-size: 0.9rem;
    }
    footer .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1100px;
    }
    .social-links a {
        color: #9ca3af;
        font-size: 1.2rem;
        margin-left: 15px;
        transition: color 0.2s;
    }
    .social-links a:hover {
        color: var(--secondary-color);
    }

    /* Responsive Ayarlar */
    @media (max-width: 768px) {
        .hero-section h2 {
            font-size: 2rem;
        }
        header .container {
            flex-direction: column;
        }
        nav {
            margin-top: 15px;
        }
        nav .nav-link-item {
            margin-left: 1rem;
            margin-right: 1rem;
        }
        footer .container {
            flex-direction: column;
        }
        footer p {
            margin-bottom: 15px;
        }
    }

    .dark-mode {
      --primary-color: #60a5fa; /* Açık mavi */
      --secondary-color: #34d399; /* Açık yeşil */
      --text-dark: #f9fafb; /* Beyazımsı yazı */
      --text-light: #d1d5db;
      --bg-light: #1e293b; /* Lacivertimsi gri */
      --bg-body: #0f172a;  /* Ana koyu arka plan */
      --border-color: #334155;
    }

    .dark-mode body {
      background-color: var(--bg-body);
      color: var(--text-light);
    }

    .dark-mode header {
      background-color: var(--bg-body);
      border-bottom: 1px solid var(--border-color);
    }

    .dark-mode .hero-section {
      background-color: #1e293b;
    }

    .dark-mode .card {
      background-color: #1e293b;
      color: var(--text-light);
      border-color: var(--border-color);
    }

    .dark-mode footer {
      background-color: #0f172a;
      color: #9ca3af;
    }

  </style>
</head>
<body>
<header>

        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('homes.index') }}" class="logo-link">
                <h1>BlogEchoMind</h1>
            </a>
            <nav>
                <a href="{{route('homes.index')}}" class="nav-link-item active">Home</a>
                <a href="{{route('homes.category')}}" class="nav-link-item">Categories</a>
                <a href="{{ route('homes.user') }}" class="nav-link-item">Profiles</a>
                <a href="{{route('login')}}" class="nav-link-item write-now-btn"><i class="fas fa-feather-alt me-1"></i>Write Now</a>
                            <button id="themeToggle" class="btn btn-outline-secondary ms-3">
                                🌒
                            </button>
            </nav>
        </div>
    </header>
  
    @if(request()->routeIs('homes.index'))
        <section class="hero-section text-center">
            <div class="container">
              <h2>Your Source of Information, Ideas and Inspiration</h2>
              <p class="lead">You're in the right place for current issues, in-depth analysis and inspiring stories.</p>
                <div class="search-bar mt-4">
                    <form action="{{ route('homes.search_results') }}" method="GET" class="d-flex w-100">
                        <input type="text" name="query" class="form-control" placeholder="Search..." value="{{ request('query') }}">
                        <button type="submit" class="btn btn-primary ms-2"><i class="fas fa-search"></i></button>
                    </form>
                </div>

            </div>
        </section>
    @endif

    <div class="container main-content-area mt-5 px-4">
        @if(request()->routeIs('homes.index'))
          <h2 class="mb-5 text-center section-title">Latest Post</h2>
          
          <div class="row g-4 justify-content-center">
                @forelse($posts as $post)
                    <div class="col-md-6 col-lg-3 d-flex">
                        <div class="card shadow-sm d-flex flex-column h-100" style="width: 100%;">

                            @if($post->hasMedia('images'))
                                <img src="{{ $post->getFirstMediaUrl('images') }}" 
                                     class="card-img-top object-fit-cover" 
                                     style="height: 200px;" 
                                     alt="{{ $post->title }}">
                            @else
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice">
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em" text-anchor="middle">Thumbnail</text>
                                </svg>
                            @endif

                            <div class="card-body d-flex flex-column flex-grow-1">
                                <h2 class="card-title h5 mb-2 text-truncate">{{ $post->title }}</h2>

                                <p class="card-text mb-3" style="flex-grow:1; overflow:hidden; text-overflow:ellipsis; max-height: 4.5em; line-height: 1.5em; position: relative;">
                                    {{ $post->content }}
                                    <span style="position: absolute; bottom: 0; right: 0; padding-left: 5px; font-weight: bold;">
                                        <p>...Click on view to continue reading</p>
                                    </span>
                                </p>


                                <div class="text-muted mb-2 small">
                                    Writer:
                                    <a href="{{ route('homes.user_profile', $post->user->id) }}" class="text-decoration-none text-reset">
                                        {{ $post->user->name }} {{ $post->user->lastname }}
                                    </a>
                                    <br>
                                    Date: {{ $post->created_at->format('d-m-Y H:i') }}
                                </div>

                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    <small class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <p class="text-center">Henüz yazı yok.</p>
                @endforelse
            </div>
        @endif
        @yield('content')
    </div>

  <footer>
    <div class="container">
      <p>&copy; {{ date('Y') }} BlogEchoMind. All rights reserved.</p>
      <div class="social-links">
        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </footer>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script>
  const toggleBtn = document.getElementById('themeToggle');
  const body = document.body;

  const savedTheme = localStorage.getItem('theme');
  if (savedTheme === 'dark') {
    body.classList.add('dark-mode');
    toggleBtn.textContent = '☀️';
  }

  toggleBtn.addEventListener('click', () => {
    const isDark = body.classList.toggle('dark-mode');
    toggleBtn.textContent = isDark ? '☀️' : '🌒 ';
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
  });
</script>
</body>
</html>