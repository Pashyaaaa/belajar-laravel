<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>
    {{--? Jika ingin menampilkan chart, harus menggunakan link cdn untuk chartnya  ?--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Animez Dashboard · v1.0</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    {{-- cdn trix --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
  </head>
  <body>
    
    {{--! dropdown theme, ada di svg !--}}
    @include('dashboard.layouts.svg')
    @include('dashboard.layouts.header')
    
    <div class="container-fluid">
      <div class="row">
        @include('dashboard.layouts.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          @yield('container')
        </main>
      </div>
    </div>

    <script>
      const title = document.getElementById('title');
      const slug = document.getElementById('slug');
      const errorText = document.querySelector('.errorHandling');

      document.addEventListener('trix-file-accept', function(event) {
        event.preventDefault();
        errorText.innerHTML = 'Maaf Tidak Bisa Melampirkan File dalam bentuk apapun (Coming Soon)';
      });

      title.addEventListener('change', ()=>{
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(result => result.json()).then(data => slug.value = data.slug)
      })

      function previewImg(){
        const inputImg = document.querySelector('#image-post')
        const image = document.querySelector('.img-preview')

        image.style.display = 'block'
        image.style.margin = '20px'

        const blob = URL.createObjectURL(inputImg.files[0]);
        image.src = blob;
      }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/dashboard.js"></script></body>
    {{-- cdn trix --}}
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
</html>
