<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class positionController extends Controller
{
    public function store(Request $request){
       $data =  DB::table('position')->insert([
            'job' => $request->job,
        ]);
        return response()->json(['data' => $data], 201);
    }

    public function get(){
        $data = DB::table('position')->get();
        return response()->json(['data' => $data], 200);
    }

    public function delete(string $id){
        DB::table('position')
        ->where('id', $id)
        ->delete();
        return response()->json(204);
    }
}
