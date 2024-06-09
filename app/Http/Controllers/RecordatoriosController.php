<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recordatorio;

class RecordatoriosController extends Controller
{
    //consultar todos los recordatorios
    public function index(){
        return Recordatorio::paginate(30);
    }

    //consultar un recordatorio
    public function show($id){
        return Recordatorio::find($id);
    }

    //crear un recordatorio
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:recordatorios',
            'desc' => 'required',
            'dose' => 'required',
            'hour' => 'required',
            //'date' => 'required',
            //'user_id' => 'required',
        ]);
        $recordatorio = new Recordatorio();
        $recordatorio->fill($request->all());
        if(!$request->date) $recordatorio->date = date("Y-m-d H:i:s");
        if(!$request->user_id) $recordatorio->user_id = 1;

        $recordatorio->save();
        return $recordatorio;

    }

    //actualizar recordatorio
    public function update(Request $request, $id){
        $this->validate($request, [
        ]);
        $recordatorio = Recordatorio::find($id);
        if(!$recordatorio)return response('', 404);
        $recordatorio->update($request->all());
        $recordatorio->save();
        return $recordatorio;

    }

    //Eliminar sensor
    public function destroy($id){
        $recordatorio = Recordatorio::find($id);
        if(!$recordatorio)return response('', 404);
        $recordatorio->delete();
        return $recordatorio;

    }
}
