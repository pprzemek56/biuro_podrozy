@include('shared.header')
@include('shared.nav')

<div class="container">

    @if(Route::is('create'))
        <h1 class="my-5">
            Dodaj wycieczkę
        </h1>
        <form class='container mb-3' method="POST" action="{{route('trips.store')}}">
        @csrf
    @else
        <h1 class="my-5">
            Edytuj wycieczkę
        </h1>
        <form class='container mb-3' method="POST" action="{{ route('update', $trip->id) }}">
        @csrf
    @endif
        @method('PUT')
        <div class="row mb-3">
            <label for="city" class="col-sm-2 col-form-label">
                Miasto
            </label>
            <div class="col-sm-10">
                <select id="city" name="city" type="text" class="form-control @error('city') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">
                        Nieprawidłowa nazwa!
                    </div>
                    @forelse($cities as $city)
                        <option value="{{$city->name}}" @isset($trip) @if($city->id == $trip->city->id) selected @endif @endisset>{{$city->name}}</option>
                    @empty
                        <p style="color: #CC4E50; font-weight: 700; font-size: 20px">
                            Brak rekordów
                        </p>
                    @endforelse
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="price" class="col-sm-2 col-form-label">
                Cena
            </label>
            <div class="col-sm-10">
                <input @isset($trip) value="{{ $trip->price }}" @endisset id="price" name="price"
                           type="text" class="form-control @error('price') is-invalid @else is-valid @enderror">
                    <div class="invalid-feedback">
                        Nieprawidłowa wartość!
                    </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="free_space" class="col-sm-2 col-form-label">
                Ilość wolnych miejsc
            </label>
            <div class="col-sm-10">
                <input @isset($trip) value="{{ $trip->free_space }}" @endisset id="free_space" name="free_space"
                       type="text" class="form-control @error('price') is-invalid @else is-valid @enderror">
                <div class="invalid-feedback">
                    Nieprawidłowa wartość!
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="start_date" class="col-sm-2 col-form-label">
                Data rozpoczęcia
            </label>
            <div class="col-sm-10">
                <input @isset($trip) value="{{ $trip->start_date }}" @endisset id="start_date" name="start_date" type="text" class="datepicker" placeholder="Od kiedy...">
            </div>
        </div>
        <div class="row mb-3">
            <label for="end_date" class="col-sm-2 col-form-label">
                Data zakończenia
            </label>
            <div class="col-sm-10">
                    <input @isset($trip) value="{{ $trip->end_date }}" @endisset id="end_date" name="end_date" type="text" class="datepicker" placeholder="Do kiedy...">
            </div>
        </div>
        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">
                Opis
            </label>
            <div class="col-sm-10">
                <textarea @isset($trip) @endisset id="description" name="description"
                          class="form-control @error('area') is-invalid @else is-valid @enderror" id="description" rows="2">
                    @isset($trip)
                    {{ $trip->description }}
                    @endisset
                </textarea>
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
</div>
@include('shared.footer')
