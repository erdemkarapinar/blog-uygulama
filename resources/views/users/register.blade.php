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
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        padding: 2rem;
    }
</style>

<div class="auth-wrapper">
    <div class="auth-card">
        <h2 class="text-center mb-4">Register</h2>

        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>LastName</label>
                <input type="text" name="lastname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Register</button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}">Already have an account? Login</a>
        </div>
    </div>
</div>
@endsection
