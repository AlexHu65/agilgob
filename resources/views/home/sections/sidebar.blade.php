<h1>
    <span class="badge badge-info">Sedes</span>
</h1>

<!-- Button trigger modal -->

@foreach ($sedes as $sede)

<div class="card mt-2" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{$sede->nombre}}</h5>
      <p class="card-text">{{$sede->direccion}}</p>
      <a href="{{route('sedes' , $sede->id)}}" class="btn btn-primary">Ver citas</a>

      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCita{{$sede->id}}">
        Nueva cita
      </button>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalCita{{$sede->id}}" tabindex="-1" role="dialog" aria-labelledby="modalCita{{$sede->id}}Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCita{{$sede->id}}Label">Cita para la sede {{$sede->id}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <h5 class="card-title">{{$sede->nombre}}</h5>
          <p class="card-text">{{$sede->direccion}}</p> 
          <hr>
          <ul class="list-group">
            @foreach ($intervalo as $value)

              @if ($value['sede_id'] ==  $sede->id)

                @foreach ($value['horas'] as $hora)
                  @php
                      $date = $value['sede_inicio'];                      
                  @endphp
                  <li  data-sede="{{$sede->id}}" data-date="{{$date->format('Y-m-d') .' '. $hora}}" class="list-group-item list-group-item-action">{{$hora . ' '. $date->format('Y-m-d')}}</li>
                @endforeach

              @endif

            @endforeach
          </ul>
        </div>
      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



@endforeach
