<?php

namespace App\Http\Controllers;

use App\Models\BuyerTruk;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class BuyerTrukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $truk =  BuyerTruk::all();
        $response = [
            'messege' => 'List Truk ',
            'data' => $truk
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
            'plat_truk' => 'required|unique:buyer_truks',
            'perusahaan'=>'required|max:100',
            'telp'=>'required',
            'alamat'=>'required|max:200',
            'email'=>'required|email',
            'name_pic'=>'required',
            'hp_pic'=>'required',
            'keterangan'=>'required',
            'status'=>'required|boolean',
        ]);
        if ($validate->fails()){
            return response()->json($validate->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $Truk = BuyerTruk::create($request->all());
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
     * @param  \App\Models\BuyerTruk  $buyerTruk
     * @return \Illuminate\Http\Response
     */
    public function show($plat)
    {
        $Truk = BuyerTruk::where('plat_truk',$plat)->first();
        if ($Truk) {
           $result = [
                'messege'=>'Detail Buyer Truk By Plat',
                'data'=>$Truk
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
     * @param  \App\Models\BuyerTruk  $buyerTruk
     * @return \Illuminate\Http\Response
     */
    public function edit(BuyerTruk $buyerTruk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BuyerTruk  $buyerTruk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BuyerTruk  $buyerTruk
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuyerTruk $buyerTruk)
    {
        //
    }
}
