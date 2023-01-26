@include('shared.header')
@include('shared.nav')

<div id="..." class="container mt-3 mb-5">
    <div class="mt-4 mb-4">
        <div class="row">
            <h1>Zarejestruj się</h1>
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
    <form method="POST" action="{{route('register_')}}">
    @csrf
    <!-- Email Address -->
        <div class="row mb-3">
            <label for="email">Email</label>
            <input id="email" name="email" type="email"
                   class="@error('email') is-invalid @else is-valid @enderror">
        </div>
        <div class="row mb-3">
            <label for="name">Nazwa użytkownika</label>
            <input id="name" name="name" type="name"
                   class="@error('name') is-invalid @else is-valid @enderror">
        </div>
        <div class="row mb-3">
            <label for="password">Hasło</label>
            <input id="password" name="password" type="password"
                   class="@error('password') is-invalid @else is-valid @enderror">
        </div>
        <div class="row mb-3">
            <label for="password2">Powtórz hasło</label>
            <input id="password2" name="password2" type="password"
                   class="@error('password2') is-invalid @else is-valid @enderror">
        </div>
        <div class="form-group mt-4">
            <input class="btn btn-primary" type="submit" value="Zarejestruj się!">
        </div>
    </form>
</div>



@include('shared.footer')
