{{-- header --}}
@include('shared.header')
<!--  navbar  -->
@include('shared.nav')
{{-- logo --}}
@include('shared.logo')

@include('shared.search_form')


<div class="container" style="margin-top:40px;">
    <div class="left-side">
        <h2>Oferta</h2>
        @forelse($trips as $trip)
            <div class="last-minute">
                <img id="imagejs" src="{{asset('storage/img/'.$trip->image.'.jpg')}}" style="float:left; margin-bottom: 10px;" alt="..." class="img-thumbnail">
                <p id="cityjs"><b>{{$trip->image}}</b></p>
                <p id="descriptionjs">{{$trip->description}}</p>

                <a id="buttonjs" class="btn btn-primary" href="{{route('show',['id'=>$trip->id])}}" >Sprawdź</a>
            </div>
        @empty
            <div>
                Brak wycieczek w danym kraju
            </div>
        @endforelse


    </div>
    <div class="right-side">
        <h2 style="margin-left:10px;">Kraje</h2>
        <nav id="navbar-example3" class="navbar navbar-light flex-column align-items-stretch p-3">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach($continents as $continent)
                    <li class="nav-item dropdown">
                        <a class="nav-link navbar-brand dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{$continent->name}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach(App\Models\Country::where('continent_id', '=', $continent->id)->get() as $country)
                                <li><a class="dropdown-item listener" href="{{route('trips',['id'=>$country->id])}}">{{$country->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</div>

<div style="clear: both"></div>
{{-- footer --}}
@include('shared.footer')

