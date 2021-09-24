<div id="top-bar" class="container">
    <div class="row">
        <div class="span6">
            <strong>Welcome, </strong> {{ Auth::user()->email }}
        </div>
        <div class="span6">
            <div class="account pull-right">
                <ul class="user-menu">
                    @if (Route::has('login'))
                        @auth
                            <li style="padding: 0px">
                                <form action="{{ url('/logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-link" style="color: #eb4800">Logout</button>
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Log in</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
