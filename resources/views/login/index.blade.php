@extends('layouts.main')

@section('content')
   <div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-5">
          <main class="form-signin">
            <form action="/login" method="post">
              @csrf
              <img class="mb-4" src="img/profile.png" alt="" width="72" height="57">
              <h1 class="h3 fw-normal">Please Sign-in</h1>
              @if(session()->has('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              @if(session()->has('loginError'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('loginError') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
                <div class="form-floating mb-2 mt-3">
                    <input type="email" autofocus class="form-control" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
              <button class="btn btn-primary w-100 py-2 mb-3" type="submit">Sign in</button>
              <p class="text-center fs-6">Does'nt Have Account? <a href="/register">Register Now</a></p>
              <p class="mt-4 mb-3 text-body-secondary">&copy; 2024–2026</p>
            </form>
          </main>
        </div>
    </div>
   </div>
@endsection