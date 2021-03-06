<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;


class HabitacionController extends Controller
{
    public function search(Request $request){
        $text = $request->query('text');
        $habitaciones = Habitacion::with('hotel')->get();
        return $habitaciones;
    }
    /* public function search(Request $request){
        return $request->query('text');
    }
 */

    public function filter(Request $request){
        $filter = $request->input('filter');
        switch($filter){
            case 'piso':
                $habitaciones = Habitacion::whereBetween('piso',[$request->input('min'),$request->input('max')])->get();
                break;
            case 'precio':
                $habitaciones = Habitacion::whereBetween('precio',[$request->input('min'),$request->input('max')])->get();
                break;
            case 'capacidad':
                $habitaciones = Habitacion::where('capacidad',$request->input('value'))->get();
                break;
            case 'estrellas':
                $habitaciones = Habitacion::where('estrellas',$request->input('value'))->get();
                break;
        }
    return $habitaciones;
    }

}

