<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function getAllProduk(){
        return Produk::select(
                'produks.*',
                'kategoris.nama_kategori',
                'kategoris.pajak')
                ->leftjoin('kategoris','produks.id_kategori','=','kategoris.id')
                ->orderByDesc('produks.created_at')
                ->get();
    }
    public static function getProductById($id){
        return Produk::select(
                'produks.*',
                'kategoris.nama_kategori',
                'kategoris.pajak')
                ->leftjoin('kategoris','produks.id_kategori','=','kategoris.id')
                ->where('produks.id','=',$id)
                ->first();
    }
}
