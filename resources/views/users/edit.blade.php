@extends('layouts.dashboard')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0">
        
        <div class="card-header bg-light border-0">
            <h2 class="h3 mb-0 text-dark">Profile Settings</h2>
            <p class="text-muted mt-1 mb-0">You can update your account information and password here.</p>
        </div>

        <div class="card-body p-4">
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="mb-5">
                <h3 class="h4 mb-3 pb-2 border-bottom">Update Profile Information</h3>
                
                <form action="{{ route('users.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control rounded-3 @error('name') is-invalid @enderror">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="lastname" class="form-label">LastName</label>
                            <input type="text" name="lastname" id="lastname" value="{{ old('lastname', $user->lastname) }}" class="form-control rounded-3 @error('lastname') is-invalid @enderror">
                            @error('lastname') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control rounded-3 @error('email') is-invalid @enderror">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea name="bio" id="bio" rows="1" class="form-control rounded-3 @error('bio') is-invalid @enderror">{{ old('bio', $user->bio) }}</textarea>
                            @error('bio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label mb-2">Profile Photos</label>
                            <div class="d-flex align-items-center">
                                @if($user->getAvatarUrlAttribute())
                                    <img src="{{ $user->getAvatarUrlAttribute() }}" alt="Profil Resmi" class="rounded-circle me-3 border" style="width: 64px; height: 64px; object-fit: cover;">
                                @endif
                                <input type="file" name="profile_photo" class="form-control @error('profile_photo') is-invalid @enderror" style="width: auto;">
                            </div>
                            @error('profile_photo') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 pt-3">
                            <button type="submit" class="btn btn-primary rounded-3 shadow-sm px-4">
                                Update Profile Information
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
            <hr class="my-4">

            <div class="mb-5">
                <h3 class="h4 mb-3 pb-2 border-bottom">Update Password</h3>
                
                <form action="{{ route('password.update') }}" method="POST" class="row g-3">
                    @csrf
                    @method('PATCH')

                    @if(session('status') === 'password-updated')
                        <div class="col-12">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i> Your password has been updated successfully.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    <div class="col-md-6">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" name="current_password" id="current_password" class="form-control rounded-3 @error('current_password') is-invalid @enderror">
                        @error('current_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" name="password" id="password" class="form-control rounded-3 @error('password') is-invalid @enderror">
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">New Password (Again)</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control rounded-3">
                    </div>

                    <div class="col-12 pt-3">
                        <button type="submit" class="btn btn-success rounded-3 shadow-sm px-4">
                            Update Password
                        </button>
                    </div>
                </form>
            </div>

            <hr class="my-4">

            <div class="p-3 bg-danger-subtle border border-danger-subtle rounded-3">
                <h3 class="h4 mb-3 text-danger">Permanently Delete Account</h3>
                <p class="text-danger-emphasis mb-4">When you delete your account, all your data will be permanently deleted. This process cannot be undone.</p>
                
                <form action="{{ route('users.destroy', Auth::id()) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This action is irreversible.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-3 shadow-sm px-4">
                        Delete Account
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection