<nav class="navbar ">
  <div class="navbar-brand">
    <a class="navbar-item" href="/">
      <h3 class="title is-3">Sanctum Falls</h3>
    </a>

    <div class="navbar-burger burger" data-target="mainMenu">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="mainMenu" class="navbar-menu">
    <div class="navbar-start">
      <a href="/builds" class="navbar-item">
        Create a Build
      </a>
      <div class="navbar-item has-dropdown is-hoverable is-highlighted">
        <a class="navbar-link" href="/guides">Guides</a>
        <div class="navbar-dropdown">
            <a class="navbar-item" href="/guides">View Guides</a>
            <a class="navbar-item" href="/guides/create/all">Create Guide</a>
        </div>
      </div>
      <a href="/tierlist" class="navbar-item">
          Tier List
      </a>
    </div>

    <div class="navbar-end">
        @if (Auth::check())
            <div class="navbar-item has-dropdown is-hoverable">
                <a href="#" class="navbar-link">
                    {{ Auth::user()->name }}
                </a>
                <div class="navbar-dropdown">
                    <a href="/my/guides" class="navbar-item">My Guides</a>

                    <a
                        class="navbar-item"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                </div>
            </div>
        @else
            <div class="navbar-item">
                <div class="field is-grouped">
                    <a class="button control" href="/login">Log In</a>
                    <a class="button control is-primary" href="/register">Register</a>
                </div>
            </div>
        @endif
      </div>
    </div>
  </div>
</nav>
