<?php

namespace App\Http\Controllers;

use App\Models\ProdukSeller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProdukSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks =  ProdukSeller::getAllProdukSeller();
        $response = [
            'messege' => 'Get Product Sellers',
            'data' => $produks
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdukSeller  $produkSeller
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = ProdukSeller::getAllProdukSellerWhereId($id);
        if ($produk) {
           $result = [
                'messege'=>'Detail Produk Seller',
                'data'=>$produk
            ];
            return response()->json($result,Response::HTTP_OK);
        }else{
            return response()->json([
                'messege'=>'Data Not Found'
            ],Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdukSeller  $produkSeller
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdukSeller $produkSeller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdukSeller  $produkSeller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdukSeller $produkSeller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdukSeller  $produkSeller
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdukSeller $produkSeller)
    {
        //
    }
}
