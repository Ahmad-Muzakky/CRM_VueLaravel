<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class employeeController extends Controller
{
    // public function getAll(Request $request){

    //     if($request->halaman){
    //         $page=$request->halaman;
    //     }else{
    //         $page=1;
    //     }
    //     if($request->cari ==""){
    //         $row = DB::table('employee')->count();
    //     }else{
    //         $row = DB::table('employee')->where('name','LIKE',"%".$request->cari."%")->count();
    //     }

    //     $data = DB::table('employee')->where('name','LIKE',"%".$request->cari."%")->simplePaginate(3,['*'],'halaman',$page);

    //     $total = ceil($row/3);

    //     if($data){
    //         return response()->json(['data' => $data,'total_halaman'=>$total], 200);
    //     }else{
    //         return response()->json(['message' => 'error'], 400);
    //     }
    // }

    public function joinData(Request $request)
    {

        if ($request->halaman) {
            $page = $request->halaman;
        } else {
            $page = 1;
        }
        if ($request->cari == "") {
            $row = DB::table('employee')->select(
                'employee.id',
                'employee.name',
                'position.job'
            )->leftjoin('position', 'position.id', '=', 'employee.id_position')->count();
        } else {
            $row = DB::table('employee')->select(
                'employee.id',
                'employee.name',
                'position.job'
            )->leftjoin('position', 'position.id', '=', 'employee.id_position')
                ->where('job', 'LIKE', "%" . $request->cari . "%")->count();
        }

        $data = DB::table('employee')->select(
            'employee.id',
            'employee.name',
            'position.job'
        )->leftjoin('position', 'position.id', '=', 'employee.id_position')
            ->where('job', 'LIKE', "%" . $request->cari . "%")->simplePaginate(3, ['*'], 'halaman', $page);
        
        if($row == 0){
            $total = 1;
        }else{
            $total = ceil($row / 3);
        }
            
        if ($data) {
            return response()->json(['data' => $data, 'total_halaman' => $total], 200);
        } else {
            return response()->json(['message' => 'error'], 400);
        }
    }

    public function store(Request $request)
    {
        $data = DB::table('employee')->insert([
            'name' => $request->name,
            'id_position' => $request->id
        ]);
        return response()->json(['data' => $data], 201);
    }

    public function delete(string $id)
    {
        DB::table('employee')
            ->where('id', $id)
            ->delete();
        return response()->json(204);
    }

    public function update(Request $request, string $id)
    {
        $data =  DB::table('employee')->where('id', $id)->update([
            'name' => $request->name,
            'id_position' => $request->id_position
        ]);
        return response()->json(['data' => $data], 201);
    }

    public function getById(string $id)
    {
        $data = DB::table('employee')
            ->select(
                'employee.id',
                'employee.name',
                'employee.id_position',
                'position.job'
            )
            ->leftjoin('position', 'position.id', '=', 'employee.id_position')
            ->where('employee.id', $id)->first();
        return response()->json(['data' => $data], 200);
    }
}
