<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $response = [
            'messege' => 'List Produk',
            'data' => [
                'data'=> Produk::getAllProduk()
            ]
        ];
        return response()->json($response,Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'id_kategori' => 'required|numeric',
            'nama_produk'=>'required|max:8',
            'harga_std_m3'=>'required|numeric',
            'keterangan'=>'required|max:100',
            'status'=>'required|boolean',
        ]);
        if ($validate->fails()){
            return response()->json($validate->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $Truk = Produk::create($request->all());
            $response = [
                'messege' => 'Buyer Truk Created',
                'data' => $Truk
            ];
            return response()->json($response,Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'messege'=>'Failed',
                'error'=>$e->getMessage()
            ],Response::HTTP_NOT_ACCEPTABLE);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::getProductById($id);
        if ($produk) {
           $result = [
                'messege'=>'Detail Produk',
                'data'=>$produk
            ];
            return response()->json($result,Response::HTTP_OK);
        }else{
            return response()->json([
                'messege'=>'Data Plat Not Found'
            ],Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
