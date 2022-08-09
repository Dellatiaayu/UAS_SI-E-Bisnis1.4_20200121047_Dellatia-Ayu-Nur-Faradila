<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matakuliah;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matakuliah = Matakuliah::all();

        return response()->json([
            'success'=>true,
            'message'=>'Daftar data matakuliah',
            'data'=>$matakuliah
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
            'nama_matakuliah' => 'required|unique:matakuliahs|max:255',
            'sks' => 'required',
        ]);

        $matakuliah = Matakuliah::create([
            'nama_matakuliah'=> $request->nama_matakuliah,
            'sks' => $request->sks,
        ]);

        if($matakuliah){
            return response()->json([
                'success'=>true,
                'message'=>'Matakuliah berhasil ditambahkan',
                'data'=>$matakuliah,
            ], 200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Matakuliah gagal ditambahkan',
                'data'=>$matakuliah,
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
        $matakuliah = Matakuliah::where('id', $id) ->first();

        return response()->json([
            'success' => true,
            'message' => ' Detail matakuliah',
            'data' => $matakuliah
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
        $matakuliah = Matakuliah::find($id)
        ->update([
            'nama_matakuliah'=> $request->nama_matakuliah,
            'sks' => $request->sks,
        ]);

        return response()->json([
                'success'=>true,
                'message'=>'Data matakuliah berhasil diubah',
                'data'=>$matakuliah
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
        $matakuliah = Matakuliah::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => ' Data Matakuliah berhasil di hapus',
            'data' => $matakuliah
        ], 200); 
    }
}
