{{-- header --}}
@include('shared.header')
<!--  navbar  -->
@include('shared.nav')
<div class="rectangle">
    <div id="picture">
        <img src="{{asset('storage/img/'.$trip->image.'.jpg')}}" class="img-thumbnail" alt="...">
    </div>
    <div id="description">
        <p>{{$trip->description}}</p>
        <form method="POST" action="{{route('save',$trip->id)}}">
            @csrf
            @method('PUT')
            <input type="submit" value="Zapisz się!" class="btn btn-primary" style="margin-top:15px;"/>
        </form>
    </div>
    <div style="clear: both;"></div>
    <div id="place">
        <h1>Kontynent: {{$trip->city->country->continent->name}}</h1>
        <h2>Kraj: {{$trip->city->country->name}}</h2>
        <h3>Miasto: {{$trip->city->name}}</h3>
    </div>
    <div id="details">
        <h3>Data rozpoczęcia: {{$trip->start_date}} </h3>
        <h3>Data zakończenia: {{$trip->end_date}} </h3>
        <h3>Długość wycieczki: {{$trip->period}} dni</h3>
        <h3>Cena: {{$trip->price}} zł</h3>
    </div>
    <div style="clear: both;"></div>
</div>



@include('shared.footer')

