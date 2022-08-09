<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absen;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absen = Absen::all();

        return response()->json([
            'success'=>true,
            'message'=>'Daftar Absen',
            'data'=>$absen
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
            'waktu_absen' => 'required',
            'nama_mahasiswa' => 'required|numeric',
            'nama_matakuliah' => 'required|numeric',
            'ket' => 'required',
        ]);

        $absen = Absen::create([
            'waktu_absen'=> $request->waktu_absen,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nama_matakuliah' => $request->nama_matakuliah,
            'ket' => $request->ket,        
        ]);

        if($absen){
            return response()->json([
                'success'=>true,
                'message'=>'Absen berhasil ditambahkan',
                'data'=>$absen,
            ], 200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'c gagal ditambahkan',
                'data'=>$absen,
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
        $absen = Absen::where('id', $id) ->first();

        return response()->json([
            'success' => true,
            'message' => ' Detail Absen',
            'data' => $absen
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
