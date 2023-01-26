@include('shared.header')
@include('shared.nav')


<div id="..." class="container mt-3 mb-5">
    <div class="mt-4 mb-4">
        <div class="row">
            <h1>Zaloguj się</h1>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('login.authenticate') }}">
    @csrf
    <!-- Email Address -->
        <div class="row mb-3">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}"
                   class="@error('email') is-invalid @else is-valid @enderror">
        </div>
        <div class="row mb-3">
            <label for="password">Hasło</label>
            <input id="password" name="password" type="password"
                   class="@error('password') is-invalid @else is-valid @enderror">
        </div>
        <a href="{{route('register')}}">
            Nie masz jeszcze konta? Zarejestruj się!
        </a>
        <div class="form-group mt-4">
            <input class="btn btn-primary" type="submit" value="Zaloguj się!">
        </div>
    </form>
</div>



@include('shared.footer')
