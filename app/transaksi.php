<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'id', 'id_user', 'id_kategori', 'tanggal', 'catatan', 'jumlah', 'status_update', 'status_delete'
    ];

    public function user(){
      return $this->belongsTo('App\User','id');
    }
}
