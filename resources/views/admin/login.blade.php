@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<div class="login-card">
    <img src="{{ asset('img/logo-kiri.png') }}" alt="Logo" class="login-logo">
    <div class="login-title">Login Admin</div>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="email" name="email" id="email" class="form-control" required autofocus value="{{ old('email') }}">
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
        </div>
        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
    </form>
</div>

@endsection 