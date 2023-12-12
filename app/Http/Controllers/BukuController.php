<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::getBuku()->paginate(5);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama'=>'required',
            'kode_buku'=>'required',
            'author'=>'required',
            'kategori'=>'required'
        ]);
        try {
            $response = Buku::create($validasi);
            return response()->json([
                'success'=>true,
                'message'=>'success',
                'data'=>$response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Err',
                'error'=>$e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'nama'=>'required',
            'kode_buku'=>'required',
            'author'=>'required',
            'kategori'=>'required'
        ]);
        try {
            $response = Buku::find($id);
            $response->update($validasi);
            return response()->json([
                'success'=>true,
                'message'=>'success',
                'data'=>$response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Err',
                'error'=>$e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $result = Buku::find($id);
            $result->delete();
            return response()->json([
                'success'=>true,
                'message'=>'success',
                'dara'=>$result
            ]);
        } catch (\Exception $e) {
            //throw $th;
        }
    }
}
