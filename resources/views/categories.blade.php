@extends('layouts.main')

@section('content')
    <h3 class="mb-4">{{ $title }}</h3>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <a href="/posts?category={{ $category->slug }}">
                        <div class="card text-bg-dark mb-3">
                            <img src="https://source.unsplash.com/300x300/?{{ $category->category_name }}" class="card-img" alt="...">
                             <div class="card-img-overlay d-flex justify-content-center align-items-center p-0">
                                <h5 class="card-title p-3 rounded text-dark" style="background-color: rgba(255, 255, 255, 0.9)">{{ $category->category_name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
