@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header text-white text-center py-4" style="background: linear-gradient(135deg, #e11d48, #f59e0b); border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                    <h4 class="mb-0 fw-bold">Login to Your Account</h4>
                </div>

                <div class="card-body px-4 py-4">

                    @if (session('status'))
                        <div class="alert alert-success rounded-3">{{ session('status') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <input id="email" type="email" class="form-control rounded-3" name="email" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input id="password" type="password" class="form-control rounded-3" name="password" required>
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg text-white fw-semibold" style="background: linear-gradient(135deg, #e11d48, #f59e0b); border-radius: 30px;">
                                Login
                            </button>
                        </div>

                        <div class="mt-3 text-center">
                            <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: #e11d48;">Forgot Your Password?</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
