<div class="col col-12 col-sm-6 mb-5 col-lg-3">
    <div class="card h-100" >
        <img src="{{asset('storage/img/'.$trip->image.'.jpg')}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$trip->city->name}}</h5>
            <p class="card-text">{{$trip->description}}</p>
            <a href="{{route('show',['id'=>$trip->id])}}" class="btn btn-primary">Więcej szczegółów...</a>
        </div>
    </div>
</div>
