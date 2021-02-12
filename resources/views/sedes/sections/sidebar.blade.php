<h1>
    <span class="badge badge-info">Sedes</span>
</h1>

@foreach ($sedes2 as $sede)

<div class="card mt-2" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{$sede->nombre}}</h5>
      <p class="card-text">{{$sede->direccion}}</p>
      <a href="{{route('sedes' , $sede->id)}}" class="btn btn-primary">Ver citas</a>
    </div>
</div> 

@endforeach
