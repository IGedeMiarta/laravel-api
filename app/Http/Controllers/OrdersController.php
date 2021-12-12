<?php

namespace App\Http\Controllers;

use App\Models\BuyerTruk;
use App\Models\Order;
use App\Models\StatusOrder;
use Illuminate\Http\Request;
use App\Models\MethodPayment;
use App\Models\OrderDetail;
use App\Models\Seller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = [
            'messege' => 'Orders ',
            'data_order'=>Order::getAllOrders(),
            // 'all_seller' => Seller::all(),
            // 'all_truk'=>BuyerTruk::all(),
            // 'all_method_payment' => MethodPayment::all(),
            // 'all_status_order' => StatusOrder::all(),
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
            'id_order'=>'required|max:6',
            'id_user'=>'required|max:6',
            'order_date'=>'required|date_format:Y-m-d H:i:s',
            'id_seller'=>'required',
            'plat_truk'=>'required',
            'id_payment'=>'required',
            'id_status'=>'required',
            'id_device'=>'required',
            'id_ps'=>'required',
            'harga_std'=>'required|numeric',
            'unit_price'=>'required|numeric',
            'qty'=>'required|numeric',
            'disc'=>'required|numeric',
            'unit_pajak'=>'required|numeric'
        ]);
        if ($validate->fails()){
            return response()->json($validate->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            Order::create($request->all());
            OrderDetail::create($request->all());
            $response = [
                'messege' => 'New order has been created',
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $response = [
            'messege' => 'Orders ',
            'data_order'=>Order::getOrdersById($id),
            // 'all_status_order' => StatusOrder::all(),
            // 'all_method_payment' => MethodPayment::all(),
        ];
        return response()->json($response,Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
         $order_detail = OrderDetail::where('id_order',$id)->first();

        if ($order_detail) {
            $validate = Validator::make($request->all(),[
                'harga_std'=>'required|numeric',
                'unit_price'=>'required|numeric',
                'qty'=>'required|numeric',
                'disc'=>'required|numeric',
                'unit_pajak'=>'required|numeric'
            ]);

            if($validate->fails()){
                return response()->json($validate->errors(),
                Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            
            try {
                $order_detail->update($request->all());
                $response = [
                    'messege'=> 'Detail Order Updated',
                    'data'=> $order_detail
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
