@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">All Categories</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
      <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
    </div>
    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
      <svg class="bi"><use xlink:href="#calendar3"/></svg>
      This week
    </button>
  </div>
</div>

{{--TODO: Ini Chart --}}
{{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}

{{--TODO: Next Feature Below --}}
<div class="table-responsive small">
  <h4>Total: {{ $categories->count() }} Categories</h4>
  <a href="/dashboard/categories/create" class="btn btn-sm btn-primary mb-3">Create New Category</a>
  @if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
  @endif
  @if ($categories->count() > 0)
    <table class="table table-striped table-sm mt-5">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($categories as $post)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="text-break">{{ $post->category_name }}</td>
            <td>
              <div class="btn-group">
                <button type="button" class="badge bg-secondary text-light" data-bs-toggle="dropdown" aria-expanded="false">
                  Settings
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item " href="/dashboard/posts/{{ $post->slug }}"><i class="bi bi-eye text-primary"></i> Detail</a></li>
                  <li>
                    <a class="dropdown-item " href="/dashboard/posts/{{ $post->slug }}/edit"><i class="bi bi-pencil text-warning"></i> Edit</a>
                  </li> 
                  <li>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="POST">
                      @method("delete")
                      @csrf
                      <button class="dropdown-item" type="submit" onclick="return confirm('Are You Sure?')"><i class="bi bi-trash text-danger"></i> Delete</button>
                    </form>
                  </li>
                  <li><a class="dropdown-item " href="#"><i class="bi bi-share text-info"></i> Share</a></li>
                </ul>
              </div>
            </td>
          </tr>
          @endforeach            
        </tbody>
      </table>
      @else
          <h3 class="text-center py-5">No Categories, Here</h3>
      @endif
</div>

@endsection