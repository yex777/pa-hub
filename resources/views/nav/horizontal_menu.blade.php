<nav role="navigation" class="primary-navigation">
    <div class="menu-background">
        <a class="logo" href="{{ url('/') }}">
            {{ config('app.name', 'PAHUB') }}
        </a>
    </div>
    <label for="menu-control" class="hamburger">
        <i class="hamburger__icon"></i>
        <i class="hamburger__icon"></i>
        <i class="hamburger__icon"></i>
    </label>

    <input type="checkbox" id="menu-control" class="menu-control">

    <aside class="sidebar">

        <nav class="sidebar__menu">
            <ul>
                <li @click="menuCheckBox = 0"><router-link :to="{ name: 'home'}">Home</router-link></li>
                <li><router-link :to="{ name: 'user'}" @click="menuCheckBox = 0">User</router-link></li>
                <li><router-link :to="{ name: 'userSongs'}">My songs</router-link></li>
                @guest
                    @if (Route::has('login'))
                        <li>
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li >
                            <a c href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>

        <label for="menu-control" class="sidebar__close"></label>
    </aside>





</nav>


