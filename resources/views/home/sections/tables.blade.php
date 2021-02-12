<h1>
  <span class="badge badge-success">Citas</span>
</h1>
<table class="table mt-4">
    <thead>
      <tr>      
        <th scope="col">Sede</th>
        <th scope="col">Hora inicial</th>
        <th scope="col">Hora final</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($citas as $cita)          
        @foreach ($cita->sedes as $sede)            
          <tr>
            <td>{{$sede->nombre}}</td>
            <td>{{$cita->hora_inicial}}</td>      
            <td>{{$cita->hora_final}}</td>              
          </tr>
        @endforeach
      @endforeach

    </tbody>
  </table>