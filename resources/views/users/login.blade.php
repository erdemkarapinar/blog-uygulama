@extends('layouts.home')

@section('content')
<style>
    .auth-wrapper {
        min-height: 70vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 60px;
    }
    .auth-card {
        width: 100%;
        max-width: 400px;
        background: #beige;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        padding: 2rem;
    }
</style>

<div class="auth-wrapper">
    <div class="auth-card">
        <h2 class="text-center mb-4">Login</h2>

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('register') }}">Don't have an account? Register</a>
        </div>
    </div>
</div>
@endsection
