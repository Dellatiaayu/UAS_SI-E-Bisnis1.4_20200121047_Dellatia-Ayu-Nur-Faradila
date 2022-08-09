<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semester = Semester::all();

        return response()->json([
            'success'=>true,
            'message'=>'Daftar data semester',
            'data'=>$semester
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'semester' => 'required',
        ]);
 

        $semester = Semester::create([
            'semester'=> $request->semester,
        ]);

        if($semester){
            return response()->json([
                'success'=>true,
                'message'=>'Semester berhasil ditambahkan',
                'data'=>$semester,
            ], 200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Semester gagal ditambahkan',
                'data'=>$semester,
            ], 409);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $semester = Semester::where('id', $id) ->first();

        return response()->json([
            'success' => true,
            'message' => ' Detail semester',
            'data' => $semester
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $semester = Semester::find($id)
        ->update([
            'semester'=> $request->semester,
        ]);

        return response()->json([
                'success'=>true,
                'message'=>'Data mahasiswa berhasil diubah',
                'data'=>$semester
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $semester = Semester::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' =>'Semester berhasil di hapus',
            'data' => $semester
        ], 200); 
    }
}
