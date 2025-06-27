@extends('layouts.app')

@section('content')
<style>
    .overlay {
        background-color: transparent !important;
        box-shadow: none !important;
        padding: 0 !important;
        max-width: 100% !important;
    }
    .login-card {
        background: rgba(255,255,255,0.85);
        border-radius: 0.75rem;
        box-shadow: 0 2px 12px rgba(0,0,0,0.10);
        padding: 1.5rem 1.2rem;
        max-width: 340px;
        margin: 40px auto 0 auto;
        position: relative;
    }
    .login-logo {
        width: 60px;
        display: block;
        margin: 0 auto 1.2rem auto;
    }
    .login-title {
        font-weight: 700;
        font-size: 1.3rem;
        text-align: center;
        margin-bottom: 1rem;
        color: #0d6efd;
    }
    .form-label {
        font-weight: 500;
    }
    .btn-primary {
        background: linear-gradient(90deg, #0d6efd 60%, #0dcaf0 100%);
        border: none;
        font-weight: 600;
        transition: background 0.3s;
    }
    .btn-primary:hover {
        background: linear-gradient(90deg, #0dcaf0 0%, #0d6efd 100%);
    }
    .input-group-text {
        background: #f1f3f4;
        border: none;
    }
</style>
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
<div style="text-align:center; margin-top:1.5rem; color:#FFFFFF
; font-size:0.95rem;">
    <hr style="max-width:220px; margin:1.2rem auto 0.7rem auto;">
    <div>© 2025 Sekretariat DPRD Kota Bogor. All rights reserved.</div>
    <div>By Mahasiswa Universitas Binaniaga</div>
</div>
@endsection 