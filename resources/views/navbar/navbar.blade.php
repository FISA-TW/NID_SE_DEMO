<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::route('home') }}">{{ Config::get('site.name') }}</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
            {{-- Generaal --}}
            @include('navbar.navbar_set', ['navbar' => Config::get('navbar.navbar')])
            {{-- Admin--}}
            @if (Entrust::hasrole('admin'))
                @include('navbar.navbar_set', ['navbar' => Config::get('navbar.admin')])
            @endif
            {{-- Auth --}}
            @if (Auth::guest())
                @include('navbar.navbar_set', ['navbar' => Config::get('navbar.guest')])
            @else
                @include('navbar.navbar_set', ['navbar' => Config::get('navbar.user')])
            @endif
            </ul>
        </div>
    </div>
</nav>
