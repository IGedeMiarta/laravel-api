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
    public function index($id)
    {
        $produks =  ProdukSeller::where('id_seller',$id)->first();
        if ($produks) {
            $response = [
                'messege' => 'Get Product Sellers',
                'data' => ProdukSeller::getAllProdukBySeller($id)
             ];
            return response()->json($response,Response::HTTP_OK);

        } else {
            return response()->json([
                'messege'=>'Data Not Found'
            ],Response::HTTP_NOT_FOUND);
        }
        
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
    public function show($id_seller,$id_produk)
    {
        $cek =  ProdukSeller::where('id_seller',$id_seller)->first();
        if ($cek) {
            $produks = ProdukSeller::getAllProdukSellerWhereId($id_seller,$id_produk);
            if ($produks) {
                $result = [
                    'messege'=>'Detail Produk Seller',
                    'data'=>$produks
                ];
                return response()->json($result,Response::HTTP_OK);
            } else {
                return response()->json([
                    'messege'=>"Product Not Found"
                ],Response::HTTP_NOT_FOUND);
            }
            
        }else{
            return response()->json([
                'messege'=>"Seller doesn't have the product yet"
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
