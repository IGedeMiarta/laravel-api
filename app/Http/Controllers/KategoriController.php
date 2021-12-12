<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori =  Kategori::all();
        $response = [
            'messege' => 'List kategori Pajak',
            'data' => $kategori
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
            'nama_kategori'=>'required|max:30',
            'pajak'=>'required|numeric',
            'status'=>'boolean|required'
        ]);
        if ($validate->fails()){
            return response()->json($validate->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $kategori = Kategori::create($request->all());
            $response = [
                'messege' => 'Kategori Pajak Created',
                'data' => $kategori
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
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::find($id);
        if ($kategori) {
           $result = [
                'messege'=>'Detail kategori',
                'data'=>$kategori
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
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $kategori = Kategori::find($id);

        if ($kategori) {
            $validate = Validator::make($request->all(),[
                'nama_kategori'=>'required|max:30',
                'pajak'=>'required|numeric',
                'status'=>'boolean|required'
            ]);

            if($validate->fails()){
                return response()->json($validate->errors(),
                Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            
            try {
                $kategori->update($request->all());
                $response = [
                    'messege'=> 'Kategori Updated',
                    'data'=> $kategori
                ];
                return response()->json($response,Response::HTTP_OK);
            } catch (QueryException $e) {
                return response()->json([
                    'messege'=>'Failed',
                    'error'=>$e->getMessage()
                ],Response::HTTP_NOT_ACCEPTABLE);
            }
        } else {
            return response()->json([
                'messege'=>'Update Fail Data Not Found'
            ],Response::HTTP_NOT_FOUND);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
