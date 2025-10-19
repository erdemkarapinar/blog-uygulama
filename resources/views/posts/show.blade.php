@extends('layouts.home')
@section('content')
<!DOCTYPE html>
<html>
<head>
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
      background-color: #d0e7ff;
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


    .post-container {
      max-width: 900px;
      margin: 60px auto;
      background: white;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .post-title {
      font-size: 2.2rem;
      font-weight: 700;
      margin-bottom: 1rem;
    }

    .post-meta {
      color: #6b7280;
      margin-bottom: 1.5rem;
      font-size: 0.95rem;
    }

    .post-content {
    font-size: 1.1rem;
    line-height: 1.8;
    white-space: pre-line;
    word-wrap: break-word;
    overflow-wrap: break-word;
    }


    .post-image {
      width: 100%;
      border-radius: 10px;
      margin-bottom: 2rem;
      max-height: 450px;
      object-fit: cover;
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
  </style>
</head>
<body>
    <main class="container">
      <div class="post-container">
        <h1 class="post-title">{{ $post->title }}</h1>

        <div class="post-meta">
          Writer: <strong>{{ $post->user->name }}</strong> • {{ $post->created_at->format('d.m.Y H:i') }}
        </div>

        @if($post->hasMedia('images'))
          <img src="{{ $post->getFirstMediaUrl('images') }}" class="post-image" alt="{{ $post->title }}">
        @endif

        <div class="post-content">
          {{ $post->content }}
        </div>

        <div class="mt-5 text-end">
          <a href="{{ route('homes.index') }}" class="btn btn-outline-secondary">← Back to Home</a>
        </div>
      </div>
    </main>
    <div style="margin-top: 50px;">
      
    </div>
</body>
</html>    
@endsection
