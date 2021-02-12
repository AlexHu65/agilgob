<h1>
    <span class="badge badge-success">Citas</span>
  </h1>
  <a href="{{route('sedes' , $sedes->id)}}" class="btn btn-warning">Nueva cita</a>
  <table class="table mt-4">
      <thead>
        <tr>      
          <th scope="col">Sede</th>
          <th scope="col">Hora inicial</th>
          <th scope="col">Hora final</th>
          <th scope="col">Entrevistador</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($sedes->citas as $cita)
          <tr>
            <td>{{$sedes->nombre}}</td>
            <td>{{$cita->hora_inicial}}</td>
            <td>{{$cita->hora_final}}</td>   
            <td>{{$cita->entrevistador->nombre}}</td>  

          </tr>
        @endforeach
      </tbody>
    </table>