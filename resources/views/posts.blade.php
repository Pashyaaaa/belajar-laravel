@extends('layouts.main')

@section('content')
    @if (isset($title))
        <h2 class="mb-4 text-center">{{ $title }}</h2>       
    @endif

    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit" id="button-submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            <img src="@if($posts[0]->image) /{{ $posts[0]->image }} @else https://source.unsplash.com/1200x400/?{{ $posts[0]->category->category_name }} @endif" class="card-img-top" style="height: 60vh;width: 100%;object-fit:cover;object-position:center;" alt="...">
            <div class="card-body text-center">
                <h4 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h4>
                <p>
                    <small class="text-body-secondary">
                        By <a href="/posts?author={{ $posts[0]->author->username }}">{{$posts[0]->author->name}}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">
                        {{ $posts[0]->category->category_name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary btn-sm">Read More...</a>
            </div>
        </div>

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="category px-3 py-2 position-absolute top-0 left-0 bg-dark rounded">
                            <a href="/posts?category={{ $post->category->slug }}" class="text-light text-decoration-none">
                                {{ $post->category->category_name }}
                            </a>
                        </div>
                        <img src="@if($post->image) /{{ $post->image }} @else https://source.unsplash.com/500x300/?{{ $post->category->category_name }} @endif" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3><a href="/posts/{{ $post->slug }}" class="text-decoration-none fs-4">{{ $post->title }}</a></h3>
                            <small class="text-body-secondary">
                                <h6>By <a href="/posts?author={{ $post->author->username }}">{{$post->author->name}}</a> {{ $posts[0]->created_at->diffForHumans() }}
                                </h6>
                            </small>
                            <a href="/posts/{{ $post->slug }}" class="text-dark text-decoration-none" class="card-text"><p>{{ $post->excerpt }}</p></a>
                            <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More...</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @else
        <p class="text-center fs-3">No Post Found.</p>
    @endif

    {{ $posts->links() }}
@endsection
