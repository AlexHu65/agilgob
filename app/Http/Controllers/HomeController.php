<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Sedes;
use App\Citas;
use DateTime;
use DateInterval;
use DatePeriod;


class HomeController extends Controller
{
    public function index(){   

        $parameters = [
            'sedes' => Sedes::where(['activo' => 1])->get(),
            'citas' => Citas::where(['activo' => 1])->get(),
            'intervalo' => $this->intervalo()
        ];

        return view('home.index' , $parameters);
    }


    //funcion para sacar un intervalo de fechas
    public function intervalo(){

        $dates_avaliables = [];
        $array_intervarlo = [];
        $intervalo = [];
        $cont = 0;
        $dates_sedes = Sedes::select(['sede_inicio', 'sede_fin', 'id'])->where(['activo' => 1])->get();
        
        foreach ($dates_sedes as $fecha) {
            $dates_avaliables[$cont]['sede_inicio'] =  $fecha->sede_inicio;
            $dates_avaliables[$cont]['sede_fin'] =  $fecha->sede_fin;
            $dates_avaliables[$cont]['sede_id'] =  $fecha->id;
            $cont++;
        }


        for ($i=0; $i < count($dates_avaliables); $i++) { 

            //sacamos el intervalo
            $dates_avaliables[$i]['sede_inicio'] = new DateTime($dates_avaliables[$i]['sede_inicio']);
            $dates_avaliables[$i]['sede_fin'] = new DateTime($dates_avaliables[$i]['sede_fin']);

            $forma_inicio  = $dates_avaliables[$i]['sede_inicio'];
            $forma_fin  = $dates_avaliables[$i]['sede_fin'];    

            $array_intervarlo[$i]['horas'] = $this->intervaloHora($forma_inicio->format('H:i:s'), $forma_fin->format('H:i:s'));
            $array_intervarlo[$i]['sede_inicio'] = $dates_avaliables[$i]['sede_inicio'];
            $array_intervarlo[$i]['sede_fin'] = $dates_avaliables[$i]['sede_fin'];
            $array_intervarlo[$i]['sede_id'] = $dates_avaliables[$i]['sede_id'];
        }   
        
        
        return $array_intervarlo;

    }


    public function intervaloHora($hora_inicio, $hora_fin, $intervalo = 20) {

        $hora_inicio = new DateTime( $hora_inicio );
        $hora_fin    = new DateTime( $hora_fin );        

        if ($hora_inicio > $hora_fin) {
    
            $hora_fin->modify('+1 day');
        }
    
        
        $intervalo = new DateInterval('PT'.$intervalo.'M');

        $periodo   = new DatePeriod($hora_inicio, $intervalo, $hora_fin);        
    
        foreach( $periodo as $hora ) {
            $horas[] =  $hora->format('H:i:s');
        }    
        return $horas;
    }
}
