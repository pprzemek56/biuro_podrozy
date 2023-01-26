@include('shared.header')
@include('shared.nav')

<div class="container">

    @if(Route::is('create_city'))
        <h1 class="my-5">
            Dodaj Miasto
        </h1>
        <form class='container mb-3' method="POST" action="{{route('cities.store')}}">
        @csrf
    @else
        <h1 class="my-5">
            Edytuj Miasto
        </h1>
        <form class='container mb-3' method="POST" action="{{route('update_city', $city->id)}}">
        @csrf
    @endif
    @method('PUT')
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">
            Nazwa
        </label>
        <div class="col-sm-10">
            <input @isset($city) value="{{ $city->name }}" @endisset id="name" name="name"
                   type="text" class="form-control @error('city') is-invalid @else is-valid @enderror">
            <div class="invalid-feedback">
                Nieprawidłowa wartość!
            </div>
        </div>
    </div>
            <div class="row mb-3">
                <label for="country" class="col-sm-2 col-form-label">
                    Kraj
                </label>
                <div class="col-sm-10">
                    <select id="country" name="country" type="text" class="form-control @error('country') is-invalid @else is-valid @enderror">
                        <div class="invalid-feedback">
                            Nieprawidłowa nazwa!
                        </div>
                        @forelse($countries as $country)
                            <option value="{{$country->name}}" @isset($city) @if($country->id == $city->country->id) selected @endif @endisset>{{$country->name}}</option>
                        @empty
                            <p style="color: #CC4E50; font-weight: 700; font-size: 20px">
                                Brak rekordów
                            </p>
                        @endforelse
                    </select>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Wyślij</button>
            @if ($errors->any())
                <div class="alert alert-danger mb-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
@include('shared.footer')
