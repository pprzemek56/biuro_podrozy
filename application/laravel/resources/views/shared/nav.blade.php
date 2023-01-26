<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-danger" aria-label="Tenth navbar example">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
            <img style="height:40px;"src="{{@asset('storage/img/logo.png')}}">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Start</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('offer')}}">Wycieczki</a>
                </li>
                @if(Auth::check())
                        <li class="nav-item">
                        <a class="nav-link active" href="{{route('account')}}">{{Auth::user()->name}}</a>
                    </li>
                    @endif
                    @if(Auth::check())
                        <li class="nav-item">
                        <a class="nav-link active" style="padding-left:700px;" href="{{route('logout')}}">Wyloguj się</a>
                    </li>
                    @else
                        <li class="nav-item">
                        <a class="nav-link active" style="padding-left:700px;" href="{{route('login')}}">Zaloguj się</a>
                    </li>
                    @endif
            </ul>
        </div>
    </div>
</nav>


