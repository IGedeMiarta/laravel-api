<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id_order'];

    public static function getAllOrders(){
        return Order::join('order_details','orders.id','=','order_details.id_order')
        ->join('sellers','orders.id_seller','=','sellers.id')
        ->join('buyer_truks','orders.plat_truk','=','buyer_truks.plat_truk')
        ->join('method_payments','orders.id_payment','=','method_payments.id')
        ->join('status_orders','orders.id_status','=','status_orders.id')
        ->join('produk_sellers','order_details.id_ps','=','produk_sellers.id')
        ->join('produks','produk_sellers.id_produk','=','produks.id')
        ->join('kategoris','produks.id_kategori','=','kategoris.id')
        ->select(
            'orders.id as id_order',
            'orders.id_user',
            'orders.order_date',
            'sellers.perusahaan AS sellers',
            'orders.plat_truk',
            'buyer_truks.perusahaan AS buyer',
            'method_payments.pembayaran',
            'status_orders.status',
            'order_details.id_device',
            'order_details.id_device',
            'produks.nama_produk',
            'produk_sellers.harga AS harga_ps',
            'produks.harga_std_m3',
            'kategoris.nama_kategori',
            'kategoris.pajak AS pajak_kategori',
            'order_details.harga_std',
            'order_details.unit_price',
            'order_details.qty',
            'order_details.disc',
            'order_details.unit_pajak',
            )        
        ->get();
    }
    public static function getOrdersById($id){
        return Order::join('order_details','orders.id','=','order_details.id_order')
         ->join('sellers','orders.id_seller','=','sellers.id')
        ->join('buyer_truks','orders.plat_truk','=','buyer_truks.plat_truk')
        ->join('method_payments','orders.id_payment','=','method_payments.id')
        ->join('status_orders','orders.id_status','=','status_orders.id')
        ->join('produk_sellers','order_details.id_ps','=','produk_sellers.id')
        ->join('produks','produk_sellers.id_produk','=','produks.id')
        ->join('kategoris','produks.id_kategori','=','kategoris.id')
        ->select(
            'orders.id as id_order',
            'orders.id_user',
            'orders.order_date',
            'sellers.perusahaan AS sellers',
            'orders.plat_truk',
            'buyer_truks.perusahaan AS buyer',
            'method_payments.pembayaran',
            'status_orders.status',
            'order_details.id_device',
            'order_details.id_device',
            'produks.nama_produk',
            'produk_sellers.harga AS harga_ps',
            'produks.harga_std_m3',
            'kategoris.nama_kategori',
            'kategoris.pajak AS pajak_kategori',
            'order_details.harga_std',
            'order_details.unit_price',
            'order_details.qty',
            'order_details.disc',
            'order_details.unit_pajak',
            )         
            ->where('orders.id',$id)->first();
    }
}
