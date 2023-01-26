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
