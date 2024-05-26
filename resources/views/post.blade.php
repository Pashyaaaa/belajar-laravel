@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h3>{{ $post->title }}</h3>
                <h6>By <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}">
                    {{ $post->category->category_name }}</a>
                </h6>
                <img src="@if($post->image) /{{ $post->image }} @else https://source.unsplash.com/1200x600/?{{ $post->category->category_name }} @endif" class="img-fluid my-3" style="height: 50vh;width: 100%;object-fit:cover;object-position:center;" alt="{{ $post->slug }}">
                <article class="mb-5 text-break">
                    <p>{!! $post->body !!}</p>
                </article>
            
               <a href="/posts">Back To Posts</a>
            </div>
        </div>
    </div>
@endsection
