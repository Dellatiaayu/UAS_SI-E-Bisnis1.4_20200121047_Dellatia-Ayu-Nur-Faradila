<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kontrak;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontrak = Kontrak::all();

        return response()->json([
            'success'=>true,
            'message'=>'Daftar data kontrak',
            'data'=>$kontrak
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
            'mahasiswa_id' => 'required|unique:kontraks|',
            'semester_id' => 'required',
        ]);

        $kontrak = Kontrak::create([
            'mahasiswa_id'=> $request->mahasiswa_id,
            'semester_id' => $request->semester_id,
        ]);

        if($kontrak){
            return response()->json([
                'success'=>true,
                'message'=>'Kontrak berhasil ditambahkan',
                'data'=>$kontrak,
            ], 200);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Kontrak gagal ditambahkan',
                'data'=>$kontrak,
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
        $kontrak = Kontrak::where('id', $id) ->first();

        return response()->json([
            'success' => true,
            'message' => ' Detail Kontrak',
            'data' => $kontrak
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
        $kontrak = Kontrak::find($id)
        ->update([
            'mahasiswa_id'=> $request->mahasiswa_id,
            'semester_id' => $request->semester_id,
        ]);

        return response()->json([
                'success'=>true,
                'message'=>'Data Kontrak berhasil diubah',
                'data'=>$kontrak
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
        $kontrak = Kontrak::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => ' Data Kontrak berhasil di hapus',
            'data' => $kontrak
        ], 200); 
    }
}
