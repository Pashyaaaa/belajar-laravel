<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Animez</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body mb-md-5 d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'text-dark' : 'text-secondary' }}" aria-current="page" href="/dashboard">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/posts*') ? 'text-dark' : 'text-secondary' }}" href="/dashboard/posts">
              <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
              My Posts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-secondary d-flex align-items-center gap-2" href="#">
              <svg class="bi"><use xlink:href="#cart"/></svg>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-secondary d-flex align-items-center gap-2" href="#">
              <svg class="bi"><use xlink:href="#people"/></svg>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-secondary d-flex align-items-center gap-2" href="#">
              <svg class="bi"><use xlink:href="#graph-up"/></svg>
              Reports
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
          <span>Latest Posts</span>
          <a class="link-secondary" href="/dashboard/posts/create" aria-label="Add a new post">
            <svg class="bi"><use xlink:href="#plus-circle"/></svg>
          </a>
        </h6>

        <ul class="nav list-group list-group-flush flex-column">
          @foreach ($sidebar_posts as $post)
          <li class="nav-item list-group-item">
            <a class="nav-link text-secondary " href="/dashboard/posts/{{ $post->slug }}">
              <p class="text-break m-0 text-primary">{{ substr($post->title, 0, 40) }}...</p>
            </a>
          </li>
          @endforeach
        </ul>

        <hr class="my-3">

        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a class="nav-link text-dark d-flex align-items-center gap-2" href="#">
              <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
              Settings
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark d-flex align-items-center gap-2" href="/">
              <svg class="bi"><use xlink:href="#door-closed"/></svg>
              Back To Home
            </a>
          </li>
          <li class="nav-item">
              <form action="/logout" method="post">
                @csrf
                <button class="dropdown-item nav-link text-dark d-flex align-items-center gap-2" type="submit">
                  <svg class="bi"><use xlink:href="#door-closed"/></svg> Logout
                </button>
              </form>
          </li>
        </ul>
      </div>
    </div>
  </div>