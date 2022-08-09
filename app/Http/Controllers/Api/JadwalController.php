<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::all();

        return response()->json([
            'success'=>true,
            'message'=>'Daftar Jadwal',
            'data'=>$jadwal
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
            'jadwal' => 'required|unique:jadwals|max:255',
            'matakuliah_id' => 'required',
        ]);

        $jadwal= Jadwal::create([
            'jadwal'=> $request->jadwal,
            'matakuliah_id' => $request->matakuliah_id,
        ]);

        if($jadwal){
            return response()->json([
                'success'=>true,
                'message'=>'Jadwal berhasil ditambahkan',
                'data'=>$jadwal,
            ], 200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Jadwal gagal ditambahkan',
                'data'=>$jadwal,
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
        $jadwal= Jadwal::where('id', $id) ->first();

        return response()->json([
            'success' => true,
            'message' => ' Detail Jadwal',
            'data' => $jadwal
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
        $jadwal = Jadwal::find($id)
        ->update([
            'jadwal'=> $request->jadwal,
            'matakuliah_id' => $request->matakuliah_id,
        ]);

        return response()->json([
                'success'=>true,
                'message'=>'Data Jadwal berhasil diubah',
                'data'=>$jadwal
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
        $jadwal = Jadwal::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => ' Data Jadwal berhasil di hapus',
            'data' => $jadwal
        ], 200); 
    }
}
