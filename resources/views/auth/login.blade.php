@extends('layouts.auth.app')

@section('content')
    <div class="bg-white shadow rounded p-4">
        <h1 class="mb-4 h3 text-center">Sign in to our platform</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST" class="mt-3">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email"
                       class="form-control"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="example@company.com"
                       autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Your Password</label>
                <input type="password"
                       class="form-control"
                       id="password"
                       name="password"
                       placeholder="Password">
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
    </div>
@endsection
