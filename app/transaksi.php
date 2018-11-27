<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $fillable = [
        'id', 'id_kategori', 'id_penyimpanan', 'tipe', 'tanggal', 'catatan', 'jumlah'
    ];

    public function user(){
      return $this->belongsTo('App\User','id');
    }
}
