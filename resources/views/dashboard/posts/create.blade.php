@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">   
    <h1>Create New Posts</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <form action="/dashboard/posts" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-4">
          <label for="title" class="form-label">Title</label>
          <input type="title" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Your Title Post" autofocus value="{{ old('title') }}">
          @error('title')
            <small class="invalid-feedback">
              {{ $message }}
            </small>
          @enderror
        </div>
        <div class="input-slug">
          <input type="hidden" id="slug" name="slug" value="{{ old('slug') }}">
          @error('slug')
            <small class="invalid-feedback">
              {{ $message }}: Slug Issue Please Contact our CS
            </small>
          @enderror
        </div>
      <div class="mb-4">
          <label for="category" class="form-label">Category</label>
          @error('category_id')
            <small class="text-danger d-block">
              Category Field is Required
            </small>
          @enderror
          <select class="form-select" id="category" name="category_id" value="{{ old('category') }}">
            <option disabled selected>--Choose One--</option>
            @foreach ($categories as $category)
              @if (old('category_id') == $category->id)
                <option value="{{ $category->id }}" selected> {{ $category->category_name }} </option>
              @else
                <option value="{{ $category->id }}"> {{ $category->category_name }} </option>
              @endif
            @endforeach
          </select>
      </div>
      <div class="mb-4">
        <label for="image-post" class="form-label">Image Post</label>
        <img class="img-fluid img-preview col-8">
        @error('image')
        <small class="text-danger d-block">
          {{ $message }}
        </small>
        @enderror
        <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="image-post" onchange="previewImg()">
        <small class="text-dark d-block">
          (Make sure it less than 3 MegaBytes)
        </small>
      </div>
      <div class="mb-4">
          <label for="body" class="form-label">Body</label>
          @error('body')
            <small class="text-danger d-block">
              {{ $message }}
            </small>
          @enderror
          <input id="body" type="hidden" name="body" value="{{ old('body') }}">
          <small class="errorHandling text-danger d-block mb-2"></small>
          <trix-editor input="body" attachments="false"></trix-editor>
      </div>

      <div class="mb-4">
        <button type="submit" class="btn btn-outline-primary">Create Post</button>
      </div>
    </form>
  </div>
@endsection