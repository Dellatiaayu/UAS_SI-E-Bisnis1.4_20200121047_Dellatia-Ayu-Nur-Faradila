<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = Mahasiswa::all();

        return response()->json([
            'success'=>true,
            'message'=>'Daftar data mahasiswa',
            'data'=>$mhs
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
            'nama_mahasiswa' => 'required|unique:mahasiswas|max:255',
            'alamat' => 'required',
            'no_tlp' => 'required|numeric',
            'email' => 'required|unique:mahasiswas|',
        ]);

        $mhs = Mahasiswa::create([
            'nama_mahasiswa'=> $request->nama_mahasiswa,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
            'remember_token' => $request->remember_token
        ]);

        if($mhs){
            return response()->json([
                'success'=>true,
                'message'=>'Mahasiswa berhasil ditambahkan',
                'data'=>$mhs,
            ], 200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Mahasiswa gagal ditambahkan',
                'data'=>$mhs,
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
        $mhs = Mahasiswa::where('id', $id) ->first();

        return response()->json([
            'success' => true,
            'message' => ' Detail mahasiswa',
            'data' => $mhs
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
        $mhs = Mahasiswa::find($id)
        ->update([
                'nama_mahasiswa'=> $request->nama_mahasiswa,
                'alamat' => $request->alamat,
                'no_tlp' => $request->no_tlp,
                'email' => $request->email,
        ]);

        return response()->json([
                'success'=>true,
                'message'=>'Data mahasiswa berhasil diubah',
                'data'=>$mhs
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
        $mhs = Mahasiswa::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => ' Data Mahasiswa berhasil di hapus',
            'data' => $mhs
        ], 200); 
    }
}
