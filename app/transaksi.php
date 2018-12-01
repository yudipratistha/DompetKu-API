<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'id', 'id_user', 'id_kategori', 'id_penyimpanan', 'tipe', 'tanggal', 'catatan', 'jumlah'
    ];

    public function user(){
      return $this->belongsTo('App\User','id');
    }
}
