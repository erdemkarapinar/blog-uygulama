@extends('layouts.home')
@section('content')
<div class="container main-content-area mt-5 px-4">
    <h2>"{{ $query }}" için arama sonuçları</h2>

    @if($results->isEmpty())
        <p>Sonuç bulunamadı.</p>
    @else
        <ul class="list-group mt-3">
            @foreach($results as $result)
                <li class="list-group-item">
                    <a href="{{ route('posts.show', $result->id) }}">{{ $result->title }}</a>
                    <p>{{ Str::limit($result->body, 100) }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</div>
<div style="height: 328px;"></div>

@endsection