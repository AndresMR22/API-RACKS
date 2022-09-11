<?php

namespace App\Http\Controllers;

use App\Models\Rack;
use App\Models\UbicacionRack;
use App\Models\Sensor;
use App\Models\Inventario;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRackRequest;
use App\Http\Requests\UpdateRackRequest;

class RackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRackRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fila = $request->get('fila');
        $columna = $request->get('columna');
        $rack = Rack::create([
            "fila"=>$fila,
            "columna"=>$columna
        ]);
        for($i = 1; $i <=$fila ; $i++)
        {
            for($j = 1; $j <=$columna ; $j++)
        {
            $pos = 'F'.$i.'C'.$j;
           $ubicacion=  UbicacionRack::create([
                "id_rack"=>$rack->id,
                "posicion"=>$pos,
                //"estado_app"=>0,//defecto 0 , se puede actualiza desp
               // "sensor_id"=>1 //esto es null en next migration
            ]);

            Inventario::create([
                "ubicacion_id"=>  $ubicacion->id,
                "rack_id"=>$rack->id
                     ]);
        }
        }

        response()->json(['success' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rack = Rack::find($id);

        $inventarios = $rack->inventarios()->get();
       
        foreach($inventarios as $key => $inventario)
        {
          
            $ubicacion= $inventario->ubicacion;
          
            $sensor = $ubicacion->sensor;
          
            $ubicacion->setAttribute('sensor',$sensor);

          $inventario->setAttribute('ubicacion',$ubicacion); 
        }
       
        // return $ubicaciones;

        $json = [
            'rack' =>  $rack,
            // 'ubicaciones' => $ubicaciones,
            'inventarios' => $inventarios,
        ];
        $padre = ['padre'=>$json];

        return response()->json($padre);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function edit(Rack $rack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRackRequest  $request
     * @param  \App\Models\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $rack = Rack::find($id);
        // $rack->update([
        //     "fila"=>$request->get('fila'),
        //     "columna"=>$request->get('columna'),
        // ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rack  $rack
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rack = Rack::find($id);
        $inventarios = $rack->inventarios()->get();
        foreach($inventarios as $inventario)
        {$inventario->ubicacion()->delete();}
        $rack->inventarios()->delete();
        $rack::destroy($id);
     
        response()->json(['success' => 'Rack eliminado'], 200);
    }
}
