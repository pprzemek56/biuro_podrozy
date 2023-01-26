{{-- header --}}
@include('shared.header')
<!--  navbar  -->
@include('shared.nav')

<div class="container" style="margin-top:100px;">
    <h2>Wycieczki</h2>
    @if(Auth::user()->id == 1)
        <a class="btn btn-primary" href="{{route('create')}}">
            Dodaj wycieczkę
        </a>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Miasto</th>
            <th scope="col">Cena</th>
            <th scope="col">Ilość miejsc</th>
            <th scope="col">Początek</th>
            <th scope="col">Koniec</th>
            <th scope="col">Długość</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($trips as $trip)
            <tr>
                <th scope="row"><a href="{{ route('show', $trip->id) }}">{{ $trip->id }}</a>
                </th>
                <td>{{ $trip->image }}</td>
                <td>{{ $trip->price }} zł</td>
                <td>{{ $trip->free_space }}</td>
                <td>{{ $trip->start_date }}</td>
                <td>{{ $trip->end_date }}</td>
                <td>{{ $trip->period }}</td>
                @can('update', $trip)<td><a class="btn btn-primary" href="{{route('edit', $trip->id)}}">Edycja</a></td>@endcan
                <td>
                    @if(Auth::user()->id == 1)
                        <form method="POST" action="{{route('trips.destroy', $trip->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Usuń</button>
                        </form>
                    @else
                        <a class="btn btn-danger" href="{{route('trips.cancel', $trip->id)}}">Odwołaj rezerwacje</a>
                    @endif
                </td>
            </tr>
        @empty
            <p style="color: #CC4E50; font-weight: 700; font-size: 20px">Brak rekordów</p>
        @endforelse
        </tbody>
    </table>
</div>

    @if(Auth::user()->id == 1)
        <div class="container" style="margin-top:100px;">
            <h2>Miasta</h2>
            <a class="btn btn-primary" href="{{route('create_city')}}">Dodaj Miasto</a>
            <table>
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Kraj</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($cities as $city)
                    <tr>
                        <th scope="row">{{ $city->id }}</th>
                        <td>{{ $city->name }}</td>
                        <td>{{ $city->country->name }}</td>
                        @if(Auth::user()->id == 1)
                        <td>
                            <form method="POST" action="{{route('cities.destroy', $city->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Usuń</button>
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{route('edit_city',$city->id)}}">Edycja</a>
                        </td>
                        @endif
                    </tr>
                @empty
                    <p style="color: #CC4E50; font-weight: 700; font-size: 20px">Brak rekordów</p>
                @endforelse
                </tbody>
            </table>
        </div>
    @endif

    @if(Auth::user()->id == 1)
        <div class="container" style="margin-top:100px;">
            <h2>Kraje</h2>
            <a class="btn btn-primary" href="{{route('create_country')}}">Dodaj Kraj</a>
            <table>
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Kontynent</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($countries as $country)
                    <tr>
                        <th scope="row">
                            {{ $country->id }}
                        </th>
                        <td>{{ $country->name }}</td>
                        <td>{{ $country->continent->name }}</td>
                        @if(Auth::user()->id == 1)
                            <td>
                                <form method="POST" action="{{route('countries.destroy', $country->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Usuń</button>
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{route('edit_country', $country->id)}}">Edycja</a>
                            </td>
                        @endif
                    </tr>
                @empty
                    <p style="color: #CC4E50; font-weight: 700; font-size: 20px">Brak rekordów</p>
                @endforelse
                </tbody>
            </table>
        </div>
    @endif



@include('shared.footer')
