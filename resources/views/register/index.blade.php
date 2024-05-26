@extends('layouts.main')

@section('content')
   <div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-5">
          <main class="form-signin">
            <form method="post" action="/register">
              @csrf
              <img class="mb-4" src="img/profile.png" alt="" width="72" height="57">
              <h1 class="h3 mb-3 fw-normal">Register Page</h1>
                
              <div class="py-4">
                  <div class="form-floating mb-2">
                    <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Jhon Doe">
                    <label for="name">Your Name</label>
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-floating mb-2">
                    <input type="text" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="JhonD">
                    <label for="username">Username</label>
                    @error('username')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-floating mb-2">
                    <input type="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-floating mb-2">
                    <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                    @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
              </div>
              <button class="btn btn-primary w-100 py-2 mb-3" type="submit">Register</button>
              <p class="text-center fs-6">Have An Account? <a href="/login">Login Now</a></p>
              <p class="mt-4 mb-3 text-body-secondary">&copy; 2024–2026</p>
            </form>
          </main>
        </div>
    </div>
   </div>
@endsection