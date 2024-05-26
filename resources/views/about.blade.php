@extends('layouts.main')

@section('content')
   <h1>Halaman <?= $title ?></h1>

   <h5>{{ $name }}</h5>
   <p>{{ $email }}</p>
   <img src="img/{{ $image }}" alt="Gambar" width="500px" height="300px">
@endsection
