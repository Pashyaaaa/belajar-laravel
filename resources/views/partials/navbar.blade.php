<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body p-3" data-bs-theme="dark">
    <div class="container">
      <a class="navbar-brand" href="/">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ (Request::is('/')) ? 'active' : ''}}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (Request::is('about')) ? 'active' : ''}}" href="/about">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ (Request::is('posts')) || Request::is('categories') ? 'active' : ''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              More
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/posts">Blog</a></li>
              <li><a class="dropdown-item" href="/categories">Categories</a></li>
            </ul>
          </li>
        </ul>
        <ul class="navbar-nav">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome Back, {{ auth()->user()->username }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-bar-chart-line"></i> Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button class="dropdown-item" type="submit">
                    <i class="bi bi-box-arrow-right"></i> Logout
                  </button>
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a href="/login" class="nav-link active">Login<i class="bi bi-door-open"></i></a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>