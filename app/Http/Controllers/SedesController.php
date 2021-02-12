<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Sedes;
use App\Citas;

class SedesController extends Controller
{
    public function index(Request $request){
        //sedes
        $parameters = [
            'sedes2' => Sedes::where(['activo' => 1])->get(),
            'sedes' => Sedes::where(['activo' => 1 , 'id' => $request->id])->first()
        ];

        return view('sedes.index' , $parameters);
    }
}
