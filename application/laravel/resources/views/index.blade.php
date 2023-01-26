{{-- header --}}
@include('shared.header')
<!--navbar-->
    @include('shared.nav')
<!--karuzela ze zdjeciami-->
<div class="main">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('storage/img/slide1.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('storage/img/slide2.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('storage/img/slide3.jpg')}}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--container z wycieczkami, zapytanie o ofertę, krótki opis, nanowesze posty na blogu-->
    <div class="container">
        <div class="row align-items-stretch">
            @foreach($trips as $trip)
                @include('shared.card')
            @endforeach
        </div>
    </div>
</div>


    @include('shared.footer')


