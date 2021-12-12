<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukSeller extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function getAllProdukSeller(){
        return Seller::leftJoin('produk_sellers','produk_sellers.id_seller','=','sellers.id')
                            ->leftJoin('produks','produk_sellers.id_produk','=','produks.id')
                            ->leftJoin('kategoris','produks.id_kategori','=','kategoris.id')
                            ->select(
                                'produk_sellers.id',
                                'produk_sellers.harga AS harga_produks_selles',
                                'produk_sellers.keterangan',
                                'produk_sellers.status',
                                'kategoris.id AS id_kategori',
                                'kategoris.nama_kategori',
                                'kategoris.pajak',
                                'produks.id AS id_produk',
                                'produks.nama_produk',
                                'produks.harga_std_m3',
                                'sellers.id AS id_seller',
                                'sellers.perusahaan AS nama_seller',
                                'sellers.telp AS seller_phone'
                            )
                            ->orderBy('produk_sellers.id')
                            ->get();
    }
    public static function getAllProdukSellerWhereId($id){
        return Seller::leftJoin('produk_sellers','produk_sellers.id_seller','=','sellers.id')
                            ->leftJoin('produks','produk_sellers.id_produk','=','produks.id')
                            ->leftJoin('kategoris','produks.id_kategori','=','kategoris.id')
                            ->select(
                                'produk_sellers.id',
                                'produk_sellers.harga AS harga_produks_selles',
                                'produk_sellers.keterangan',
                                'produk_sellers.status',
                                'kategoris.id AS id_kategori',
                                'kategoris.nama_kategori',
                                'kategoris.pajak',
                                'produks.id AS id_produk',
                                'produks.nama_produk',
                                'produks.harga_std_m3',
                                'sellers.id AS id_seller',
                                'sellers.perusahaan AS nama_seller',
                                'sellers.telp AS seller_phone'
                            )
                            ->where('produk_sellers.id',$id)
                            ->orderBy('produk_sellers.id')
                            ->get();
    }

}
