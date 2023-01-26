@include('shared.header')
@include('shared.nav')

<div class="container">

    @if(Route::is('create_country'))
        <h1 class="my-5">
            Dodaj Kraj
        </h1>
        <form class='container mb-3' method="POST" action="{{route('country.store')}}">
            @csrf
            @else
                <h1 class="my-5">
                    Edytuj Kraj
                </h1>
                <form class='container mb-3' method="POST" action="{{route('update_country', $country->id)}}">
                    @csrf
                    @endif
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">
                            Nazwa
                        </label>
                        <div class="col-sm-10">
                            <input @isset($country) value="{{ $country->name }}" @endisset id="name" name="name"
                                   type="text" class="form-control @error('country') is-invalid @else is-valid @enderror">
                            <div class="invalid-feedback">
                                Nieprawidłowa wartość!
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="continent" class="col-sm-2 col-form-label">
                            Kontynent
                        </label>
                        <div class="col-sm-10">
                            <select id="continent" name="continent" type="text" class="form-control @error('continent') is-invalid @else is-valid @enderror">
                                <div class="invalid-feedback">
                                    Nieprawidłowa nazwa!
                                </div>
                                @forelse($continents as $continent)
                                    <option value="{{$continent->name}}" @isset($country) @if($continent->id == $country->continent->id) selected @endif @endisset>{{$continent->name}}</option>
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
