<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('admin.index')}}">DeJournals</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>

        @can('viewAny', App\Category::class)
        <li class="nav-item">
          <a class="nav-link" href="{{route('users.index')}}"><span class="fa fa-user fa-fw"></span>Users</a>
        </li>
        @endcan

        <li class="nav-item">
            <a class="nav-link" href="{{route('posts.index')}}">All Posts</a>
        </li>

        @can('viewAny', App\Category::class)
        <li class="nav-item">
          <a class="nav-link" href="{{route('categories.index')}}">Categories</a>
        </li>
        @endcan

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{auth()->user()->name}}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">My Posts</a>
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Change Password</a>
            @if (auth()->user()->isAdmin())
            <a class="dropdown-item" href="#">Settings</a>
            @endif
          </div>
        </li>
      </ul>
    </div>
  </nav>