@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-md-8">
                <h3 class="text-break">{{ $post->title }}</h3>
                <div>
                    <a href="/dashboard/posts" class="btn btn-sm btn-success">&laquo; Back To My Posts</a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                        @method("delete")
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are You Sure?')">Delete</button>
                    </form>
                </div>
                <img src="@if($post->image) /{{ $post->image }} @else https://source.unsplash.com/1200x600/?{{ $post->category->category_name }} @endif" class="img-fluid my-3" style="height: 50vh;width: 100%;object-fit:cover;object-position:center;" alt="{{ $post->slug }}">
                <article class="mb-5 text-break">
                    <p>{!! $post->body !!}</p>
                </article>
            </div>
        </div>
    </div>
@endsection